<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $user_id
 * @property string $user_name
 * @property string $user_first_name
 * @property string $user_last_name
 * @property string $user_full_name
 * @property string $user_email
 * @property string $user_password
 * @property integer $user_lastvisit
 * @property integer $user_created_date
 */
class User extends CActiveRecord
{
	const ADMIN = 'admin';
    const CLIENT = 'client';
    const LEAD = 'lead';

    public $user_password_repeat;
    public $user_role;
    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('user_name, user_email', 'unique', 'message' => '{attribute}:{value} already exists, please choose a different one.', 'on' => 'insert'),
            array('user_email', 'required', 'on' => 'insert, update'),
            array('user_name, user_password, user_password_repeat', 'required', 'on' => 'insert'),
            array('user_first_name, user_last_name, user_full_name', 'required', 'on' => 'insert, update'),
            array('user_email', 'email'),
            array('user_password', 'match', 'pattern' => '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,16}$/', 'message' => 'Passwords are 6-16 characters with uppercase letters, lowercase letters and at least one number.', 'on' => 'insert, changePassword'),
            array('user_name,user_first_name,user_last_name', 'match', 'pattern' => '/^[a-zA-Z0-9 - . \' ,]/', 'message' => 'Please don\'t put invalid value', 'on' => 'insert, update'),
            array('user_lastvisit, user_created_date', 'numerical', 'integerOnly'=>true),
			array('user_name', 'length', 'max'=>64),
			array('user_first_name, user_last_name, user_full_name, user_email, user_password, user_password_repeat', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, user_name, user_first_name, user_last_name, user_full_name, user_email, user_password, user_lastvisit, user_created_date, user_role', 'safe', 'on'=>'search'),
            array('user_password_repeat', 'compare', 'compareAttribute' => 'user_password', 'on' => 'insert'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'role' => array(self::HAS_MANY, 'Authassignment', 'userid', 'together' => true),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'user_name' => 'User Name',
			'user_first_name' => 'First Name',
			'user_last_name' => 'Last Name',
			'user_full_name' => 'Full Name',
			'user_email' => 'Email',
			'user_password' => 'Password',
            'user_password_repeat' => 'Confirm Password',
            'user_role' => 'Role',
			'user_lastvisit' => 'Lastvisit',
			'user_created_date' => 'Created Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('user_first_name',$this->user_first_name,true);
		$criteria->compare('user_last_name',$this->user_last_name,true);
		$criteria->compare('user_full_name',$this->user_full_name,true);
		$criteria->compare('user_email',$this->user_email,true);
		$criteria->compare('user_password',$this->user_password,true);
		$criteria->compare('user_lastvisit',$this->user_lastvisit);
		$criteria->compare('user_created_date',$this->user_created_date);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /*
     *
     */
    public function getFullName() {
        return "$this->user_first_name $this->user_last_name";
    }
    /*
     * perform one-way encryption on the password before we store it in the database
     */
    protected function afterValidate()
    {
        if(in_array($this->getScenario(), array('insert', 'changePassword')))
        {
            $this->user_password = $this->encrypt($this->user_password);
            return parent::afterValidate();
        }
    }
    /*
    * return encrypt value when input a value
    */
    public function encrypt($val)
    {
        return md5($val);
    }

    /*
     *
     */
    public function getRoleOptions()
    {
        return array(
            self::CLIENT => 'Customer',
            self::LEAD => 'Team Lead',
            self::ADMIN => 'Administrator',
        );
    }

    /*
     * get role name by role value
     */

    public function getRoleText($roleValue) {
        $roleOptions = $this->getRoleOptions();
        return isset($roleOptions[$roleValue]) ? $roleOptions[$roleValue] : "unknown role ({$roleValue})";
    }

    /*
     * get role of user
     */

    public function getRoleName() {
        foreach ($this->role as $r) {
            return $this->getRoleText($r->itemname);
        }
        return "";
    }

    /*
     * get role of user
     */

    public function getRoleValue() {
        foreach ($this->role as $r) {
            return $r->itemname;
        }
        return "";
    }

    /*
     * convert from timestamp to date/time
     */
    public function getCreatedDate() {
        return date('M-d-Y h:i:s A', $this->user_created_date);
    }

    /*
     * get role from user_id input
     */
    public function getUserRole($id) {
        $role = Authassignment::model()->find(array(
            'select' => '*',
            'condition' => 'userid =:userId',
            'params' => array(':userId' => $id),
        ));
        return $role->itemname;
    }

    /*
    * get role of User when user login
    */
    public function getRoleOfUser() {
        $role = Authassignment::model()->find(array(
            'select' => '*',
            'condition' => 'userid =:userId',
            'params' => array(':userId' => $this->user_id),
        ));
        return $role->itemname;
    }

}
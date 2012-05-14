<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property double $estimate_time
 * @property integer $sourcers
 * @property double $sourcer_time
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $lead_id
 */
class Project extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Project the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'project';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('name', 'required'),
            array('sourcers', 'numerical', 'integerOnly' => true),
            array('estimate_time, sourcer_time', 'numerical'),
            array('name', 'length', 'max' => 256),
            array('description', 'safe'),
            array('lead_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'estimate_time' => 'Estimate Time (hours)',
            'sourcers' => 'Number of Sourcers',
            'sourcer_time' => 'Time for each Sourcer (hours)',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'lead_id' => 'Lead',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('name', $this->name, true);
        $criteria->compare('lead_id', $this->lead_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }
    
    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->getIsNewRecord()) {
                $this->create_time = time();
                $this->lead_id = Yii::app()->user->id;
            }
            $this->update_time = time();
            return true;
        }
        return false;
    }
    
    /**
     * Show create time 
     */
    public function showCreateTime() {
        return date('M d, Y', $this->create_time);
    }

}
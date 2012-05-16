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
 * @property integer $request_id
 */
class Project extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'project';
    }

    public function rules() {
        return array(
            array('name', 'required'),
            array('sourcers', 'numerical', 'integerOnly' => true),
            array('estimate_time, sourcer_time', 'numerical'),
            array('name', 'length', 'max' => 256),
            array('description, request_id', 'safe'),
            array('lead_id', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'request' => array(self::BELONGS_TO, 'Request', 'request_id'),
            'lead' => array(self::BELONGS_TO, 'User', 'lead_id'),
        );
    }

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
            'request_id' => 'For Request',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('name', $this->name, true);
        $criteria->compare('request_id', $this->request_id);

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

    public function showCreateTime() {
        return date('M d, Y', $this->create_time);
    }

    public function getRequestArray() {
        $requests = Request::model()->findAll(array(
            'select' => 'id, subject',
                ));

        $arr = array();
        foreach ($requests as $r) {
            $arr[$r->id] = $r->subject;
        }

        return $arr;
    }

    public function showUpdateTime() {
        return date('M d, Y', $this->update_time);
    }

    public function showRequest() {
        $request = $this->request;
        $name = $request->subject;
        if (strlen($name) > 10) {
            $name = substr($name, 0, 10) . '...';
        }

        echo CHtml::link($name, array('request/view', 'id'=>$request->id));
    }

}
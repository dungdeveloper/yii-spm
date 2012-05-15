<?php

/**
 * This is the model class for table "request".
 *
 * The followings are the available columns in table 'request':
 * @property integer $id
 * @property string $subject
 * @property string $description
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $client_id
 */
class Request extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'request';
    }

    public function rules() {
        return array(
            array('subject', 'required'),
            array('subject', 'length', 'max' => 256),
            array('description', 'safe'),
            array('subject, client_id', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'subject' => 'Subject',
            'description' => 'Description',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'client_id' => 'Client',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;
        $criteria->compare('subject', $this->subject, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    protected function beforeSave() {
        parent::beforeSave();
        if ($this->getIsNewRecord()) {
            $this->create_time = time();
            $this->client_id = Yii::app()->user->id;
        }
        $this->update_time = time();
        return true;
    }

}
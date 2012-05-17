<?php

/**
 * This is the model class for table "file_report".
 *
 * The followings are the available columns in table 'file_report':
 * @property integer $id
 * @property string $filename
 * @property integer $report_id
 */
class FileReport extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'file_report';
    }

    public function rules() {
        return array(
        );
    }

    public function relations() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'filename' => 'Filename',
            'report_id' => 'Report',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('filename', $this->filename);
        $criteria->compare('report_id', $this->report_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}
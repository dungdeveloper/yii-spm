<?php

/**
 * This is the model class for table "report".
 *
 * The followings are the available columns in table 'report':
 * @property integer $id
 * @property double $progress
 * @property int $project_id
 */
class Report extends CActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'report';
    }

    public function rules() {
        return array(
            array('progress', 'required'),
            array('progress', 'numerical'),
            array('id, progress', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'files' => array(self::HAS_MANY, 'FileReport', 'report_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'progress' => 'Progress (%)',
            'project_id' => 'Project',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('progress', $this->progress);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }
    
    public function showFiles() {
        $ret = '';
        $files = $this->files;
        $name = 'report'.$this->id;
        $folder = Yii::app()->baseUrl.'/files/'.$name.'/';

        foreach ($files as $f) {
            $title = "<p>Progress: ".$this->progress."<br />Files: ".$f->filename."</p>";
            $ret .= CHtml::link($title, $folder.$f->filename, array(
                'class' => 'thumbnail',
                'rel' => 'tooltip',
                'data-title' => 'Report #'.$this->id,
            ));
        }

        return $ret;
    }        
    
}
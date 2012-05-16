<?php

/**
 * This is the model class for table "file".
 *
 * The followings are the available columns in table 'file':
 * @property integer $id
 * @property string $filename
 * @property integer $request_id
 */
class File extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return File the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'file';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
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
            'filename' => 'Filename',
            'request_id' => 'Request',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('filename', $this->filename, true);
        $criteria->compare('request_id', $this->request_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function saveFiles($files, $request_id) {
        $folder = Yii::app()->basePath . '/../files/' . $request_id;

        if (!is_dir($folder)) {
            mkdir($folder);
        }

        foreach ($files as $f) {
            if ($f->saveAs($folder . '/' . $f->name)) {
                $file = new File;
                $file->filename = $f->name;
                $file->request_id = $request_id;
                $file->save();
            }
        }
    }

    public function addMoreFiles($files, $request_id) {
        $folder = Yii::app()->basePath . '/../files/' . $request_id;

        foreach ($files as $f) {
            $file = $this->findByAttributes(array('filename' => $f->name, 'request_id' => $request_id));

            if (is_null($file)) {
                if ($f->saveAs($folder . '/' . $f->name)) {
                    $file = new File;
                    $file->filename = $f->name;
                    $file->request_id = $request_id;
                    $file->save();
                }
            }
        }
    }

}
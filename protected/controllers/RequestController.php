<?php

class RequestController extends Controller {

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionView($id) {
        $model = $this->loadModel($id);
        $files = File::model()->findAllByAttributes(array('request_id' => $id));

        $uploadFiles = CUploadedFile::getInstancesByName('files');
        if (!empty($uploadFiles)) {
            File::model()->addMoreFiles($uploadFiles, $id);
            $this->refresh();
        }

        $this->render('view', array(
            'model' => $model,
            'files' => $files,
        ));
    }

    public function actionCreate() {
        $model = new Request;

        if (isset($_POST['Request'])) {
            $model->attributes = $_POST['Request'];
            $files = CUploadedFile::getInstancesByName('files');

            if ($model->save()) {
                if (!empty($files)) {
                    File::model()->saveFiles($files, $model->id);
                }
                Yii::app()->user->setFlash('success', 'Your request has been created');
                $this->redirect(array('request/admin'));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        if (isset($_POST['Request'])) {
            $model->attributes = $_POST['Request'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Successfully updated your request');
                $this->redirect(array('request/admin'));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Request');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new Request('search');
        $model->unsetAttributes();
        
        if (isset($_GET['Request']))
            $model->attributes = $_GET['Request'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Request::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'request-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

<?php

class ProjectController extends Controller {

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
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
        $modelReport = new Report;
        $dataProvider = new CActiveDataProvider('Report', array(
            'criteria' => array(
                'condition' => 'project_id='.$id,
                'with' => array('files'),
            ),
        ));
        
        if (isset($_POST['Report'])) {
            $modelReport->progress = $_POST['Report']['progress'];
            $modelReport->project_id = $id;
            
            if ($modelReport->save()) {
                $files = CUploadedFile::getInstancesByName('files');
                if (!empty($files)) {
                    File::model()->saveReportFiles($files, $modelReport->id);
                }                
                
                Yii::app()->user->setFlash('success', 'Successfully created your report');
                $this->refresh();
            }
        }
        
        $this->render('view', array(
            'model' => $model,
            'modelReport' => $modelReport,
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionCreate() {
        $model = new Project;

        if (isset($_POST['Project'])) {
            $model->attributes = $_POST['Project'];
            if ($model->save())
                $this->redirect(array('admin'));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        if (isset($_POST['Project'])) {
            $model->attributes = $_POST['Project'];
            if ($model->save())
                $this->redirect(array('admin'));
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
        $dataProvider = new CActiveDataProvider('Project');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new Project('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Project']))
            $model->attributes = $_GET['Project'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Project::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'project-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}

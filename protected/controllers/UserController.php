<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','view',),
                'users'=>array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update','admin'),
                'roles'=>array('admin'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                   'actions'=>array('delete'),
                   'roles'=>array('admin'),
               ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $model = User::model()->findByPK($id);
        if(($model->getUserRole(Yii::app()->user->id)=="client")&&($model->user_id<>Yii::app()->user->id))
            throw new CHttpException(403,'You are not authorized to perform this action.');
        if(($model->getUserRole(Yii::app()->user->id)=="lead")&&($model->user_id<>Yii::app()->user->id))
            throw new CHttpException(403,'You are not authorized to perform this action.');

        $this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        if(Yii::app()->user->checkAccess('createUser'))
        {
            Yii::app()->user->setFlash('create_wraning',"You are requesting a new user that you are not authorized");
        }
        $model=new User('insert');

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['User']))
        {
            $model->attributes=$_POST['User'];
            $model->user_name = strtolower($_POST['User']['user_name']);
            $model->user_email = strtolower($_POST['User']['user_email']);
            $model->user_created_date = time();
            if($model->save())
            {
                $this->associateUserToRole($_POST['User']['user_role'], $model->user_id);
                $this->redirect(array('view','id'=>$model->user_id));
            }

        }

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
        if(Yii::app()->user->checkAccess('updateUser'))
        {
            Yii::app()->user->setFlash('update_wraning', "You are requesting to update user info that you are not authorized" );
        }
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['User']))
        {
            $model->setScenario('update');
            $model->attributes=$_POST['User'];
            if($model->save())
            {
                $this->deleteAllAssociateUserToRole($model->user_id);
                $this->associateUserToRole($_POST['User']['user_role'],$model->user_id);
                $this->redirect(array('view','id'=>$model->user_id));
            }
        }

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $id = Yii::app()->user->id;

        if(!Yii::app()->user->checkAccess('admin'))
            $this->redirect(array('view', 'id' => $id));

        $dataProvider=new CActiveDataProvider('User');
        // CVarDumper::dump($dataProvider); die;

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    /*
    * creates an association between the user and the user's role
    */
    public function associateUserToRole($role, $userId)
    {
        $sql = "INSERT INTO AuthAssignment (itemname, userid, bizrule, data) VALUES (:role, :userId, '', 'N;')";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindValue(":role", $role, PDO::PARAM_STR);
        $command->bindValue(":userId", $userId, PDO::PARAM_INT);
        return $command->execute();
    }

    /**
     * delete all association between the user and role
     */
    public function deleteAllAssociateUserToRole($userId)
    {
        $sql = "DELETE FROM AuthAssignment WHERE userid =:userId";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindValue(":userId", $userId, PDO::PARAM_INT);
        return $command->execute();
    }

}

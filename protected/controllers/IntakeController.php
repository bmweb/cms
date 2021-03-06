<?php

class IntakeController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

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
			array('allow', 
                            'actions' => array('Getintake'),
                            'users' => array('*'),
                        ),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','admin','delete'),
				'expression'=> 'User::isAdmin() || User::isOfficial()',
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
		$model=new Intake;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Intake']))
		{
			$model->attributes=$_POST['Intake'];
			
			if($model->save()) {
                                //save Intake course data
                                if(isset($_POST['Intake']['course']) && is_array($_POST['Intake']['course']) && count($_POST['Intake']['course'])>0){
                                    $r = CourseIntake::saveIntakeCourse($_POST['Intake']['course'], $model->id);
                                }
				Yii::app()->user->setFlash('success', 'Intake added successfully');
				$this->redirect(array('admin'));
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $rows = CourseIntake::model()->findAllByAttributes(array('intake_id'=>$id));
		$model->course = CHtml::listData( $rows, 'course_id' , 'course_id');
		if(isset($_POST['Intake']))
		{
			$model->attributes=$_POST['Intake'];
			if($model->save()) {
                                //update unit assigned to trainer
                                $d = CourseIntake::deleteAllIntakeCourse($id);
                                if(isset($_POST['Intake']['course']) && is_array($_POST['Intake']['course']) && count($_POST['Intake']['course'])>0){
                                    $r = CourseIntake::saveIntakeCourse($_POST['Intake']['course'], $model->id);
                                }
				Yii::app()->user->setFlash('success', 'Intake updated successfully');
				$this->redirect(array('admin'));
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
		$dataProvider=new CActiveDataProvider('Intake');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Intake('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Intake']))
			$model->attributes=$_GET['Intake'];

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
		$model=Intake::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='intake-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionGetintake() {
	$course_id = $_REQUEST['course'];
	$data = CourseIntake::model()->findAll(array('condition'=>"course_id =  '$course_id'"));
	echo "<option value=''>Select</option>";
	foreach ($data as $value => $name) {
	    echo CHtml::tag('option', array('value' => $name->intake->id), CHtml::encode($name->intake->name), true);
	}
       // $course_fee=  Course::model()->findByAttributes(array('id'=>$course_id));
        echo CJSON::encode(array('fee'=>"500"));
    }
}

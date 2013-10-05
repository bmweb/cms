<?php

class ResultController extends Controller
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
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','admin','delete'),
				'expression'=> 'User::isAdmin()',
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
                $model = $this->loadModel($id);
                $criteria = new CDbCriteria();
                $criteria->with = array('studentCourses','studentCourses.course.units');
                $criteria->condition = "studentCourses.intake_id=".$model->intake_id." and units.id=".$model->unit_id." and studentCourses.course_id=".$model->course_id;
                $students = Student::model()->findAll($criteria);
		$this->render('view',array(
			'model'=>$model,
                        'students'=>$students,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Result;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $students = array();
                if (isset($_REQUEST['search'])) {
                    if(isset($_GET['Result']['intake_id']) && $_GET['Result']['unit_id']){
                    $model->attributes = $_GET['Result'];
                    $criteria = new CDbCriteria();
                    $criteria->with = array('studentCourses','studentCourses.course.units');
                    $criteria->condition = "studentCourses.intake_id=".$_GET['Result']['intake_id']." and units.id=".$_GET['Result']['unit_id'];
                    $students = Student::model()->findAll($criteria);
                    }else{
                        Yii::app()->user->setFlash('error', 'Select intake, course and unit');
                    }
                }
		if(isset($_POST['Result']))
		{
			$model->attributes=$_POST['Result'];
                        $chekedStudent = array();
                        $internalMarks = array();
                        $externalMarks = array();
                        if(isset($_POST['Result']['student_id'])){
                            $chekedStudent = array_filter($_POST['Result']['student_id']);
                        }
                        if(isset($_POST['Result']['internal_marks'])){
                            $internalMarks = array_filter($_POST['Result']['internal_marks']);
                        }
                        if(isset($_POST['Result']['external_marks'])){
                            $externalMarks = array_filter($_POST['Result']['external_marks']);
                        }
			//save result
                        if(!empty($chekedStudent) && !empty($internalMarks) && !empty($externalMarks)){
                            $r = Result::saveResult($chekedStudent, $model->unit_id, $model->intake_id, $model->course_id, $internalMarks, $externalMarks);
                            Yii::app()->user->setFlash('success', 'Result added successfully');
                            $this->redirect(array('admin'));
                        }
		}

		$this->render('create',array(
			'model'=>$model,
                        'students'=>$students
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

                $criteria = new CDbCriteria();
                $criteria->with = array('studentCourses','studentCourses.course.units');
                $criteria->condition = "studentCourses.intake_id=".$model->intake_id." and units.id=".$model->unit_id." and studentCourses.course_id=".$model->course_id;
                $students = Student::model()->findAll($criteria);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                
		if(isset($_POST['Result']))
		{
			$model->attributes=$_POST['Result'];
                        $chekedStudent = array();
                        $internalMarks = array();
                        $externalMarks = array();
                        if(isset($_POST['Result']['student_id'])){
                            $chekedStudent = array_filter($_POST['Result']['student_id']);
                        }
                        if(isset($_POST['Result']['internal_marks'])){
                            $internalMarks = array_filter($_POST['Result']['internal_marks']);
                        }
                        if(isset($_POST['Result']['external_marks'])){
                            $externalMarks = array_filter($_POST['Result']['external_marks']);
                        }
			//save result
                        if(!empty($chekedStudent) && !empty($internalMarks) && !empty($externalMarks)){
                            $r = Result::saveResult($chekedStudent, $model->unit_id, $model->intake_id, $model->course_id, $internalMarks, $externalMarks);
                            Yii::app()->user->setFlash('success', 'Result updated successfully');
                            $this->redirect(array('admin'));
                        }
		}

		$this->render('update',array(
			'model'=>$model,
                        'students'=>$students
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
		$dataProvider=new CActiveDataProvider('Result');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Result('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Result']))
			$model->attributes=$_GET['Result'];

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
		$model=Result::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='result-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

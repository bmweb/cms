<?php

class AttendanceController extends Controller
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
            
                $classTimeTableId = $_GET['id'];
                $intakeId = $_GET['intake'];
                $unitId = $_GET['unit'];
                //echo $intakeId; exit;
                $classTimeTable = ClassTimeTable::model()->findByPk($classTimeTableId);
                $criteria = new CDbCriteria();
                $criteria->with = array('studentCourses','studentCourses.course','studentCourses.course.units');
                $criteria->condition="units.id=$unitId and studentCourses.intake_id=$intakeId";
                $students = Student::model()->findAll($criteria);
                $model=new Attendance;
                //check attende is done for this class
                $attandenceRow = Attendance::model()->findAll(array('condition'=>"class_time_table_id=".$classTimeTableId));
                if(count($attandenceRow)){
                    foreach ($attandenceRow as $data){
                        $attendance_detail[$data->student_id]=$data->attendance_detail;
                    }
                    $model->attendance_detail=$attendance_detail;
                }else{
                    $delauftAttendance = array();
                    foreach ($students as $student){
                        $delauftAttendance[$student->id]='P';
                    }
                    $model->attendance_detail=$delauftAttendance;
                }
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Attendance']))
		{
                        //delete old attandance detail
                        Attendance::model()->deleteAllByAttributes(array("class_time_table_id" => $classTimeTableId));
			$model->attributes=$_POST['Attendance'];
                        $msg=array();
			if(isset($_POST['Attendance']['attendance_detail'])){
                            foreach ($_POST['Attendance']['attendance_detail'] as $studentId=>$attandence){
                                $model=new Attendance;
                                $model->attributes=$_POST['Attendance'];
                                $model->student_id=$studentId;
                                $model->attendance_detail=$attandence;
                                if($model->save()){
                                    $msg[]='done';
                                }
                            }
                        }
			if(count($msg)>0) {
				Yii::app()->user->setFlash('success', 'Attendance added successfully');
                                $this->refresh();
				//$this->redirect(array('admin'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
                        'students'=>$students,
                        'classTimeTable'=>$classTimeTable
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

		if(isset($_POST['Attendance']))
		{
			$model->attributes=$_POST['Attendance'];
			if($model->save()) {
				Yii::app()->user->setFlash('success', 'Attendance updated successfully');
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
		$dataProvider=new CActiveDataProvider('Attendance');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Attendance('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Attendance']))
			$model->attributes=$_GET['Attendance'];

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
		$model=Attendance::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='attendance-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

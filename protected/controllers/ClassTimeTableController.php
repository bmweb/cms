<?php

class ClassTimeTableController extends Controller
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
                            'actions'=>array('myClassTime'),
                            'expression'=>'User::isStudent()',
                            ),
                        array('allow',
                            'actions'=>array('trainerClassTime'),
                            'expression'=>'User::isTrainer()',
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
		$model=new ClassTimeTable;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ClassTimeTable']))
		{
			$model->attributes=$_POST['ClassTimeTable'];
			
			if($model->save()) {
				Yii::app()->user->setFlash('success', 'ClassTimeTable added successfully');
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

		if(isset($_POST['ClassTimeTable']))
		{
			$model->attributes=$_POST['ClassTimeTable'];
			if($model->save()) {
				Yii::app()->user->setFlash('success', 'ClassTimeTable updated successfully');
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
		$dataProvider=new CActiveDataProvider('ClassTimeTable');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ClassTimeTable('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ClassTimeTable']))
			$model->attributes=$_GET['ClassTimeTable'];

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
		$model=ClassTimeTable::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='class-time-table-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionMyClassTime(){
         
            $model=new ClassTimeTable;
            $dataProvider = array();
            $todayDate = date('Y-m-d');
            if (isset($_REQUEST['search'])) {
                $model->attributes=$_GET['ClassTimeTable'];
                if(isset($_GET['ClassTimeTable']['intake_id']) && isset($_GET['ClassTimeTable']['unit_id']) && isset($_GET['ClassTimeTable']['course_id']) && !empty($_GET['ClassTimeTable']['intake_id']) && !empty($_GET['ClassTimeTable']['unit_id']) && !empty($_GET['ClassTimeTable']['course_id'])){
                    //$model->attributes=$_GET['ClassTimeTable'];
                    $intake = $_GET['ClassTimeTable']['intake_id'];
                    $course = $_GET['ClassTimeTable']['course_id'];
                    $unit = $_GET['ClassTimeTable']['unit_id'];
                    $criteria = new CDbCriteria;
                    $criteria->condition = "intake_id=".$intake." and course_id=".$course." and unit_id=".$unit." and date>='".$todayDate."'";
                    $criteria->order = 'date';
                    $dataProvider=new CActiveDataProvider('ClassTimeTable',array(
                        'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=>12),
                    ));
                   // $classTimeArray = ClassTimeTable::model()->findAll($criteria);
                }else{
                    Yii::app()->user->setFlash('error', 'Select intake, course and unit');
                }
            }
            $this->render('myClassTime',array('model'=>$model,'dataProvider'=>$dataProvider));
        }
         public function actionTrainerClassTime(){
         
            $model=new ClassTimeTable;
            $dataProvider = array();
            $trainerId = Yii::app()->user->user_id;
            $todayDate = date('Y-m-d');
            if (isset($_REQUEST['search'])) {
                $model->attributes=$_GET['ClassTimeTable'];
                if(isset($_GET['ClassTimeTable']['intake_id']) && isset($_GET['ClassTimeTable']['unit_id']) && !empty($_GET['ClassTimeTable']['intake_id']) && !empty($_GET['ClassTimeTable']['unit_id'])){
                    //$model->attributes=$_GET['ClassTimeTable'];
                    $intake = $_GET['ClassTimeTable']['intake_id'];
                    $unit = $_GET['ClassTimeTable']['unit_id'];
                    $criteria = new CDbCriteria;
                    $criteria->condition = "intake_id=".$intake." and unit_id=".$unit." and trainer_id=".$trainerId." and date>='".$todayDate."'";
                    $criteria->order = 'date';
                    $dataProvider=new CActiveDataProvider('ClassTimeTable',array(
                        'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=>12),
                    ));
                   // $classTimeArray = ClassTimeTable::model()->findAll($criteria);
                }else{
                    Yii::app()->user->setFlash('error', 'Select intake and unit');
                }
            }  else {
                    $criteria = new CDbCriteria;
                    $criteria->condition = "trainer_id=".$trainerId." and date>='".$todayDate."'";
                    $criteria->order = 'date';
                    $dataProvider=new CActiveDataProvider('ClassTimeTable',array(
                        'criteria'=>$criteria,
                        'pagination'=>array('pageSize'=>12),
                    ));
            }
            $this->render('trainerClassTime',array('model'=>$model,'dataProvider'=>$dataProvider));
        }
}

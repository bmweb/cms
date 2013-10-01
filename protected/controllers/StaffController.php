<?php

class StaffController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete','trainerByUnit'),
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
		$model=new Staff;
                $userModel = new User;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Staff']))
		{
			$model->attributes=$_POST['Staff'];
                        $model->photo = CUploadedFile::getInstance($model,'photo');
                        //$model->photo_path = "/uploads/staff/".$model->photo;
			$userModel->attributes=$_POST['User'];
                        $valid = $userModel->validate();
                        $valid .= $model->validate();
			if($valid) {
                            if($model->save()){
                                // save login info into user table
                                $type = ($model->type==1)?User::TRAINER:User::CLERK;
                                $u = User::saveUserLoginInfo($userModel, $model->id, $model->first_name, $model->last_name, $type);
                                if(is_object($model->photo)) {
                                    $imageName = $model->photo->name;
                                    $model->photo->saveAs('uploads/staff/'.$imageName);
                                    $image = Yii::app()->image->load('uploads/staff/'.$imageName);
                                    $image->resize(200, 200);
                                    $image->save('uploads/staff/thumb-'.$imageName);
                                    $model->photo_path = "/uploads/staff/".$imageName;
                                    $model->save();
				}
                                
				Yii::app()->user->setFlash('success', 'Staff added successfully');
				$this->redirect(array('admin'));
                            }
			}
		}

		$this->render('create',array(
			'model'=>$model,
                        'userModel'=>$userModel,
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
                $oldimage=$model->photo;
                $type= ($model->type==1)?User::TRAINER:User::CLERK;
                $userModel = User::model()->findByAttributes(array('user_id' => $id, 'type'=>$type));
                $userModel->password = ""; 
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Staff']))
		{
			$model->attributes=$_POST['Staff'];
                        $model->photo = CUploadedFile::getInstance($model,'photo');
                        $userModel->attributes=$_POST['User'];
                        $valid = $userModel->validate();
                        $valid .= $model->validate();
                        if($valid) {
                            if (empty($model->photo))
                            {
                                    $model->photo=$oldimage;
                            }
                            if($model->save()) {
                                    // update login info into user table
                                    $typeNew = ($model->type==1)?User::TRAINER:User::CLERK;
                                    $u = User::updateUserLoginInfo($userModel, $userModel->user_id, $model->first_name, $model->last_name, $typeNew, $type);
                                    
                                    if(is_object($model->photo)) {
                                        $imageName = $model->photo->name;
                                        $model->photo->saveAs('uploads/staff/'.$imageName);
                                        $image = Yii::app()->image->load('uploads/staff/'.$imageName);
                                        $image->resize(200, 200);
                                        $image->save('uploads/staff/thumb-'.$imageName);
                                        $model->photo_path = "/uploads/staff/".$imageName;
                                        $model->save();
                                    }
                                    Yii::app()->user->setFlash('success', 'Staff updated successfully');
                                    $this->redirect(array('admin'));
                            }
                        }
		}

		$this->render('update',array(
			'model'=>$model,
                        'userModel'=>$userModel,
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
		$dataProvider=new CActiveDataProvider('Staff');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Staff('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Staff']))
			$model->attributes=$_GET['Staff'];

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
		$model=Staff::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='staff-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionTrainerByUnit()
        {
                $unitId=$_REQUEST['unit_id'];
                $data= StaffUnitMapping::model()->with('staff')->findAll(array('condition'=>"unit_id = '".$unitId."'"));
                $data=CHtml::listData($data,'staff_id','staff.fullname');
                echo "<option value=''>--Select--</option>";
                foreach($data as $value=>$name)
                {
                        echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);
                }
        }
}

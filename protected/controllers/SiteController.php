<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
            if(Yii::app()->user->isGuest){
                $this->redirect(array("login"));
            }
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        public function actionChangepassword() {

        $id = Yii::app()->user->id;

        $model = new Password;
        if (isset($_POST['Password'])) {
            $model->attributes = $_POST['Password'];
            $password = sha1($_POST['Password']['password']);
            $oldpassword = sha1($_POST['Password']['oldpassword']);
            if ($model->validate()) {

                $pass = User::model()->findByAttributes(array('id' => $id));
                if (isset($pass->id)) {

                    if ($pass->password == $oldpassword) {
                        $pass->password = $password;
                        $pass->save();
                        Yii::app()->user->setFlash('alert alert-success', 'Password Changed Successfully');
                        $this->redirect(array('changepassword'));
                    } else {
                        $model->addError('oldpassword', 'Invalid old password');
                    }
                }
            }
        }
        $this->render('changepassword', array('model' => $model)
        );
    }
     public function actionForgotPassword(){
        $this->layout = '//layouts/naked';
        $model = new ForgotPassword;
	if (isset($_POST['ForgotPassword'])) {
	    $model->attributes = $_POST['ForgotPassword'];
	    $username = $_POST['ForgotPassword']['username'];
	    if ($model->validate()) {
		$username1 = User::model()->findByAttributes(array('email' => $username));
		if (isset($username1->email)) {
		    $length = '6';
		    $validCharacters = "abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ1234567890";
		    $validCharNumber = strlen($validCharacters);
		    $result = "";
		    for ($i = 0; $i < $length; $i++) {
			$index = mt_rand(0, $validCharNumber - 1);
			$result .= $validCharacters[$index];
		    }
		    $password1 = sha1($result);
		    $post = User::model()->findByPk($username1->id);
		    $post->password = $password1;
		    $post->save();
     
//		    $data = array(
//                                'type' => EmailTemplate::EML_FORGOT_PASSWORD,
//                                'to' => $username1->email,
//                                'from'=>'noreply@cms.com',
//                                'vars' => array(
//                                    'USER_NAME' => $username1->email,
//                                    'PASSWORD'=>$result,
//
//                                )
//                            );
//
//                               EmailTemplate::model()->send($data);


		    Yii::app()->user->setFlash('alert alert-success', 'Your password have been sent to the specified email address.');
		} else {
		    $model->addError('username', 'This username is not associate to any user');
		}
	    }

	   // $this->redirect(Yii::app()->request->urlReferrer);
	}
	$this->render('forgotPassword', array('model' => $model));
    }
}
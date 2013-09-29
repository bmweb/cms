<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class Password extends CFormModel
{
	public $retypePassword;
	public $password;
	public $oldpassword;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
public function rules()
	{
		return array(
			// name, email, subject and body are required
                        array('password, retypePassword', 'required','on'=>'admin'),
			array('oldpassword, password, retypePassword', 'required'),
                        
                        
                 	 array('password', 'compare', 'compareAttribute'=>'retypePassword'),
			// email has to be a valid email address
			
			// verifyCode needs to be entered correctly
	//		array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
		'oldpassword'=>'Current Password',
		'password'=>'Password',
		'retypePassword'=>'Confirm Password',
		
		//	'verifyCode'=>'Verification Code',
		);
	}
}
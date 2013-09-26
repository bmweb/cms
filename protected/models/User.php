<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property integer $user_id
 * @property integer $type
 *
 * The followings are the available model relations:
 * @property StudentCourseFeeMap[] $studentCourseFeeMaps
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        const ADMIN=1;
        const TRAINER=2;
        const CLERK=3;

        /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('email, password','required', 'on' => 'insert'),
			array('user_id, type', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, password', 'length', 'max'=>45),
			array('email', 'length', 'max'=>100),
                        array('email','email'),
                        array('email','unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, first_name, last_name, email, password, user_id, type', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'studentCourseFeeMaps' => array(self::HAS_MANY, 'StudentCourseFeeMap', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Username',
			'password' => 'Password',
			'user_id' => 'User',
			'type' => 'Type',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        function isAdmin()
        {
            if(!Yii::app()->user->isGuest){
                if(Yii::app()->user->type==User::ADMIN){
                    return 1;
                }
            }
            return 0;
        }
        public function saveUserLoginInfo($data=NULL, $userId=NULL, $name=null, $type=NULL){
            if($data){
                $model = new User;
                $model->email = $data->email;
                $model->password = sha1($data->password);
                $model->user_id = $userId;
                $model->first_name = $name;
                $model->type = $type;
                $model->save();
            }
            return;
        }
         public function updateUserLoginInfo($data=NULL, $userId=NULL, $name=null, $type=NULL, $oldType=NULL){
            if($data){
                $model = User::model()->findByAttributes(array('user_id' => $userId, 'type'=>$oldType));
                $model->email = $data->email;
                $model->password = ($data->password)?sha1($data->password):$model->password;
                $model->user_id = $userId;
                $model->first_name = $name;
                $model->type = ($type==1)?User::TRAINER:User::CLERK;
                $model->save();
            }
            return;
        }
}
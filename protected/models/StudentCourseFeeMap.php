<?php

/**
 * This is the model class for table "student_course_fee_map".
 *
 * The followings are the available columns in table 'student_course_fee_map':
 * @property integer $id
 * @property integer $student_course_id
 * @property double $paid_fee
 * @property string $cdate
 * @property string $mdate
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property StudentCourse $studentCourse
 * @property User $user
 */
class StudentCourseFeeMap extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudentCourseFeeMap the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'student_course_fee_map';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_course_id, user_id', 'numerical', 'integerOnly'=>true),
			array('paid_fee', 'numerical'),
			array('cdate, mdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, student_course_id, paid_fee, cdate, mdate, user_id', 'safe', 'on'=>'search'),
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
			'studentCourse' => array(self::BELONGS_TO, 'StudentCourse', 'student_course_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'student_course_id' => 'Student Course',
			'paid_fee' => 'Paid Fee',
			'cdate' => 'Cdate',
			'mdate' => 'Mdate',
			'user_id' => 'User',
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
		$criteria->compare('student_course_id',$this->student_course_id);
		$criteria->compare('paid_fee',$this->paid_fee);
		$criteria->compare('cdate',$this->cdate,true);
		$criteria->compare('mdate',$this->mdate,true);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
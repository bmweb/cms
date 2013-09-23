<?php

/**
 * This is the model class for table "student_course".
 *
 * The followings are the available columns in table 'student_course':
 * @property integer $id
 * @property integer $course_id
 * @property integer $student_id
 * @property integer $intake_id
 * @property double $course_fee
 * @property string $cdate
 * @property string $mdate
 *
 * The followings are the available model relations:
 * @property Course $course
 * @property Intake $intake
 * @property Student $student
 * @property StudentCourseFeeMap[] $studentCourseFeeMaps
 */
class StudentCourse extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudentCourse the static model class
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
		return 'student_course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id, course_id, student_id, intake_id', 'numerical', 'integerOnly'=>true),
			array('course_fee', 'numerical'),
			array('cdate, mdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, course_id, student_id, intake_id, course_fee, cdate, mdate', 'safe', 'on'=>'search'),
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
			'course' => array(self::BELONGS_TO, 'Course', 'course_id'),
			'intake' => array(self::BELONGS_TO, 'Intake', 'intake_id'),
			'student' => array(self::BELONGS_TO, 'Student', 'student_id'),
			'studentCourseFeeMaps' => array(self::HAS_MANY, 'StudentCourseFeeMap', 'student_course_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'course_id' => 'Course',
			'student_id' => 'Student',
			'intake_id' => 'Intake',
			'course_fee' => 'Course Fee',
			'cdate' => 'Cdate',
			'mdate' => 'Mdate',
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
		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('intake_id',$this->intake_id);
		$criteria->compare('course_fee',$this->course_fee);
		$criteria->compare('cdate',$this->cdate,true);
		$criteria->compare('mdate',$this->mdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
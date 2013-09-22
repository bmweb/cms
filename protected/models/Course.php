<?php

/**
 * This is the model class for table "course".
 *
 * The followings are the available columns in table 'course':
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property integer $duration
 * @property integer $duration_type
 * @property string $cdate
 * @property string $mdate
 * @property integer $is_active
 * @property integer $course_level_id
 * @property integer $course_field_id
 *
 * The followings are the available model relations:
 * @property CourseField $courseField
 * @property CourseLevel $courseLevel
 * @property CourseIntake[] $courseIntakes
 * @property StudentCourse[] $studentCourses
 * @property Unit[] $units
 */
class Course extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Course the static model class
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
		return 'course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_level_id, course_field_id', 'required'),
			array('duration, duration_type, is_active, course_level_id, course_field_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('code', 'length', 'max'=>20),
			array('cdate, mdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, code, duration, duration_type, cdate, mdate, is_active, course_level_id, course_field_id', 'safe', 'on'=>'search'),
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
			'courseField' => array(self::BELONGS_TO, 'CourseField', 'course_field_id'),
			'courseLevel' => array(self::BELONGS_TO, 'CourseLevel', 'course_level_id'),
			'courseIntakes' => array(self::HAS_MANY, 'CourseIntake', 'course_id'),
			'studentCourses' => array(self::HAS_MANY, 'StudentCourse', 'course_id'),
			'units' => array(self::HAS_MANY, 'Unit', 'course_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'code' => 'Code',
			'duration' => 'Duration',
			'duration_type' => 'Duration Type',
			'cdate' => 'Cdate',
			'mdate' => 'Mdate',
			'is_active' => 'Is Active',
			'course_level_id' => 'Course Level',
			'course_field_id' => 'Course Field',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('duration',$this->duration);
		$criteria->compare('duration_type',$this->duration_type);
		$criteria->compare('cdate',$this->cdate,true);
		$criteria->compare('mdate',$this->mdate,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('course_level_id',$this->course_level_id);
		$criteria->compare('course_field_id',$this->course_field_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
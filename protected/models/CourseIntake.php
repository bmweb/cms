<?php

/**
 * This is the model class for table "course_intake".
 *
 * The followings are the available columns in table 'course_intake':
 * @property integer $id
 * @property string $cdate
 * @property string $mdate
 * @property integer $course_id
 * @property integer $intake_id
 *
 * The followings are the available model relations:
 * @property Course $course
 * @property Intake $intake
 */
class CourseIntake extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CourseIntake the static model class
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
		return 'course_intake';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_id, intake_id', 'numerical', 'integerOnly'=>true),
			array('cdate, mdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cdate, mdate, course_id, intake_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cdate' => 'Cdate',
			'mdate' => 'Mdate',
			'course_id' => 'Course',
			'intake_id' => 'Intake',
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
		$criteria->compare('cdate',$this->cdate,true);
		$criteria->compare('mdate',$this->mdate,true);
		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('intake_id',$this->intake_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
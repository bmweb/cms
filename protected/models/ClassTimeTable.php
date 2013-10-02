<?php

/**
 * This is the model class for table "class_time_table".
 *
 * The followings are the available columns in table 'class_time_table':
 * @property integer $id
 * @property integer $course_id
 * @property integer $intake_id
 * @property integer $unit_id
 * @property integer $trainer_id
 * @property integer $venue_id
 * @property string $date
 * @property string $from_time
 * @property string $to_time
 * @property string $cdate
 * @property string $mdate
 *
 * The followings are the available model relations:
 * @property Course $course
 * @property Intake $intake
 * @property Unit $unit
 * @property Staff $trainer
 * @property Venue $venue
 */
class ClassTimeTable extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ClassTimeTable the static model class
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
		return 'class_time_table';
	}
        public $courseName;
        public $intakeName;
        public $unitName;
        public $trainerName;
        public $venueName;
        /**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_id, intake_id, unit_id, trainer_id, venue_id', 'numerical', 'integerOnly'=>true),
			array('date, from_time, to_time, cdate, mdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, course_id, intake_id, unit_id, trainer_id, venue_id, date, from_time, to_time, cdate, mdate, courseName, intakeName, unitName, trainerName, venueName', 'safe', 'on'=>'search'),
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
			'unit' => array(self::BELONGS_TO, 'Unit', 'unit_id'),
			'trainer' => array(self::BELONGS_TO, 'Staff', 'trainer_id'),
			'venue' => array(self::BELONGS_TO, 'Venue', 'venue_id'),
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
			'intake_id' => 'Intake',
			'unit_id' => 'Unit',
			'trainer_id' => 'Trainer',
			'venue_id' => 'Venue',
			'date' => 'Date',
			'from_time' => 'From Time',
			'to_time' => 'To Time',
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
                $criteria->with = array('course','intake','unit','trainer','venue');
                
		$criteria->compare('t.id',$this->id);
		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('intake_id',$this->intake_id);
		$criteria->compare('unit_id',$this->unit_id);
		$criteria->compare('trainer_id',$this->trainer_id);
		$criteria->compare('venue_id',$this->venue_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('from_time',$this->from_time,true);
		$criteria->compare('to_time',$this->to_time,true);
		$criteria->compare('cdate',$this->cdate,true);
		$criteria->compare('mdate',$this->mdate,true);
                $criteria->compare('course.name', $this->courseName, true);
                $criteria->compare('intake.name', $this->intakeName, true);
                $criteria->compare('unit.name', $this->unitName, true);
                $criteria->compare('trainer.first_name', $this->trainerName, true);
                $criteria->compare('venue.name', $this->venueName, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function beforeSave() {
            if($this->isNewRecord){
                $this->cdate = date('Y-m-d');
            }
            else{
                $this->cdate = strtotime($this->cdate);
                $this->cdate = date('Y-m-d',  $this->cdate);
            }
           
            $this->mdate = date('Y-m-d');
            if (!empty($this->date) && strtolower($this->date) != 'n/a') {
                $this->date = strtotime ($this->date);
                $this->date = date ('Y-m-d', $this->date);
            }
            return parent::beforeSave();
        }
}
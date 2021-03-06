<?php

/**
 * This is the model class for table "intake".
 *
 * The followings are the available columns in table 'intake':
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $start_date
 * @property string $end_date
 * @property string $cdate
 * @property string $mdate
 *
 * The followings are the available model relations:
 * @property CourseIntake[] $courseIntakes
 * @property StudentCourse[] $studentCourses
 */
class Intake extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Intake the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public $course;
        /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'intake';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('name, start_date, end_date', 'required'),
			array('name', 'length', 'max'=>45),
			array('code', 'length', 'max'=>20),
			array('start_date, end_date, cdate, mdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, code, start_date, end_date, cdate, mdate', 'safe', 'on'=>'search'),
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
			'courseIntakes' => array(self::HAS_MANY, 'CourseIntake', 'intake_id'),
			'studentCourses' => array(self::HAS_MANY, 'StudentCourse', 'intake_id'),
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
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'cdate' => 'Cdate',
			'mdate' => 'Mdate',
                        'course'=>'Courses',
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
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('cdate',$this->cdate,true);
		$criteria->compare('mdate',$this->mdate,true);

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
            $this->start_date = strtotime($this->start_date);
            $this->start_date = date('Y-m-d',  $this->start_date);
            $this->end_date = strtotime($this->end_date);
            $this->end_date = date('Y-m-d',  $this->end_date);
            $this->mdate = date('Y-m-d');
            return parent::beforeSave();
        }
}
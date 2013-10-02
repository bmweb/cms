<?php

/**
 * This is the model class for table "attendance".
 *
 * The followings are the available columns in table 'attendance':
 * @property integer $id
 * @property integer $class_time_table_id
 * @property integer $student_id
 * @property string $date
 * @property integer $attendance_detail
 * @property string $cdate
 * @property string $mdate
 *
 * The followings are the available model relations:
 * @property Student $student
 * @property ClassTimeTable $classTimeTable
 */
class Attendance extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Attendance the static model class
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
		return 'attendance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('class_time_table_id, student_id, attendance_detail', 'numerical', 'integerOnly'=>true),
			array('date, cdate, mdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, class_time_table_id, student_id, date, attendance_detail, cdate, mdate', 'safe', 'on'=>'search'),
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
			'student' => array(self::BELONGS_TO, 'Student', 'student_id'),
			'classTimeTable' => array(self::BELONGS_TO, 'ClassTimeTable', 'class_time_table_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'class_time_table_id' => 'Class Time Table',
			'student_id' => 'Student',
			'date' => 'Date',
			'attendance_detail' => 'Attendance Detail',
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
		$criteria->compare('class_time_table_id',$this->class_time_table_id);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('attendance_detail',$this->attendance_detail);
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
           
            $this->mdate = date('Y-m-d');
            if (!empty($this->date) && strtolower($this->date) != 'n/a') {
                $this->date = strtotime ($this->date);
                $this->date = date ('Y-m-d', $this->date);
            }
            return parent::beforeSave();
        }
}
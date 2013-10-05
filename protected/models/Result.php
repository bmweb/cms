<?php

/**
 * This is the model class for table "result".
 *
 * The followings are the available columns in table 'result':
 * @property integer $id
 * @property integer $student_id
 * @property integer $course_id
 * @property integer $unit_id
 * @property integer $intake_id
 * @property integer $internal_marks
 * @property integer $external_marks
 * @property string $cdate
 * @property string $mdate
 *
 * The followings are the available model relations:
 * @property Intake $intake
 * @property Student $student
 * @property Unit $unit
 */
class Result extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Result the static model class
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
		return 'result';
	}
        public $courseName;
        public $intakeName;
        public $unitName;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_id, course_id, unit_id, intake_id, internal_marks, external_marks', 'numerical', 'integerOnly'=>true),
			array('cdate, mdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, student_id, course_id, unit_id, intake_id, internal_marks, external_marks, cdate, mdate, courseName, intakeName, unitName', 'safe', 'on'=>'search'),
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
			'intake' => array(self::BELONGS_TO, 'Intake', 'intake_id'),
			'student' => array(self::BELONGS_TO, 'Student', 'student_id'),
			'unit' => array(self::BELONGS_TO, 'Unit', 'unit_id'),
                        'course' => array(self::BELONGS_TO, 'Course', 'course_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'student_id' => 'Student',
			'course_id' => 'Course',
			'unit_id' => 'Unit',
			'intake_id' => 'Intake',
			'internal_marks' => 'Internal Marks',
			'external_marks' => 'External Marks',
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
                $criteria->with = array('course','intake','unit');
		$criteria->compare('id',$this->id);
		$criteria->compare('t.student_id',$this->student_id);
		$criteria->compare('t.course_id',$this->course_id);
		$criteria->compare('t.unit_id',$this->unit_id);
		$criteria->compare('t.intake_id',$this->intake_id);
		$criteria->compare('internal_marks',$this->internal_marks);
		$criteria->compare('external_marks',$this->external_marks);
		$criteria->compare('cdate',$this->cdate,true);
		$criteria->compare('mdate',$this->mdate,true);
                $criteria->compare('course.name', $this->courseName, true);
                $criteria->compare('intake.name', $this->intakeName, true);
                $criteria->compare('unit.name', $this->unitName, true);
                
                $criteria->group = "t.course_id,t.unit_id,t.intake_id";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getMarks($studentId=NULL, $unitId=NULL, $intakeId=NULL){
            if(!empty($studentId) && !empty($unitId) && !empty($intakeId)){
                
            }
            
        }
        public function checkResult($studentId=NULL, $unitId=NULL, $intakeId=NULL){
            $result=array();
            if(!empty($studentId) && !empty($unitId) && !empty($intakeId)){
                $result = Result::model()->findByAttributes(array("student_id"=>$studentId, "unit_id"=>$unitId, "intake_id"=>$intakeId));
            }
            return $result;
        }
        public function saveResult($chekedStudent, $unitId, $intakeId, $courseId, $internalMarks, $externalMarks){
            foreach ($chekedStudent as $stuId){
                //check the result is exist for student or not, if exist then update result
                $isResultExist = Result::checkResult($stuId, $unitId, $intakeId);
                if(!empty($isResultExist)){
                    $resultModel = $isResultExist;
                }else{
                    $resultModel = new Result;
                }
                $resultModel->student_id = $stuId;
                $resultModel->internal_marks = isset($internalMarks[$stuId])?$internalMarks[$stuId]:0;
                $resultModel->external_marks = isset($externalMarks[$stuId])?$externalMarks[$stuId]:0;
                $resultModel->course_id = $courseId;
                $resultModel->intake_id = $intakeId;
                $resultModel->unit_id = $unitId;
                $resultModel->save();

            }
        }
}
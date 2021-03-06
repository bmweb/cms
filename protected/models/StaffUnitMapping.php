<?php

/**
 * This is the model class for table "staff_unit_mapping".
 *
 * The followings are the available columns in table 'staff_unit_mapping':
 * @property integer $id
 * @property integer $unit_id
 * @property integer $staff_id
 * @property string $cdate
 * @property string $mdate
 *
 * The followings are the available model relations:
 * @property Staff $staff
 * @property Unit $unit
 */
class StaffUnitMapping extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StaffUnitMapping the static model class
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
		return 'staff_unit_mapping';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('unit_id, staff_id', 'numerical', 'integerOnly'=>true),
			array('cdate, mdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, unit_id, staff_id, cdate, mdate', 'safe', 'on'=>'search'),
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
			'staff' => array(self::BELONGS_TO, 'Staff', 'staff_id'),
			'unit' => array(self::BELONGS_TO, 'Unit', 'unit_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'unit_id' => 'Unit',
			'staff_id' => 'Staff',
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
		$criteria->compare('unit_id',$this->unit_id);
		$criteria->compare('staff_id',$this->staff_id);
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
            return parent::beforeSave();
        }
        public function saveUnitTrainer($data=NULL, $unitId=NULL){
            if($data && $unitId){
                foreach ($data as $val){
                    $model = new StaffUnitMapping;
                    $model->staff_id = $val;
                    $model->unit_id = $unitId;
                    $model->save();
                }
            }
            return;
        }
        public function deleteAllUnitTrainer($unitId=NULL){
            return StaffUnitMapping::model()->deleteAll("unit_id=$unitId");
            
        }
}
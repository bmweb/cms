<?php

/**
 * This is the model class for table "student".
 *
 * The followings are the available columns in table 'student':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $phone
 * @property string $fax
 * @property string $zip
 * @property string $sex
 * @property string $dob
 * @property string $photo
 * @property string $photo_path
 * @property string $cdate
 * @property string $mdate
 * @property integer $is_active
 * @property integer $country_id
 *
 * The followings are the available model relations:
 * @property Country $country
 * @property StudentCourse[] $studentCourses
 */
class Student extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Student the static model class
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
		return 'student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, email, address1, city, state, country_id, phone', 'required'),
			array('is_active, country_id', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, city, state', 'length', 'max'=>45),
			array('email', 'length', 'max'=>100),
			array('address1, address2', 'length', 'max'=>255),
			array('phone, fax, zip', 'length', 'max'=>20),
			array('sex', 'length', 'max'=>1),
			array('dob, photo, photo_path, cdate, mdate', 'safe'),
                        array('email','email'),
                        array('email','unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, first_name, last_name, email, address1, address2, city, state, phone, fax, zip, sex, dob, photo, photo_path, cdate, mdate, is_active, country_id', 'safe', 'on'=>'search'),
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
			'country' => array(self::BELONGS_TO, 'Country', 'country_id'),
			'studentCourses' => array(self::HAS_MANY, 'StudentCourse', 'student_id'),
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
			'email' => 'Email',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'city' => 'City',
			'state' => 'State',
			'phone' => 'Phone',
			'fax' => 'Fax',
			'zip' => 'Zip',
			'sex' => 'Sex',
			'dob' => 'Dob',
			'photo' => 'Photo',
			'photo_path' => 'Photo Path',
			'cdate' => 'Cdate',
			'mdate' => 'Mdate',
			'is_active' => 'Is Active',
			'country_id' => 'Country',
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
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('photo_path',$this->photo_path,true);
		$criteria->compare('cdate',$this->cdate,true);
		$criteria->compare('mdate',$this->mdate,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('country_id',$this->country_id);

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
            if (!empty($this->dob) && strtolower($this->dob) != 'n/a') {
                $this->dob = strtotime ($this->dob);
                $this->dob = date ('Y-m-d', $this->dob);
            }
            return parent::beforeSave();
        }
        public function getFullname()
        {
            return ucwords($this->first_name.' '.$this->last_name);
        }
        public function getFullsex()
        {
            return ($this->sex=='M')?"Male":"Female";
        }
}
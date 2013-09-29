<?php

/**
 * This is the model class for table "staff".
 *
 * The followings are the available columns in table 'staff':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $zip_code
 * @property string $phone
 * @property string $fax
 * @property string $photo
 * @property string $photo_path
 * @property integer $is_active
 * @property string $cdate
 * @property string $mdate
 * @property integer $type
 * @property integer $country_id
 * @property string $join_date
 * @property string $sex
 *
 * The followings are the available model relations:
 * @property Country $country
 * @property StaffType $type0
 * @property StaffUnitMapping[] $staffUnitMappings
 */
class Staff extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Staff the static model class
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
		return 'staff';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, email', 'required'),
			array('is_active, type, country_id', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name', 'length', 'max'=>50),
			array('email', 'length', 'max'=>100),
			array('address', 'length', 'max'=>255),
			array('city, state', 'length', 'max'=>45),
			array('zip_code, phone, fax', 'length', 'max'=>20),
			array('photo, photo_path, cdate, mdate, join_date', 'safe'),
                        array('email','email'),
                        array('email','unique'),
                        array('sex', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, first_name, last_name, email, address, city, state, zip_code, phone, fax, photo, photo_path, is_active, cdate, mdate, type, country_id, join_date, sex', 'safe', 'on'=>'search'),
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
			'type0' => array(self::BELONGS_TO, 'StaffType', 'type'),
			'staffUnitMappings' => array(self::HAS_MANY, 'StaffUnitMapping', 'staff_id'),
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
			'address' => 'Address',
			'city' => 'City',
			'state' => 'State',
			'zip_code' => 'Zip Code',
			'phone' => 'Phone',
			'fax' => 'Fax',
			'photo' => 'Photo',
			'photo_path' => 'Photo Path',
			'is_active' => 'Is Active',
			'cdate' => 'Cdate',
			'mdate' => 'Mdate',
			'type' => 'Type',
			'country_id' => 'Country',
			'join_date' => 'Join Date',
                        'sex' => 'Sex',
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
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('zip_code',$this->zip_code,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('photo_path',$this->photo_path,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('cdate',$this->cdate,true);
		$criteria->compare('mdate',$this->mdate,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('join_date',$this->join_date,true);
                $criteria->compare('sex',$this->sex,true);

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
            if (!empty($this->join_date) && strtolower($this->join_date) != 'n/a') {
                $this->join_date = strtotime ($this->join_date);
                $this->join_date = date ('Y-m-d', $this->join_date);
            }
            return parent::beforeSave();
        }
        public function getFullname()
        {
            return ucwords($this->first_name.' '.$this->last_name);
        }
}
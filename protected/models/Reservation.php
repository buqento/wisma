<?php

/**
 * This is the model class for table "reservation".
 *
 * The followings are the available columns in table 'reservation':
 * @property integer $id_reservation
 * @property string $id_pengenal
 * @property string $name
 * @property integer $telepon
 * @property string $check_in
 * @property string $check_out
 * @property integer $id_tipe
 * @property integer $id_bed
 * @property integer $adult
 * @property integer $children
 * @property string $preference
 */
class Reservation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reservation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('room, id_pengenal, name, telepon, check_in, check_out, tarif, panjar, adult, children, preference, jenis_sewa', 'required'),
			array('room, telepon, tarif, panjar, adult, children', 'numerical', 'integerOnly'=>true),
			array('id_pengenal', 'length', 'max'=>50),
			array('name', 'length', 'max'=>40),
			array('preference', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_reservation, room, id_pengenal, name, telepon, check_in, check_out, tarif, id_bed, adult, children, preference', 'safe', 'on'=>'search'),
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
		);
        
        
        
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_reservation' => 'Id Reservation',
            'room' => 'Room',
			'id_pengenal' => 'Id Pengenal',
			'name' => 'Nama Pelanggan',
			'telepon' => 'Telepon',
			'check_in' => 'Check In',
			'check_out' => 'Check Out',
            't_check_in' => 'Time In',
            't_check_out' => 'Time Checkout',
			'tarif' => 'Tarif Kamar',
            'panjar' => 'Uang Panjar',
			'adult' => 'Dewasa',
			'children' => 'Anak',
			'preference' => 'Preference',
            'jenis_sewa' => 'Jenis Sewa',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_reservation',$this->id_reservation);
        $criteria->compare('room',$this->room);
		$criteria->compare('id_pengenal',$this->id_pengenal,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('telepon',$this->telepon);
		$criteria->compare('check_in',$this->check_in,true);
		$criteria->compare('check_out',$this->check_out,true);        
		$criteria->compare('t_check_in',$this->t_check_in,true);        
		$criteria->compare('t_check_out',$this->t_check_out,true);
		$criteria->compare('tarif',$this->tarif);
        $criteria->compare('panjar',$this->panjar);
		$criteria->compare('adult',$this->adult);
		$criteria->compare('children',$this->children);
		$criteria->compare('preference',$this->preference,true);
        $criteria->compare('jenis_sewa',$this->jenis_sewa);
//        $criteria->order='id_reservation DESC';
        

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            
              'sort' => array(
                'attributes' => array(
                  '*',
                ),
                'defaultOrder' => array(
                  'id_reservation' => CSort::SORT_DESC,
                ),
              ),
            
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reservation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

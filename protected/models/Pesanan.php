<?php

/**
 * This is the model class for table "pesanan".
 *
 * The followings are the available columns in table 'pesanan':
 * @property integer $id_pesanan
 * @property integer $id_reservation
 * @property string $nama_pesanan
 * @property string $keterangan
 * @property integer $harga
 */
class Pesanan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pesanan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_reservation, date_created, nama_pesanan, keterangan, harga', 'required'),
			array('id_reservation, harga', 'numerical', 'integerOnly'=>true),
			array('nama_pesanan', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pesanan, id_reservation, date_created, nama_pesanan, keterangan, harga', 'safe', 'on'=>'search'),
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
			'id_pesanan' => 'Id Pesanan',
            'date_created'=>'Tanggal Pesan',
			'id_reservation' => 'Id Reservation',
			'nama_pesanan' => 'Nama Pesanan',
			'keterangan' => 'Keterangan',
			'harga' => 'Harga',
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

		$criteria->compare('id_pesanan',$this->id_pesanan);
        $criteria->compare('date_created',$this->date_created);
		$criteria->compare('id_reservation',$this->id_reservation);
		$criteria->compare('nama_pesanan',$this->nama_pesanan,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('harga',$this->harga);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pesanan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

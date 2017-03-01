<?php

class RekapitulasiController extends Controller
{
	public function actionIndex()
	{
        $model = $this->getRekapList();
        $this->render('index',array('model'=>$model));
	}

    public function getRekapList(){

    // Ambil data Customer list
    $sql ="SELECT * FROM reservation ORDER BY id_reservation DESC";

    //menentukan jumlah baris yang ada(ini akan berhubungan dengan pagination)
    $count = Yii::app()->db->createCommand('select COUNT(*) from reservation')->queryScalar();

    //buat sql data provider
    $dprov = new CSqlDataProvider($sql,array(
        'totalItemCount'=>$count,
        'keyField'=>'id_reservation',
        'pagination'=>array('pageSize'=>10),
        'sort'=>array(
            'attributes'=>array(
            // kode ini jika adalah menempatkan atribut yang bisa di sorting/urutkan.
            'id_reservation','name','check_in','check_out'
            ),
        ),
    ));
    return $dprov;
    }
    
    
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
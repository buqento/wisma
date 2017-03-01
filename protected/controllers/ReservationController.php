<?php
include "connecting.php";
class ReservationController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
            
        return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','tagihan_harian','tagihan_mingguan', 'tagihan_bulanan', 'listRoom'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete'),
				'users'=>array('@'),
			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('admin','delete'),
//				'users'=>array('admin'),
//			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
       
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
    
    public function actionTagihan_harian($id)
	{
        $id = $_GET['id'];

        $query = mysql_query("SELECT * FROM reservation WHERE id_reservation =".$id);
        $baris = mysql_fetch_array($query);
        $room = $baris["room"];
        $name = $baris["name"];
        $telepon = $baris["telepon"];
        $check_in = $baris["check_in"];
        $check_out = $baris["check_out"];
        $selisih = ceil((abs(strtotime ($check_in) - strtotime ($check_out)))/(60*60*24));
        $tarif = $baris["tarif"];
        $panjar = $baris["panjar"];
        $tarifKamar = $selisih * $tarif;
        
        $q2 = mysql_query("SELECT * FROM pesanan WHERE id_reservation=".$id);
        
        
        $q3 = mysql_query("SELECT SUM(harga) AS h FROM pesanan WHERE id_reservation=".$id);
        $b = mysql_fetch_array($q3);
        $jHargaPesanan = $b['h'];
        $totalBayar = $tarifKamar + $jHargaPesanan - $panjar;

        $this->render('tagihan_harian',array(
            'id'=>$id,
            'name'=>$name,
            'telepon'=>$telepon,
            'check_in'=>$check_in,
            'check_out'=>$check_out,
            'selisih'=>$selisih,
            'tarif'=>$tarif,
            'tarifKamar'=>$tarifKamar,
            'panjar'=>$panjar,
            'q2'=>$q2,
            'totalBayar'=>$totalBayar,
            'room'=>$room,
		)); 
	}
    
    public function jml_minggu($tgl_awal, $tgl_akhir){
        $detik = 24 * 3600;
        $tgl_awal = strtotime($tgl_awal);
        $tgl_akhir = strtotime($tgl_akhir);

        $minggu = 0;
        for ($i=$tgl_awal; $i < $tgl_akhir; $i += $detik){
            if (date(“w”, $i) == “0”){
                $minggu++;
            }
        }
        return $minggu;
    }
    
    
    public function actionTagihan_mingguan($id){
        $id = $_GET['id'];
        
        $query = mysql_query("SELECT * FROM reservation WHERE id_reservation =".$id);
        $baris = mysql_fetch_array($query);
        $room = $baris["room"];
        $name = $baris["name"];
        $telepon = $baris["telepon"];
        $check_in = $baris["check_in"];
        $check_out = $baris["check_out"];
        $tarif = $baris["tarif"];
        $jenis_sewa = $baris["jenis_sewa"];
        
                
        //HITUNG JUMLAH MINGGU
        $detik = 24 * 3600;
        $tgl_awal = strtotime($check_in);
        $tgl_akhir = strtotime($check_out);

        $minggu = 0;
        for ($i=$tgl_awal; $i < $tgl_akhir; $i += $detik){
            if (date("w", $i) == "0"){
                $minggu++;
            }
        }
        
        $jminggu = $minggu;
        
        $tbayar = $baris["tarif"] * $jminggu;
        $panjar = $baris["panjar"];
        
        
        $q2 = mysql_query("SELECT * FROM pesanan WHERE id_reservation=".$id);
        
        
        $q3 = mysql_query("SELECT SUM(harga) AS h FROM pesanan WHERE id_reservation=".$id);
        $b = mysql_fetch_array($q3);
        $jHargaPesanan = $b['h'];
        $totalBayar = $tbayar + $jHargaPesanan - $panjar;

        $this->render('tagihan_mb',array(
            'id'=>$id,
            'name'=>$name,
            'check_in'=>$check_in,
            'check_out'=>$check_out,
            'room'=>$room,
            'tarif'=>$tarif,
            'tbayar'=>$tbayar,
            'panjar'=>$panjar,
            'q2'=>$q2,
            'totalBayar'=>$totalBayar,
            'jminggu'=>$jminggu,
            'jenis_sewa'=>$jenis_sewa,
        ));        
        
        
        
    }
    
    
    
    public function actionTagihan_bulanan($id){
        $id = $_GET['id'];

        $query = mysql_query("SELECT * FROM reservation WHERE id_reservation =".$id);
        $baris = mysql_fetch_array($query);
        $room = $baris["room"];
        $name = $baris["name"];
        $telepon = $baris["telepon"];
        $check_in = $baris["check_in"];
        $check_out = $baris["check_out"];
        $tarif = $baris["tarif"];
        $jenis_sewa = $baris["jenis_sewa"];

        $checkin = date_create("$check_in");
        $checkout =  date_create("$check_out");
        
        //HITUNG JUMLAH BULAN
        $diff= date_diff($checkin, $checkout);
        $months = $diff->y * 12 + $diff->m + $diff->d / 30;
        $jmonth=round($months);

        $tbayar = $baris["tarif"] * $jmonth;
        $panjar = $baris["panjar"];
        
        
        $q2 = mysql_query("SELECT * FROM pesanan WHERE id_reservation=".$id);
        
        
        $q3 = mysql_query("SELECT SUM(harga) AS h FROM pesanan WHERE id_reservation=".$id);
        $b = mysql_fetch_array($q3);
        $jHargaPesanan = $b['h'];
        $totalBayar = $tbayar + $jHargaPesanan - $panjar;
        



        $this->render('tagihan_mb',array(
            'id'=>$id,
            'name'=>$name,
            'check_in'=>$check_in,
            'check_out'=>$check_out,
            'room'=>$room,
            'tarif'=>$tarif,
            'tbayar'=>$tbayar,
            'panjar'=>$panjar,
            'q2'=>$q2,
            'totalBayar'=>$totalBayar,
            'jmonth'=>$jmonth,
            'jenis_sewa'=>$jenis_sewa,
        ));
    }
    
   
    public function actionDet($id){
        $id = $_GET['id'];
        $query="SELECT * FROM reservation r, pesanan p where r.id_reservation=".$id." AND p.id_reservation=".$id;
		$dataProvider=new CSqlDataProvider($query,array(
			'keyField' => 'id_reservation',
		));
		$this->render('det',array(
			'dataProvider'=>$dataProvider,
		)); 
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Reservation;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Reservation']))
		{
			$model->attributes=$_POST['Reservation'];
            $model->name=strtoupper($_POST['Reservation']['name']);
            $model->id_pengenal=strtoupper($_POST['Reservation']['id_pengenal']);
            $model->t_check_in=strtotime(date($_POST['Reservation']['check_in']));
            $model->t_check_out=strtotime(date($_POST['Reservation']['check_out']));

			if($model->save())
				$this->redirect(array('view','id'=>$model->id_reservation));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Reservation']))
		{
            $model->attributes=$_POST['Reservation'];
            $model->name=strtoupper($_POST['Reservation']['name']);
            $model->id_pengenal=strtoupper($_POST['Reservation']['id_pengenal']);
            $model->t_check_in=strtotime(date($_POST['Reservation']['check_in']));
            $model->t_check_out=strtotime(date($_POST['Reservation']['check_out']));
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_reservation));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}


    public function getListRoom(){
    
    $time = strtotime(date('Y-m-d H:i:s'));
     
    // Ambil data Customer list
    $sql ="SELECT * FROM reservation WHERE t_check_out > ".$time." ORDER BY id_reservation DESC";

    //menentukan jumlah baris yang ada(ini akan berhubungan dengan pagination)
    $count = Yii::app()->db->createCommand('select COUNT(*) from reservation WHERE t_check_out > '.$time)->queryScalar();

    //buat sql data provider
    $dprov = new CSqlDataProvider($sql,array(
        'totalItemCount'=>$count,
        'keyField'=>'id_reservation',
        'pagination'=>array('pageSize'=>10),
        'sort'=>array(
            'attributes'=>array(
            // kode ini jika adalah menempatkan atribut yang bisa di sorting/urutkan.
            'id_reservation',
            ),
        ),
    ));
    return $dprov;
    }
    
 	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

//		$dataProvider=new CActiveDataProvider('Reservation');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
    
//        $model = $this->getListRoom();
//        $this->render('list_room',array('model'=>$model));
        
        $time = strtotime(date('Y-m-d H:i:s'));
        $rawData=Yii::app()->db->createCommand("SELECT * FROM reservation WHERE t_check_out > ".$time." ORDER BY id_reservation DESC")->queryAll();       
        $dataProvider=new CArrayDataProvider($rawData, array(
            'keyField'=>'id_reservation',
            'sort'=>array('attributes'=>array('id_reservation','name','jenis_sewa'),),
            'pagination'=>array('pageSize'=>10,),
            ));

            $this->render('index',array(
                'dataProvider'=>$dataProvider,
        ));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Reservation('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Reservation']))
			$model->attributes=$_GET['Reservation'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Reservation the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Reservation::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Reservation $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='reservation-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

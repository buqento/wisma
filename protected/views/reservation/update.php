<?php
/* @var $this ReservationController */
/* @var $model Reservation */

$this->breadcrumbs=array(
	'Reservasi'=>array('index'),
	$model->name=>array('view','id'=>$model->id_reservation),
	'Update Reservasi',
);

$this->menu=array(
	array('label'=>'List Reservation', 'url'=>array('index')),
//	array('label'=>'Create Reservation', 'url'=>array('create')),
	array('label'=>'View Reservation', 'url'=>array('view', 'id'=>$model->id_reservation)),
	array('label'=>'Manage Reservation', 'url'=>array('admin')),
);
?>

<h1>Update Reservasi #<?php echo $model->id_reservation; ?></h1>
<hr>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
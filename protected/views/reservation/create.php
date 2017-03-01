<?php
/* @var $this ReservationController */
/* @var $model Reservation */

$this->breadcrumbs=array(
	'Reservasi'=>array('index'),
	'Create Reservasi',
);

$this->menu=array(
	array('label'=>'List Reservation', 'url'=>array('index')),
	array('label'=>'Manage Reservation', 'url'=>array('admin')),
);
?>

<h1>Create Reservasi</h1>
<hr>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
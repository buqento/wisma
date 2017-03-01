<?php
/* @var $this PesananController */
/* @var $model Pesanan */

$this->breadcrumbs=array(
	'Pesanan'=>array('index'),
	$model->id_pesanan=>array('view','id'=>$model->id_pesanan),
	'Update Pesanan',
);

$this->menu=array(
	array('label'=>'List Pesanan', 'url'=>array('index')),
	array('label'=>'Create Pesanan', 'url'=>array('create')),
	array('label'=>'View Pesanan', 'url'=>array('view', 'id'=>$model->id_pesanan)),
	array('label'=>'Manage Pesanan', 'url'=>array('admin')),
);
?>

<h1>Update Pesanan <?php echo $model->id_pesanan; ?></h1>
<hr>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
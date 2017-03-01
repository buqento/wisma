<?php
/* @var $this TipeKamarController */
/* @var $model TipeKamar */

$this->breadcrumbs=array(
	'Tipe Kamar'=>array('index'),
	$model->id_tipe=>array('view','id'=>$model->id_tipe),
	'Update Tipe Kamar',
);

$this->menu=array(
	array('label'=>'List TipeKamar', 'url'=>array('index')),
	array('label'=>'Create TipeKamar', 'url'=>array('create')),
	array('label'=>'View TipeKamar', 'url'=>array('view', 'id'=>$model->id_tipe)),
	array('label'=>'Manage TipeKamar', 'url'=>array('admin')),
);
?>

<h1>Update Tipe Kamar <?php echo $model->id_tipe; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
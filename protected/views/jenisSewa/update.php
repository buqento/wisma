<?php
/* @var $this JenisSewaController */
/* @var $model JenisSewa */

$this->breadcrumbs=array(
	'Jenis Sewa'=>array('index'),
	$model->id_jenis=>array('view','id'=>$model->id_jenis),
	'Update Jenis Sewa',
);

$this->menu=array(
	array('label'=>'List JenisSewa', 'url'=>array('index')),
	array('label'=>'Create JenisSewa', 'url'=>array('create')),
	array('label'=>'View JenisSewa', 'url'=>array('view', 'id'=>$model->id_jenis)),
	array('label'=>'Manage JenisSewa', 'url'=>array('admin')),
);
?>

<h1>Update Jenis Sewa <?php echo $model->id_jenis; ?></h1>
<hr>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
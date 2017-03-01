<?php
/* @var $this JenisSewaController */
/* @var $model JenisSewa */

$this->breadcrumbs=array(
	'Jenis Sewa'=>array('index'),
	'Create Jenis Sewa',
);

$this->menu=array(
	array('label'=>'List JenisSewa', 'url'=>array('index')),
	array('label'=>'Manage JenisSewa', 'url'=>array('admin')),
);
?>

<h1>Create Jenis Sewa</h1>
<hr>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
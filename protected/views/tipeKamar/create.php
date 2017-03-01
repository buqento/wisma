<?php
/* @var $this TipeKamarController */
/* @var $model TipeKamar */

$this->breadcrumbs=array(
	'Tipe Kamar'=>array('index'),
	'Create Tipe Kamar',
);

$this->menu=array(
	array('label'=>'List TipeKamar', 'url'=>array('index')),
	array('label'=>'Manage TipeKamar', 'url'=>array('admin')),
);
?>

<h1>Create Tipe Kamar</h1>
<hr>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
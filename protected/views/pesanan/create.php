<?php
/* @var $this PesananController */
/* @var $model Pesanan */

$this->breadcrumbs=array(
	'Pesanan'=>array('index'),
	'Create Pesanan',
);

$this->menu=array(
	array('label'=>'List Pesanan', 'url'=>array('index')),
	array('label'=>'Manage Pesanan', 'url'=>array('admin')),
);
?>

<h1>Create Pesanan</h1>
<hr>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
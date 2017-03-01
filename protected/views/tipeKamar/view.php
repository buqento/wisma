<?php
/* @var $this TipeKamarController */
/* @var $model TipeKamar */

$this->breadcrumbs=array(
	'Tipe Kamar'=>array('index'),
	$model->id_tipe,
);

$this->menu=array(
	array('label'=>'List TipeKamar', 'url'=>array('index')),
	array('label'=>'Create TipeKamar', 'url'=>array('create')),
	array('label'=>'Update TipeKamar', 'url'=>array('update', 'id'=>$model->id_tipe)),
	array('label'=>'Delete TipeKamar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipe),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipeKamar', 'url'=>array('admin')),
);
?>

<h1>View Tipe Kamar #<?php echo $model->id_tipe; ?></h1>
<hr>
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'bordered',
	'data'=>$model,
	'attributes'=>array(
		//'id_tipe',
		'tipe_kamar',
		'harga',
	),
)); ?>

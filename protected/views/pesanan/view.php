<?php include("fungsi_indotgl.php"); ?>
<?php
/* @var $this PesananController */
/* @var $model Pesanan */

$this->breadcrumbs=array(
	'Pesanan'=>array('index'),
	$model->id_pesanan,
);

$this->menu=array(
	array('label'=>'List Pesanan', 'url'=>array('index')),
	array('label'=>'Create Pesanan', 'url'=>array('create')),
	array('label'=>'Update Pesanan', 'url'=>array('update', 'id'=>$model->id_pesanan)),
	array('label'=>'Delete Pesanan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pesanan),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pesanan', 'url'=>array('admin')),
);
?>

<h1>View Pesanan #<?php echo $model->id_pesanan; ?></h1>
<hr>
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'type'=>'bordered',
 	'data'=>$model,
	'attributes'=>array(
		'id_pesanan',
        array('name'=>'date_created', 
            'type'=>'raw',
            'value'=>tgl_indo($model->date_created)),
        'id_reservation',
		'nama_pesanan',
		'keterangan',
        array('name'=>'harga', 
            'type'=>'raw',
            'value'=>number_format($model->harga,0,',','.').".-"),   
	),
)); ?>

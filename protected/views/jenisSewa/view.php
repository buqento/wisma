<?php
/* @var $this JenisSewaController */
/* @var $model JenisSewa */

$this->breadcrumbs=array(
	'Jenis Sewa'=>array('index'),
	$model->id_jenis,
);

$this->menu=array(
	array('label'=>'List JenisSewa', 'url'=>array('index')),
	array('label'=>'Create JenisSewa', 'url'=>array('create')),
	array('label'=>'Update JenisSewa', 'url'=>array('update', 'id'=>$model->id_jenis)),
	array('label'=>'Delete JenisSewa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_jenis),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JenisSewa', 'url'=>array('admin')),
);
?>

<h1>View Jenis Sewa #<?php echo $model->id_jenis; ?></h1>
<hr>
        <?php $this->widget('bootstrap.widgets.TbDetailView', array(
            'type'=>'bordered',
            'data'=>$model,
            'attributes'=>array(
                'id_jenis',
                'jenis',
                'tarif',
            ),
        )); ?>

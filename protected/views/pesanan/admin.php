<?php include("fungsi_indotgl.php"); ?>
<?php
/* @var $this PesananController */
/* @var $model Pesanan */

$this->breadcrumbs=array(
	'Pesanan'=>array('index'),
	'Manage Pesanan',
);

$this->menu=array(
	array('label'=>'List Pesanan', 'url'=>array('index')),
	array('label'=>'Create Pesanan', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pesanan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pesanan</h1>
<hr>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'pesanan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//        array('name'=>'id_pesanan', 'htmlOptions'=>array('style'=>'width: 10px'), 'header'=>'ID',),
        array('name'=>'id_reservation', 'htmlOptions'=>array('style'=>'width: 50px', 'align'=>'center'), 'header'=>'ID Res',),
		array('name'=>'date_created', 
              'type'=>'raw',
              'value'=>'tgl_indo($data->date_created)',
              'htmlOptions'=>array('style'=>'width: 150px'),),
		'nama_pesanan',
		'keterangan',
		array('name'=>'harga', 
              'type'=>'raw',
              'value'=>'number_format($data->harga,0,",",".").",-"',
              'htmlOptions'=>array('style'=>'width: 150px'),),
        array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 20px'),
            'header'=>'Aksi',
		),
	),
)); ?>

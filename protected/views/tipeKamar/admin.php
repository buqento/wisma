<?php
/* @var $this TipeKamarController */
/* @var $model TipeKamar */

$this->breadcrumbs=array(
	'Tipe Kamar'=>array('index'),
	'Manage Tipe Kamar',
);

$this->menu=array(
	array('label'=>'List TipeKamar', 'url'=>array('index')),
	array('label'=>'Create TipeKamar', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tipe-kamar-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tipe Kamar</h1>
<hr>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'tipe-kamar-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array('name'=>'id_tipe', 'htmlOptions'=>array('style'=>'width: 50px', 'align'=>'center'), 'header'=>'ID',),
		'tipe_kamar',
        array('name'=>'harga', 'htmlOptions'=>array('style'=>'width: 150px', 'align'=>'center')),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 20px'),
            'header'=>'Aksi',
		),
	),
)); ?>

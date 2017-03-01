<?php
/* @var $this JenisSewaController */
/* @var $model JenisSewa */

$this->breadcrumbs=array(
	'Jenis Sewa'=>array('index'),
	'Manage Jenis Sewa',
);

$this->menu=array(
	array('label'=>'List JenisSewa', 'url'=>array('index')),
	array('label'=>'Create JenisSewa', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#jenis-sewa-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Jenis Sewa</h1>
<hr>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'jenis-sewa-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array('name'=>'id_jenis', 'htmlOptions'=>array('style'=>'width: 50px', 'align'=>'center'), 'header'=>'ID',),
		'jenis',
        array('name'=>'tarif', 'htmlOptions'=>array('style'=>'width: 150px', 'align'=>'center')),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 20px'),
            'header'=>'Aksi',
		),
	),
)); ?>

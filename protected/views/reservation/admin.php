<?php include("fungsi_indotgl.php"); ?>
<?php
/* @var $this ReservationController */
/* @var $model Reservation */

$this->breadcrumbs=array(
	'Reservasi'=>array('index'),
	'Manage Reservasi',
);

$this->menu=array(
	array('label'=>'List Reservation', 'url'=>array('index')),
//	array('label'=>'Create Reservation', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#reservation-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Reservasi</h1>
<hr>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'reservation-grid',
    'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array('header'=>'No', 'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1','htmlOptions'=>array('style'=>'width: 1%', 'text-position'=>'center')),
        array('name'=>'id_reservation', 'htmlOptions'=>array('style'=>'width: 50px'), 'header'=>'Id Res',),
		array('name'=>'room', 'htmlOptions'=>array('style'=>'width: 50px'), 'header'=>'Room',),
//        'id_pengenal',
		array('name'=>'name', 
              'type'=>'raw',
              'value'=>'strtoupper($data->name)',),
//		'telepon',
		array('name'=>'check_in', 
              'type'=>'raw',
              'value'=>'tgl_indo($data->check_in)',
              'htmlOptions'=>array('style'=>'width: 150px'),),
    
		array('name'=>'check_out', 
              'type'=>'raw',
              'value'=>'tgl_indo($data->check_out)',
              'htmlOptions'=>array('style'=>'width: 150px'),),
		array('name'=>'jenis_sewa', 
              'type'=>'raw',
              'value'=>'strtoupper($data->jenis_sewa)',),
		/*
		'tarif',
		'adult',
		'children',
		'preference',
		*/
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view} {update} {delete} {tagihan}',
            'header'=>'Aksi',
            'htmlOptions'=>array('style'=>'width: 70px'),
            'buttons'=>array
            (
                'view' => array
                (
                    'label'=>'View',
                    'icon'=>'eye-open',
                    'url'=>'Yii::app()->createUrl("reservation/view", array("id"=>$data->id_reservation))',
//                    'options'=>array(
//                        'class'=>'btn btn-small btn-info',
//                    ),
                ),
                'update' => array
                (
                    'label'=>'Update',
                    'icon'=>'pencil',
                    'url'=>'Yii::app()->createUrl("reservation/update&id=$data->id_reservation&res=$data->jenis_sewa")',
                ),
                'delete' => array
                (
                    'label'=>'Delete',
                    'icon'=>'trash',
                    'url'=>'Yii::app()->createUrl("reservation/delete", array("id"=>$data->id_reservation))',
                ),
                'tagihan' => array
                (
                    'label'=>'Tagihan',
                    'icon'=>'shopping-cart',
                    'url'=>'Yii::app()->createUrl("reservation/tagihan_$data->jenis_sewa", array("id"=>$data->id_reservation))',
                ),
            ),),
    
	),
)); ?>

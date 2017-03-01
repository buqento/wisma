<?php include("fungsi_indotgl.php"); ?>
<?php
/* @var $this ReservationController */
/* @var $model Reservation */

$this->breadcrumbs=array(
	'Reservasi'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Reservation', 'url'=>array('index')),
//	array('label'=>'Create Reservation', 'url'=>array('create')),
//	array('label'=>'Update Reservation', 'url'=>array('update', 'id'=>$model->id_reservation)),
	array('label'=>'Delete Reservation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_reservation),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Reservation', 'url'=>array('admin')),
	array('label'=>'Info Tagihan', 'url'=>array('reservation/tagihan_'.$model->jenis_sewa.'&id='.$model->id_reservation)),
);
?>

<h1>View Reservasi #<?php echo $model->id_reservation; ?></h1>
<hr>

        <?php $this->widget('bootstrap.widgets.TbDetailView', array(
            'type'=>'bordered',
            'data'=>$model,
            'attributes'=>array(
                'id_reservation',
                'room',
                'id_pengenal',
                'name',
                'telepon',
                array('name'=>'check_in', 
                  'type'=>'raw',
                  'value'=>tgl_indo($model->check_in)),
                array('name'=>'check_out', 
                  'type'=>'raw',
                  'value'=>tgl_indo($model->check_out)),    
                 array('name'=>'tarif', 
                  'type'=>'raw',
                  'value'=>number_format($model->tarif,0,',','.').".-"),   
                 array('name'=>'panjar', 
                  'type'=>'raw',
                  'value'=>number_format($model->panjar,0,',','.').".-"),   
                'adult',
                'children',
                'preference',
            ),
        )); ?>
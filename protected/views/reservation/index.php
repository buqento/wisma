<?php
include("fungsi_indotgl.php");
/* @var $this ReservationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'List CheckIn Room',
);

$this->menu=array(
//	array('label'=>'Create Reservation', 'url'=>array('create')),
	array('label'=>'Manage Reservation', 'url'=>array('admin')),
);
?>

<h1>List CheckIn Room</h1>
<hr>

<?php 
$this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'user-info-grid',
    'dataProvider'=>$dataProvider,
    'type'=>'striped bordered condensed',
    'columns'=>array(
            array('header'=>'No', 'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1','htmlOptions'=>array('style'=>'width: 1%', 'align'=>'center')),
        'room',
        'name',
        'id_pengenal',
        'telepon',
        'check_out',
        'preference',    
    ),
));

//$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
////	'itemView'=>'_view',
//    'itemView'=>'list_room',
//    'separator'=>'<hr>',
//    'sortableAttributes'=>array('id_reservation' => 'Id Reservation',)
//)); 
?>
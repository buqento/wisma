<?php
/* @var $this RekapitulasiController */

$this->breadcrumbs=array(
	'List CheckIn Room',
);

$this->menu=array(
	array('label'=>'Manage Reservasi', 'url'=>array('admin')),
//	array('label'=>'Create Reservation', 'url'=>array('create')),
);

?>
<h1>List CheckIn Room</h1>
<hr>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'reservation-grid',
    'type'=>'striped bordered-condensed',
    'dataProvider'=>$model, 
    'enableSorting'=>true, 
    'columns'=>array( 
            array('header'=>'No', 'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1','htmlOptions'=>array('style'=>'width: 5%', 'align'=>'center')),
            array('header'=>'Room','name'=>'room', 'htmlOptions'=>array('style'=>'width: 5%', 'align'=>'center')),
            array('header'=>'Check In','name'=>'check_in', 'htmlOptions'=>array('style'=>'width: 15%', 'align'=>'center')),
            array('header'=>'Check Out','name'=>'check_out', 'htmlOptions'=>array('style'=>'width: 15%', 'align'=>'center')),
            array('header'=>'ID Pelanggan','name'=>'id_pengenal', 'htmlOptions'=>array('style'=>'width: 15%', 'align'=>'center')),
            array('header'=>'Nama Pelanggan','name'=>'name', 'htmlOptions'=>array('style'=>'width: 200px', 'align'=>'center')),
            array('header'=>'Telepon','name'=>'telepon', 'htmlOptions'=>array('style'=>'width: 15%', 'align'=>'center')),
            array('header'=>'Jenis Sewa','name'=>'jenis_sewa', 'htmlOptions'=>array('style'=>'width: 10%', 'align'=>'center')),    
            array('header'=>'Tarif','name'=>'tarif', 'htmlOptions'=>array('style'=>'width: 10%', 'align'=>'center')),    

      ),  
    
));
?>



<?php
/* @var $this RekapitulasiController */

$this->breadcrumbs=array(
	'Rekapitulasi Reservasi',
);
?>
<h1>Rekapitulasi Reservasi</h1>
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
            array('header'=>'Tarif','name'=>'tarif', 'htmlOptions'=>array('style'=>'width: 10%', 'align'=>'center')),    
    ),
));
?>


<table>
    <tr>
        <th>
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'link', 
                'url'=>'report/custom_print_date.php',
                'type'=>'primary', 
                'label'=>'Custom',
                'icon'=>'icon-calendar icon-white'
            )); ?>
                
        </th>
    </tr>
</table>


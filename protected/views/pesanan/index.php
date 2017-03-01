<?php
include "/../../fungsi_indotgl.php";
/* @var $this PesananController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'List Pesanan',
);

$this->menu=array(
	array('label'=>'Create Pesanan', 'url'=>array('create')),
	array('label'=>'Manage Pesanan', 'url'=>array('admin')),
);
?>

<h1>List Pesanan</h1>
<hr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'separator'=>'<hr>',   
)); ?>

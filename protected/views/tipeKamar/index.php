<?php
/* @var $this TipeKamarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'List Tipe Kamar',
);

$this->menu=array(
	array('label'=>'Create TipeKamar', 'url'=>array('create')),
	array('label'=>'Manage TipeKamar', 'url'=>array('admin')),
);
?>

<h1>List Tipe Kamar</h1>
<hr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'separator'=>'<hr>',
)); ?>

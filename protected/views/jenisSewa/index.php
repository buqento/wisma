<?php
/* @var $this JenisSewaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jenis Sewa',
);

$this->menu=array(
	array('label'=>'Create JenisSewa', 'url'=>array('create')),
	array('label'=>'Manage JenisSewa', 'url'=>array('admin')),
);
?>

<h1>List Jenis Sewa</h1>
<hr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'separator'=>'<hr>',
)); ?>

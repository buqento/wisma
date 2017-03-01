<?php
/* @var $this JenisSewaController */
/* @var $data JenisSewa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jenis')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_jenis), array('view', 'id'=>$data->id_jenis)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis')); ?>:</b>
	<?php echo CHtml::encode($data->jenis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tarif')); ?>:</b>
	<?php echo CHtml::encode($data->tarif); ?>
	<br />


</div>
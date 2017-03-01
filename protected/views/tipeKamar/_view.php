<?php
/* @var $this TipeKamarController */
/* @var $data TipeKamar */
?>

<div class="view">

	<!--b><?php// echo CHtml::encode($data->getAttributeLabel('id_tipe')); ?>:</b>
	<?php// echo CHtml::link(CHtml::encode($data->id_tipe), array('view', 'id'=>$data->id_tipe)); ?>
	<br /-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipe_kamar')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tipe_kamar), array('view', 'id'=>$data->id_tipe)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('harga')); ?>:</b>
	<?php echo CHtml::encode($data->harga); ?>
	<br />


</div>
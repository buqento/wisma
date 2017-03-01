<?php
/* @var $this TipeKamarController */
/* @var $model TipeKamar */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_tipe'); ?>
		<?php echo $form->textField($model,'id_tipe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipe_kamar'); ?>
		<?php echo $form->textField($model,'tipe_kamar',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'harga'); ?>
		<?php echo $form->textField($model,'harga'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
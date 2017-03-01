<?php
/* @var $this PesananController */
/* @var $model Pesanan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_pesanan'); ?>
		<?php echo $form->textField($model,'id_pesanan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_reservation'); ?>
		<?php echo $form->textField($model,'id_reservation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_pesanan'); ?>
		<?php echo $form->textField($model,'nama_pesanan',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keterangan'); ?>
		<?php echo $form->textArea($model,'keterangan',array('rows'=>6, 'cols'=>50)); ?>
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
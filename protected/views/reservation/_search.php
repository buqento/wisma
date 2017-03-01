<?php
/* @var $this ReservationController */
/* @var $model Reservation */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_reservation'); ?>
		<?php echo $form->textField($model,'id_reservation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_pengenal'); ?>
		<?php echo $form->textField($model,'id_pengenal',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telepon'); ?>
		<?php echo $form->textField($model,'telepon'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'check_in'); ?>
		<?php echo $form->textField($model,'check_in'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'check_out'); ?>
		<?php echo $form->textField($model,'check_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tarif'); ?>
		<?php echo $form->textField($model,'tarif'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->label($model,'adult'); ?>
		<?php echo $form->textField($model,'adult'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'children'); ?>
		<?php echo $form->textField($model,'children'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'preference'); ?>
		<?php echo $form->textField($model,'preference',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
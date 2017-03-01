<?php
/* @var $this JenisSewaController */
/* @var $model JenisSewa */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'jenis-sewa-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class'=>'well'),
)); ?>

    <div class="alert alert-info">
    	<h4>Info:</h4>
    	<p class="note">Semua fields wajib diisi.</p>
    </div>

	<?php echo $form->errorSummary($model); ?>

	<div>
		<?php echo $form->textFieldRow($model,'jenis',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div>
		<?php echo $form->textFieldRow($model,'tarif',array('class'=>'span2','prepend'=>'Rp.')); ?>
	</div>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit', 
            'type'=>'primary', 
            'label'=>'Submit',
            'icon'=>'icon-ok icon-white')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
    </div>
 
<?php $this->endWidget(); ?>

</div><!-- form -->
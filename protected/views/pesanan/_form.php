<?php
/* @var $this PesananController */
/* @var $model Pesanan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'pesanan-form',
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
        <?php $now = date('Y-m-d H:i:s');?>
		<?php echo $form->textFieldRow($model,'date_created',array('class'=>'span2','readonly'=>'true','value'=>$now)); ?>
        
        <?php echo $form->labelEx($model,'room'); ?>
		<?php
            $CurrDate = strtotime(date('Y-m-d H:i:s'));
            $Criteria = new CDbCriteria();
            $Criteria->condition = "t_check_out > ".$CurrDate; 
            echo $form->dropDownList($model, 'id_reservation',                                            
            CHtml::listData(Reservation::model()->findAll($Criteria), 'id_reservation','room','name'),
            array(
                'class'=>'span1',
            ));
        ?>
	</div>
    <hr>
	<div>
		<?php echo $form->textFieldRow($model,'nama_pesanan',array('class'=>'span5','maxlength'=>50, 'placeholder'=>"Nasi Goreng, Mie Pangsit dll")); ?>
	</div>

	<div>
        <?php echo $form->textAreaRow($model, 'keterangan', array('class'=>'span5', 'rows'=>2)); ?>
	</div>

	<div>
		<?php echo $form->textFieldRow($model,'harga',array('class'=>'span2','prepend'=>'Rp.')); ?>
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
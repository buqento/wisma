<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change Password");
$this->breadcrumbs=array(
	UserModule::t("Profile") => array('/user/profile'),
	UserModule::t("Change Password"),
);
?>

<h2><?php echo UserModule::t("Change password"); ?></h2>
<?php echo $this->renderPartial('menu'); ?>
<hr>
<div class="form">
<?php //$form=$this->beginWidget('UActiveForm', array(
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'changepassword-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	<?php echo CHtml::errorSummary($model); ?>
	
	<div>
	<?php echo $form->passwordFieldRow($model,'password'); ?>
	<p class="hint">
	<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
	</p>

	<?php echo $form->passwordFieldRow($model,'verifyPassword'); ?>

	</div>
	
	
<!--
	<div class="row submit">
	<?php //echo CHtml::submitButton(UserModule::t("Save")); ?>
	</div>
    
-->
    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit', 
            'type'=>'primary', 
            'label'=>'Simpan',
            'icon'=>'icon-ok icon-white')); ?>
    </div>
    

<?php $this->endWidget(); ?>
</div><!-- form -->
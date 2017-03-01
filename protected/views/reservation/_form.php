<?php
/* @var $this ReservationController */
/* @var $model Reservation */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'reservation-form',
    'type'=>'horizontal',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class'=>'well'),
)); ?>
    
    <?php $res = $_GET['res'];?>
    <?php $this->widget('bootstrap.widgets.TbLabel', array(
    'type'=>'important', // 'success', 'warning', 'important', 'info' or 'inverse'
    'label'=>strtoupper($res),
    )); ?>
    <br><br>
    <div class="alert alert-info">
    	<h4>Info:</h4>
    	<p class="note">Semua fields wajib diisi.</p>
    </div>
    
	<?php echo $form->errorSummary($model); ?>
        
    <fieldset>
        <legend>Data Pelanggan</legend>
    
        <div>
            <?php echo $form->textFieldRow($model,'name',array('class'=>'span4','maxlength'=>35)); ?>
            <?php echo $form->textFieldRow($model,'id_pengenal',array('class'=>'span2','maxlength'=>25,'placeholder'=>"KTP, SIM dll...")); ?>
            <?php echo $form->textFieldRow($model,'telepon',array('class'=>'span2','maxlength'=>12)); ?>
        </div>

        <legend>Data Sewa Kamar</legend>

        <div>
            
            <?php echo $form->textFieldRow($model,'room',array('class'=>'span1','maxlength'=>3)); ?>
            
            
            
            
            
            
            <?php if($res=='harian'){ $jsewa = 'harian'; ?>
                
                <?php               
                    echo $form->dropDownListRow($model, 'tarif',
                    CHtml::listData(TipeKamar::model()->findAll(), 'harga','harga','tipe_kamar'),
                    array(
                        //'prompt' => 'Pilih Tipe Kamar',
                        'class'=>'span2',
                        'prepend'=>'Rp.',
                    ));
                ?>
            
            <?php }elseif($res=='mingguan'){ $jsewa = 'mingguan'; ?>
            
                <?php
                    $criteria = new CDbCriteria();
                    $criteria->condition = 'jenis = "Mingguan"';                      
                        
                    echo $form->dropDownListRow($model, 'tarif',
                    CHtml::listData(JenisSewa::model()->findAll($criteria), 'tarif','tarif','jenis'),
                    array(
                        'class'=>'span2',
                    ));
                ?>
            
            <?php }else{ $jsewa = 'bulanan'; ?>
            
                <?php
                    $criteria = new CDbCriteria();
                    $criteria->condition = 'jenis != "Mingguan"';                      
                        
                    echo $form->dropDownListRow($model, 'tarif',
                    CHtml::listData(JenisSewa::model()->findAll($criteria), 'tarif','tarif','jenis'),
                    array(
                        'class'=>'span2',
                    ));
                ?>               
            
            
            <?php } ?>
           
            <?php echo $form->textFieldRow($model,'jenis_sewa',array('class'=>'span1','value'=>$jsewa,'readonly'=>true)); ?>


            <?php echo $form->textFieldRow($model,'panjar',array('class'=>'span2','prepend'=>'Rp.')); ?>

            <?php echo $form->dropDownListRow($model, 'adult', 
                array(1=>'1', 2=>'2'),
                    array('class'=>'span1')
                );
            ?>

            <?php echo $form->dropDownListRow($model, 'children', 
                array(0=>'0',1=>'1', 2=>'2', 3=>'3', 4=>'4', 5=>'5'),
                    array('class'=>'span1')
                );
            ?>

            <?php echo $form->dropDownListRow($model, 'preference', 
                array('No Smoking'=>'No Smoking', 'Smoking'=>'Smoking'),
                    array('class'=>'span2')
                ); 
            ?>
        </div>
    
    </fieldset>
    <hr>
    
        <div class="well">
            <?php echo $form->labelEx($model,'check_in'); ?>
            <?php $this->widget('application.extensions.timepicker.EJuiDateTimePicker',array(
                'model'=>$model,
                'attribute'=>'check_in',
                'language' => 'en',

                'options'=>array(
                    'showAnim'=>'fold',
                    'showSecond'=>true,
                    'ampm'=>true,
                    'timeFormat' => 'hh:mm:ss',
                    'dateFormat'=>'yy-mm-dd',
                    'changeMonth' => true,
                    'changeYear' => true,
                    'prepend' => '$',
                ),
                'htmlOptions' => array(
                        'placeholder' => 'yyyy-mm-dd',
                        'maxlength' => '16',
                ),
    
            ));
            ?>

            <?php echo $form->labelEx($model,'check_out'); ?>
            <?php $this->widget('application.extensions.timepicker.EJuiDateTimePicker',array(
                'model'=>$model,
                'attribute'=>'check_out',
                'language' => 'en',
                'options'=>array(
                    'showAnim'=>'fold', //fold / slide
                    'showSecond'=>true,
                    'ampm'=>true,
                    'timeFormat' => 'hh:mm:ss',
                    'dateFormat'=>'yy-mm-dd',
                    'changeMonth' => true,
                    'changeYear' => true,
                ),
    
                'htmlOptions'=>array(
                    'placeholder' => 'yyyy-mm-dd',
                    'maxlength' => '16',
                ),
    
            ));
            ?>            

        </div>

        <hr>
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
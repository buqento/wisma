<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'type'=>'inverse', // null or 'inverse'
    'collapse'=>true,
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/index')),
                array('label'=>'Reservasi', 'url'=>'#', 'items'=>array(
                    array('label'=>'List CheckIn Room', 'url'=>array('/reservation')),
                    array('label'=>'Manage Reservation', 'url'=>array('reservation/admin')),
                    '---',
                    array('label'=>'Create Reservasi Harian', 'url'=>array('/reservation/create&res=harian')),
                    array('label'=>'Create Reservasi Mingguan', 'url'=>array('/reservation/create&res=mingguan')),
                    array('label'=>'Create Reservasi Bulanan', 'url'=>array('/reservation/create&res=bulanan')),

                )),
                array('label'=>'Pesanan', 'url'=>array('/Pesanan')),
    			array('label'=>'Rekapitulasi', 'url'=>'#', 'items'=>array(
                    array('label'=>'Reservasi', 'url'=>'report/custom_print_date.php'),
//                    array('label'=>'Pesanan', 'url'=>array('/pesanan')),
                )),
    			array('label'=>'Pengaturan', 'url'=>'#', 'items'=>array(
                    array('label'=>'Tipe Kamar', 'url'=>array('/tipeKamar/admin')),
                    array('label'=>'Jenis Sewa', 'url'=>array('/JenisSewa/admin')),
                )),
                
    
                array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
//                array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
//                array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
                array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),

    
    
//    array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
//                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>
    <hr>
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Manggurebe.<br/>
		All Rights Reserved.<br/>
		<?php echo 'Powered by BUQENTO RICHARD.'; ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>

<div class="row">
  <div class="span8">
    
    <?php
/* @var $this SiteController */



    
$this->pageTitle=Yii::app()->name;
?>
<?php $this->widget('bootstrap.widgets.TbCarousel', array(
    'items'=>array(
        array('image'=>'images/1.jpg', 'label'=>'Welcome to Wisma Yuan', 'caption'=>'Celebrate The Year of the Rooster with your family at Wisma Yuan Makassar.'),
        array('image'=>'images/2.jpg', 'label'=>'Early Bird', 'caption'=>'Book early and save up to 20% on your luxury vacation or business trip.'),
        array('image'=>'images/3.jpg', 'label'=>'City Break', 'caption'=>'For a minimum stay of two nights in one of our rooms or suites.'),
    ),
)); ?>
    
    </div>
  <div class="span4">
    
    <address>
  <strong>Address</strong><br>
  Jl. Singa, No 18<br>
  Makassar, Sulawesi selatan<br>
  <abbr title="Phone">P:</abbr> (0411) xxxxxx
</address>
 
<address>
  <strong>Full Name</strong><br>
  <a href="mailto:#">Wisma Yuan</a>
</address>
    </div>
</div>


<?php //$this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    //'heading'=>CHtml::encode(Yii::app()->name),
//)); ?>

<!--<p>OUR FACILITIES. YOUR BENEFIT.</p>-->



<?php //$this->endWidget(); ?>

<table class="table table-bordered">
    <tr>
        <th>
            <p class="text-left">
                <?php echo CHtml::encode($data->getAttributeLabel('name')); ?>
            </p>
        </th>
        <td>:
        	<?php echo CHtml::encode($data->name); ?>
        </td>
    </tr>
    <tr>
        <th>
            <p class="text-left">
                <?php echo CHtml::encode($data->getAttributeLabel('check_in')); ?>&nbsp;/&nbsp;
                <?php echo CHtml::encode($data->getAttributeLabel('check_out')); ?>
            </p>
        </th>
        <td>:
        	<?php echo tgl_indo(CHtml::encode($data->check_in)); ?>&nbsp;/&nbsp;
            <?php echo tgl_indo(CHtml::encode($data->check_out)); ?>
        </td>
    </tr>
    <tr>
        <th></th>
        <th>
            <?php if($data->jenis_sewa == 'Harian'){ $show = 'detail'; }else{ $show = 'detailMb';} ?>
            <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
                'buttons'=>array(
                    array(
                            'label'=>'Detail', 
                            'type'=>'primary', 
                            'icon'=>'icon-list icon-white', 
                            'url'=>array('view', 'id'=>$data->id_reservation)),
                    array(
                            'label'=>'Tagihan', 
                            'type'=>'primary', 
                            'icon'=>'icon-shopping-cart icon-white', 
                            'url'=>array($show, 'id'=>$data->id_reservation)),
                ),
        )); ?>
        </th>
    </tr>
</table>
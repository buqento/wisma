<table class="table table-bordered">
    <tr>
        <th  class="span2">
            <p class="text-left">
                <?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>
            </p>
        </th>
        <td>
            :&nbsp;<?php echo tgl_indo(CHtml::encode($data->date_created));?>
        </td>
        <th class="span1" rowspan="2">
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'link', 
                'url'=>array('view', 'id'=>$data->id_pesanan),
                'type'=>'primary', 
                'label'=>'Detail',
                'icon'=>'icon-list icon-white'
            )); ?>
        </th>
    </tr>
    <tr>
        <th  class="span2">
            <p class="text-left">
                <?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>
            </p>
        </th>

        <td>
                <dt>:
                    <?php echo CHtml::encode($data->nama_pesanan);?>
                </dt>
                <dd>
                    <?php echo "<small>".CHtml::encode($data->keterangan)."</small>";?>
                </dd>
        </td>
    </tr>

</table>
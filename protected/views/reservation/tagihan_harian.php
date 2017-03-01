<?php
include "/../../../fungsi_indotgl.php";
$this->breadcrumbs=array(
	'Reservasi'=>array('index'),
	'Detail Tagihan',
);
$this->menu=array(
//	array('label'=>'Create Reservation', 'url'=>array('create')),
	array('label'=>'Manage Reservation', 'url'=>array('admin')),
);
?>

<h1>Detail Tagihan #<?php echo $id; ?></h1>
<hr>
<h3><?php echo $name." (".$room.")";?></h3>
<span class="label label-important">Check In : <?php echo tgl_indo($check_in);?></span>
<span class="label label-success">Check Out : <?php echo tgl_indo($check_out);?></span>
<hr>
<table class="table table-bordered">
    <tr>
        <td><p class="text-center">#</p></td>
        <th><p class="text-center">Keterangan Tagihan</p></th>
        <th><p class="text-center">Jumlah (Rp.)</p></th>
    </tr>

    <tr>
        <td><p class="text-center">1</p></td>
        <th><?php echo "Tarif Sewa Kamar @".number_format($tarif,0,',','.').".- Selama (".$selisih.") Hari";?></th>
        <td><p class="text-right"><?php echo number_format($tarifKamar,0,',','.').".-";?></p></td>
    </tr>

    <tr>
        <td><p class="text-center">2</p></td>
        <th><?php echo "Uang Panjar";?></th>
        <td><p class="text-right"><?php echo number_format($panjar,0,',','.').".-";?></p></td>
    </tr>

    <?php $no = 2; while($b = mysql_fetch_array($q2)){ $no++; ?>
    <tr>
        <td><p class="text-center"><?php echo $no;?></p></td>
        <td>
                <dt>
                    <?php echo $b["nama_pesanan"];?>
                </dt>
                <dd>
                    <?php echo "<small>".$b["keterangan"]."</small>";?>
                </dd>
        </td>
        <td><p class="text-right"><?php echo number_format($b["harga"],0,',','.').".-";?></p></td>
    </tr>

    <?php } ?>

    <tr class="info">
        <th colspan="2"><?php echo "<h4 class='text-right'>Total Tagihan</h4>";?></th>
        <td><?php echo "<h4 class='text-right'>".number_format($totalBayar,0,',','.').".-</h4>";?></td>
    </tr>
</table>
<table>
    <tr>
        <th>
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'link', 
                'url'=>'report/resharian.php?id='.$id,
                'type'=>'primary', 
                'label'=>'Cetak',
                'icon'=>'icon-print icon-white',
                'htmlOptions' => array('target'=>'_blank'),
            )); ?>            
        </th>
    </tr>
</table>



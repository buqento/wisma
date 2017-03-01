<?php
include '../connecting.php';
include '../fungsi_indotgl.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Rekapitulasi Transaksi</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      
      
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Wisma Yuan</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="../index.php">Home</a></li>
                           
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reservasi <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="../index.php?r=reservation">List CheckIn Room</a></li>
                <li><a href="../index.php?r=reservation/admin">Manage Reservasi</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../index.php?r=reservation/create&res=harian">Create Reservasi Harian</a></li>
                <li><a href="../index.php?r=reservation/create&res=mingguan">Create Reservasi Mingguan</a></li>
                <li><a href="../index.php?r=reservation/create&res=bulanan">Create Reservasi Bulanan</a></li>
              </ul>
            </li>

            <li><a href="../index.php?r=pesanan">Pesanan</a></li>
            <li class="active"><a href="../report/custom_print_date.php">Rekapitulasi Transaksi<span class="sr-only">(current)</span></a></li>
               
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pengaturan <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="../index.php?r=tipeKamar/admin">Tipe Kamar</a></li>
                <li><a href="../index.php?r=JenisSewa/admin">Jenis Sewa</a></li>
              </ul>
            </li>
             
          </ul>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
      

      <div class="row">
<!--            <div class="container">-->

                
              <div class="col-md-1"></div>
          
                <div class="col-md-10">

                        
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../index.php?r=rekapitulasi">Rekapitulasi</a></li>
                    <li class="active">Custom Rekapitulasi</li>
                </ol>
                    
                    <h1>Custom Rekapitulasi</h1>

                    <?php
                    $date_from = $_POST['date_from'];
                    $date_to = $_POST['date_to'];
                    $t_from = strtotime($date_from);
                    $t_to = strtotime($date_to);
                    

                    $query = mysql_query('SELECT * FROM reservation r, nota n WHERE r.t_check_in > '.$t_from.' AND r.t_check_in < '.$t_to.' AND r.id_reservation=n.id_reservation ORDER BY r.id_reservation DESC');
                    $num = 1;

                    ?>
                    <span class="label label-primary">From : <?php echo tgl_indo($date_from);?></span> s/d 
                    <span class="label label-danger">To : <?php echo tgl_indo($date_to);?></span>
                    <hr>

                    <table class="table table-striped bordered-condensed">
                        <tr>
                            <th><p class="text-center">#</p></th>
                            <th><p class="text-center">Id Reservation</p></th>
                            <th><p class="text-center">Room</p></th>
                            <th><p class="text-center">Nama Pelanggan</p></th>
                            <th><p class="text-center">Check In</p></th>
                            <th><p class="text-center">Check Out</p></th>
                            <th><p class="text-center">Panjar</p></th>
                            <th><p class="text-center">Tarif Sewa (T)</p></th>
                            <th><p class="text-center">Pesanan (Ps) </p></th>
                            <th><p class="text-center">Tot (T+Ps)</p></th>
                        </tr>
                        <?php while($row = mysql_fetch_array($query)){?>
                        
                        <?php 
                        $qpesanan = mysql_query('SELECT SUM(harga) AS jpesanan FROM pesanan WHERE id_reservation='.$row['id_reservation']);
                        $r = mysql_fetch_array($qpesanan);
                        $jpesanan = $r['jpesanan'];
                        $panjar = $row['panjar'];  
                        $check_in = $row['check_in']; 
                        $check_out = $row['check_out']; 
                        $jenis_sewa = $row['jenis_sewa'];
                        
                        if($jenis_sewa=='harian'){
                            $selisih = ceil((abs(strtotime ($row['check_in']) - strtotime ($row['check_out'])))/(60*60*24));
                            $tarifSewa = $row['tarif'] * $selisih;
                            
                        }elseif($jenis_sewa=='mingguan'){
                            //HITUNG JUMLAH MINGGU
                            $detik = 24 * 3600;
                            $tgl_awal = strtotime($check_in);
                            $tgl_akhir = strtotime($check_out);
                            $jminggu = 0;
                            for ($i=$tgl_awal; $i < $tgl_akhir; $i += $detik){
                                if (date("w", $i) == "0"){
                                    $jminggu++;
                                }
                            }
                            $tarifSewa = $row['tarif'] * $jminggu;
                            
                        }else{
                            
                            $checkin = date_create("$check_in");
                            $checkout =  date_create("$check_out");
                            $diff= date_diff($checkin, $checkout);
                            $months = $diff->y * 12 + $diff->m + $diff->d / 30;
                            $jmonth=round($months);
                            $tarifSewa = $row["tarif"] * $jmonth;
                            
                        }
                        $tBayar = $tarifSewa + $jpesanan;

                        ?>
                        <tr>
                            <td><p class="text-center"><?php echo $num++;?></p></td>
                            <td>
                                <p class="text-center" title="View reservasi #<?php echo $row['id_reservation'];?>">
                                    <a href="../index.php?r=reservation/view&id=<?php echo $row['id_reservation'];?>">
                                        <?php echo strtoupper($row['id_reservation']);?>
                                    </a>
                                </p>
                            </td>
                            <td><p class="text-center"><?php echo $row['room'];?></p></td>
                            <td>
                                <p class="text-center" title="Detail tagihan #<?php echo $row['id_reservation'];?>">
                                    <a href="../index.php?r=reservation/tagihan_<?php echo $jenis_sewa;?>&id=<?php echo $row['id_reservation'];?>">
                                        <?php echo strtoupper($row['name']);?>
                                    </a>
                                </p>
                            </td>
                            <td><p class="text-center"><?php echo tgl_indo($row['check_in']);?></p></td>
                            <td><p class="text-center"><?php echo tgl_indo($row['check_out']);?></p></td>
                            <td><p class="text-center"><?php echo number_format($row['panjar'],0,',','.').".-";?></p></td>
                            <td><p class="text-right"><?php echo number_format($tarifSewa,0,',','.').".-";?></p></td>
                            <td><p class="text-right"><?php echo number_format($jpesanan,0,',','.').".-";?></p></td>
                            <td><p class="text-center"><?php echo number_format($tBayar,0,',','.').".-";?></p></td>
                        </tr>
                        <?php } ?>
                    </table>
                    <hr>
                    <?php                                        
                    $q = mysql_query('SELECT SUM(tbayar) AS tb FROM nota WHERE t_check_in > '.$t_from.' AND t_check_in < '.$t_to);
                    $r = mysql_fetch_array($q);
                    $totalReservasi = $r['tb'];                    
                    ?>
                    <h3>Total : <?php echo number_format($totalReservasi,0,',','.').".-"?></h3>
                    <hr>
                    <a class="btn btn-primary" href="custom_print_date.php" role="button"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>&nbsp;Kembali</a>
                    
                    
                    <a class="btn btn-primary" href="rekap_reservasi.php?from=<?php echo $t_from;?>&to=<?php echo $t_to;?>" target="_blank" role="button"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;Cetak</a>


                </div>
          
              <div class="col-md-1"></div>
          
      </div>
      
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <hr>
                Copyright &copy; <?php echo date('Y'); ?> by Manggurebe.<br/>
                All Rights Reserved.<br/>
                <?php echo 'Powered by BUQENTO RICHARD.'; ?>
        </div>
        <div class="col-md-1"></div>    
    </div>
      


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
    

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ekspor Rekapitulasi</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <script type="text/javascript">
    function cetak(){
     print();
    }
    </script>

  </head>
  <body>
      
      
            <?php

            include "/../connecting.php";
            include "/../fungsi_indotgl.php";
//            $id_res = $_GET['id'];

      
            /** Error reporting */
            error_reporting(E_ALL);

            /** Include path **/
            ini_set('include_path', ini_get('include_path').';excel/');

            /** PHPExcel */
            include 'excel/PHPExcel.php';

            /** PHPExcel_Writer_Excel2007 */
            include 'excel/PHPExcel/Writer/Excel2007.php';

            // Create new PHPExcel object
//            echo date('H:i:s') . " Create new PHPExcel object\n";
            $objPHPExcel = new PHPExcel();
            
            $from = $_GET['from'];
            $to = $_GET['to'];
      
            $query = "SELECT * FROM reservation";
            $result = mysql_query($query);
            $row = mysql_fetch_array($result);
            $room = $row["room"];
            $name = $row["name"];
            $tarif = $row["tarif"];
            $panjar = $row["panjar"];
            $preference = $row["preference"];
            $check_in = $row["check_in"];
            $check_out = $row["check_out"];
      
            $lamaHariSewa = ceil((abs(strtotime ($check_in) - strtotime ($check_out)))/(60*60*24));
            $tarifKamar = ($lamaHariSewa * $tarif) - $panjar;


            // Set properties
            $objPHPExcel->getProperties()->setCreator("Buqento Richard");
            $objPHPExcel->getProperties()->setLastModifiedBy("Buqento Richard");
            $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
            $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
            $objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");
      
            $objPHPExcel->setActiveSheetIndex(0);
    
            
            // Set column TINGGI
//            $objPHPExcel->getSheet(0)->getRowDimension('4')->setRowHeight(25);
            
            // Set column LEBAR
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(7);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(7);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(13);
            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(13);
            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(13);
            $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(13);

            $styleBorder = array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
            
            $styleTextUnderline = array(
                'font' => array(
                    'underline' => true
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                )
            );
      
            $styleTextCenter = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                )
            );
            
            $BoldLeft = array(
                'font' => array(
                    'bold' => true
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                )
            );
            
             $BoldRight = array(
                'font' => array(
                    //'underline' => true,
                    'bold' => true
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                )
            );
     
            $TextRight = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                )
            );

            $Text14 = array(
                'font' => array(
                    'bold' => true,
                    'size' => 14,
                ),
            );
      
            $TextBold = array(
                'font' => array(
                    'bold' => true,
                ),
            );  
      
            $TextRight13 = array(
                'font' => array(
                    'bold' => true,
                    'size' => 13,
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                )
            );
            $TextTopLeft9 = array(
                'font' => array(
                    'size' => 9,
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_TOP,
                )
            );

            $TextTopLeft8 = array(
                'font' => array(
                    'size' => 8,
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_TOP,
                )
            );


            // Rename sheet
            $objPHPExcel->getActiveSheet()->setTitle('Nota');

            $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'REKAPITULASI TRANSAKSI');
            $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($Text14);
            $objPHPExcel->getActiveSheet()->mergeCells('A1:I1');
            $objPHPExcel->getActiveSheet()->mergeCells('A2:I2');
            $objPHPExcel->getActiveSheet()->getStyle('A1:I2')->applyFromArray($styleTextCenter);
            
            $objPHPExcel->getActiveSheet()->SetCellValue('A3', 'ID Res.');
            $objPHPExcel->getActiveSheet()->SetCellValue('B3', 'Room');
            $objPHPExcel->getActiveSheet()->SetCellValue('C3', 'Nama Pelanggan');
            $objPHPExcel->getActiveSheet()->SetCellValue('D3', 'Check In');
            $objPHPExcel->getActiveSheet()->SetCellValue('E3', 'Check Out');
            $objPHPExcel->getActiveSheet()->SetCellValue('F3', 'Panjar');
            $objPHPExcel->getActiveSheet()->SetCellValue('G3', 'Tarif Sewa (T)');
            $objPHPExcel->getActiveSheet()->SetCellValue('H3', 'Pesanan (Ps)');
            $objPHPExcel->getActiveSheet()->SetCellValue('I3', 'Tot (T+Ps)');
      
            $objPHPExcel->getActiveSheet()->getStyle('A3:I3')->applyFromArray($styleTextUnderline);
            $objPHPExcel->getActiveSheet()->getStyle('A3:I3')->applyFromArray($TextBold);
      
            $query = mysql_query('SELECT * FROM reservation r, nota n WHERE r.t_check_in > '.$from.' AND r.t_check_in < '.$to.' AND r.id_reservation=n.id_reservation ORDER BY r.id_reservation DESC');
      
            //ALL RESERVATION      
//            $queryx = mysql_query('SELECT * FROM reservation WHERE t_check_in > '.$from.' AND t_check_in < '.$to.' ORDER BY id_reservation DESC');
            $startFrom = 4;
            while ($row = mysql_fetch_array($query)){
                
                
                $qpesanan = mysql_query('SELECT SUM(harga) AS jpesanan FROM pesanan WHERE id_reservation='.$row['id_reservation']);
                $r = mysql_fetch_array($qpesanan);
                $jpesanan = $r['jpesanan'];        
                $check_in = $row['check_in'];
                $check_out = $row['check_out'];
                $tarif = $row['tarif'];
                $jenisSewa = $row['jenis_sewa'];
                $panjar = $row['panjar'];
                
                        if($jenisSewa=='harian'){
                            $lama = ceil((abs(strtotime ($row['check_in']) - strtotime ($row['check_out'])))/(60*60*24));
                            $tarifSewa = $tarif * $lama;
                            
                        }elseif($jenisSewa=='mingguan'){
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
                            $tarifSewa = $tarif * $jminggu;
                            
                        }else{
                            
                            $checkin = date_create("$check_in");
                            $checkout =  date_create("$check_out");
                            $diff= date_diff($checkin, $checkout);
                            $months = $diff->y * 12 + $diff->m + $diff->d / 30;
                            $jmonth=round($months);
                            $tarifSewa = $tarif * $jmonth;
                            
                        }
                        $tBayar = $tarifSewa + $jpesanan;
                
                
                
                $x = $startFrom++;
                
                
                
            $objPHPExcel->getActiveSheet()->SetCellValue('A3', 'ID Res.');
            $objPHPExcel->getActiveSheet()->SetCellValue('B3', 'Room');
            $objPHPExcel->getActiveSheet()->SetCellValue('C3', 'Nama Pelanggan');
            $objPHPExcel->getActiveSheet()->SetCellValue('D3', 'Check In');
            $objPHPExcel->getActiveSheet()->SetCellValue('E3', 'Check Out');
            $objPHPExcel->getActiveSheet()->SetCellValue('F3', 'Panjar');
            $objPHPExcel->getActiveSheet()->SetCellValue('G3', 'Tarif Sewa (T)');
            $objPHPExcel->getActiveSheet()->SetCellValue('H3', 'Pesanan (Ps)');
            $objPHPExcel->getActiveSheet()->SetCellValue('I3', 'Tot (T+Ps)');
                
                
                
                $objPHPExcel->getActiveSheet()->SetCellValue('A'.$x, $row['id_reservation']);
                $objPHPExcel->getActiveSheet()->SetCellValue('B'.$x, $row['room']);
                $objPHPExcel->getActiveSheet()->SetCellValue('C'.$x, strtoupper($row['name']));
                $objPHPExcel->getActiveSheet()->SetCellValue('D'.$x, tgl_indo($check_in));
                $objPHPExcel->getActiveSheet()->SetCellValue('E'.$x, tgl_indo($check_out));
                $objPHPExcel->getActiveSheet()->SetCellValue('F'.$x, number_format($panjar,0,',','.').".-");
                $objPHPExcel->getActiveSheet()->SetCellValue('G'.$x, number_format($tarifSewa,0,',','.').".-");
                $objPHPExcel->getActiveSheet()->SetCellValue('H'.$x, number_format($jpesanan,0,',','.').".-");
                $objPHPExcel->getActiveSheet()->SetCellValue('I'.$x, number_format($tBayar,0,',','.').".-");
                
                
                    
                $objPHPExcel->getActiveSheet()->getStyle('A'.$x.':'.'E'.$x)->applyFromArray($styleTextCenter);
                $objPHPExcel->getActiveSheet()->getStyle('F'.$x.':'.'H'.$x)->applyFromArray($TextRight);
                $objPHPExcel->getActiveSheet()->getStyle('I'.$x)->applyFromArray($BoldRight);
                $objPHPExcel->getActiveSheet()->getStyle('A'.$x.':'.'I'.$x)->applyFromArray($styleBorder);
            }

            $queryy = mysql_query('SELECT SUM(tbayar) AS tb FROM nota WHERE t_check_in > '.$from.' AND t_check_in < '.$to);
            $rT = mysql_fetch_array($queryy);
      
            $y1 = $startFrom + 1;
            $y2 = $startFrom + 2;
            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$y1, 'Total: '.number_format($rT['tb'],0,',','.').".-");
            $objPHPExcel->getActiveSheet()->getStyle('I'.$y1)->applyFromArray($TextRight);
            $objPHPExcel->getActiveSheet()->getStyle('I'.$y1)->applyFromArray($Text14);
      
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$y1, 'Makassar, '.date('d-M-Y'));
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$y2, 'Reservation');

      
            // Set Orientation, size and scaling
            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
            $objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
            $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
            $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
            $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
            
            $tanggal = date('dmY_His');
            $namafile = 'Rekapitulasi_'.$tanggal.".xlsx";
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            $objWriter->save($namafile);?>
      
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

            <li><a href="custom_print_date.php">Pesanan</a></li>
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
            <div class="container">
                <ol class="breadcrumb">
                  <li><a href="../index.php">Home</a></li>
                  <li class="active">Reservasi Harian</li>
                </ol>
              <div class="col-md-1"></div>
                <div class="col-md-10">

                    <div class="jumbotron">
                      <h1>Rekapitulasi berhasil diekspor!</h1>
                      <p>Klik tombol buka berkas untuk melihat file hasil ekspor.</p>
                      <p><a class="btn btn-primary btn-lg" href="<?php echo $namafile;?>" role="button"> <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;&nbsp;Buka berkas</a></p>
                        
                        
                        
                    </div>
    
                </div>
              <div class="col-md-1"></div>
                
                
                <div class="col-md-12">
                    <hr>
                    Copyright &copy; <?php echo date('Y'); ?> by Manggurebe.<br/>
                    All Rights Reserved.<br/>
                    <?php echo 'Powered by BUQENTO RICHARD.'; ?>
                </div>
                
                
            </div>
      </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
    

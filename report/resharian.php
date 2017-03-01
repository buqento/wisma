<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ekspor Tagihan</title>

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
            $id_res = $_GET['id'];

      
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
     
            $TextRight9 = array(
                'font' => array(
                    'size' => 9,
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                )
            );

            $TextRight14 = array(
                'font' => array(
                    'bold' => true,
                    'size' => 14,
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                )
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
            $TextRight36 = array(
                'font' => array(
                    'bold' => true,
                    'size' => 36,
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                )
            );            $TextTopLeft9 = array(
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
      
            $TextTopRight8 = array(
                'font' => array(
                    'size' => 8,
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_TOP,
                )
            );
      
            $query = "SELECT * FROM reservation WHERE id_reservation=".$id_res;
            $result = mysql_query($query);
            $row = mysql_fetch_array($result);
            $room = $row["room"];
            $name = $row["name"];
            $tarif = $row["tarif"];
            $panjar = $row["panjar"];
            $preference = $row["preference"];
            $check_in = $row["check_in"];
            $check_out = $row["check_out"];
            $jenis_sewa = $row["jenis_sewa"];
      
            if($jenis_sewa == 'harian'){
                $lamaHariSewa = ceil((abs(strtotime ($check_in) - strtotime ($check_out)))/(60*60*24));
                $totTagihan = $lamaHariSewa * $tarif;
                
            }elseif($jenis_sewa == 'mingguan'){
                $detik = 24 * 3600;
                $tgl_awal = strtotime($check_in);
                $tgl_akhir = strtotime($check_out);
                $minggu = 0;
                for ($i=$tgl_awal; $i < $tgl_akhir; $i += $detik){
                    if (date("w", $i) == "0"){
                        $minggu++;
                    }
                }
                $jminggu = $minggu;
                $totTagihan = $tarif * $jminggu;
            
            }else{
                $checkin = date_create("$check_in");
                $checkout =  date_create("$check_out");
                $diff= date_diff($checkin, $checkout);
                $months = $diff->y * 12 + $diff->m + $diff->d / 30;
                $jmonth=round($months);
                $totTagihan = $tarif * $jmonth;
                
            }
      
            // Set properties
            $objPHPExcel->getProperties()->setCreator("Buqento Richard");
            $objPHPExcel->getProperties()->setLastModifiedBy("Buqento Richard");
            $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
            $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
            $objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");
      
            $objPHPExcel->setActiveSheetIndex(0);
            
            $gdImage = imagecreatefromjpeg('yuan_logo.jpg');
            // Add a drawing to the worksheetecho date('H:i:s') . " Add a drawing to the worksheet\n";
            $objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
            $objDrawing->setName('Sample image');$objDrawing->setDescription('Sample image');
            $objDrawing->setImageResource($gdImage);
            $objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
            $objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
            $objDrawing->setHeight(90);
            $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
            $objDrawing->setCoordinates('A1');
    
            
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(5);

            $objPHPExcel->getActiveSheet()->mergeCells('A1:E1');
            $objPHPExcel->getActiveSheet()->mergeCells('A2:E2');
            $objPHPExcel->getActiveSheet()->mergeCells('A3:E3');
            
            $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Wisma Yuan');
            $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Jl. Singa, No. 18 - Makassar');
//            $objPHPExcel->getActiveSheet()->SetCellValue('A3', 'Telp. 0411-333333');

            $objPHPExcel->getActiveSheet()->SetCellValue('A5', 'Nama Pelanggan');

            $objPHPExcel->getActiveSheet()->SetCellValue('A7', 'ID Reservation');
            $objPHPExcel->getActiveSheet()->SetCellValue('A8', 'Tarif Sewa Kamar');
            $objPHPExcel->getActiveSheet()->SetCellValue('A9', 'Uang Panjar');
            
            $objPHPExcel->getActiveSheet()->SetCellValue('D5', 'Room');
            $objPHPExcel->getActiveSheet()->SetCellValue('D7', 'Check In');
            $objPHPExcel->getActiveSheet()->SetCellValue('D8', 'Check Out');
            $objPHPExcel->getActiveSheet()->SetCellValue('D9', 'Preference');

            
            $objPHPExcel->getActiveSheet()->SetCellValue('B5', ': '.strtoupper($name));
            $objPHPExcel->getActiveSheet()->SetCellValue('B7', ': '.$id_res);
            $objPHPExcel->getActiveSheet()->SetCellValue('B8', ': '.number_format($tarif,0,',','.').".-");
            $objPHPExcel->getActiveSheet()->SetCellValue('B9', ': '.number_format($panjar,0,',','.').".-");
            $objPHPExcel->getActiveSheet()->SetCellValue('E5', ': '.$room);
            $objPHPExcel->getActiveSheet()->SetCellValue('E7', ': '.$check_in);
            $objPHPExcel->getActiveSheet()->SetCellValue('E8', ': '.$check_out);
            $objPHPExcel->getActiveSheet()->SetCellValue('E9', ': '.strtoupper($preference));
            


            $objPHPExcel->getActiveSheet()->getStyle('A5:B5')->applyFromArray($styleBorder);
            $objPHPExcel->getActiveSheet()->getStyle('D5:E5')->applyFromArray($styleBorder);
            $objPHPExcel->getActiveSheet()->getStyle('A7:B9')->applyFromArray($styleBorder);
            $objPHPExcel->getActiveSheet()->getStyle('D7:E9')->applyFromArray($styleBorder);

            $objPHPExcel->getActiveSheet()->getStyle('A5:A9')->applyFromArray($BoldRight);
            $objPHPExcel->getActiveSheet()->getStyle('D5:D9')->applyFromArray($BoldRight);
            $objPHPExcel->getActiveSheet()->getStyle('G7')->applyFromArray($BoldRight);
            $objPHPExcel->getActiveSheet()->getStyle('A11:E11')->applyFromArray($BoldRight);
            $objPHPExcel->getActiveSheet()->getStyle('E12:E14')->applyFromArray($TextRight9);

            $objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($TextRight36);
            $objPHPExcel->getActiveSheet()->getStyle('A2:A3')->applyFromArray($TextRight14);

            // Rename sheet
            $objPHPExcel->getActiveSheet()->setTitle('Nota');

            $objPHPExcel->getActiveSheet()->SetCellValue('A11', 'Nama Pesanan');
            $objPHPExcel->getActiveSheet()->SetCellValue('B11', 'Keterangan');
            $objPHPExcel->getActiveSheet()->SetCellValue('E11', 'Harga');
            $query = "SELECT * FROM pesanan WHERE id_reservation=".$id_res;
            $result = mysql_query($query);
            $startFrom = 12;
            while ($row = mysql_fetch_array($result)){
                $x = $startFrom++;
                $objPHPExcel->getActiveSheet()->SetCellValue('A'.$x, '* '.$row['nama_pesanan']);
                $objPHPExcel->getActiveSheet()->SetCellValue('B'.$x, $row['keterangan']);
                $objPHPExcel->getActiveSheet()->SetCellValue('E'.$x, number_format($row['harga'],0,',','.').".-");
                $objPHPExcel->getActiveSheet()->getStyle('E'.$x)->applyFromArray($TextTopRight8);
                $objPHPExcel->getActiveSheet()->getStyle('A'.$x)->getAlignment()->setWrapText(true); 
                $objPHPExcel->getActiveSheet()->getStyle('B'.$x)->getAlignment()->setWrapText(true); 
                $objPHPExcel->getActiveSheet()->getStyle('A'.$x)->applyFromArray($TextTopLeft9);
                $objPHPExcel->getActiveSheet()->getStyle('B'.$x)->applyFromArray($TextTopLeft9);
            }
           
            //HITUNG TOTAL PESANAN
            $cellPesanan = $startFrom;
            $cellTotalPesanan = $startFrom + 1;
            $cellTotal = $startFrom + 3;            
            $q3 = mysql_query("SELECT SUM(harga) AS h FROM pesanan WHERE id_reservation=".$id_res);
            $b = mysql_fetch_array($q3);
            $jHargaPesanan = $b['h'];
      
            $totalBayar = $totTagihan + $jHargaPesanan - $panjar;
      
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$cellTotalPesanan, number_format($jHargaPesanan,0,',','.').".-");
            $objPHPExcel->getActiveSheet()->getStyle('E'.$cellTotalPesanan)->applyFromArray($TextRight13);
      
      
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$cellTotal, 'TOTAL BAYAR');
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$cellTotal, number_format($totalBayar,0,',','.').".-");
            $objPHPExcel->getActiveSheet()->getStyle('D'.$cellTotal.':'.'E'.$cellTotal)->applyFromArray($TextRight13);
                        
            $y1 = $startFrom + 5;
            $y2 = $startFrom + 6;
            $objPHPExcel->getActiveSheet()->mergeCells('D'.$y1.':'.'E'.$y2);
            $objPHPExcel->getActiveSheet()->getStyle('D'.$y1.':'.'E'.$y2)->getAlignment()->setWrapText(true); 
            $objPHPExcel->getActiveSheet()->getStyle('D'.$y1.':'.'E'.$y2)->applyFromArray($styleBorder);
            $objPHPExcel->getActiveSheet()->getStyle('D'.$y1.':'.'E'.$y2)->applyFromArray($TextTopLeft8);

            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$y1, 'Makassar, '.date('d-M-Y'));
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$y2, 'Reservation');
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$y1, 'Terima Kasih atas kunjungannya. Silahkan datang kembali kapan saja. Kami senang melayani anda :)');
      
      
            //SIMPAN KE TABEL NOTA
            $query = mysql_query('REPLACE INTO nota (id_reservation, tbayar, t_check_in) VALUES
            ("'.$id_res.'", "'.$totalBayar.'", "'.strtotime($check_in).'")');      
            if($startFrom > 12){$p=$startFrom;}else{$p=12;}

            // Set column TINGGI
            $objPHPExcel->getSheet(0)->getRowDimension('4')->setRowHeight(5);
            $objPHPExcel->getSheet(0)->getRowDimension('6')->setRowHeight(5);
            $objPHPExcel->getSheet(0)->getRowDimension('10')->setRowHeight(5);           
            $objPHPExcel->getSheet(0)->getRowDimension($p)->setRowHeight(5);


            // Set column LEBAR
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
            
            
            // Set Orientation, size and scaling
            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
            $objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A5);
            $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
            $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
            $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
            
            $tanggal = date('dmY_His');
            $namafile = 'Reservasi_'.$tanggal.".xlsx";
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
                      <h1>Tagihan berhasil diekspor!</h1>
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
    

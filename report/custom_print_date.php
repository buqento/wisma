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
<!--    <link href="css/bootstrap.min.css" rel="stylesheet">-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      
      
    <link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/bootstrap-datepicker3.css"/>
      
      
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
                    <hr>
                    <div class="row">
                      <div class="col-md-3">
                          
                          <form action="view_rekap.php" method="post">
                            
                            <div>
                            </div>
                            <div class="form-group">

                                <div class="form-group">
                                    <label>Dari tanggal</label>
                                    <div class='input-group date' id='datetimepicker1'>
                                        <?php $now = date('Y-m-d');?>
                                    <input type="text" name="date_from" class="form-control" value="<?php echo $now;?>" readonly/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                    </div>
                                    <br>
                                    <label>Sampai tanggal</label>
                                    <div class='input-group date' id='datetimepicker1'>
                                    <input type="text" name="date_to" class="form-control" value="<?php echo $now;?>" readonly/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                    </div>
                                </div>
                                
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;&nbsp;Submit</button>
                        </form>
                    
                          
                        </div>
                      <div class="col-md-9">
                          
                          
                          

                        
                        
                        </div>
                    </div>


                    
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
      

        
        
        

    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('.form-control').datepicker({
                    format: "yyyy-mm-dd",
                    autoclose:true
                }).on('changeDate', function (ev) {
   			 var idnya = this.id; // baca ID masing2 tgl
   			 $("#berubah").html('<font color="red"><b>'+$('#'+idnya).val()+'</b></font>');
		});
            });
        </script>      

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<!--    <script src="js/bootstrap.min.js"></script>-->
  </body>
</html>
    
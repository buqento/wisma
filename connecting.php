<?php
//$server = "localhost";$username = "k1066872_wisma";$password = "k1066872_wisma";$database = "k1066872_wisma";
$server = "localhost";$username = "root";$password = "";$database = "wisma";
$koneksi = mysql_connect($server, $username, $password);
$pilihdb = mysql_select_db($database, $koneksi);
?>
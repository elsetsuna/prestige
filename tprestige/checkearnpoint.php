<?php
$cardidz = $_POST['cardid'];
$invoicenoz = $_POST['invoiceno'];
$amountz = $_POST['amount'];
$epointz = $_POST['epoint'];
//mysql_query("INSERT INTO point_log (card_id,invoice_no,sales_amount,point_get)VALUES ('$cardidz','$invoicenoz','$amountz','$epointz')");
$getpointinfo = mysql_query("SELECT * FROM points WHERE card_id = '$cardidz'");
$pointinfo = mysql_fetch_array($getpointinfo);
$apoint = $pointinfo['a_point'];
$tpoint = $pointinfo['t_point'];
$fapoint = $apoint + $epointz ;
$ftpoint = $tpoint + $epointz ;
//echo ''.$fapoint.'<br>';
//echo ''.$ftpoint.'';
mysql_query("UPDATE points SET t_point='$ftpoint',a_point='$fapoint' WHERE card_id='$cardidz'");
mysql_query("INSERT INTO point_log (card_id,invoice_no,sales_amount,point_get,point_date) VALUES ('$cardidz','$invoicenoz','$amountz','$epointz',CURDATE())"); 
header('Location: http://localhost/taipan/index.php?module=earnpoint');
?>
<?php
echo '
<head>
<style>
input{
  display: inline-block;
  width: 210px;
  height: 30px;
  padding: 4px;
  margin-bottom: 9px;
  font-size: 20px;
  line-height: 18px;
  color: #555555;
  border: 1px solid #cccccc;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
}
</style>
</head>';
include "nav.php";
?>
<?php
  $cardc = $_POST['card'];
  $invoicec = $_POST['invoiceno']  ;
  $amountc = $_POST['amount']  ;
  $getrate=mysql_query("SELECT rates FROM rate");
//$ketemu=mysql_num_rows($login);
$ratte=mysql_fetch_array($getrate);
  $epoint = (round($amountc / $ratte['rates']));
;?>
  <?php
  $checkcard = mysql_query("SELECT * FROM card WHERE card_id= '$cardc' AND status = '1'");
  $checkcardrow = mysql_num_rows($checkcard);
    if ($cardc == ''){
    echo '<div class="container">
<div class="row">
<div class="span6">
          <div class="widget">
                      <div class="widget-header"> 
             <font size="4"><i class="icon-info-sign" style="font-size: 25px"></i>&nbsp; &nbsp;Error !!!</font>
            </div>
            <div class="widget-content">
<font size="3">
Ada 1 atau lebih field yang belum diisi !!!
</font></br></br>
<a class="btn btn-primary" href="?module=earnpoint" role="button"><< Back</a>
            </div>
            </div></div>';
    }
  	elseif ($amountc == ''){
      echo '<div class="container">
<div class="row">
<div class="span6">
          <div class="widget">
                      <div class="widget-header"> 
             <font size="4"><i class="icon-info-sign" style="font-size: 25px"></i>&nbsp; &nbsp;Error !!!</font>
            </div>
            <div class="widget-content">
<font size="3">
Ada 1 atau lebih field yang belum diisi !!!
</font></br></br>
<a class="btn btn-primary" href="?module=earnpoint" role="button"><< Back</a>
            </div>
            </div></div>';
}
          elseif ($invoicec == ''){
      echo '<div class="container">
<div class="row">
<div class="span6">
          <div class="widget">
                      <div class="widget-header"> 
             <font size="4"><i class="icon-info-sign" style="font-size: 25px"></i>&nbsp; &nbsp;Error !!!</font>
            </div>
            <div class="widget-content">
<font size="3">
Ada 1 atau lebih field yang belum diisi !!!
</font></br></br>
<a class="btn btn-primary" href="?module=earnpoint" role="button"><< Back</a>
            </div>
            </div></div>';
    }
        elseif ($checkcardrow == '0') {

echo '<div class="container">
<div class="row">
<div class="span6">
          <div class="widget">
                      <div class="widget-header"> 
             <font size="4"><i class="icon-info-sign" style="font-size: 25px"></i>&nbsp; &nbsp;Error !!!</font>
            </div>
            <div class="widget-content">
<font size="3">
Card not Found or not active yet. !!!
</font></br></br>
<a class="btn btn-primary" href="?module=earnpoint" role="button"><< Back</a>
            </div>
            </div></div>';
    }
    else {

echo '<div class="container">
<div class="row">
<div class="span6">
          <div class="widget">
                      <div class="widget-header"> 
             <font size="4"><i class="icon-info-sign" style="font-size: 25px"></i>&nbsp; &nbsp;Confirm to assign the points to this card ?</font>
            </div>
            <div class="widget-content">
<font size="3">Taipan Prestige Card id : <b>'.$_POST['card'].' </b></br>
Invoice Number : <b>'.$_POST['invoiceno'].'</b></br>
Sales Amount : <b>'.$_POST['amount'].'</b></br>
Point Earned : <b>'.$epoint.'</b></br></font>
<form action="?module=checkearnpoint" method="post">
<input type="hidden" name="cardid" value="'.$cardc.'">
<input type="hidden" name="invoiceno" value="'.$invoicec.'">
<input type="hidden" name="amount" value="'.$amountc.'">
<input type="hidden" name="epoint" value="'.$epoint.'"></br>
<button class="btn btn-primary btn-large" type="submit" name="submit">Submit</button>
</form>
            </div>
            </div></div>';
} 
?>
<?php
include "rightwidget.php";
echo '
</div>
</div>';
?>
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
  font-size: 15px;
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
$cardid = $_POST['card'];
$getallpoint = mysql_query("SELECT * FROM points WHERE card_id = '$cardid'");
$getpointdata = mysql_fetch_array($getallpoint);
echo '
<div class="container">
<div class="row">
<div class="span6">
          <div class="widget">
            <div class="widget-header"> <font size="5" face="calibri"><i class="icon-search" style="font-size: 25px"></i>
               &nbsp;Check Point</font>
            </div>
            <div class="widget-content">
              <font size="3px" face="arial">
              <b> Card Number&nbsp;&nbsp;:&nbsp;</b> <i>'.$cardid.'</i><br>
              <b>Available Points&nbsp;&nbsp;:&nbsp;</b> <i>'.$getpointdata['a_point'].'</i><br>
              <b>Total Earned Points&nbsp;&nbsp;:&nbsp;</b><i>'.$getpointdata['t_point'].'</i><br>
              <b>Used Points&nbsp;&nbsp;:&nbsp;</b><i> '.$getpointdata['u_point'].'</i>
              </font>
        <div class="input-group col-md-4 "><br>
<a class="btn btn-primary" href="?module=checkpoint" role="button">Check Again</a>
</div>
        </p>
                    <!-- /widget-content --> 
          </div></div></div> ';?>
<?php
include "rightwidget.php";
echo '
</div>
</div>';
?>
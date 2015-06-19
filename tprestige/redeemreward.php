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
<SCRIPT language=JavaScript>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='?module=redeemreward&cat=' + val ;
}

</script>
</head>
<?php
  $posted = false;
  if( $_POST['kartu'] ) {
    $posted = true;

    // Database stuff here...
    // $result = mysql_query( ... )
    $ukartu = $_POST['kartu'];
    $ukat = $_POST['kat'];
    $usubkat = $_POST['subkat'];
    $ukuantiti = $_POST['kuantiti'];
    $utotal = $_POST['total'];
    $uapoint = $_POST['apoint'];
    $uupoint = $_POST['upoint'];
    $sisaaktif = $uapoint - $utotal;
    $sisaguna = $uupoint + $utotal;
    mysql_query("UPDATE points SET a_point='$sisaaktif',u_point='$sisaguna' WHERE card_id='$ukartu'");
    mysql_query("INSERT INTO redeem_log (card_id,reward,r_category,quantity,t_point,r_date) VALUES ('$ukartu','$usubkat','$ukat','$ukuantiti','$utotal',now())");
    //$result = $_POST['name'] == "danny"; // Dummy result

  }
?>
  <?php
    if( $posted ) {
      if( $ukartu ) 
        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
      else
        echo "<script type='text/javascript'>alert('failed!')</script>";
    }
  ?>
<?php

  $cat=$_GET['cat'];
$quer2=mysql_query("SELECT * FROM reward_category WHERE status='1'"); 
if(isset($cat)){
      $quer=mysql_query("SELECT * FROM reward where r_category='$cat' "); 
}else{
      $quer=mysql_query("SELECT * FROM reward where status = '1' order by reward");
}

include "nav.php";
if(isset($_POST['card'])){
$cat = $_POST['cat'];
$subcat = $_POST['subcat'];
$quantity = $_POST['qty'];
$card = $_POST['card'];
$pointq = mysql_query("SELECT * FROM reward WHERE reward='$subcat'");
$point = mysql_result($pointq,'0','point_used');
$tot = $quantity * $point;
$apoint = mysql_query("SELECT * FROM points WHERE card_id = '$card'");
$apointz = mysql_result($apoint,'0','a_point');
$upointz = mysql_result($apoint,'0','u_point');
echo '
<div class="container">
<div class="row">
<div class="span6">
          <div class="widget">
            <div class="widget-header"> <font size="5" face="calibri"><i class="icon-search" style="font-size: 25px"></i>
               &nbsp;Redeem Reward</font>
            </div>
            <div class="widget-content" style="font-size:16px;">
            <form action="" method="post">
              Taipan Prestige Card : <b><i> '.$card.' </i></b>
              <br>Rewards : <b><i>'.$subcat.' @ '.$point.'point(s)</i></b>
              <br>Reward Quantity : <b><i>'.$quantity.'</i></b>
              <br>Point Needed : <b><i>'.$tot.'</i></b>
              <br>Point Available : <b><i>'.$apointz.'</i></b><br><br>
              <input type="hidden" class="form-control" id="kartu" name="kartu" value="'.$card.'"></input>
              <input type="hidden" class="form-control" id="kat" name="kat" value="'.$cat.'"></input>
              <input type="hidden" class="form-control" id="subkat" name="subkat" value="'.$subcat.'"></input>
              <input type="hidden" class="form-control" id="kuantiti" name="kuantiti" value="'.$quantity.'"></input>
              <input type="hidden" class="form-control" id="total" name="total" value="'.$tot.'"></input>
              <input type="hidden" class="form-control" id="apoint" name="apoint" value="'.$apointz.'"></input>
              <input type="hidden" class="form-control" id="upoint" name="upoint" value="'.$upointz.'"></input>
              ';
if ($apointz < $tot){
  echo '<br></form>Point Available : <font color="Red"><b><i>'.$apointz.'</i></b></font><br><br>';
  echo '<font size="3" color="Red">Anda tidak memiliki cukup Point untuk menukar reward ini.</font><br><br>';
  echo '<a class="btn btn-danger btn-large" href="?module=redeemreward" role="button">Go Back</a>';
} else {
  echo '<button class="btn btn-primary btn-large" type="submit" name="submit">Redeem</button></form>';
}

              ?>
<?php
echo '<!-- /widget-content --> 
          </div></div></div>';
} else {
    echo '
<div class="container">
<div class="row">
<div class="span6">
<div class="widget">
            <div class="widget-header"><i class="icon-gift"></i>
              <h3>Redeem Reward</h3>
            </div>
            <div class="widget-content">
<form method="post" name="f1" action="">';
echo "1. Please Select Reward Category<Br><select name='cat' onchange=\"reload(this.form)\">
      <option value=''>Select Reward Category</option>";
$rowcat = mysql_num_rows($quer2);
for ($rc=0;$rc<$rowcat;$rc++){
  $getnamecat = mysql_result($quer2,$rc,'r_category');
if($getnamecat==$cat){
  echo '<option selected value="'.$getnamecat.'" >'.$getnamecat.'</option><BR>';
}
else{
  echo  '<option value="'.$getnamecat.'" >'.$getnamecat.'</option>';}
}
  echo "</select><br>";
  echo "2. Please Select Reward<br><select name='subcat'><option value=''>Select Reward</option>";
$rowsubcat = mysql_num_rows($quer);
for ($sc=0;$sc<$rowsubcat;$sc++){
  $getsubcat = mysql_result($quer,$sc,'reward');
  $getsubcatp = mysql_result($quer,$sc,'point_used');
echo  '<option value="'.$getsubcat.'">'.$getsubcat.' &nbsp;('.$getsubcatp.'points)</option>';
}
echo '</select><br>3. Please input reward quantity<br>
      <input type="text" class="form-control" id="qty" name="qty" required></input><br>
      4. Please Scan Your Card or Input Card id<br>
      <input type="text" class="form-control" id="card" name="card" required></input><br>
      <button class="btn btn-primary btn-large" type="submit" name="submit">Confirm</button>
</form>';
echo '</div></div></div>';
}

?>
<?php
include "rightwidget.php";
echo '
</div>
</div>';
?>
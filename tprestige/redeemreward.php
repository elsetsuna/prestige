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
var car=form.cat.options[form.cat.options.selectedIndex].id;
self.location='?module=redeemreward&cat=' + val + '&card=' + car ;
}

</script>
</head>
<?php

  $cat=$_GET['cat'];
  $carid = $_GET['card'];
  $cardid=$_POST['cardid'];
$quer2=mysql_query("SELECT * FROM reward_category WHERE status='1'"); 

if(isset($cat)){
      $quer=mysql_query("SELECT * FROM reward where r_category='$cat' "); 
}else{
      $quer=mysql_query("SELECT * FROM reward where status = '1' order by reward");
}

include "nav.php";
//echo ''.$cat.'';
if($cardid != 0 or $carid !=0)

{
echo '
<div class="container">
<div class="row">
<div class="span6">
<div class="widget">
            <div class="widget-header"><i class="icon-gift"></i>
              <h3>Redeem Reward</h3>
            </div>
            <div class="widget-content">
<form method="post" name="f1" action="?module=redeem">';
echo "1. Please Select Reward Category<Br><select name='cat' onchange=\"reload(this.form)\">
      <option value=''>Select Reward Category</option>";
$rowcat = mysql_num_rows($quer2);
for ($rc=0;$rc<$rowcat;$rc++){
  $getnamecat = mysql_result($quer2,$rc,'r_category');
if($getnamecat==$cat){
  echo '<option selected value="'.$getnamecat.'" >'.$getnamecat.'</option><BR>';
}
else{
  echo  '<option value="'.$getnamecat.'" id="'.$cardid.'">'.$getnamecat.'</option>';}
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
      <input type="hidden" id="card" name="card" value="'.$carid.'"></input>
      <input type="text" class="form-control" id="qty" name="qty"></input><br>
      <button class="btn btn-primary btn-large" type="submit" name="submit">Redeem</button>
</form>';
echo '</div></div></div>';
}else{
echo '
<div class="container">
<div class="row">
<div class="span6">
          <div class="widget">
            <div class="widget-header"> <font size="5" face="calibri"><i class="icon-search" style="font-size: 25px"></i>
               &nbsp;Redeem Reward</font>
            </div>
            <div class="widget-content">

        <div class="input-group col-md-4 ">
  <form action="" method="post">
<span><font size="3">Please Scan or Input Card number.</font></span><br>
<input type="text" class="form-control span5" aria-label="Card id" id="cardid" name="cardid">
</div>
<button class="btn btn-primary btn-large" type="submit" name="submit">Submit</button>
</form>
        </p>
                    <!-- /widget-content --> 
          </div></div></div> ';
}
?>

<?php
include "rightwidget.php";
echo '
</div>
</div>';
?>
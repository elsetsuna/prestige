<?php
if(isset($_POST['deleteItem']))
{
  $delitem = $_POST['deleteItem'];
  //mysql_query("UPDATE reward_category SET status='0' where r_category='$delitem'");
  //mysql_query("DELETE FROM signon WHERE no='$delitem'");
  //echo ''.$delitem.'';
  mysql_query("UPDATE signon SET bonus_status='1',claim_date=curdate() WHERE no='$delitem'");
}
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
echo '
<div class="container">
<div class="row">
<div class="span4">
          <div class="widget">
            <div class="widget-header"> <font size="5" face="calibri"><i class="icon-search" style="font-size: 25px"></i>
               &nbsp;Sign-on Bonus</font>
            </div>
            <div class="widget-content">

        <div class="input-group col-md-4 ">
  <form action="" method="post">
<span><font size="3">Please Scan or Input Card number.</font></span><br>
<input type="text" class="form-control span3" aria-label="Card id" id="card" name="card">
</div>
<button class="btn btn-primary btn-large" type="submit" name="submit">Submit</button>
</form>
        </p>
                    <!-- /widget-content --> 
          </div></div></div> 
          <div class="span8">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Taipan Prestige Card No : <i>'.$_POST['card'].'</i></h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-bordered">
              <tr>
              <th style="text-align: center;">No.</th>
              <th style="text-align: center;">Reward</th>
              <th style="text-align: center;">Claimed Date</th>
              <th style="text-align: center;">Status</th>
              <th style="text-align: center;">&nbsp;</th>
              </tr>';
$cardid = $_POST['card'];
$countbonus = mysql_query("SELECT * FROM signon WHERE card_id ='$cardid'");
$rowbonus = mysql_num_rows($countbonus);
for ($c=0;$c<$rowbonus;$c++){
     while($x<=$c){
      $x++;
    }
  $idno = mysql_result($countbonus,$c,'no');
  $cardid = mysql_result($countbonus,$c, 'card_id');
  $signreward = mysql_result($countbonus,$c, 'reward');
  $signclaim = mysql_result($countbonus,$c, 'claim_date');
  $signstat = mysql_result($countbonus,$c, 'bonus_status');
  echo " 
            <tr>  
 <Td>$x</td>
  <Td>$signreward</td>
   <Td>$signclaim</td>
    <Td>";
    if ($signstat ==1){
      echo 'Claimed';
    } else {
      echo 'UnClaimed';
    }
    echo '
    </td>
        <td width="50"><form action="" method="post" style="margin: -15px 0px -15px 0px;">
      <input type="hidden" name="deleteItem" id="deleteItem" value="'.$idno.'" />
      <input type="hidden" name="card" id="card" value="'.$cardid.'" />';
    if ($signstat ==1){
      echo '<button class="btn btn-danger btn-xs" disabled="disabled">Claim</button></form></td>';
    } else {
      echo '<button class="btn btn-danger btn-xs" type="submit" name="submit">Claim</button></form></td>';
    }
  }
echo '
          </tr>  
              </table>
            <!-- /widget-content --> 
          </div>
                
              </div>
            </div>
          </div>
          <!-- /widget -->
         
        </div>
        <!-- /span6 -->
</div>
</div>';
?>
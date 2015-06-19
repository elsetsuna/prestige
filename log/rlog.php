<?php
//echo "udah di file srate.php";
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
<div class="row">';
echo '
      <div class="span10">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Reedeem Log</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
<table id="myTable" class="table table-striped">  
        <thead>  
          <tr  height="3">  
            <th width="25" class="dt-center">No.</th>  
            <th class="dt-center">Card Id</th>  
            <th class="dt-center">Reward</th>  
            <th class="dt-center">Category</th>
            <th class="dt-center">Quantity</th>  
            <th class="dt-center">Total Point</th>  
            <th class="dt-center">Redeem Date</th>
          </tr>  
        </thead>  
        <tbody>';
$countcat=mysql_query("SELECT * FROM redeem_log");
$countcatrow=mysql_num_rows($countcat);
for ($c=0;$c<$countcatrow;$c++){
    while($x<=$c){
      $x++;
    }
$cardz = mysql_result($countcat, $c,'card_id');
$rewardz = mysql_result($countcat, $c,'reward');
$r_categoryz = mysql_result($countcat, $c,'r_category');
$quantityz = mysql_result($countcat, $c,'quantity');
$t_pointz = mysql_result($countcat, $c,'t_point');
$r_datez = mysql_result($countcat, $c,'r_date');
	echo " 
	          <tr>  
 <Td class='dt-center'>$x</td>
  <Td class='dt-center'>$cardz</td>
   <Td class='dt-center'>$rewardz</td>
   <Td class='dt-center'>$r_categoryz</td>
  <Td class='dt-center'>$quantityz</td>
   <Td class='dt-center'>$t_pointz</td>
   <Td class='dt-center'>$r_datez</td>";
 }
echo '   
        </tbody>  
      </table> 
      </div>
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 --> 
              </div></div>';
?>

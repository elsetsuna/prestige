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
              <h3>Point Log</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
<table id="myTable" class="table table-striped">  
        <thead>  
          <tr  height="3">  
            <th width="25" class="dt-center">No.</th>  
            <th class="dt-center">Card Id</th>  
            <th class="dt-center">Invoice No</th>  
            <th class="dt-center">Sales Amount</th>
            <th class="dt-center">Point Earned</th>  
            <th class="dt-center">Log Date</th>  
          </tr>  
        </thead>  
        <tbody>';
$countcat=mysql_query("SELECT * FROM point_log");
$countcatrow=mysql_num_rows($countcat);
for ($c=0;$c<$countcatrow;$c++){
    while($x<=$c){
      $x++;
    }
$cardz = mysql_result($countcat, $c,'card_id');
$invoicez = mysql_result($countcat, $c,'invoice_no');
$salesz = mysql_result($countcat, $c,'sales_amount');
$pointz = mysql_result($countcat, $c,'point_get');
$datez = mysql_result($countcat, $c,'point_date');
	echo " 
	          <tr>  
 <Td class='dt-center'>$x</td>
  <Td class='dt-center'>$cardz</td>
   <Td class='dt-center'>$invoicez</td>
   <Td class='dt-center'>$salesz</td>
  <Td class='dt-center'>$pointz</td>
   <Td class='dt-center'>$datez</td>";
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

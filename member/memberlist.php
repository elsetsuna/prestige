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
      <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Member Summary</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
<table id="myTable" class="table table-striped">  
        <thead>  
          <tr  height="3">  
            <th width="25" class="dt-center">No.</th>  
            <th class="dt-center">First Name</th>  
            <th class="dt-center">Last Name</th>  
            <th class="dt-center">Card No.</th>
            <th class="dt-center">Date of Birth</th>  
            <th class="dt-center">Phone</th>
            <th class="dt-center">BBM Pin</th>  
            <th class="dt-center">Email</th>
            <th width="5"></th>
          </tr>  
        </thead>  
        <tbody>';
$countcat=mysql_query("SELECT * FROM member");
$countcatrow=mysql_num_rows($countcat);
for ($c=0;$c<$countcatrow;$c++){
    while($x<=$c){
      $x++;
    }
$noid = mysql_result($countcat, $c,'m_no');
$fname = mysql_result($countcat, $c,'m_fname');
$lname = mysql_result($countcat, $c,'m_lname');
$card = mysql_result($countcat, $c,'card_id');
$dob = mysql_result($countcat, $c,'m_dob');
$phone = mysql_result($countcat, $c,'m_phone');
$pin = mysql_result($countcat, $c,'m_pin');
$email = mysql_result($countcat, $c,'m_email');
	echo " 
	          <tr>  
 <Td class='dt-center'>$x</td>
  <Td class='dt-center'>$fname</td>
   <Td class='dt-center'>$lname</td>
   <Td class='dt-center'>$card</td>
   <Td class='dt-center'>$dob</td>
     <Td class='dt-center'>$phone</td>
   <Td class='dt-center'>$pin</td>
   <Td class='dt-center'>$email</td>";
 
echo '       <td class="dt-center">
<form action="?module=profilemember" method="post" style="margin: -15px 0px -15px 0px;">
<input type="hidden" name="noid" id="noid" value="'.$noid.'"></input>
    <button class="btn btn-success " type="submit" name="submit">
    <span style="font-size:1.5em;" class="icon-user"></span></button></form></td>';}
    echo '
    </tr>
        </tbody>  
      </table> 
      </div>
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 --> 
  </div>
    </div> ';
?>

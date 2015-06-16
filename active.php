<?php
  $posted = false;
  $kosong = false;
  if ($_POST['name'] == ''){
$kosong = true;
  } elseif( $_POST ) {
    $posted = true;

    // Database stuff here...
    // $result = mysql_query( ... )
    $cardid = $_POST['name'];
    $signon = $_POST['signon'];
    $countrow=mysql_query("SELECT * FROM card WHERE card_id='$cardid'");
    $checkrow = mysql_fetch_row($countrow);
    if(empty($checkrow))
{
  if ($signon == "1"){
    $signq = mysql_query("SELECT * FROM signon_reward WHERE status='1'");
    $signonrow = mysql_num_rows($signq);
    for ($s=0;$s<$signonrow;$s++){
      $sreward = mysql_result($signq,$s,'reward');
     mysql_query("INSERT INTO signon (card_id,reward,bonus_status,claim_date)VALUES ('$cardid','$sreward','0','0')");
    }
      mysql_query("INSERT INTO card (card_id,status,signon_bonus)VALUES ('$cardid','1','$signon')");
      mysql_query("INSERT INTO points (card_id,t_point,a_point,u_point)VALUES ('$cardid','0','0','0')");
  }else {

      mysql_query("INSERT INTO card (card_id,status,signon_bonus)VALUES ('$cardid','1','$signon')");
      mysql_query("INSERT INTO points (card_id,t_point,a_point,u_point)VALUES ('$cardid','0','0','0')");
  }

}

  }
?>
  <?php
    if( $posted ) {
      if( $kosong) {
        echo "<script type='text/javascript'>alert('Harap nomor kartu diisi atau di scan')</script>";
      }
      elseif ($checkrow ==""){
        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";

      }else {
         echo "<script type='text/javascript'>alert('failed! or The card is active already!')</script>";
      }
    }
  ?>
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
<div class="row">
<div class="span4">
<div class="bg-warning col-md-3 col-md-offset-1 ">
<div class="widget-header"><i class="icon-bookmark"></i>
        <h3>Create Card</h3>
</div>
<div class="widget-content">
        <p>Input / Scan Card iD</p>
        <div class="input-group col-md-4 ">
  
  <form action="" method="post">
  <font size="2">all created card are active by default</font>
  <input type="text" class="form-control" aria-label="Card id" id="name" name="name"><br>
<input type="checkbox" id="signon" name="signon" value="1"> <b>Will this card get Signon Bonus</b></input>
<br>
</div>
<button class="btn btn-primary btn-large" type="submit" name="submit">Create</button>
</form>
        </p>
      </div>
</div>
      </div>
      <div class="span8">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Card List</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
<table id="myTable" class="table table-striped">  
        <thead>  
          <tr>  
            <th>No.</th>  
            <th>Card id</th>  
            <th>Card Owner</th>  
            <th>Status</th>  
          </tr>  
        </thead>  
        <tbody>';
$countcard=mysql_query("SELECT * FROM card WHERE status='1'");
$countcardrow=mysql_num_rows($countcard);
$no = "1";
for ($c=0;$c<$countcardrow;$c++){
    while($x<=$c){
      $x++;
    }
  $idno = mysql_result($countcard,$c, 'id');
  $cardid = mysql_result($countcard,$c, 'card_id');
  $cardowner = mysql_result($countcard,$c, 'card_owner');
  $cardstat = mysql_result($countcard,$c, 'status');
	echo " 
	          <tr>  
 <Td>$x</td>
  <Td>$cardid</td>
   <Td>$cardowner</td>
    <Td>";
    if ($cardstat ==1){
    	echo 'Aktif';
    } 
    echo "
    </td>
          </tr>  ";
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

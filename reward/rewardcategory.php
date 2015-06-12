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
    $countrow=mysql_query("SELECT * FROM card WHERE card_id='$cardid'");
    $checkrow = mysql_fetch_row($countrow);
    if(empty($checkrow))
{
      mysql_query("INSERT INTO card (card_id,status)VALUES ('$cardid','1')");
      mysql_query("INSERT INTO points (card_id,t_point,a_point,u_point)VALUES ('$cardid','0','0','0')");
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
<div class="span5">
<div class="bg-warning col-md-3 col-md-offset-1 ">
        <h1>Create Card</h1>
        <p>Input / Scan Card iD</p>
        <div class="input-group col-md-4 ">
  
  <form action="" method="post">
  <input type="text" class="form-control" aria-label="Card id" id="name" name="name">
  <br><font size="2">all created card are active by default</font>
</div>
<button class="btn btn-primary btn-large" type="submit" name="submit">Create</button>
</form>
        </p>
      </div>

      </div>
      <div class="span7">
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

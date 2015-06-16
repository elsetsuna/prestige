<?php
if(isset($_POST['deleteItem']))
{
	$delitem = $_POST['deleteItem'];
  //mysql_query("UPDATE reward_category SET status='0' where r_category='$delitem'");
	mysql_query("DELETE FROM signon_reward WHERE reward='$delitem'");
}
  $posted = false;
  $kosong = false;
  if ($_POST['name'] == ''){
$kosong = true;
  } elseif( $_POST ) {
    $posted = true;

    // Database stuff here...
    // $result = mysql_query( ... )
    $sign_name = $_POST['name'];
    $sign_point = $_POST['point'];
    $sign_remarks = $_POST['remarks'];
    $countrow=mysql_query("SELECT * FROM signon_reward WHERE reward='$sign_name' and status='1'");
    $checkrow = mysql_fetch_row($countrow);
    if(empty($checkrow))
{
      mysql_query("INSERT INTO signon_reward (reward,point_used,remarks,status)VALUES ('$sign_name','$sign_point','$sign_remarks','1')");
}

  }
?>
  <?php
    if( $posted ) {
      if( $kosong) {
        echo "<script type='text/javascript'>alert('Harap diisi nama category yg diinginkan')</script>";
      }
      elseif ($checkrow ==""){
        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";

      }else {
         echo "<script type='text/javascript'>alert('failed! or category dengan nama yg sama telah ada!')</script>";
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
  width: 300px;
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
textarea {
  width: 300px;
}
</style>
</head>';
include "nav.php";
echo '
<div class="container">
<div class="row">
<div class="span4">
          <div class="widget">
            <div class="widget-header"> <i class="icon-th-list"></i>
               <h3>Add Signon Reward</h3>
            </div>
            <div class="widget-content">
        Input reward name here
        <div class="input-group col-md-4 ">
  
  <form action="" method="post">
  <input type="text" class="form-control" aria-label="Card id" id="name" name="name"><br>
  Input How many points this reward cost
  <input type="text" class="form-control" aria-label="point" id="point" name="point"><br>
  Remarks<br>
  <textarea class="form-control" rows="3" id="remarks" name="remarks"></textarea><br>
<button class="btn btn-primary btn-large" type="submit" name="submit">Create</button>
</form>
</div>
        </p>
      </div>
</div>
      </div>
      <div class="span8">
<table class="table table-bordered table-hover">  
        <thead>  
          <tr  height="3">  
            <th width="25">No.</th>  
            <th>Signon Reward</th>  
            <th>Point Used</th>  
            <th>Remarks</th>
            <th width="5"></th>
          </tr>  
        </thead>  
        <tbody>';
$countrsign=mysql_query("SELECT * FROM signon_reward WHERE status='1'");
$countrsignrow=mysql_num_rows($countrsign);
$no = "1";
for ($c=0;$c<$countrsignrow;$c++){
    while($x<=$c){
      $x++;
    }
  $rewname = mysql_result($countrsign,$c, 'reward');
  $rewpoint = mysql_result($countrsign,$c, 'point_used');
  $rewmarks = mysql_result($countrsign,$c,'remarks');
	echo '
	          <tr bgcolor="white">  
 <Td>'.$x.'</td>
  <Td>'.$rewname.'</td>
   <Td>'.$rewpoint.'</td>
    <Td>'.$rewmarks.'</td>
    <td><form action="" method="post" style="margin: -15px 0px -15px 0px;">
    	<input type="hidden" name="deleteItem" id="deleteItem" value="'.$rewname.'" />
<button class="btn btn-danger btn-xs" type="submit" name="submit">x</button>
    </form>
    </td>
          </tr>  ';
}
echo '   
        </tbody>  
      </table> 
      </div>
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 --> 
              ';
?>

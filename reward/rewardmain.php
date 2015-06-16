<?php
if(isset($_POST['deleteItem']))
{
	$delitem = $_POST['deleteItem'];
  //mysql_query("UPDATE reward_category SET status='0' where r_category='$delitem'");
	mysql_query("DELETE FROM reward_category WHERE r_category='$delitem'");
}
  $posted = false;
  $kosong = false;
  if ($_POST['name'] == ''){
$kosong = true;
  } elseif( $_POST ) {
    $posted = true;

    // Database stuff here...
    // $result = mysql_query( ... )
    $rew_name = $_POST['name'];
    $cat_name = $_POST['cat'];
    $point = $_POST['point'];
    $remarks = $_POST['remarks'];
    $countrow=mysql_query("SELECT * FROM reward WHERE reward='$rew_name' and status='1'");
    $checkrow = mysql_fetch_row($countrow);
    if(empty($checkrow))
{
      mysql_query("INSERT INTO reward (reward,r_category,point_used,remarks,status,create_time,last_update)VALUES ('$rew_name','$cat_name','$point','$remarks','1',curdate(),curdate())");
}

  }
?>
  <?php
    if( $posted ) {
      if( $kosong) {
        echo "<script type='text/javascript'>alert('Harap diisi form yang kosong')</script>";
      }
      elseif ($checkrow ==""){
        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";

      }else {
         echo "<script type='text/javascript'>alert('failed! or reward dengan nama yg sama telah ada!')</script>";
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
table.dataTable tbody td{padding:1px 1px}
</style>
</head>';
include "nav.php";
echo '
<div class="container">
<div class="row">
<div class="span3">
<div class="widget">
            <div class="widget-header"><i class="icon-gift"></i>
              <h3>Add Reward</h3>
            </div>
            <div class="widget-content">
  <form action="" method="post">
  Reward Category
  <select name="cat">
  '; ?>
  <?php
    $getcat = mysql_query("SELECT * FROM reward_category WHERE status='1'");
    $rowcat = mysql_num_rows($getcat);
    for ($cat=0;$cat<$rowcat;$cat++){
     $getnamecat = mysql_result($getcat,$cat, 'r_category'); 
       echo '<option value="'.$getnamecat.'">'.$getnamecat.'</option>';
    }
  echo '
     </select><br>
     Reward Name
  <input type="text" class="form-control" aria-label="Card id" id="name" name="name">
  Point needed
  <input type="text" class="form-control" aria-label="point" id="point" name="point">
  Remarks
   <textarea class="form-control" rows="5" id="remarks" name="remarks"></textarea>
  <button class="btn btn-primary btn-large" type="submit" name="submit">Create</button>
</form>
</div>
        </p>
      </div>
      </div>
      <div class="span9">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Reward Summary</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
<table id="myTable" class="table table-striped">  
        <thead>  
          <tr  height="3">  
            <th class="dt-center" >No.</th>  
            <th class="dt-center">Reward</th>  
            <th class="dt-center">Reward Category</th>  
            <th class="dt-center">Point</th>
            <th class="dt-center">Remarks</th>
            <th class="dt-center">Create Time</th>
            <th class="dt-center">Last Update</th>
            <th width="5"></th>
          </tr>  
        </thead>  
        <tbody>';
$countrew=mysql_query("SELECT * FROM reward WHERE status='1'");
$countrewrow=mysql_num_rows($countrew);
$no = "1";
for ($c=0;$c<$countrewrow;$c++){
    while($x<=$c){
      $x++;
    }
  $rewname = mysql_result($countrew,$c, 'reward');
  $rewcat = mysql_result($countrew,$c, 'r_category');
  $rewpoint = mysql_result($countrew,$c, 'point_used');
  $rewremarks = mysql_result($countrew,$c,'remarks');
  $rewcreate = mysql_result($countrew,$c,'create_time');
  $rewupdate = mysql_result($countrew,$c,'last_update');
	echo " 
	          <tr>  
 <Td class='dt-center'>$x</td>
  <Td class='dt-center'>$rewname</td>
   <Td class='dt-center'>$rewcat</td>
      <Td class='dt-center'>$rewpoint</td>
         <Td class='dt-center'>$rewremarks</td>
            <Td class='dt-center'>$rewcreate</td>
               <Td class='dt-center'>$rewupdate</td>";
    echo '
    <td class="dt-center"><form action="" method="post" style="margin: -15px 0px -15px 0px;">
    	<input type="hidden" name="deleteItem" id="deleteItem" value="'.$catname.'" />
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
              </div></div>';
?>

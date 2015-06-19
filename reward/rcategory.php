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
    $cat_name = $_POST['name'];
    $countrow=mysql_query("SELECT * FROM reward_category WHERE r_category='$cat_name' and status='1'");
    $checkrow = mysql_fetch_row($countrow);
    if(empty($checkrow))
{
      mysql_query("INSERT INTO reward_category (r_category,status,create_time)VALUES ('$cat_name','1',curdate())");
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
          <div class="widget">
            <div class="widget-header"> <i class="icon-th-list"></i>
               <h3>Add Reward Category</h3>
            </div>
            <div class="widget-content">
        <p>Input reward category name</p>
        <div class="input-group col-md-4 ">
  
  <form action="" method="post">
  <input type="text" class="form-control" aria-label="Card id" id="name" name="name" required><br>
<button class="btn btn-primary btn-large" type="submit" name="submit">Create</button>
</form>
</div>
        </p>
      </div>
</div>
      </div>
      <div class="span7">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Reward Category Summary</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
<table id="myTable" class="table table-striped">  
        <thead>  
          <tr  height="3">  
            <th width="25" class="dt-center">No.</th>  
            <th class="dt-center">Reward Category</th>  
            <th class="dt-center">Created Time</th>  
            <th class="dt-center">Status</th>
            <th width="5"></th>
          </tr>  
        </thead>  
        <tbody>';
$countcat=mysql_query("SELECT * FROM reward_category WHERE status='1'");
$countcatrow=mysql_num_rows($countcat);
$no = "1";
for ($c=0;$c<$countcatrow;$c++){
    while($x<=$c){
      $x++;
    }
  $catname = mysql_result($countcat,$c, 'r_category');
  $catcreate = mysql_result($countcat,$c, 'create_time');
  $catstat = mysql_result($countcat,$c, 'status');
	echo " 
	          <tr>  
 <Td class='dt-center'>$x</td>
  <Td class='dt-center'>$catname</td>
   <Td class='dt-center'>$catcreate</td>
    <Td class='dt-center'>";
    if ($catstat ==1){
    	echo 'Aktif';
    } 
    echo '
    </td>
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

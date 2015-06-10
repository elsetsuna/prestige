<?php
  $posted = false;
  if( $_POST ) {
    $posted = true;

    // Database stuff here...
    // $result = mysql_query( ... )
    $ratenew = $_POST['name'];
    mysql_query("UPDATE rate SET rates='$ratenew'");
    //$result = $_POST['name'] == "danny"; // Dummy result

  }
?>
  <?php
    if( $posted ) {
      if( $ratenew ) 
        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
      else
        echo "<script type='text/javascript'>alert('failed!')</script>";
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
  font-size: 20px;
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

echo '<div class="container">     
<div class="bg-warning col-md-10 col-md-offset-1 ">
        <h1>Set Rate</h1>
        <p>Spending Amount per Point.</p>
        <div class="input-group col-md-4 ">
  
  <form action="" method="post">
  <span class="input-group-addon"><font size="5">Rp</font></span>
  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="name" name="name">
</div>
<button class="btn btn-primary btn-large" type="submit" name="submit">Submit</button>
</form>
        </p>
      </div>
      </div>';
?>

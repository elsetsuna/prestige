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
<?php
  $posted = false;
  if( $_POST['newcard']) {
    $posted = true;

    // Database stuff here...
    // $result = mysql_query( ... )
    //$ratenew = $_POST['name'];
   
    $newcard = $_POST['newcard'];
    $oldcard = $_POST['oldcard'];
     $nomor = $_POST['nomor'];
$aa = mysql_query("SELECT * FROM member WHERE m_no='$nomor'");
$ab = mysql_result($aa,0,'m_fname');
$ac = mysql_result($aa,0,'m_lname');
$cc = $ab . ' ' . $ac;
    mysql_query("UPDATE card SET card_owner='$cc' WHERE card_id='$newcard'");
    mysql_query("UPDATE card SET card_owner='' WHERE card_id='$oldcard'");
    mysql_query("UPDATE member SET card_id='$newcard' WHERE m_no='$nomor'");
    //$result = $_POST['name'] == "danny"; // Dummy result

  }
?>
  <?php
    if( $posted ) {
      if( $newcard ) 
        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
      else
        echo "<script type='text/javascript'>alert('failed!')</script>";
    }
  ?>
  <?php
  $noid = $_POST['nomor'];
  $getdata = mysql_query("SELECT * FROM member WHERE m_no='$noid'");
  $first = mysql_result($getdata,0,'m_fname');
  $last = mysql_result($getdata,0,'m_lname');
  $oldcard = mysql_result($getdata,0,'card_id');
  $space = ' ';
  $nama = $first . $space . $last;
echo '
</head>';
include "nav.php";
echo '
<div class="container">
<div class="row">
<div class="span6">
          <div class="widget">
            <div class="widget-header"> <i class="icon-credit-card"></i>
               <h3>&nbsp;Assign New Card</h3>
            </div>
            <div class="widget-content">

        <div class="input-group">
        <font size="3">Assign new card to <b>'.$nama.' </font></b><br>
  <form action="" method="post">
<span><font size="3"><br>Please Scan or input card id</font></span><br>
<input type="hidden" id="oldcard" name="oldcard" value='.$oldcard.'></input>
<input type="hidden" id="namaz" name="namaz" value='.$nama.'></input>
<input type="hidden" id="nomor" name="nomor" value='.$noid.'></input>
<input type="text" class="form-control" id="newcard" name="newcard" required></input><br>
<button class="btn btn-primary btn-large" type="submit" name="submit">Assign</button>
</form>
        </p>
                    <!-- /widget-content --> 
          </div></div></div> ';
?>
<?php
//include "rightwidget.php";
echo '
</div>
</div>';
?>
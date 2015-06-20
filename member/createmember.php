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
  if( $_POST ) {
    $posted = true;

    // Database stuff here...
    // $result = mysql_query( ... )
    //$ratenew = $_POST['name'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $ident = $_POST['ident'];
    $id_no = $_POST['id_no'];
    $add = $_POST['add'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $date = $_POST['date'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $phone = $_POST['phone'];
    $pin = $_POST['pin'];
    $email = $_POST['email'];
    $card_id = $_POST['card'];
    $space = ' ';
    $fullname = $fname . $space . $lname;
    $sep = '-';
    $dob = $date . $sep . $month . $sep . $year;
    mysql_query("INSERT INTO member (m_fname,m_lname,m_idtype,m_idno,m_address,m_city,m_zip,m_dob,m_phone,m_pin,m_email,card_id) VALUES ('$fname','$lname','$ident','$id_no','$add','$city','$zip','$dob','$phone','$pin','$email','$card_id')");
    mysql_query("UPDATE card SET card_owner='$fullname' WHERE card_id='$card_id'");
    //$result = $_POST['name'] == "danny"; // Dummy result

  }
?>
  <?php
    if( $posted ) {
      if( $fname ) 
        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
      else
        echo "<script type='text/javascript'>alert('failed!')</script>";
    }
  ?>
  <?php
echo '
</head>';
include "nav.php";
echo '
<div class="container">
<div class="row">
<div class="span6">
          <div class="widget">
            <div class="widget-header"> <font size="5" face="calibri"><i class="icon-search" style="font-size: 25px"></i>
               &nbsp;Create Member</font>
            </div>
            <div class="widget-content">

        <div class="input-group">
  <form action="" method="post">
<span><font size="3">1. First Name</font></span><br>
<input type="text" class="form-control" id="fname" name="fname" required><br>
<span><font size="3">2. Last Name</font></span><br>
<input type="text" class="form-control" id="lname" name="lname" required><br>
<span><font size="3">3. Identity Number</font></span><br>
<select name="ident" class="span1">
<option value="ktp">ktp</option>
<option value="sim">sim</option>
<option value="other">other</option>
</select>
<input type="text" class="form-control" id="id_no" name="id_no" required><br>
<span><font size="3">4.Date of Birth</font></span><br>
<select name="date" class="span1"><option value="">Date</option>';
for ($d=1;$d<=31;$d++){
	echo '<option value="'.$d.'">'.$d.'</option>';
}
echo '	</select><select name="month" class="span2">
				<option value="">Month</option>
				<option value="January">January</option>
				<option value="February">February</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>
		</select>
		<select name="year" class="span1"><option value="">Year</option>';
$tyear = date("Y");
for ($y=1945;$y<=$tyear;$y++){
echo '<option value="'.$y.'">'.$y.'</option>';
}
echo '</select><br>
 <span><font size="3">5. Address</font></span><br>
<textarea class="form-control" rows="2" id="add" name="add" required></textarea><br>
 <span><font size="3">6. City</font></span><br>
<input type="text" class="form-control" id="city" name="city" required><br> 
 <span><font size="3">7. Postal Code</font></span><br>
<input type="text" class="form-control" id="zip" name="zip" required><br> 
 <span><font size="3">8. Mobile Phone</font></span><br>
<input type="text" class="form-control" id="phone" name="phone" required><br> 
<span><font size="3">9. Blackberry Pin</font></span><br>
<input type="text" class="form-control" id="pin" name="pin"><br>
<span><font size="3">10. Email</font></span><br>
<input type="text" class="form-control" id="email" name="email" ><br>
<span><font size="3">11. Assign Card</font></span><br>
<input type="text" class="form-control" id="card" name="card" ><br>
</div>
<button class="btn btn-primary btn-large" type="submit" name="submit">Submit</button>
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
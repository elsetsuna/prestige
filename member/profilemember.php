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
  <script>
  $(document).on( "click", '.edit_button',function() {

        var noid = $(this).data('noid');
        var add = $(this).data('add');
        var city = $(this).data('city');
        var zip = $(this).data('zip');
        var phone = $(this).data('phone');
        var pin = $(this).data('pin');
        var email = $(this).data('email');

        $(".modal-body #noid").val(noid);
        $(".modal-body #add").val(add);
        $(".modal-body #city").val(city);
        $(".modal-body #zip").val(zip);
        $(".modal-body #phone").val(phone);
        $(".modal-body #pin").val(pin);
        $(".modal-body #email").val(email);
    });
</script>
</head>
<?php
if(isset($_POST['add']))
{
  $unoid = $_POST['noid'];
  $uadd = $_POST['add'];
  $ucity = $_POST['city'];
  $uzip = $_POST['zip'];
  $uphone = $_POST['phone'];
  $upin = $_POST['pin'];
  $uemail = $_POST['email'];

  //echo ''.$_POST['rno'].'';
  //echo 'asdas';
  mysql_query("UPDATE member SET m_address='$uadd',m_city='$ucity',m_zip='$uzip',m_phone='$uphone',m_pin='$upin',m_email='$uemail' WHERE m_no='$unoid'");
}
$noid = $_POST['noid'];
//echo ''.$noid.'';
$getdata = mysql_query("SELECT * FROM member WHERE m_no='$noid'");
$noid = mysql_result($getdata, 0,'m_no');
$fname = mysql_result($getdata, 0,'m_fname');
$lname = mysql_result($getdata, 0,'m_lname');
$idtype = mysql_result($getdata,0,'m_idtype');
$idno = mysql_result($getdata,0,'m_idno');
$add = mysql_result($getdata,0,'m_address');
$city = mysql_result($getdata,0,'m_city');
$zip = mysql_result($getdata,0,'m_zip');
$card = mysql_result($getdata, 0,'card_id');
$dob = mysql_result($getdata, 0,'m_dob');
$phone = mysql_result($getdata, 0,'m_phone');
$pin = mysql_result($getdata, 0,'m_pin');
$email = mysql_result($getdata, 0,'m_email');
$idd = $idtype .'-'. $idno ;
?>
<?php
include "nav.php";
echo '
<div class="container">
<div class="row">
<div class="span6">
          <div class="widget">
            <div class="widget-header"> <font size="5" face="calibri"><i class="icon-search" style="font-size: 25px"></i>
               &nbsp;Create Member</font>
            </div>
            <div class="widget-content" style="font-size: 16px;">
First Name : <b><i>'.$fname.' </i></b><br>
Last Name : <b><i>'.$lname.' </i></b><br>
id Number : <b><i>'.$idd.'  </i></b><br>
Address : <b><i>'.$add.' </i></b><br>
City : <b><i>'.$city.' </i></b><br>
Zip Code :<b><i>'.$zip.' </i></b><br>
Date of Birth : <b><i>'.$dob.' </i></b><br>
Phone : <b><i>'.$phone.' </i></b><br>
BBM Pin : <b><i>'.$pin.' </i></b><br>
Email : <b><i>'.$email.' </i></b><br>
Card id :<b><i>'.$card.' </i></b><br><br>

    <button class="btn btn-success btn-large edit_button" type="submit" name="submit" data-toggle="modal" data-target="#myModal" data-noid="'.$noid.'" data-add="'.$add.'" data-city="'.$city.'" data-zip="'.$zip.'" data-phone="'.$phone.'" data-pin="'.$pin.'" data-email="'.$email.'">
    EDIT</button><form action="?module=assigncard" method="post"><input type="hidden" name="nomor" id="nomor" value="'.$noid.'"><button class="btn btn-primary btn-large" type="submit" name="submit">Assign New Card</button></form>

                    <!-- /widget-content --> 
          </div></div></div> ';
?>
<?php
//include "rightwidget.php";
echo '
<!-- Modal for Edit button -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Edit Member Profile</h4>
      </div>
      <form method="post" action="">
          <div class="modal-body">
              <div class="form-group">
              Address <br>
                <textarea  name="add" id="add"></textarea>
              </div>
              <div class="form-group">
              City<br>
                <input class="form-control " name="city" id="city" placeholder="City" required>
              </div>
              <div class="form-group">
              Postal Code<br>
                <input class="form-control " name="zip" id="zip" placeholder="ZipCode" required>
              </div>
              <div class="form-group">
              Phone Number<br>
                <input class="form-control " name="phone" id="phone" placeholder="Phone Number" required>
              </div>
              <div class="form-group">
              Blackberry Pin<br>
                <input class="form-control " name="pin" id="pin" placeholder="BBM pin" >
              </div>
              <div class="form-group">
              Email<br>
                <input class="form-control " name="email" id="email" placeholder="Email" required>
              </div>
              <div class="form-group">
                <input type="hidden" class="form-control " name="noid" id="noid" >
              </div>
          </div>
          &nbsp;&nbsp;&nbsp;&nbsp;<font color="red">First Name , Last Name,id Number and Date of Birth Cannot Be Changed</font>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
      </form>
    </div>
</div>
</div>';
?>
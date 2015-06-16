<?php
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
<div class="span6">
          <div class="widget">
            <div class="widget-header"> <font size="5" face="calibri"><i class="icon-search" style="font-size: 25px"></i>
               &nbsp;Sign-on Bonus</font>
            </div>
            <div class="widget-content">

        <div class="input-group col-md-4 ">
  <form action="?module=confirmcheckpoint" method="post">
<span><font size="3">Please Scan or Input Card number.</font></span><br>
<input type="text" class="form-control span5" aria-label="Card id" id="card" name="card">
</div>
<button class="btn btn-primary btn-large" type="submit" name="submit">Submit</button>
</form>
        </p>
                    <!-- /widget-content --> 
          </div></div></div> ';?>
<?php
include "rightwidget.php";
echo '
</div>
</div>';
?>
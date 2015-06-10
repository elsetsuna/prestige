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
            <div class="widget-header"> <font size="5" face="calibri"><i class="icon-credit-card" style="font-size: 25px"></i>
               &nbsp;Taipan Prestige</font>
            </div>
            <div class="widget-content">

        <div class="input-group col-md-4 ">
  
Please Select SubMenu From the Right Panel
</div>
        </p>
                    <!-- /widget-content --> 
          </div></div></div> ';?>
<?php
include "rightwidget.php";
echo '
</div>
</div>';
?>
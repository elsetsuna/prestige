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
<div class="span5">
          <div class="widget">
            <div class="widget-header"> <font size="5" face="calibri"><i class="icon-search" style="font-size: 25px"></i>
               &nbsp;Sign-on Bonus</font>
            </div>
            <div class="widget-content">

        <div class="input-group col-md-4 ">
  <form action="?module=confirmcheckpoint" method="post">
<span><font size="3">Please Scan or Input Card number.</font></span><br>
<input type="text" class="form-control span3" aria-label="Card id" id="card" name="card">
</div>
<button class="btn btn-primary btn-large" type="submit" name="submit">Submit</button>
</form>
        </p>
                    <!-- /widget-content --> 
          </div></div></div> 
          <div class="span7">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Taipan Prestige SubMenu</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-bordered">
              <tr>
              <th style="text-align: center;">No.</th>
              <th style="text-align: center;">Reward</th>
              <th style="text-align: center;">Claimed Date</th>
              <th style="text-align: center;">Status</th>
              <th style="text-align: center;">&nbsp;</th>
              </tr>';

echo '
              </table>
            <!-- /widget-content --> 
          </div>
                
              </div>
            </div>
          </div>
          <!-- /widget -->
         
        </div>
        <!-- /span6 -->
</div>
</div>';
?>
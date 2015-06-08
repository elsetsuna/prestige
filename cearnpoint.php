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
  font-size: 20px;
  line-height: 18px;
  color: #555555;
  border: 1px solid #cccccc;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
}
</style>
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php">Taipan Prestige v 1.0</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i>'; ?> <?php echo $_SESSION['user_name'];?> <?php echo '<b class="caret"> </b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Profile</a></li>
              <li><a href="?logout">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class=""><a href="index.php"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-credit-card"></i><span>Taipan Prestige</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="icons.html">Icons</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="pricing.html">Pricing Plans</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="signup.html">Signup</a></li>
            <li><a href="?module=setrate">Set Rate</a></li>
          </ul>
        </li>
        <li><a href="guidely.html"><i class="icon-facetime-video"></i><span>App Tour</span> </a></li>
        <li><a href="charts.html"><i class="icon-bar-chart"></i><span>Charts</span> </a> </li>
        <li><a href="shortcodes.html"><i class="icon-code"></i><span>Shortcodes</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="icons.html">Icons</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="pricing.html">Pricing Plans</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="signup.html">Signup</a></li>
            <li><a href="error.html">404</a></li>
          </ul>
        </li>
        <li ><a href="?module=card"><i class="icon-credit-card"></i><span>Cards</span></a></li>
        <li ><a href="?module=setrate"><i class="icon-money"></i><span>Set Rate</span> </a> </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->';?>
<?php
  $cardc = $_POST['card'];
  $invoicec = $_POST['invoiceno']  ;
  $amountc = $_POST['amount']  ;
  $getrate=mysql_query("SELECT rates FROM rate");
//$ketemu=mysql_num_rows($login);
$ratte=mysql_fetch_array($getrate);
  $epoint = (round($amountc / $ratte['rates']));
;?>
  <?php
  $checkcard = mysql_query("SELECT * FROM card WHERE card_id= '$cardc' AND status = '1'");
  $checkcardrow = mysql_num_rows($checkcard);
    if ($cardc == ''){
    echo '<div class="container">
<div class="row">
<div class="span6">
          <div class="widget">
                      <div class="widget-header"> 
             <font size="4"><i class="icon-info-sign" style="font-size: 25px"></i>&nbsp; &nbsp;Error !!!</font>
            </div>
            <div class="widget-content">
<font size="3">
Ada 1 atau lebih field yang belum diisi !!!
</font></br></br>
<a class="btn btn-primary" href="?module=earnpoint" role="button"><< Back</a>
            </div>
            </div></div>';
    }
  	elseif ($amountc == ''){
      echo '<div class="container">
<div class="row">
<div class="span6">
          <div class="widget">
                      <div class="widget-header"> 
             <font size="4"><i class="icon-info-sign" style="font-size: 25px"></i>&nbsp; &nbsp;Error !!!</font>
            </div>
            <div class="widget-content">
<font size="3">
Ada 1 atau lebih field yang belum diisi !!!
</font></br></br>
<a class="btn btn-primary" href="?module=earnpoint" role="button"><< Back</a>
            </div>
            </div></div>';
}
          elseif ($invoicec == ''){
      echo '<div class="container">
<div class="row">
<div class="span6">
          <div class="widget">
                      <div class="widget-header"> 
             <font size="4"><i class="icon-info-sign" style="font-size: 25px"></i>&nbsp; &nbsp;Error !!!</font>
            </div>
            <div class="widget-content">
<font size="3">
Ada 1 atau lebih field yang belum diisi !!!
</font></br></br>
<a class="btn btn-primary" href="?module=earnpoint" role="button"><< Back</a>
            </div>
            </div></div>';
    }
        elseif ($checkcardrow == '0') {

echo '<div class="container">
<div class="row">
<div class="span6">
          <div class="widget">
                      <div class="widget-header"> 
             <font size="4"><i class="icon-info-sign" style="font-size: 25px"></i>&nbsp; &nbsp;Error !!!</font>
            </div>
            <div class="widget-content">
<font size="3">
Card not Found or not active yet. !!!
</font></br></br>
<a class="btn btn-primary" href="?module=earnpoint" role="button"><< Back</a>
            </div>
            </div></div>';
    }
    else {

echo '<div class="container">
<div class="row">
<div class="span6">
          <div class="widget">
                      <div class="widget-header"> 
             <font size="4"><i class="icon-info-sign" style="font-size: 25px"></i>&nbsp; &nbsp;Confirm to assign the points to this card ?</font>
            </div>
            <div class="widget-content">
<font size="3">Taipan Prestige Card id : <b>'.$_POST['card'].' </b></br>
Invoice Number : <b>'.$_POST['invoiceno'].'</b></br>
Sales Amount : <b>'.$_POST['amount'].'</b></br>
Point Earned : <b>'.$epoint.'</b></br></point>
<form action="?module=checkearnpoint" method="post">
<input type="hidden" name="cardid" value="'.$cardc.'">
<input type="hidden" name="invoiceno" value="'.$invoicec.'">
<input type="hidden" name="amount" value="'.$amountc.'">
<input type="hidden" name="epoint" value="'.$epoint.'"></br>
<button class="btn btn-primary btn-large" type="submit" name="submit">Submit</button>
</form>
            </div>
            </div></div>';
} 

echo '
            <div class="span6">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Important Shortcuts</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> <a href="?module=earnpoint" class="shortcut"><i class="shortcut-icon icon-star-empty"></i><span
                                        class="shortcut-label">Earn Point</span> </a><a href="javascript:;" class="shortcut"><i
                                            class="shortcut-icon icon-bookmark"></i><span class="shortcut-label">Bookmarks</span> </a><a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-signal"></i> <span class="shortcut-label">Reports</span> </a><a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-comment"></i><span class="shortcut-label">Comments</span> </a><a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-user"></i><span
                                                class="shortcut-label">Users</span> </a><a href="javascript:;" class="shortcut"><i
                                                    class="shortcut-icon icon-file"></i><span class="shortcut-label">Notes</span> </a><a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-picture"></i> <span class="shortcut-label">Photos</span> </a><a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-tag"></i><span class="shortcut-label">Tags</span> </a> </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
                
              </div>
            </div>
          </div>
          <!-- /widget -->
         
        </div>
        <!-- /span6 --></div>
            </div>';

?>
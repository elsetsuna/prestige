<?php
if ($_GET['module']=='setrate'){
include "srate.php";}
elseif ($_GET['module']=='earnpoint'){
  include "earnpoint.php";}
  elseif ($_GET['module']=='cearnpoint'){
  include "cearnpoint.php";}
    elseif ($_GET['module']=='checkearnpoint'){
  include "checkearnpoint.php";}
elseif ($_GET['module']=='card'){
    include "active.php";
}
else{
echo '
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
        <li class="active"><a href="index.php"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
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
         <li><a href="?module=setrate"><i class="icon-money"></i><span>Set Rate</span> </a> </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
    <div class="container">
      <div class="row">
        <div class="span6">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Todays Stats</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <h6 class="bigstats">';
?>

 <?php echo 'Your Last Login is on <b> ';?>
<?php 
$nama = $_SESSION['user_name']; 
$gettime=mysql_query("SELECT logintime FROM users WHERE user_name = '$nama'");
$time=mysql_fetch_array($gettime);
echo ''.$time['logintime'].'</b>';
?>
                  <?php echo '
                  </h6>
                  <div id="big_stats" class="cf">
                   <h4 >&nbsp; &nbsp;&nbsp;
                            The Current conversion rate is'; ?>
<?php
$getrate=mysql_query("SELECT rates FROM rate");
//$ketemu=mysql_num_rows($login);
$ratte=mysql_fetch_array($getrate);
echo '  
                            <b>Rp '.$ratte['rates'].' ,-</b> ';
?><?php echo'
                   for 1 (one)point
                   </h6>
                  </div>
                </div>
                <!-- /widget-content --> 
                
              </div>
            </div>
          </div>
          <!-- /widget -->
         
        </div>
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
        <!-- /span6 -->
</div>
</div>
';}
?>
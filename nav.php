
<?php
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
        <li><a href="index.php"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-briefcase "></i><span>Taipan Prestige</span></a>
        <ul class="dropdown-menu">
        <li><a href="?module=earnpoint">Earn Point</a></li>
        <li><a href="?module=checkpoint">Check Point</a></li>
        <li><a href="?module=redeemreward">Redeem Reward</a></li>
        <li><a href="?module=signon">SignOn Bonus</a></li>
        <li><a href="?module=setrate">Set Rate</a></li>
        </ul>
        </li>
        <li><a href="#"><i class="icon-group"></i><span>Membership</span> </a></li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
        <i class="icon-gift "></i><span>Rewards</span> </a> 
            <ul class="dropdown-menu">
<li><a href="?module=reward_category">Reward Category</a></li>
<li><a href="?module=addreward">Reward </a></li>
<li><a href="?module=signonreward">Sign-On Reward</a></li>
            </ul>
        </li>
        <li ><a href="?module=card"><i class="icon-credit-card"></i><span>Cards</span></a></li>
                <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-book"></i><span>Log</span></a>
        <ul class="dropdown-menu">
                <li><a href="?module=pointlog">Point Log</a></li>
                <li><a href="?module=redeemlog">Redeem Log</a></li>
        </ul></li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>';
?>
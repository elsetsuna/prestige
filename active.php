<?php
  $posted = false;
  $kosong = false;
  if ($_POST['name'] == ''){
$kosong = true;
  } elseif( $_POST ) {
    $posted = true;

    // Database stuff here...
    // $result = mysql_query( ... )
    $cardid = $_POST['name'];
    $countrow=mysql_query("SELECT * FROM card WHERE card_id='$cardid'");
    $checkrow = mysql_fetch_row($countrow);
    if(empty($checkrow))
{
      mysql_query("INSERT INTO card (card_id,status)VALUES ('$cardid','1')");
      mysql_query("INSERT INTO points (card_id,t_point,a_point,u_point)VALUES ('$cardid','0','0','0')");
}

  }
?>
  <?php
    if( $posted ) {
      if( $kosong) {
        echo "<script type='text/javascript'>alert('Harap nomor kartu diisi atau di scan')</script>";
      }
      elseif ($checkrow ==""){
        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";

      }else {
         echo "<script type='text/javascript'>alert('failed! or The card is active already!')</script>";
      }
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
  font-size: 15px;
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
        <li class="active"><a href="?module=card"><i class="icon-credit-card"></i><span>Cards</span></a></li>
        <li ><a href="?module=setrate"><i class="icon-money"></i><span>Set Rate</span> </a> </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->';

echo '
<div class="container">
<div class="row">
<div class="span5">
<div class="bg-warning col-md-3 col-md-offset-1 ">
        <h1>Create Card</h1>
        <p>Input / Scan Card iD</p>
        <div class="input-group col-md-4 ">
  
  <form action="" method="post">
  <input type="text" class="form-control" aria-label="Card id" id="name" name="name">
  <br><font size="2">all created card are active by default</font>
</div>
<button class="btn btn-primary btn-large" type="submit" name="submit">Create</button>
</form>
        </p>
      </div>

      </div>
      <div class="span7">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Card List</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
<table id="myTable" class="table table-striped">  
        <thead>  
          <tr>  
            <th>No.</th>  
            <th>Card id</th>  
            <th>Card Owner</th>  
            <th>Status</th>  
          </tr>  
        </thead>  
        <tbody>';
$countcard=mysql_query("SELECT * FROM card WHERE status='1'");
$countcardrow=mysql_num_rows($countcard);
$no = "1";
for ($c=0;$c<$countcardrow;$c++){
    while($x<=$c){
      $x++;
    }
  $idno = mysql_result($countcard,$c, 'id');
  $cardid = mysql_result($countcard,$c, 'card_id');
  $cardowner = mysql_result($countcard,$c, 'card_owner');
  $cardstat = mysql_result($countcard,$c, 'status');
	echo " 
	          <tr>  
 <Td>$x</td>
  <Td>$cardid</td>
   <Td>$cardowner</td>
    <Td>";
    if ($cardstat ==1){
    	echo 'Aktif';
    } 
    echo "
    </td>
          </tr>  ";
}
echo '   
        </tbody>  
      </table> 
      </div>
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 --> 
              </div></div>';
?>

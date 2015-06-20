<?php
if ($_GET['module']=='setrate'){
    include "tprestige/srate.php";}
elseif ($_GET['module']=='createmember'){
    include "member/createmember.php";}
elseif ($_GET['module']=='memberlist'){
    include "member/memberlist.php";}
elseif ($_GET['module']=='assigncard'){
    include "member/assigncard.php";}
elseif ($_GET['module']=='profilemember'){
    include "member/profilemember.php";}
elseif ($_GET['module']=='checkpoint'){
    include "tprestige/checkpoint.php";}
elseif ($_GET['module']=='reward_category'){
    include "reward/rcategory.php";}
elseif ($_GET['module']=='addreward'){
    include "reward/rewardmain.php";}
elseif ($_GET['module']=='earnpoint'){
    include "tprestige/earnpoint.php";}
elseif ($_GET['module']=='cearnpoint'){
    include "tprestige/cearnpoint.php";}
elseif ($_GET['module']=='checkearnpoint'){
    include "tprestige/checkearnpoint.php";}
elseif ($_GET['module']=='signon'){
    include "tprestige/signon.php";}
elseif ($_GET['module']=='signonreward'){
    include "reward/rewardsignon.php";}
elseif ($_GET['module']=='redeemreward'){
    include "tprestige/redeemreward.php";}
elseif ($_GET['module']=='redeemlog'){
    include "log/rlog.php";}
elseif ($_GET['module']=='pointlog'){
    include "log/plog.php";}
elseif ($_GET['module']=='card'){
    include "active.php";
}
else{
include "nav.php";
echo '
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
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
.shortcuts .shortcut { 
  width: 100%;

}
</style>
</head>';
include "nav.php";
echo '
<div class="container">
<div class="row">';
  include "l_widget.php" ;
  ?>
<?php
  include "r_widget.php";
echo '
</div>
</div>';
?>
<?php
define("ROOTPATH", "../");
include(ROOTPATH."includes/common.inc.php");
include("language/".$sLan.".php");
include("includes/hz.inc.php");


//定义模块名和页面名
PageSet("huanzeng","startorder");


//输出
PrintPage();


?>
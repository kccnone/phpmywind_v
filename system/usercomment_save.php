<?php	require_once(dirname(__FILE__).'/inc/config.inc.php');IsModelPriv('usercomment');
error_reporting(0);
/*
**************************

update: 2014-5-30 17:56:10

**************************
*/


//初始化参数
$tbname = '#@__usercomment';
$gourl  = 'usercomment.php';
$action = isset($action) ? $action : '';


//引入操作类
require_once(ADMIN_INC.'/action.class.php');


//无条件返回
header("location:$gourl");
exit();
?>
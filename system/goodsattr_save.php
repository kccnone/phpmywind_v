<?php	require_once(dirname(__FILE__).'/inc/config.inc.php');IsModelPriv('goodstype');
	
/*
**************************

update: 2014-5-30 16:25:02

**************************
*/


//初始化参数
$gid    = !empty($gid) ? intval($gid) : 0;
$tbname = '#@__goodsattr';
$gourl  = 'goodsattr.php?gid='.$gid;


//产品类型出错
if(empty($gid))
{
	header("location:$gourl");
	exit();
}


//引入操作类
require_once(ADMIN_INC.'/action.class.php');


//保存产品属性
if($action == 'save')
{
	if($attrnameadd != '')
	{
		$dosql->ExecNoneQuery("INSERT INTO `$tbname` (goodsid, attrname, orderid, checkinfo) VALUES ('$gid', '$attrnameadd', '$orderidadd', '$checkinfoadd')");
	}

	if(isset($id))
	{
		$ids = count($id);
		for($i=0; $i<$ids; $i++)
		{
			$dosql->ExecNoneQuery("UPDATE `$tbname` SET orderid='$orderid[$i]', attrname='$attrname[$i]' WHERE id=$id[$i]");
		}
	}

	header("location:$gourl");
	exit();
}


//无条件返回
else
{
    header("location:$gourl");
	exit();
}
?>
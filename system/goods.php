<?php require_once(dirname(__FILE__).'/inc/config.inc.php');IsModelPriv('goods'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>产品信息管理</title>
<link href="templates/style/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="templates/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/js/forms.func.js"></script>
<script type="text/javascript" src="templates/js/listajax.js"></script>
<script type="text/javascript" src="templates/js/loadimage.js"></script>
<script type="text/javascript">
$(function(){
	GetList2('goods','<?php echo ($cid = isset($cid) ? $cid : ''); ?>','<?php echo ($flag = isset($flag) ? $flag : 'all'); ?>','<?php echo ($page = isset($page) ? $page : 1); ?>','<?php echo ($keyword = isset($keyword) ? $keyword : ''); ?>','<?php echo ($ver = isset($ver) ? $ver : ''); ?>');
})
</script>
</head>
<body>
<div class="topToolbar"> <span class="title">产品信息管理</span>
<span class="alltype">
	<a href="javascript:;" onclick="GetType('','全部栏目',$(this))" class="btn">全部栏目</a>
	<span class="drop">
	<?php GetMgrAjaxType('#@__infoclass',4); ?>
	</span>
</span>
<span class="alltype">
	<a href="javascript:;" onclick="GetVersion('','全部版本',$(this))" class="btn">
	<?php 
		if($ver!=""){
			$rr = $dosql->GetOne("SELECT * FROM `#@__infover` WHERE flag='$ver'");
			echo $rr['flagname']; 	
		}
		else{
			echo "全部版本";
		}
	?>
	</a>
	<span class="drop" style="display: none;">
		<?php
		$verArr = array();
		$dosql->Execute("SELECT * FROM `#@__infover` ORDER BY `orderid` ASC");
		while($row = $dosql->GetArray())
		{
			$verArr[$row['flag']] = $row['flagname'];
		}
		foreach($verArr as $k => $v)
		{
			?>
			<a href="javascript:;" onclick="GetVersion('<?php echo $k; ?>','<?php echo $v; ?>',$(this))"><?php echo $v; ?></a>
			<?php
		}
		?>
	</span>
</span>
<a href="javascript:location.reload();" class="reload">刷新</a></div>
<form name="form" id="form" method="post">
	<div id="list">
		<div class="loading">读取列表中...</div>
	</div>
</form>
</body>
</html>
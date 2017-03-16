<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php  if(!empty($title)) { ?><?php  echo $title;?> - <?php  } ?><?php  echo $setting['sitename'];?> - <?php  echo $_W['uniaccount']['name'];?></title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
	<link href="<?php echo MODULE_URL;?>template/mobile/style/common.css?v=1.2.0" rel="stylesheet" />
	<link href="<?php echo MODULE_URL;?>template/mobile/style/swiper-3.3.1.min.css" rel="stylesheet" />
    <link href="<?php echo MODULE_URL;?>template/mobile/style/course-list.css" rel="stylesheet" />
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script src="<?php echo MODULE_URL;?>template/mobile/style/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?php echo MODULE_URL;?>template/mobile/style/js/lightapp.js"></script>
	<?php  if($_GPC['do']!='index') { ?>
	<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>app/resource/js/lib/mui.min.js?v=20160831"></script>
	<?php  } ?>
	<script type="text/javascript">
	var _LoadingHtml = '<div id="spinners"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>';
	document.write(_LoadingHtml);
	document.onreadystatechange = completeLoading;
	function completeLoading() {
		if (document.readyState == "complete") {
			var spinners = document.getElementById('spinners');
			spinners.parentNode.removeChild(spinners);
		}
	}
	</script>
</head>
<body>
<?php  if(!in_array($_GPC['do'], array('index','search','teacher','self','lesson','article'))) { ?>
<div class="header-2 cbox">
	<a href="javascript:history.go(-1);" class="ico go-back"></a>
	<div class="flex" style="font-family:'微软雅黑';"><?php  echo $title;?></div>
</div>
<?php  } ?>
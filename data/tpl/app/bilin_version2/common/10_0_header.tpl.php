<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=480" />
    <title><?php  if(!empty($title)) { ?><?php  echo $title;?>
        -
        <?php  } else if(!empty($_W['page']['title'])) { ?><?php  echo $_W['page']['title'];?> - <?php  } ?><?php  if(!empty($_W['page']['sitename'])) { ?><?php  echo $_W['page']['sitename'];?><?php  } else { ?><?php  echo $_W['account']['name'];?><?php  } ?>
        <?php  if(IMS_FAMILY != 'x') { ?> - Powered by WE7.CC<?php  } ?></title>
    <meta name="keywords" content="<?php  if(empty($_W['page']['keywords'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>微擎,微信,微信公众平台,we7.cc<?php  } ?><?php  } else { ?><?php  echo $_W['page']['keywords'];?><?php  } ?>" />
    <meta name="description" content="<?php  if(empty($_W['page']['description'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>公众平台自助引擎（www.we7.cc），简称微擎，微擎是一款免费开源的微信公众平台管理系统，是国内最完善移动网站及移动互联网技术解决方案。<?php  } ?><?php  } else { ?><?php  echo $_W['page']['description'];?><?php  } ?>" />
    <link rel="shortcut icon" href="<?php  echo $_W['siteroot'];?><?php  echo $_W['config']['upload']['attachdir'];?>/<?php  if(!empty($_W['setting']['copyright']['icon'])) { ?><?php  echo $_W['setting']['copyright']['icon'];?><?php  } else { ?>images/global/wechat.jpg<?php  } ?>" />
    <script type="text/javascript" src="<?php  echo $_W['siteroot'];?>app/resource/js/lib/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?php  echo $_W['siteroot'];?>app/resource/js/lib/mui.min.js"></script>
    <script type="text/javascript" src="<?php  echo $_W['siteroot'];?>app/resource/js/app/common.js"></script>
<script type="text/javascript" src="themes/bilin_version2/templets/m2013/js/jquery.min.js"></script>
<script type="text/javascript" src="themes/bilin_version2/templets/m2013/js/flexslider.js"></script>
<script type="text/javascript" src="themes/bilin_version2/templets/m2013/js/MainJS.js"></script>
    <?php  if(defined('MUI')) { ?>
    <link href="<?php  echo $_W['siteroot'];?>app/resource/css/mui.min.css" rel="stylesheet">
    <?php  } else { ?>
    <link href="<?php  echo $_W['siteroot'];?>app/resource/css/bootstrap.min.css" rel="stylesheet">
    <?php  } ?>
	<link href="<?php  echo $_W['siteroot'];?>app/resource/css/common.min.css" rel="stylesheet">
	
<link rel="stylesheet" href="themes/bilin_version2/templets/m2013/css/reset.css" />
<link rel="stylesheet" href="themes/bilin_version2/templets/m2013/css/mainCssRed.css" />
<script type="application/x-javascript">
            if (navigator.userAgent.indexOf('iPhone') != -1) {
            addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
            }, false); 
            }

            function hideURLbar() {
            window.scrollTo(0, 1);
            }
        </script>
</head>

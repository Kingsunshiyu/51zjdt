<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php  echo $_W['mobile']['share']['mobile_title'];?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <meta name="msapplication-TileColor" content="#0e90d2">
    <?php  echo register_jssdk(false);?>
    <link rel="stylesheet" href="../addons/q_3354988381_rencai/amaze/assets/css/amazeui.min.css">
    <link rel="stylesheet" href="../addons/q_3354988381_rencai/amaze/css/app.css">
    <script src="../addons/q_3354988381_rencai/amaze/assets/js/jquery.min.js"></script>
    <script src="../addons/q_3354988381_rencai/amaze/assets/js/amazeui.min.js"></script>
    
    <?php  if(0) { ?>
        <!-- 手机端日期控件 -->
    <script src="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.core-2.5.2.js"></script>
    <script src="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.core-2.5.2-zh.js" type="text/javascript"></script>
    <link href="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.core-2.5.2.css" rel="stylesheet" type="text/css" />
    <link href="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.animation-2.5.2.css" rel="stylesheet" type="text/css" />
    <script src="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.datetime-2.5.1.js" type="text/javascript"></script>
    <script src="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.datetime-2.5.1-zh.js" type="text/javascript"></script>
    <script src="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.android-ics-2.5.2.js" type="text/javascript"></script>
    <link href="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.android-ics-2.5.2.css" type="text/css" />
    <?php  } ?>
    
    <script src="../addons/q_3354988381_rencai/amaze/assets/js/handlebars.min.js"></script>
    <script type="text/javascript" src="http://api.map.baidu.com/api?type=quick&ak=5390be286d7f5e4228444d89810905c1&v=1.0"></script>
    <!--  幻灯片 -->
    <script>
    $(function() {
      $('.am-slider').flexslider({
          animation:"fade",
          slideshow: true,
          slideshowSpeed: 2000
      });
    });
    </script>
</head>
<body>
	<?php  if(false && ($curr_url != 'index' && !in_array($title, array('招聘频道','求职频道',)))) { ?>
	<header class="am-topbar am-topbar-inverse am-topbar-fixed-top">
        <ul class="am-avg-sm-3">
             <li class="am-text-left" style="padding:10px 0 0 5px; width:25%"><a href="javascript:history.back();" class="am-icon-mail-reply">&nbsp;返回</a></li>
             <li class="am-text-center" style="padding-top:10px; width:50%"><?php  echo $title;?></li>
             <li class="am-text-right" style="padding:10px 5px 0 0; width:25%"><a href="<?php  echo $this->createMobileUrl('PublicIndex');?>" class="am-icon-plus" style="color:#FFF">&nbsp;发布</a></li>
        </ul>
    </header>
    <?php  } ?>
    <?php  if(false) { ?>
    <header data-am-widget="header" class="am-header am-header-default" style="background-color: #0e76ad;margin-bottom: 2px">
        <div class="am-header-left am-header-nav">
            <a href="javascript:history.back();" class="">
                <i class="am-icon-chevron-left"></i>
            </a>
        </div>
        <h1 class="am-header-title">
            <a href="#title-link" class=""><?php  echo $title;?></a>
        </h1>
        <div class="am-header-right am-header-nav">
            <!--<a href="#right-link" class="">-->
                <!--<i class="am-header-icon am-icon-bars"></i>-->
            <!--</a>-->
        </div>
    </header>   
    <?php  } ?>
<div class="am-modal am-modal-no-btn" tabindex="-1" id="myModal_alert">
  <div class="am-modal-dialog">
    <div class="am-modal-hd"><span id="myModal_alert_title"></span>
      <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
    </div>
    <div class="am-modal-bd">
      <span id="myModal_alert_msg"></span>
    </div>
  </div>
</div>
<script>
//amaze_alert('', '申请成功');
function amaze_alert(title, msg) {
	if (title == '') {
		title = '信息';
	}
	$('#myModal_alert_title').html(title);
	$('#myModal_alert_msg').html(msg);
	$('#myModal_alert').modal('open');
}
</script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>	
<script language='javascript'> 
	jssdkconfig = <?php  echo json_encode($_W['account']['jssdkconfig']);?> || {};
	// 是否启用调试todo
	jssdkconfig.debug = false;
	jssdkconfig.jsApiList = [
		'checkJsApi',
		'onMenuShareTimeline',
		'onMenuShareAppMessage',
		'onMenuShareQQ',
		'onMenuShareWeibo',
		'showOptionMenu',
		'closeWindow',
		'hideOptionMenu',
		'hideMenuItems'
	];/*	
	jssdkconfig.jsApiList = [
		'hideOptionMenu', 'hideMenuItems'
	];*/
	wx.config(jssdkconfig);
	/*
	wx.ready(function () {
		//wx.hideOptionMenu();
		wx.hideMenuItems({
			menuList: [
				'menuItem:copyUrl'
			] 
		});		
	});*/
</script> 
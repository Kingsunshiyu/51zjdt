<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="cache-control" content="max-age=0" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"
        />
        <meta name="format-detection" content="telephone=no" />
        <title>
            <?php  echo $forum['title'];?>
        </title>
        <link rel="stylesheet" href="../addons/meepo_bbs/template/mobile/default/css/base.min.d4d7ccfa.css"/>
        <link rel="stylesheet" href="../addons/meepo_bbs/template/mobile/default/img/iconfont/iconfont.css"/>
        <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>app/resource/js/lib/jquery-1.11.1.min.js"></script>
	<script type="text/javascript">
	if(navigator.appName == 'Microsoft Internet Explorer'){
		if(navigator.userAgent.indexOf("MSIE 5.0")>0 || navigator.userAgent.indexOf("MSIE 6.0")>0 || navigator.userAgent.indexOf("MSIE 7.0")>0) {
			alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
		}
	}
	<?php  define('HEADER', true);?>
	window.sysinfo = {
<?php  if(!empty($_W['uniacid'])) { ?>
		'uniacid': '<?php  echo $_W['uniacid'];?>',
<?php  } ?>
<?php  if(!empty($_W['acid'])) { ?>
		'acid': '<?php  echo $_W['acid'];?>',
<?php  } ?>
<?php  if(!empty($_W['openid'])) { ?>
		'openid': '<?php  echo $_W['openid'];?>',
<?php  } ?>
<?php  if(!empty($_W['uid'])) { ?>
		'uid': '<?php  echo $_W['uid'];?>',
<?php  } ?>
		'siteroot': '<?php  echo $_W['siteroot'];?>',
		'siteurl': '<?php  echo $_W['siteurl'];?>',
		'attachurl': '<?php  echo $_W['attachurl'];?>',
<?php  if(defined('MODULE_URL')) { ?>
		'MODULE_URL': '<?php echo MODULE_URL;?>',
<?php  } ?>
		'cookie' : {'pre': '<?php  echo $_W['config']['cookie']['pre'];?>'}
	};
	
	// jssdk config 对象
	jssdkconfig = <?php  echo json_encode($_W['account']['jssdkconfig']);?> || {};
	
	// 是否启用调试
	jssdkconfig.debug = false;
	
	jssdkconfig.jsApiList = [
		'checkJsApi',
		'onMenuShareTimeline',
		'onMenuShareAppMessage',
		'onMenuShareQQ',
		'onMenuShareWeibo',
		'hideMenuItems',
		'showMenuItems',
		'hideAllNonBaseMenuItem',
		'showAllNonBaseMenuItem',
		'translateVoice',
		'startRecord',
		'stopRecord',
		'onRecordEnd',
		'playVoice',
		'pauseVoice',
		'stopVoice',
		'uploadVoice',
		'downloadVoice',
		'chooseImage',
		'previewImage',
		'uploadImage',
		'downloadImage',
		'getNetworkType',
		'openLocation',
		'getLocation',
		'hideOptionMenu',
		'showOptionMenu',
		'closeWindow',
		'scanQRCode',
		'chooseWXPay',
		'openProductSpecificView',
		'addCard',
		'chooseCard',
		'openCard'
	];
	
	</script>
	
	<script>
	function _removeHTMLTag(str) {
		if(typeof str == 'string'){
			str = str.replace(/<script[^>]*?>[\s\S]*?<\/script>/g,'');
			str = str.replace(/<style[^>]*?>[\s\S]*?<\/style>/g,'');
			str = str.replace(/<\/?[^>]*>/g,'');
			str = str.replace(/\s+/g,'');
			str = str.replace(/&nbsp;/ig,'');
		}
		return str;
	}
	</script>
	<style>
	::-webkit-scrollbar{width:0px;height:0px;}
	</style>
    </head>
    
    
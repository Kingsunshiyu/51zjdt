<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>嘉宾邀请链接</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no">
<meta name="format-detection" content="address=no">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="<?php echo TEMPLATE_PATH;?>/wtCommon.css?v=<?php  echo time();?>">
<link rel="stylesheet" href="<?php echo TEMPLATE_PATH;?>/live.css?v=<?php  echo time();?>">
<script src="http://cdn.bootcss.com/zepto/1.1.6/zepto.min.js"></script>
<?php  echo register_jssdk();?>
<script type="text/javascript">
  wx.ready(function () {
    sharedata = {
        title: "<?php  echo $sharedata['title'];?>",
        desc: "<?php  echo $sharedata['desc'];?>",
        link: "<?php  echo $sharedata['link'];?>",
        imgUrl: "<?php  echo $sharedata['imgUrl'];?>",
        success:function(){
        	//ajax
        }
    };
    wx.onMenuShareAppMessage(sharedata);
    wx.hideMenuItems({
        menuList: ['menuItem:share:timeline'] // 要隐藏的菜单项，只能隐藏“传播类”和“保护类”按钮，所有menu项见附录3
    });
});
</script>
<style type="text/css">
			html,body,div,p,ul,li{margin: 0; padding: 0;}
			i{font-style: normal;}
			li{list-style: none;}
			body{ font-family: "微软雅黑",arial; font-size: 14px;max-width: 640px;background: #f2f2f2;}
			.words{padding: 20px; background: #fff;}
			.words li{ display: flex;}
			.words .right{float: left;width:90%;}
			.words p{padding-bottom: 10px; line-height: 24px;}
			.words span{float:left;width:20px; height: 20px; line-height: 20px; margin-right:10px; text-align: center; display:block;background: #08BC05;color:#fff; -webkit-border-radius: 100%;border-radius: 100%;}
		</style>
</head>
	<body class="liveroom_bg">
		<div class="words">
			<ul>
							<li><span>1</span><div class="right"><p>点击右上角三个"...",选择"发送给朋友"，好友点击链接即可。</p></div></li>
				<li><span>2</span><div class="right"><p>邀请链接的有效期为30分钟。</p></div></li>
				<li><span>3</span><div class="right"><p>一条链接只能邀请一个用户。</p></div></li></ul>
		</div>
	</body>
</html>
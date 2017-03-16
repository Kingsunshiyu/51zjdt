<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系统帮助</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="apple-mobile-web-app-title" content="系统帮助"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
<meta content="telephone=no" name="format-detection"/>

<style type="text/css">
	body{magin:0;padding:0;width:100%;height:100%;}
	html, body, div, ul, ol, li, h1, h2, h3, h4, h5, form, fieldset, input, textarea, p, th, td, button, span, menu, section, nav {    margin: 0;    padding: 0;}
	a{text-decoration:none; color:#4a6c9a; font: 500 14px/1 "Microsoft Yahei";}
	ul, menu, dir {display: block;list-style-type:none;}
	header{ background:#e8e8e8 url(<?php  echo $this->_img_url?>btn_header_right_normal.png) repeat-x;  line-height:58px; height:58px; text-align:center; width:100%;}
	header h1{ display:block; color:#fff;font: 600 1.286em/2.8 "Microsoft Yahei";}
	header .return{ cursor:pointer; background:url(<?php  echo $this->_img_url?>ic_header_back.png) no-repeat scroll 10px 10px rgba(0, 0, 0, 0); background-size: 70% 60%;
	border-right:#7bb1f9 1px solid; width:50px;
	height:58px; position:absolute; left:0px; top:0px;}
	header .xuan{ display:inline-block; text-align:center; position:absolute; width:50px; height:58px; line-height:58px; right:0px; top:0px; color:#FFF; font-family:"Microsoft Yahei"; font-size:14px; border-left:#7bb1f9 1px solid;}
	menu{ margin-top:-10px; background:url(<?php  echo $this->_img_url?>bg_home_hearder_tile.png) repeat scroll 0 0 rgba(0, 0, 0, 0);   position: absolute;   width: 100%; z-index:-1;}
	menu h2{ margin:40px 0px 40px 40px;color:#4a6c9a; font-size:16px; }
	menu .list{background:#fff;border-radius:6px; border:#a8bcd7 2px solid; color:#FFF; font: 500 14px/1 "Microsoft Yahei";   margin:20px;}
	menu .list .list_info,.list_one{ border-bottom:#b5c8e6 1px solid; height:32px; color:#4a6c9a; line-height:26px; padding:22px 70px; overflow:hidden;}
	.list_one{ padding:10px 10px 10px 20px;height:auto;word-break:break-all}
	.list_one1{ border-bottom:#b5c8e6 1px solid; height:60px;  color:#4a6c9a; line-height:26px; padding:10px 10px 10px 20px; height:auto;word-break:break-all}
	.list span{ display:block; position:absolute; width:31px; height:30px; margin:22px 0px 0px 30px;}
	.list .icon_name{background:url(<?php  echo $this->_img_url?>icon_name.png) no-repeat; }
	.list .icon_mob{background:url(<?php  echo $this->_img_url?>icon_mobile.png) no-repeat; }
	.list .icon_mess{background:url(<?php  echo $this->_img_url?>icon_mess.png) no-repeat; }
	.list input{ border:none; height:26px; width:50%; margin-left:8px; color:#333333; font-family: Tahoma,Arial,sans-serif; position:absolute;}
	button{border-radius:2px; height:62px; line-height:62px; color:#ffffff; border:0 none;   background:#76b8ff;  background: -webkit-gradient(linear, left top, left bottom, from(#76b8ff), to(#4996fa));background: -moz-linear-gradient(top,  #76b8ff,  #4996fa); font: 500 14px/1 "Microsoft Yahei";filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#76b8ff', endColorstr='#4996fa'); width:94%;  margin:10px 3% 20px 3%; cursor:pointer;}
	footer{ background:url(<?php  echo $this->_img_url?>footer_bg.PNG) repeat-x; height:16px; width:100%; position:absolute; bottom:0px;}
	#nav{ background:url(<?php  echo $this->_img_url?>bg_home_hearder_tile.png); position:absolute; z-index:-1; width:100%;height:100%;}
</style>
<script language='javascript' src='<?php  echo $this->_script_url?>jquery.js'></script>
<script language='javascript' src='<?php  echo $this->_script_url?>jquery.form.js'></script>
<script language='javascript' src='<?php  echo $this->_script_url?>common.js'></script>
</head>
<body>
  	<header>
    	<h1>系统帮助</h1>
    	<div class="return" onclick="location.href='javascript:history.go(-1);'"></div>
    	<a class="xuan" href="<?php  echo $this->createMobileUrl('index')?>">首页</a>
  	</header>
  	<nav id="nav">
      	<?php  echo $about;?>
  	</nav>
  	<menu></menu>
</body>
</html>

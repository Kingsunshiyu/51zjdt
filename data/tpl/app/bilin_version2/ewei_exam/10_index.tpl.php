<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微考试</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="apple-mobile-web-app-title" content="微考试"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
<meta content="telephone=no" name="format-detection"/>
<style type="text/css">
html, body, div, ul, ol, li, h1, h2, h3, h4, h5, form, fieldset, input, textarea, p, th, td, button, span, menu, section, nav {margin: 0;padding: 0;}
a{text-decoration:none; color:#FFF; font: 500 14px/1 "Microsoft Yahei";}
ul, menu, dir {display: block;list-style-type:none;}
header{ background:url(<?php  echo $this->_img_url?>bg_home_hearder_tile.png);  line-height:50px; height:50px; text-align:center; width:100%;}
header h1{ color:#5b84b5; height:50px; font: 600 1.286em/2.8 "微软雅黑"; }
.bian{ background:url(<?php  echo $this->_img_url?>bg_home_top_line.png); height:7px; }
#nav{ background:url(<?php  echo $this->_img_url?>bg_home_grid.png); position:absolute; z-index:-1; width:100%;height:100%;}
.box{width:88%; margin:30px 4% 30px 8%; overflow:hidden;}
.box li{ background:#4e97f6; height:118px; width:46%; float:left; margin:0 4% 4% 0; text-align:center; position:relative;  cursor:pointer; }
.box li a{display:inline-block; width:100%; height:100%;}
.box li h2{ left:50%; position:absolute; top:70%;font: 500 14px/1 "Microsoft Yahei";margin-left: -28px;}
.box li figure{ width:57px; height:54px; position:absolute; left:50%; top:20%;  margin:0px 0px 0px -28px; }
.box li .j_icon{background:url(<?php  echo $this->_img_url?>ic_home_content_goon.png) no-repeat;}
.box li .w_icon{ background:url(<?php  echo $this->_img_url?>ic_home_content_collect.png) no-repeat;}
.box li .z_icon{ background:url(<?php  echo $this->_img_url?>ic_home_content_practice.png) no-repeat;}
.box li .t_icon{ background:url(<?php  echo $this->_img_url?>ic_home_content_examination.png) no-repeat;}
.box li .tui_icon{ background:url(<?php  echo $this->_img_url?>icon_recommend.png) no-repeat;}
.box li .g_icon{background:url(<?php  echo $this->_img_url?>ic_home_content_more.png) no-repeat;}
.box .w{ background:#ff8a21;}
.box .m{ background:url(<?php  echo $this->_img_url?>btn_message_normal.png) no-repeat; width:38px; height:39px; margin:281px 0px 0px 10px;}
</style>
<script language='javascript' src='<?php  echo $this->_script_url?>jquery.js'></script>
</head>

<body>
  	<header>
    	<h1>微考试--<?php  echo $_W['account']['name'];?></h1>
    	<div class="bian"></div>
  	</header>
  	<nav id="nav">
      	<ul class="box clearfix">
          <li class="r">
              	<a title="继续上次" href="<?php  echo $this->createMobileUrl('continue')?>">
                  	<h2>继续上次</h2>
                  	<figure class="j_icon"></figure>
              	</a>
          	</li>
          <!--<li class="r" >-->
          <!--<a title="我的收藏" href="#" >-->
          <!--<h2>我的收藏</h2>-->
          <!--<figure class="w_icon"></figure>-->
          <!--</a>-->
          <!--</li>-->
          <!--<li class="r" >-->
          <!--<a title="专项训练" href="#" >-->
          <!--<h2>专项训练</h2>-->
          <!--<figure class="z_icon"></figure>-->
          <!--</a>-->
          <!--</li>-->
          	<li class="r">
              	<a title="套题模拟" href="<?php  echo $this->createMobileUrl('paperlist')?>">
                  	<h2>套题模拟</h2>
                  	<figure class="t_icon"></figure>
              	</a>
          	</li>
			<?php  if($set['classopen']==1) { ?>
			<li class="w">
				<a title="推荐课程" href="<?php  echo $this->createMobileUrl('courselist')?>">
					<h2>推荐课程</h2>
					<figure class="tui_icon"></figure>
				</a>
			</li>
			<li class="w">
				<a title="我的预约" href="<?php  echo $this->createMobileUrl('reservelist')?>">
					<h2>我的预约</h2>
					<figure class="g_icon"></figure>
				</a>
			</li>
			<?php  } ?>
			<li class="<?php  if($set['classopen']==1) { ?>r<?php  } else { ?>w<?php  } ?>">
				<a title="排行榜" href="<?php  echo $this->createMobileUrl('sortlist')?>">
					<h2>排行榜</h2>
					<figure class="z_icon"></figure>
				</a>
			</li>
			<li class="<?php  if($set['classopen']==1) { ?>r<?php  } else { ?>w<?php  } ?>">
				<a title="系统帮助" href="<?php  echo $this->createMobileUrl('about')?>">
					<h2>系统帮助</h2>
					<figure class="w_icon"></figure>
				</a>
			</li>
			<!--<li class="m"></li>-->
      	</ul>
  	</nav>
</body>
</html>

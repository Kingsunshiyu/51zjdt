<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>交卷</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="apple-mobile-web-app-title" content="交卷"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
<meta content="telephone=no" name="format-detection"/>
<style type="text/css">
.clear{ clear:both;}
body{width:100%;}
html, body, div, ul, ol, li, h1, h2, h3, h4, h5, form, fieldset, input, textarea, p, th, td, button, span, menu, section, nav {    margin: 0;    padding: 0;}
a{text-decoration:none; color:#4a6c9a; font: 500 14px/1 "Microsoft Yahei";}
ul, menu, dir {display: block;list-style-type:none;}
header{ background:url(<?php  echo $this->_img_url?>btn_header_right_normal.png) repeat-x;  line-height:50px; height:58px; text-align:center; width:100%;}
header h1{ color:#fff; height:58px; font: 600 1.286em/2.8 "Microsoft Yahei"; }
header .return{ cursor:pointer; background:url(<?php  echo $this->_img_url?>ic_header_back.png) no-repeat scroll 12px 10px rgba(0, 0, 0, 0); border-right:#7bb1f9 1px solid; width:110px; height:88px; position:absolute; left:0px; top:0px;}
header .xuan{ display:inline-block; text-align:center; position:absolute; width:50px; height:58px; line-height:58px; right:0px; top:0px; color:#FFF; font-family:"Microsoft Yahei"; font-size:14px; border-left:#7bb1f9 1px solid;}

menu{height:90%; margin-top:-10px; background:url(<?php  echo $this->_img_url?>bg_home_hearder_tile.png) repeat scroll 0 0 rgba(0, 0, 0, 0);   position: absolute;   width: 100%; z-index:-1; overflow: scroll;overflow-x: hidden;}
#con{ margin-top:10px; }
#tags{ height:40px; width:100%; margin:auto;}
#tags li.selectTag { border-bottom:2px #f5b276 solid; height: 40px; line-height:40px;  position: relative;}
#tags li {border-bottom:2px #b5c9e5 solid; width:50%; text-align:center;   float: left; height: 40px; line-height:40px;  list-style-type: none;}
#tags li a{font: 400 0.986em/2.8 "Microsoft Yahei"; display:block; width:100%; text-align:center; height: 40px; line-height:40px; }
.box1{ height:160px; border-bottom:#bed0e8 1px solid; margin:20px;width:100%;}
.box1 h2{font: 400 1.286em/2.8 "Microsoft Yahei"; color:#4A6C9A;width:100%;}
.box1 li{ float:left;}
.box1 .fen,.blue{ background:url(<?php  echo $this->_img_url?>bg_paper_score.png) no-repeat; width:186px; padding-top:12px; margin-right:40px; height:84px; line-height:84px;  text-align:center; color:#fff;font: 600 1.286em/2.8 "Microsoft Yahei"; }
.box1 .fen span,.blue span{font: 500 14px/1 "Microsoft Yahei";}
.box1 .pin { height:34px; line-height:30px; font: 500 18px/2 "Microsoft Yahei";color:#4A6C9A; margin-right:40px; border-right:#b5c9e5 1px solid; padding-right:40px;width:100%;}
.box1 .pin .dian{ color:#000;}
.blue{ background:url(<?php  echo $this->_img_url?>bg_paper_complete_seconds.png.png) no-repeat;}
.none{ border:none; margin-right:0px; padding-right:0px;}
.tagContent{margin-bottom:15px;}
.tagContent button{ background:url(<?php  echo $this->_img_url?>btn_login_normal.png) no-repeat; background-size:cover; width:90%; height:50px; border: 0 none;margin:20px 20px 0px 20px;color:#FFF;font: 400 16px/2.8 "Microsoft Yahei"; }
.tagContent button:hover{ background:url(<?php  echo $this->_img_url?>btn_login_pressed.png) no-repeat;background-size:100% 80%;}
#tagContent1 table tr td{ text-align:center; color: #4A6C9A; }
#tagContent1 table .title{ background:#d3e0f1; height:25px;}
#tagContent1 table .first{ background:url(<?php  echo $this->_img_url?>bg_paper_ranking_light.png) no-repeat scroll 5px 7px rgba(0, 0, 0, 0); width:55; height:60px; color:#FFF;}
#tagContent1 table .four{ background:url(<?php  echo $this->_img_url?>bg_paper_ranking_grey.png) no-repeat scroll 5px 7px rgba(0, 0, 0, 0);width:55px; height:60px; color:#FFF;}
.shandow td{ border-bottom:#c2d2ea 1px solid;}
.more{ text-align:center; width:100%; position:absolute; bottom:20px;}
footer{ background:url(<?php  echo $this->_img_url?>footer_bg.PNG) repeat-x; height:16px; width:100%; position:absolute; bottom:0px;}
</style>
<script language='javascript' src='<?php  echo $this->_script_url?>jquery.js'></script>
</head>
<body>
<header>
	<h1>考试成绩</h1>
	<!--<div class="return" onclick="location.href='moni.html'"></div>-->
	<a class="xuan" href="<?php  echo $this->createMobileUrl('index')?>">首页</a>
</header>
<menu>
	<div id="con">
		<ul id="tags">
			<li class="selectTag"><a onClick="selectTag('tagContent0',this)" href="javascript:void(0)">成绩总结</a></li>
			<li><a onClick="selectTag('tagContent1',this)"  href="javascript:void(0)">排行榜</a></li>
		</ul>
		<div id="tagContent">
			<div id="tagContent0" class="tagContent">
				<div class="box1" style=" border:none;">
					<h2>试卷得分</h2>
					<ul>
						<li class="fen"><?php  echo $record_info['score'];?><span> 分</span></li>
						<li class="pin">平均分数: <span class="dian"><?php  echo $paper_info['avscore'];?> 分</span></li>
						<li class="pin">试卷总分: <span class="dian"><?php  echo $paper_info['score'];?> 分</span></li>
					</ul>
				</div>
				<div class="box1" style=" border:none;">
					<h2>作答时间</h2>
					<ul>
						<li class="blue"><?php  echo format_use_time($record_info['times'])?></li>
						<li class="pin">平均时间: <span class="dian"><?php  echo format_use_time($paper_info['avtimes'])?></span></li>
						<li class="pin">考试时间:  <span class="dian"><?php  echo $paper_info['times'];?> 分钟</span></li>
					</ul>
				</div>
				<button onclick="location.href='<?php  echo $url_answer;?>'">查看答案及解析</button>
				<br />
				<button onclick="location.href='<?php  echo $url;?>'">重新作答</button>
			</div>
			<div class="clear"></div>
			<div id="tagContent1" class="tagContent selectTag" style="display: none;">
				<table width="100%" border="0">
					<tr class="title">
						<td width="">排名</td>
						<?php  if($this->_set_info['login_flag'] == 1) { ?>
						<td>用户名</td>
						<?php  } ?>
						<td>姓名</td>
						<td>耗时</td>
						<td>得分</td>
					</tr>
					<?php  if(is_array($order_info)) { foreach($order_info as $key => $row) { ?>
					<tr class="shandow">
						<td class="<?php  if($key < 3) { ?>first<?php  } else { ?>four<?php  } ?>"><?php  echo ($key+1)?></td>
						<?php  if($this->_set_info['login_flag'] == 1) { ?>
						<td><?php  echo $row['userid'];?></td>
						<?php  } ?>
						<td><?php  echo $row['username'];?></td>
						<td><?php  echo format_use_time($row['times'])?></td>
						<td><?php  echo $row['score'];?></td>
					</tr>
					<?php  } } ?>
			</div>
		</div>
	</div>
</menu>
<script type=text/javascript>
function selectTag(showContent,selfObj){
	// 标签
	var tag = document.getElementById("tags").getElementsByTagName("li");
	var taglength = tag.length;
	for(i=0; i<taglength; i++){
	tag[i].className = "";
	}
	selfObj.parentNode.className = "selectTag";
	// 标签内容
	for(i=0; j=document.getElementById("tagContent"+i); i++){
	j.style.display = "none";
	}
	document.getElementById(showContent).style.display = "block";
}
</script>
</body>
</html>

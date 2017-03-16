<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH;?>css/main.css" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_PATH;?>css/dialog.css" media="all" />
		<script type="text/javascript" src="<?php echo TEMPLATE_PATH;?>js/jquery_min.js"></script>
		<script type="text/javascript" src="<?php echo TEMPLATE_PATH;?>js/dialog_min.js"></script>
		<script type="text/javascript" src="<?php echo TEMPLATE_PATH;?>js/calendar.js"></script>
		<script type="text/javascript" src="<?php echo TEMPLATE_PATH;?>js/main.js"></script>
		<script type="text/javascript" src="<?php echo TEMPLATE_PATH;?>js/mymain.js"></script>
		<title>签到</title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
		<!-- Mobile Devices Support @begin -->
            <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
            <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
            <meta content="no-cache" http-equiv="pragma">
            <meta content="0" http-equiv="expires">
            <meta content="telephone=no, address=no" name="format-detection">
            <meta name="apple-mobile-web-app-capable" content="yes" /> <!-- apple devices fullscreen -->
            <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <!-- Mobile Devices Support @end -->

    </head>
    <body onselectstart="return true;" ondragstart="return false;">
        <style type="text/css"> 
			.Calendar { 
				font-family:Verdana; 
				background-color:#EEE; 
				text-align:center; 
				height: 300px;
				line-height:1.5em; 
			}
			.Calendar .icons{
				display: block;
				width:40px;
				height:40px;
				background: url(<?php echo TEMPLATE_PATH;?>img/icons4.png) no-repeat center -300px;
				-webkit-background-size:50px auto;
			}
			.Calendar .icons_after{
				background-position: center -350px;
			}
			.Calendar header{
				font-size:14px;
				color:#888e8e;
				line-height:50px;
				height:50px;
				background:#ffffff;
				box-shadow: 0 5px 5px rgba(100,100,100,0.1);
			}
			.Calendar a{ 
				color:#0066CC; 
			} 
			.Calendar table{ 
				width:280px;
				margin:auto;
				border:0; 
			} 
			.Calendar table thead{color:#acacac;} 
			.Calendar table td {
				color:#989898;
				border:1px solid #ecf9fa;
				width:40px;
				height:40px;
				margin:1px;
				background: #ffffff;
				-webkit-box-sizing:border-box;
			}
			.Calendar thead td, .Calendar td:empty{
				background:none;
				border:0;
			}
			.Calendar thead td{
				color:#72bec9;
				font-size:13px;
				font-weight:bold;
			}
			#idCalendarPre{ 
				cursor:pointer; 
				float:left; 
			} 
			#idCalendarNext{ 
				cursor:pointer; 
				float:right;
			} 

			#idCalendar td a.checked{ 
				display: block;
				height:100%;
				border:1px solid #58c4d1; 
				line-height:38px;
				color:#989898;
			}
			#idCalendar td.onToday, #idCalendar td.onToday a{
				color:#ff3600!important;
			}
		</style>
		<script>
			/**
 			 * 积分签到
			*/
			function dosignin() {
				//提交信息
				$.ajax({
					type: "post",  
					url: "<?php  echo $this->createMobileUrl('sign', array('rid' => $rid));?>",
					dataType: "json",  
					success: function(html){
				    	if (html.status == 1) {
							alert(html.msg,1500);
							setTimeout("location.reload();",1500);
				    	} else {
				    		alert(html.msg,1500)
							redirect(html.url,1500);
				    	}
					}
				});
				
				
			}
		</script>
		<div class="container integral">
			<header>
				<ul class="tbox tbox_1">
					<li >
						<p class="pre">
							<label><?php  echo $profile['credit1'];?></label>
							可用积分
						</p>
					</li>
					<li>
					<?php  if($today_usersigned_num >= $times) { ?>
					<a href="javascript:void(0)" onclick="dosignin()" ><label>已签到</label></a>
					<?php  } else { ?>
					<a href="javascript:void(0)" onclick="dosignin()" ><label>签到</label></a>
					<?php  } ?>		
					</li>
					<li>
						<p class="pre">
							<label><?php  echo $user_maxallsign_num;?></label>
							签到次数
						</p>
					</li>
				</ul>
				<nav class="nav_integral">
					<ul class="box">
						<li><a href="<?php  echo $this->createMobileUrl('prize', array('rid' => $rid ));?>"><span class="icons icons_prize">&nbsp;</span><label>获奖记录</label></a></li>
						<li><a href="<?php  echo $this->createMobileUrl('record', array('rid' => $rid ));?>"><span class="icons icons_luck">&nbsp;</span><label>签到记录</label></a></li>
						<li><a href="<?php  echo $this->createMobileUrl('top', array('rid' => $rid ));?>"><span class="icons icons_record">&nbsp;</span><label>今日排名</label></a></li>
						<?php  if($meepo_bbs) { ?>
						<li><a href="<?php  echo murl('entry',array('do'=>'activity_coupon','m'=>'meepo_bbs'))?>"><span class="icons icons_teach">&nbsp;</span><label>积分兑换</label></a></li>
						<?php  } else { ?>
						<li><a href="<?php  echo $token_url?>"><span class="icons icons_teach">&nbsp;</span><label>积分兑换</label></a></li>
						<?php  } ?>
					</ul>
				</nav>
			</header>
			<div class="body">
				<div>
					<div class="Calendar"> 
						<header>
							<div id="idCalendarPre"><span class="icons icons_before">&nbsp;</span></div> 
						<div id="idCalendarNext"><span class="icons icons_after">&nbsp;</span></div> 
						<span id="idCalendarYear">0</span>年 <span id="idCalendarMonth">0</span>月 
						</header>
						<table cellspacing="0"> 
							<thead> 
								<tr> 
									<td>日</td> 
									<td>一</td> 
									<td>二</td> 
									<td>三</td> 
									<td>四</td> 
									<td>五</td> 
									<td>六</td> 
								</tr> 
							</thead> 
							<tbody id="idCalendar"> 
							</tbody> 
						</table> 
					</div>
					<script language="JavaScript"> 
						var cale = new Calendar("idCalendar", {
							Year : <?php  echo $this_year;?>,
							Month : <?php  echo $this_month;?>, 
							onToday: function(o){ o.className = "onToday"; }, 
							onFinish: function(){ 
								this.Year = <?php  echo $this_year;?>;
								this.Month = <?php  echo $this_month;?>; 
								$$("idCalendarYear").innerHTML = this.Year;
								$$("idCalendarMonth").innerHTML = this.Month; 
								var flag = <?php  echo $user_signed_days;?>;
								for(var i = 0, len = flag.length; i < len; i++){ 
									this.Days[flag[i]].innerHTML = "<a href='javascript:void(0);' class='checked'>" + flag[i] + "</a>"; 
								} 
							}
						}); 
						$$("idCalendarPre").onclick = function(){ location.href = "<?php  echo $this->createMobileUrl('index', array('rid' => $rid, 'bd' => $last_month_b, 'ed' => $last_month_e));?>"; } 
						$$("idCalendarNext").onclick = function(){ location.href = "<?php  echo $this->createMobileUrl('index', array('rid' => $rid, 'bd' => $next_month_b, 'ed' => $next_month_e));?>"; } 
					</script>
				</div>
			</div>
		

</body>


<script type="text/javascript">
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	WeixinJSBridge.call('hideToolbar');
});

   document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
        
        // 发送给好友
        WeixinJSBridge.on('menu:share:appmessage', function (argv) {
            WeixinJSBridge.invoke('sendAppMessage', { 
                "img_url": "<?php  echo $Picurl;?>",
                "img_width": "640",
                "img_height": "640",
                "link": "<?php  echo $_W['siteroot'].$this->createMobileUrl('index', array('rid' => $rid));?>",
                "desc":  "<?php  echo $reply['description'];?>",
                "title": "<?php  echo $reply['title'];?>"
            }, function (res) {
                _report('send_msg', res.err_msg);
            })
        });

        // 分享到朋友圈
        WeixinJSBridge.on('menu:share:timeline', function (argv) {
            WeixinJSBridge.invoke('shareTimeline', {
                "img_url": "<?php  echo $Picurl;?>",
                "img_width": "640",
                "img_height": "640",
                "link": "<?php  echo $_W['siteroot'].$this->createMobileUrl('index', array('rid' => $rid));?>",
                "desc":  "<?php  echo $reply['description'];?>",
                "title": "<?php  echo $reply['title'];?>"
            }, function (res) {
                _report('timeline', res.err_msg);
            });
        });

        // 分享到微博
        WeixinJSBridge.on('menu:share:weibo', function (argv) {
            WeixinJSBridge.invoke('shareWeibo', {
                "content": "<?php  echo $reply['description'];?>",
                "url": "<?php  echo $_W['siteroot'].$this->createMobileUrl('index', array('rid' => $rid));?>"
            }, function (res) {
                _report('weibo', res.err_msg);
            });
        });
        }, false)
</script>

</html>



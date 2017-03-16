<?php defined('IN_IA') or exit('Access Denied');?>
<!doctype html>
<html lang="ch">
<head>
<meta charset="utf-8">

<meta name="format-detection" content="telephone=no" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta HTTP-EQUIV="Pragma" CONTENT="no-cache">
<meta HTTP-EQUIV="Expires" CONTENT="-1">
<title><?php  echo $activity['name']?></title>


	
<style>
.css_sprite01 {
	background: url(../addons/we7_activity/images/css_sprite01.png)
		no-repeat;
	background-repeat: no-repeat;
}

.s-bgBoder01 {
	background: url(../addons/we7_activity/images/bg01_speaker.gif)
		center top repeat-y;
} /* 边框背景 中间 */
.s-bgBoder02 {
	background: url(../addons/we7_activity/images/bg01_speaker.gif) left
		top repeat-y;
} /* 边框背景 左边*/
.m-bigPic .bigPicCon .picCon .btn p {
	background: url("../addons/we7_activity/images/btn01_bigPic.png")
		repeat scroll 0 0 rgba(0, 0, 0, 0);
	height: 57px;
	margin: 0 auto;
	text-align: center;
	width: 41px;
	animation: mapJump 2s infinite;
	-moz-animation: mapJump 2s infinite;
	-webkit-animation: mapJump 2s infinite;
	-o-animation: mapJump 2s infinite;
	-ms-animation: mapJump 2s infinite;
}
</style>

<link rel="stylesheet" type="text/css"
	href="../addons/we7_activity/css/main.css" />
<!--[if lt IE 9]>
		<script type="text/javascript" src="/template/14/ext/1_html5.js"></script>
	<![endif]-->
<script type="text/javascript">
		var phoneWidth = parseInt(window.screen.width);
		var phoneScale = phoneWidth/640;
		var isAndroid = RegExp("Android").test(navigator.userAgent);
		if (isAndroid) {
			document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">');
		} else {
			document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
		}
		//微信去掉下方刷新栏
		if(RegExp("MicroMessenger").test(navigator.userAgent)){
			document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
			    WeixinJSBridge.call('hideToolbar');
			});
		}
	</script>
<script type="text/javascript">
		//开始禁止大屏幕的滑动事件
		window.addEventListener('touchmove',fnScrollStop,false);
		function fnScrollStop(e){e.preventDefault()};
		var AppId = 1840;
	</script>
</head>
<body>

	<section class="transformNode">
		<section class="m-bigPic" data-layout='16851'>
			<div class="bigPicCon">
				<div class="picCon"
					style="background: url(<?php  echo $_W['attachurl'];?><?php  echo $activity['ac_pic'];?>) left top no-repeat; background-size: cover;">
					<div class="txt">
						<input type="hidden" value='../addons/we7_activity/images/5332c52c2f9fc16851.jpg'
							id='wx-share-img'> <input type="hidden"
							value='<?php  echo $activity['name'];?>' id='wx-share-title'>
						<h1 id='wx-share-desc1'></h1>
						<textarea class="subtxt" readonly="readonly" id='wx-share-desc2'></textarea>
						<div>
						
						<p class="u-sigeUp" data-sigeUp='1' data-finish='false'
							data-switch='<?php  echo $allowApply;?>'>
							
							<a href="javascript:void(0)"><?php  echo $applyBtnText;?></a>
							
						</p>
						</div>
					</div>
					<div class="btn">
						<p class="btn02">
							<img src="../addons/we7_activity/images/btn01_bigPic.png"
								alt="arrow" /><img
								src="../addons/we7_activity/images/btn02_bigPic.png"
								alt="arrow" />
						</p>
					</div>
				</div>
			</div>
		</section>
		
		
		<section class="subPage">
			<section class="m-intro m-submitAjax" data-ajax='true'
				data-layout="16852">
				<div class="imgBox">
					<input type="hidden"
						value="<?php  echo $_W['attachurl'];?><?php  echo $activity['ppt1'];?>,<?php  echo $_W['attachurl'];?><?php  echo $activity['ppt2'];?>,<?php  echo $_W['attachurl'];?><?php  echo $activity['ppt3'];?>" />
				</div>
				<div class="txt">
					<p>
					<?php  echo $activity['acdes']?>
					</p>
				</div>
			</section>
			<section class="m-address m-submitAjax" data-ajax='true'
				data-layout="16853">
				<h3 class="u-title01">活动时间&amp;地点</h3>
				<div class="addressCon">
					<p class="time">
						<a href="javascript:void(0)" onclick='function(){return false;}'><span
							class="css_sprite01 s-bgTime01"></span><span>
							<?php  echo date('Y-m-d H:i:s', $activity['begintime'])?>至
							<?php  echo date('Y-m-d H:i:s', $activity['endtime'])?>
						</span></a>
					</p>
					<p class="place mapBtn" data-mapIndex='1' data-iconMove='true'
						data-mapPara='<?php  echo $addressDetail;?>'>
						<a href="javascript:void(0)" data-layout='map' data-name='地图导航'><span
							class="icon css_sprite01 s-bgPlace01"></span><span> <?php  echo $activity['address'];?></span></a>
							
							
					</p>
				</div>
			</section>
			<!-- 活动 -->
			<?php  if(!empty($daylist)) { ?>
			<section class="m-process m-submitAjax m-changePage"
				data-layout="16854" data-ajax='true'>
				<h4 class="u-title01">活动日程</h4>
				
		
				<?php  if(is_array($daylist)) { foreach($daylist as $item) { ?>
				<div class="AMCon">
					<div class="fenlei f-fl">
						
					</div>
					<div class="theme s-bgBoder02 f-fl">
						<ul>
							<li>
								<div class="themeTime ">
									<div class="timeCon">
										<span class="arrow"></span>
										<p onclick='function(){return false;}'><?php  echo date('Y-m-d H:i', $item['daytime'])?></p>
									</div>
								</div>
								<div class="themeCon">
									<p>
										<span class="name peopleOpen" data-headId=''><?php  echo $item['dname'];?></span><span
											class="title"><?php  echo $item['ddes'];?></span>
									</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<?php  } } ?>
				
				
				
			</section>
			<?php  } ?>
			
		<?php  if(!empty($guest)) { ?>	
		
			<!-- 嘉宾 -->
			<section class="m-speaker m-submitAjax s-bgBoder01 m-changePage"
				data-ajax='true' data-layout='16855'>
				<h3 class="u-title01">演讲嘉宾</h3>
				<div class="peopleHeader">
				
				
				
				
					<div class="headerBox left f-fl">
						<ul>
							<?php  if(is_array($addguest)) { foreach($addguest as $guest) { ?>
							<li>
								<div class="peopleId leftHeader">
									<div class="u-imgHeader peopleOpen" data-headId='<?php  echo $guest['id'];?>'>
										<p>
											<span><img class="lazy-image"
												data-original="<?php  echo $_W['attachurl'];?><?php  echo $guest['headimage'];?>"
												alt="头像" /></span>
										</p>
										<span class="arrow"></span>
									</div>
									<p class="name"><?php  echo $guest['gname'];?></p>
								</div>
							</li>
							<?php  } } ?>
						</ul>
					</div>
					<div class="headerBox right f-fl">
						<ul>
						<?php  if(is_array($evenguest)) { foreach($evenguest as $guest2) { ?>
							<li>
							
								<div class="peopleId rightHeader">
									<div class="u-imgHeader peopleOpen" data-headId='<?php  echo $guest2['id'];?>'>
										<p>
											<span><img class="lazy-image"
												data-original="<?php  echo $_W['attachurl'];?><?php  echo $guest2['headimage'];?>"
												alt="头像" /></span>
										</p>
										<span class="arrow"></span>
									</div>
									<p class="name"><?php  echo $guest2['gname'];?></p>
								</div>
							</li>
							<?php  } } ?>
						</ul>
					</div>
				</div>
			</section>
			
			
			<?php  } ?>
			
			
			
			<section class="m-intro m-submitAjax" data-ajax='true'
				data-layout="16858">
				
				<div class="txt">
					<p>
						<?php  if(!empty($activity['zb'])) { ?>活动主办：<?php  echo $activity['zb'];?> <br /><?php  } ?>
						<?php  if(!empty($activity['cb'])) { ?>活动承办：<?php  echo $activity['cb'];?><br/><?php  } ?>
						<?php  if(!empty($activity['xb'])) { ?>活动协办：<?php  echo $activity['xb'];?><br/><?php  } ?>
						<?php  if(!empty($activity['cjdx'])) { ?>参加对象：<?php  echo $activity['cjdx'];?><?php  } ?>
					</p>
				</div>
			</section>
			
			<?php  if(!empty($notelist)) { ?>	
			
			<?php  if(is_array($notelist)) { foreach($notelist as $note) { ?>
			
			<!-- 酒店说明 -->
			<section class="m-intro m-submitAjax" data-ajax='true'
				data-layout="16859">
				<h3 class="u-title01"><?php  echo $note['title'];?></h3>
				<div class="txt">
					<p>
						<?php  echo $note['ndesc'];?>
					</p>
				</div>
			</section>
			
			<?php  } } ?>
			
			<?php  } ?>
			
			
			
			<section class="m-contact m-submitAjax s-bgPage" data-ajax='true'
				data-layout="24028">
				<h3 class="u-title01">联系我们</h3>
				<div class="contactCon">
					<p class="tel">
						<a href="tel:<?php  echo $activity['tel'];?>" data-layout='tel' data-name='一键电话'><span
							class="css_sprite01 s-bgTel"></span><span><?php  echo $activity['tel'];?></span></a>
					</p>
					<p class="mail">
						<a href="mailto:<?php  echo $activity['email'];?>" data-layout='email'
							data-name='邮件发送'><span class="css_sprite01 s-bgMail"></span><span><?php  echo $activity['email'];?></span></a>
					</p>
					<p class="location mapBtn" data-mapIndex='2' data-iconMove='true'
						data-mapPara='<?php  echo $addressDetail;?>'>
						<a href="javascript:void(0)" data-layout='map' data-name='地图导航'>
							<span class="icon css_sprite01 s-bgPlace02"></span><span><?php  echo $activity['address'];?></span>
						</a>
					</p>
					
					
				</div>
				<p class="u-sigeUp" data-sigeUp='1' data-finish='false'
							data-switch='<?php  echo $allowApply;?>'>
							<a href="javascript:void(0)"><?php  echo $applyBtnText;?></a>
							
				</p>
				
				<p style="text-align: center;margin-top: 10px">
					<span ><font  size="5"><strong>已有<?php  echo $applyCount;?>人报名(限制人数：<?php  echo $applyLimit;?>)</strong></font></span>
				</p>
				
			</section>
			<footer class="footer">
				
			</footer>
		</section>
	</section>
	
	
	<section class="m-people">
		<ul class='allow-close'>
		<?php  if(is_array($addguest)) { foreach($addguest as $guestdetail) { ?>
			
			<li>
				<div class="peopleId leftHeader" data-headId='<?php  echo $guestdetail['id'];?>'>
					<div class="peopleCon">
						<div class="u-imgHeader f-fl">
							<p>
								<span><img
									data-src="<?php  echo $_W['attachurl'];?><?php  echo $guestdetail['headimage'];?>"
									alt="头像" class='lazy-img' /></span>
							</p>
						</div>
						<div class="txtHeader f-fl">
							<h3>
								<?php  echo $guestdetail['gname'];?><span><?php  echo $guestdetail['jobtitle'];?></span>
							</h3>
							<h4><?php  echo $guestdetail['sig'];?></h4>
						</div>
					</div>
					<div class="speakCon">
						<p>
							<?php  echo $guestdetail['gdesc'];?>
						</p>
					</div>
				</div>
				<p class="u-close"></p>
			</li>
			
			<?php  } } ?>
			
			
			
				<?php  if(is_array($evenguest)) { foreach($evenguest as $guestdetail1) { ?>
			
			<li>
				<div class="peopleId leftHeader" data-headId='<?php  echo $guestdetail1['id'];?>'>
					<div class="peopleCon">
						<div class="u-imgHeader f-fl">
							<p>
								<span><img
									data-src="<?php  echo $_W['attachurl'];?><?php  echo $guestdetail1['headimage'];?>"
									alt="头像" class='lazy-img' /></span>
							</p>
						</div>
						<div class="txtHeader f-fl">
							<h3>
								<?php  echo $guestdetail1['gname'];?><span><?php  echo $guestdetail1['jobtitle'];?></span>
							</h3>
							<h4><?php  echo $guestdetail1['sig'];?></h4>
						</div>
					</div>
					<div class="speakCon">
						<p>
							<?php  echo $guestdetail1['gdesc'];?>
						</p>
					</div>
				</div>
				<p class="u-close"></p>
			</li>
			
			<?php  } } ?>
			
		</ul>
	</section>
	
	<section class="m-sigeUp" data-sigeUp="1" data-layout='form'
		data-name='表单预约'>
		<div class="mwrap">
			<div class="wrapSige">
				<h3>我要报名</h3>
				<form class="formVal" action=''>
					<fieldset>
						<p class="name">
							<span class="title">姓名 <font color='red'>(必填)</font></span><input name="uname" type="text"
								placeholder="输入姓名" value="<?php  echo $user['uname'];?>"/>
						</p>
						<div class="sex">
						
							<p data-sex='女士'>
								<span class="value">女士</span><span class="select"><strong  <?php  if($user['sex']=='女士') { ?>class="open"<?php  } ?>></strong></span>
							</p>
							<p data-sex='先生'>
								<span class="value">先生</span><span class="select"><strong <?php  if($user['sex']=='先生') { ?>class="open"<?php  } ?>></strong></span>
								<font color='red'>(必选)</font>
							</p>	
						
							<input type="hidden" value='<?php  echo $user['sex'];?>' name='radio'>
						</div>
						<p class="tel">
							<span class="title">联系电话 <font color='red'>(必填)</font></span><input name='tel' type="tel"
								placeholder="输入联系电话" value="<?php  echo $user['tel'];?>"/>
						</p>
						<p class="mail">
							<span class="title">邮箱 </span><input name='email' type="text"
								placeholder="输入邮箱"  value="<?php  echo $user['email'];?>"/>
						</p>
						<p class="conpany">
							<span class="title">公司</span><input name='company' type="text"
								placeholder="输入公司" value="<?php  echo $user['company'];?>"/>
						</p>
						<p class="work">
							<span class="title">职务</span><input name='job' type="text"
								placeholder="输入职务" value="<?php  echo $user['jobtitle'];?>"/>
						</p>
						<p class="submit">
							<input type="submit" value="提交" />
						</p>
					</fieldset>
					<input type="hidden" value='<?php  echo $id;?>' name='aid'>
					<input type="hidden" value='<?php  echo $activity['name'];?>' name='acname'>   
					<input type="hidden" value='' name='fakeid'>
				</form>
				<p class="u-close"></p>
			</div>
			<p class="popup popup_error">请您完整填写报名信息，谢谢！</p>
			<p class="popup popup_sucess">感谢您申请参加<?php  echo $activity['name'];?>!</p>
		</div>
	</section>
	
	
	<section class="ylmap bigOpen">
		<div class='bk'>
			<span class='css_sprite01'></span>
		</div>
	</section>
	<section class="erweima">
		<p class="erweima-content">
			<span class='img'><img class='imgScale' alt="二维码下载" /></span> <span
				class='btn saveImg'><a href='javascript:void(0)'>保存到相册</a></span> <span
				class='arrow u-arrow' data-type='close'></span>
		</p>
	</section>
	<section class="sigeSuccess">
		<p class="sigeSuccess-content">
			<span class='img'><img class='imgScale' alt="你的二维码" /></span> <span
				class='btn saveImg'><a href='javascript:void(0)'>保存到相册</a></span> <span
				class='arrow u-arrow' data-type='close'></span>
		</p>
	</section>
	<section class="pageLoading">
		<img src="../addons/we7_activity/images/load.gif" alt="loading" />
	</section>
	
<input type="hidden" value='1840' id='activity_id' />
<input type="hidden" value='' id='fakeid'>
<input type='hidden' value='images/1840.png' id='qr_img'/>
<input type="hidden" value='' id='check_img' />
<input type="hidden" value='<?php  echo $this->createMobileUrl('apply')?>' id='submiturl' />

	<script src="../addons/we7_activity/js/jquery-1.7.2.min.js" type="text/javascript"></script>
	<script type="text/javascript"
		src="../addons/we7_activity/js/jquery1.8.2.min.js?1397525361"></script>
	<script type="text/javascript" src="../addons/we7_activity/js/wxm-core176ed4.js?1397525361"></script>
	<script type="text/javascript"
		src="../addons/we7_activity/js/wxshare.js?1409560909"></script>
	<script type="text/javascript"
		src="../addons/we7_activity/js/1_html5.js?1386935008"></script>
	<script type="text/javascript"
		src="../addons/we7_activity/js/3_jquery.easing.1.3.js?1386935008"></script>
	<script type="text/javascript"
		src="../addons/we7_activity/js/8_ylMap.js?1392963232"></script>
	<script type="text/javascript"
		src="../addons/we7_activity/js/9_slidepic.js?1393912181"></script>
	<script type="text/javascript"
		src="../addons/we7_activity/js/16_lazyload.js?1393038124"></script>
	<script type="text/javascript"
		src="../addons/we7_activity/js/99_main.js"></script>
	<script type="text/javascript"
		src="../addons/we7_activity/js/statics.js?1397862005"></script>
</body>
</html>
<?php  echo register_jssdk(false);?>
<script type="text/javascript">


	wx.ready(function () {
		sharedata = {
			title: "<?php  echo $activity['name']?>",
			desc: "<?php  echo $shareContent?>",
			link: window.location.href,
			imgUrl: "<?php  echo $_W['attachurl'];?><?php  echo $sharepic;?>",
			success: function(){
				
			},
			cancel: function(){
				
			}
		};
		wx.onMenuShareAppMessage(sharedata);
		wx.onMenuShareTimeline(sharedata);
	});
	

	
</script>


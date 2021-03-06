<?php defined('IN_IA') or exit('Access Denied');?><!-- 
 * 微课堂首页
 * ============================================================================
-->
<?php  include $this->template('_header');?>
<link href="<?php echo MODULE_URL;?>template/mobile/style/details.css?v=1.2.9" rel="stylesheet" />

<?php  if(!empty($hisplayurl)) { ?>
<div class="follow_topbar">
	<div class="headimg"><img src="<?php  echo $fansinfo['avatar'];?>"></div>
	<div class="info" style="height:20px;width:60%;overflow: hidden;">
		<div class="i">上次学习章节：</div>
		<div class="i">《<?php  echo $hissection['title'];?>》</div>
	</div>
	<div class="sub" style="background:#2691FC;" onclick="location.href='<?php  echo $hisplayurl;?>'">立即跳转</div>
</div>
<?php  } ?>
<?php  if($setting['isfollow']==1 && !empty($lessonmember) && $lessonmember['follow']==0) { ?>
<div class="follow_topbar" <?php  if(!empty($hisplayurl)) { ?>style="top:44px;"<?php  } ?>><div class="headimg"><img src="<?php  echo $_W['attachurl'];?><?php  echo $setting['qrcode'];?>"></div><div class="info"><div class="i"><?php  echo $_W['account']['name'];?></div><div class="i">关注公众号，享海量课程</div></div><div class="sub" onclick="location.href='<?php  echo $this->createMobileUrl('follow');?>'">立即关注</div></div>
<?php  } ?>

<div class="content-inner">
	<div class="video-wrap clearfix">
		<div id="videoarea" style="position:relative;">
		<?php  if($_GPC['sectionid']>0) { ?>
			<?php  if($section['savetype']==2) { ?>
				<?php  echo htmlspecialchars_decode($section['videourl']);?>
			<?php  } else { ?>
			<video id="video" src="<?php  echo $section['videourl'];?>" width="100%" height="auto" controls="controls" autobuffer="autobuffer"></video>
			<?php  } ?>
		<?php  } else { ?>
			<img src="<?php  echo $_W['attachurl'];?><?php  echo $lesson['images'];?>" alt="<?php  echo $lesson['bookname'];?>" width="100%">
		<?php  } ?>
		</div>
	</div>
	<ul class="course-tab">
		<li class="curr">章节</li>
		<li>详情</li>
		<li>评价(<?php  echo $total;?>)</li>
	</ul>
	<div class="course-container">
		<div class="js-tab" style="transform-origin: 0px 0px 0px; opacity: 1; transform: scale(1, 1);">
			<ul class="course-chapter">
				<li>
					<h2 class="chapter-title" onclick="location.href='<?php  echo $this->createMobileUrl('lesson', array('id'=>$lesson['id']));?>'"><i></i><?php  echo $lesson['bookname'];?>[共<?php  echo count($section_list);?>节课]</h2>
					<ul class="course-sections">
					<?php  if(!empty($section_list)) { ?>
						<?php  if(is_array($section_list)) { foreach($section_list as $sec) { ?>
						<li>
							<i class="section-icon section-icon-video"></i>
							<a href="<?php  echo $this->createMobileUrl('lesson', array('id'=>$lesson['id'],'sectionid'=>$sec['id']));?>" <?php  if($sectionid==$sec['id']) { ?>class="section-active"<?php  } ?>><?php  echo $sec['title'];?><?php  if($sec['is_free']==1) { ?><span style="color:#128C62;">[免费试听]</span><?php  } ?></a>
							<i class="section-state-icon"><?php  echo $sec['videotime'];?></i>
						</li>
						<?php  } } ?>
					<?php  } else { ?>
						<li style="height:auto;padding:10%;">
							<a style="text-align:center;">抱歉，该课程没有找到任何章节~</a>
						</li>
					<?php  } ?>
					</ul>
				</li>
			<ul>
		</div>
		<div class="js-tab" style="transform-origin: 0px 0px 0px; opacity: 1; transform: scale(1, 1); display: none;">
			<ul class="course-intro">
				<li>
					<h2 class="chapter-title">课程信息</h2>
					<p class="course-intro-title">课程名称：<?php  echo $lesson['bookname'];?></p>
					<p class="course-intro-title">赠送积分：<?php  echo $lesson['integral'];?> 积分</p>
					<p class="course-intro-title">课程难度：<?php  echo $lesson['difficulty'];?></p>
					<p class="course-intro-title">会员学习：<?php echo $lesson['vipview']==1?'免费学习':'付费购买';?></p>
				</li>
				<li>
					<h2 class="chapter-title">讲师</h2>
					<p>
						<span class="chapter-intro-user" onclick="location.href='<?php  echo $this->createMobileUrl('teacher', array('teacherid'=>$lesson['teacherid']));?>'"><img src="<?php  echo $_W['attachurl'];?><?php  echo $lesson['teacherphoto'];?>" width="50" height="50"><?php  echo $lesson['teacher'];?></span><?php  echo $lesson['teacherdes'];?>
					</p>
				</li>
				<li>
					<h2 class="chapter-title">课程介绍</h2>
					<div>
						<?php  echo htmlspecialchars_decode($lesson['descript']);?>
					</div>
				</li>
			</ul>
		</div>
		<div class="js-tab" style="transform-origin: 0px 0px 0px; opacity: 1; transform: scale(1, 1); display: none;">
			<div class="swiper-slide swiper-slide-active" style="height:auto;">
                <div class="details-con shadow" id="comments_box">
					<ul class="comment" id="evaluate">
						<?php  if($allow_evaluate) { ?>
						<li class="item" style="padding:.1rem .05rem;text-align:center;">
							<div>
								有什么想要说的呢？赶紧
								<a class="btn btn-default btn-sm" href="<?php  echo $evaluate_url;?>">去评价</a>
								吧~
							</div>
						</li>
						<?php  } ?>
					</ul>
				</div>
			</div>
			<div style="font-size:.14rem; text-align:center; <?php  if(empty($evaluate_list)) { ?>display:none<?php  } ?>;">
				<a href="javascript:void(0);" id="btn_Page">点击加载更多</a>
			</div>
		</div>
	</div>
</div>

<div id="loading" style="position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.6);z-index:9999;"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>

<div id="bottom-contact" class="hide">
	<div class="contact-wrap">
		<div class="contact-wrap-title">咨询交流</div>
		<?php  if(!empty($lesson['weixin_qrcode'])) { ?>
		<div class="border-top layer-list_item">
			<a href="javascript:;">
				<div class="layer-list_item-icon" style="border-radius:0;">
					<img class="layer-list_item-img" src="<?php  echo $_W['attachurl'];?><?php  echo $lesson['weixin_qrcode'];?>">
				</div>
				<p class="layer-list_item-name">微信咨询</p>
				<p class="layer-list_item-info">长按左侧二维码并识别</p>
				<div class="layer-list_item-go">
					<i class="icon-font i-v-right">&gt;</i>
				</div>
			</a>
		</div>
		<?php  } ?>
		<?php  if(!empty($lesson['qq'])) { ?>
		<div class="border-top layer-list_item">
			<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php  echo $lesson['qq'];?>&site=qq&menu=yes">
				<div class="layer-list_item-icon">
					<img class="layer-list_item-img" src="<?php echo MODULE_URL;?>template/mobile/images/contact-1v1.png">
				</div>
				<p class="layer-list_item-name">QQ咨询</p>
				<p class="layer-list_item-info">QQ:<?php  echo $lesson['qq'];?></p>
				<div class="layer-list_item-go">
					<i class="icon-font i-v-right">&gt;</i>
				</div>
			</a>
		</div>
		<?php  } ?>
		<?php  if(!empty($lesson['qqgroup'])) { ?>
		<div class="contact-wrap__qun border-top">
			<div class="contact-wrap-qun-title">加群交流<span class="contact-wrap-qun-desc">(获取资料、学员交流)</span></div>
			<ul>
				<li class="layer-list_item">
					<a <?php  if(!empty($lesson['qqgroupLink'])) { ?>href="<?php  echo $lesson['qqgroupLink'];?>"<?php  } ?>>
						<div class="layer-list_item-icon">
							<img class="layer-list_item-img" src="<?php  echo $_W['attachurl'];?><?php  echo $lesson['teacherphoto'];?>">
						</div>
						<p class="layer-list_item-name z-tail"><?php  echo $lesson['teacher'];?>讲师交流群</p>
						<p class="layer-list_item-info">QQ群:<?php  echo $lesson['qqgroup'];?></p>
						<div class="layer-list_item-go">
							<i class="icon-font i-v-right">&gt;</i>
						</div>
					</a>
				</li>
			</ul>
		</div>
		<?php  } ?>
		<?php  if(empty($lesson['qq']) && empty($lesson['qqgroup'])) { ?>
		<div class="contact-wrap__qun border-top" style="text-align:center;">
			<div class="contact-wrap-qun-title">抱歉，未找到任何交流方式~</div>
		</div>
		<?php  } ?>
	</div>
	<div class="layer-close">关闭</div>
</div>
<div id="layer-bg" class="hide"></div>

<ul class="d-buynow">
	<li class="btn-qq"><a href="javascript:;" id="btn-qq"><i class="ico ico-lessonqq"></i>咨询</a></li>
	<li class="btn-collect" id="btn-collect"><a href="javascript:;" <?php  if(!empty($collect)) { ?>class="cur"<?php  } ?>><i class="ico ico-collect"></i>收藏</a></li>
	<li class="btn-phone" id="btn-lxb" style="display: none;"><a href="javascript:;"><i class="ico ico-phone"></i>咨询</a></li>
	<?php  if(empty($section_list)) { ?>
		<li class="btn-buy"><a href="javascript:;" class="buy buy_now" style="background-color:#7D7D7D;"><p class="num" style="padding-top:22px;"><em class="money"></em>未完善</p></a></li>
	<?php  } else if(!empty($isbuy)) { ?>
		<?php  if($isbuy['status']==1) { ?>	
			<!-- <li class="btn-buy"><a href="<?php  echo $this->createMobileUrl('evaluate', array('orderid'=>$isbuy['id']));?>" class="buy buy_now" style="background-color:#26BB99;"><p class="num" style="padding-top:22px;"><em class="money"></em>评价课程</p></a></li> -->
			<li class="btn-buy"><a href="<?php  echo $this->createMobileUrl('lesson', array('id'=>$lesson['id'],'sectionid'=>$section_list[0]['id']));?>" class="buy buy_now" style="background-color:#26BB99;"><p class="num" style="padding-top:22px;"><em class="money"></em>开始学习</p></a></li>
		<?php  } else if($isbuy['status']==2) { ?>
			<li class="btn-buy"><a href="<?php  echo $this->createMobileUrl('lesson', array('id'=>$lesson['id'],'sectionid'=>$section_list[0]['id']));?>" class="buy buy_now" style="background-color:#26BB99;"><p class="num" style="padding-top:22px;"><em class="money"></em>开始学习</p></a></li>
		<?php  } ?>
	<?php  } else { ?>
		<?php  if($lesson['price']==0) { ?>
			<li class="btn-buy"><a href="<?php  echo $this->createMobileUrl('lesson', array('id'=>$lesson['id'],'sectionid'=>$section_list[0]['id']));?>" class="buy buy_now" style="background-color:#26BB99;"><p class="num" style="padding-top:22px;"><em class="money"></em>开始学习</p></a></li>
		<?php  } else { ?>
			<?php  if($buybtn=='close') { ?>
				<li class="btn-buy"><a href="<?php  echo $this->createMobileUrl('lesson', array('id'=>$lesson['id'],'sectionid'=>$section_list[0]['id']));?>" class="buy buy_now" style="background-color:#26BB99;"><p class="num" style="padding-top:22px;"><em class="money"></em>开始学习</p></a></li>
			<?php  } else { ?>
				<?php  if($isdiscount==1) { ?>
					<li class="btn-buy"><a href="<?php  echo $this->createMobileUrl('addtoorder', array('id'=>$id));?>" class="buy buy_now"><p class="num"><em class="money">¥</em><?php  echo $price;?></p><del><?php  echo $lesson['price'];?></del>立即购买</a></li>
				<?php  } else { ?>
					<li class="btn-buy"><a href="<?php  echo $this->createMobileUrl('addtoorder', array('id'=>$id));?>" class="buy buy_now"><p class="num"><em class="money">¥</em><?php  echo $lesson['price'];?></p>立即购买</a></li>
				<?php  } ?>
			<?php  } ?>
		<?php  } ?>
	<?php  } ?>
</ul>

<script type="text/javascript">
var i = 1; //设置当前页数，全局变量
var ajaxurl = "<?php  echo $this->createMobileUrl('lesson', array('op'=>'ajaxgetlist','id'=>$id,'sectionid'=>$sectionid));?>";
var loading = document.getElementById("loading");

$(function () {
    //根据页数读取数据  
    function getData(page) {  
        i++; //页码自动增加，保证下次调用时为新的一页
        $.get(ajaxurl, {page: page}, function (data) {  
            if (data.length > 0) {
				loading.style.display = 'none';
                var jsonObj = JSON.parse(data);
                insertDiv(jsonObj);  
            }
        });
       
    } 
    //初始化加载第一页数据  
    getData(1);

    //生成数据html,append到div中  
    function insertDiv(result) {  
        var mainDiv =$("#evaluate");
        var chtml = '';  
        for (var j = 0; j < result.length; j++) {  
            chtml += '<li class="item">';  
			chtml += '	<div class="hbox">';
			chtml += '		<div class="avatar">';
			chtml += '			<img src="' + result[j].avatar + '">';
			chtml += '			<h4 class="name te">' + result[j].nickname + '</h4>';
			chtml += '		</div>';
			chtml += '		<div class="right-box flex">';
			chtml += '			<p class="praise"><i class="ico ico-credit ' + result[j].ico + '"></i> ' + result[j].grade + ' <span class="fr"> ' + result[j].addtime + ' </span></p>';
			chtml += '			<p class="info"> ' + result[j].content + ' </p>';
			chtml += '		</div>';
			chtml += '	</div>';
			chtml += '</li>'; 
        }
		mainDiv.append(chtml);
		if(result.length==0){
			document.getElementById("btn_Page").innerHTML="已全部加载完成";
		}
    }  
  
    //==============核心代码=============  
    var winH = $(window).height(); //页面可视区域高度   
  
    var scrollHandler = function () {  
        var pageH = $(document.body).height();  
        var scrollT = $(window).scrollTop(); //滚动条top   
        var aa = (pageH - winH - scrollT) / winH;  
        if (aa < 0.02) { 
            if (i % 1 === 0) {
                getData(i);  
                $(window).unbind('scroll');  
                $("#btn_Page").show();
            } else {  
                getData(i);  
                $("#btn_Page").hide();
            }  
        }  
    }  
    //定义鼠标滚动事件
    $(window).scroll(scrollHandler);
    //继续加载按钮事件
    $("#btn_Page").click(function () {
		loading.style.display = 'block';
        getData(i);
        $(window).scroll(scrollHandler);
    });
});

</script>

<script type="text/javascript">
// “章节”、“课程详情”tab切换
$(".course-tab").on("click", 'li', function() {
	var $currItem = $(this),
	index = $currItem.index();

	$currItem.addClass('curr').siblings().removeClass('curr');
	$(".js-tab").hide().eq(index).show();

});

//展开QQ咨询
$("#btn-qq").click(function() {
	$("#bottom-contact").removeClass("hide");
	$("#layer-bg").removeClass("hide");
});
//关闭QQ咨询
$(".layer-close").click(function() {
	$("#bottom-contact").addClass("hide");
	$("#layer-bg").addClass("hide");

});
function GetQueryString(name){
	var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
	var r = window.location.search.substr(1).match(reg);
	if(r!=null)return  unescape(r[2]); return null;
}

$("#btn-collect").click(function(){
	var id = GetQueryString('id');
	var ajaxurl = "<?php  echo $this->createMobileUrl('updatecollect', array('ctype'=>'lesson','openid'=>$openid));?>";
	$.ajax({
        type:'post',
        url:ajaxurl,
        data:{id:id},
        dataType:'json',     
        success:function(data){
            if(data=='1'){
				$("#btn-collect a").addClass("cur");
			}else if(data=='2'){
				$("#btn-collect a").removeClass("cur");
			}
        }
    });
});

<?php  if($sectionid>0){ ?>
	var video = document.getElementById("video");
	var recordurl = "<?php  echo $this->createMobileUrl('record', array('lessonid'=>$_GPC['id'],'sectionid'=>$_GPC['sectionid'],'openid'=>$openid));?>";

	<?php  if($section['savetype']==2){ ?>
		$(document).ready(function(){  
			$.get(recordurl, {}, function (data){});
		});
	<?php  }else{ ?>
		$(document).ready(function(){  
			video.addEventListener("play",function(){
				$.get(recordurl, {}, function (data){});
			});
		});
	<?php  } ?>
<?php  } ?>
</script>

<?php  echo register_jssdk(false);?>
<script type="text/javascript">
wx.ready(function(){
	var shareData = {
		title: "<?php  echo $lesson['bookname'];?> - <?php  echo $setting['sitename'];?> - <?php  echo $_W['account']['name'];?>",
		desc: "<?php echo $sharelesson['title']?$sharelesson['title']:$lesson['descript'];?>",
		link: "<?php  echo $url;?>&uid=<?php  echo $lessonmember['uid'];?>",
		imgUrl: "<?php  echo $_W['attachurl'];?><?php echo $sharelesson['images']?$sharelesson['images']:$lesson['images']?>",
		trigger: function (res) {},
		complete: function (res) {},
		success: function (res) {},
		cancel: function (res) {},
		fail: function (res) {}
	};
	wx.onMenuShareTimeline(shareData);
	wx.onMenuShareAppMessage(shareData);
	wx.onMenuShareQQ(shareData);
	wx.onMenuShareWeibo(shareData);
	wx.onMenuShareQZone(shareData);
	
});
</script>

<?php  include $this->template('_footer');?>

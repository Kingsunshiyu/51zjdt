<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>创建直播话题</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no">
<meta name="format-detection" content="address=no">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="<?php echo TEMPLATE_PATH;?>/wtCommon.css?v=<?php  echo time();?>">
<script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo TEMPLATE_PATH;?>/wtCommon.js"></script>
<?php  echo register_jssdk();?>
<link rel="stylesheet" href="<?php echo TEMPLATE_PATH;?>/live.css?v=<?php  echo time();?>">

<script src="<?php echo TEMPLATE_PATH;?>/mobiscroll.custom-2.16.1.min.js"></script>
<link rel="stylesheet" href="<?php echo TEMPLATE_PATH;?>/mobiscroll.custom-2.16.1.min.css">
<script type="text/javascript">
function chooseImage2(){
	wx.chooseImage({
	    count: 1, 
	    sizeType: ['compressed'], // 可以指定是原图还是压缩图，默认二者都有
	    sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
	    success: function (res) {
	       var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
	       var firstId=localIds.toString();
	       wx.uploadImage({
	    	    localId: firstId, // 需要上传的图片的本地ID，由chooseImage接口获得
	    	    isShowProgressTips: 1, // 默认为1，显示进度提示
	    	    success: function (res) {
	    	        var serverId = res.serverId; // 返回图片的服务器端ID
	    	        $.post(location.href+"&serverid="+serverId, function(result){ 
	    	        	$(".img_logo").attr('src',result.imgurl);
	    	        	$("#img_desc").hide();
	    	        });
	    	    }
	    	});
	    }
	});
}

$(function(){
	$(".setIcon").click(function(){
		chooseImage2();
	});
});
</script>
<style type="text/css">
.icon-show{
display: inline-block;
    width: 3.5rem;
    height: 2rem;
    overflow: hidden;
    margin-left: 1rem;
}
</style>
</head><body>
	<div class="main_box_4 topic_create_box">
		<div class="topic_create_one live_nexttopic_set">
			<ul class="nav_list">
			
			<li class="webkitBox">
					<label class="title_2">话题封面</label>
					<span class="flex"><a href="javascript:;" class="list_btn_1 setIcon">
					<span id="img_desc">建议640*340</span>
					<i class="icon-show">
					<img class="img_logo" width="100%"></i></a></span>
			</li>
			
			<li class="webkitBox">
					<label class="title_2">本期话题</label>
					<span class="flex"><a href="javascript:;" class="list_btn_1 setTalk"><p></p></a></span>
			</li>
			
			<li class="webkitBox">
					<label class="title_2">话题概要</label>
					<span class="flex"><a href="javascript:;" class="list_btn_1 setTalkDesc"><p></p></a></span>
			</li>
			</ul>
			<ul class="nav_list">
			<li class="webkitBox">
					<label class="title_2">主讲人</label>
					<span class="flex"><a href="javascript:;" class="list_btn_1 setTalkGuest"><p></p></a></span>
			</li>
			
			<li class="webkitBox">
					<label class="title_2">主讲人介绍</label>
					<span class="flex"><a href="javascript:;" class="list_btn_1 setTalkGuestInfo"><p></p></a></span>
			</li>
			
			
			</ul>
			
			 <ul class="nav_list">
			<li class="webkitBox">
					<label class="title_2">评论弹幕</label>
					<span class="flex"><a href="javascript:;" class="list_btn_1 setTalkDm"><?php  if($topic['is_opendm']==1) { ?>已开启<?php  } else { ?>已关闭<?php  } ?></a></span>
			    </li>	
			</ul>

			
			<ul class="nav_list">
			<li class="webkitBox">
					<label class="title_2">开始时间</label>
					<span class="flex " style="position:relative;">
						<input type="text" class="date_time topicDateTime" placeholder="请选择时间" id="mobiscroll" readonly="" value="">
					</span>
			</li>
			</ul>
			<div class="submit_box">
				<a class="wt_btn_1 setNewLiveNext" href="javascript:;">下一步</a>
			</div>
		</div>
		<div class="topic_create_two" style="display:none;">
			<span class="topic_create_t1">选择直播类型</span>
			<span class="topic_create_t2">选择后不能更改</span>
			<dl class="password_set">
			
			<dt>
				<span class="password_type password_public on" name="public"><var>公开直播</var></span>
				<span class="password_type password_random" name="password"><var>加密直播</var></span>
				<span class="password_type password_ticket" name="ticket"><var>付费直播</var></span>
			</dt>
				
				<dd class="password_tabbox">
					<div class="password_tab password_public_tab on" name="password_public">任何人都可以用链接进入直播<br>适合公开的直播分享</div>
					<div class="password_tab password_random_tab" name="password_random">
						<span class="password_title" attr-label="fixedp">设置一个固定密码</span>
						<input type="text" placeholder="支持英文和数字，不区分大小写，不支持特殊符号" value="" class="fixed_code_value fixedCodeValue" attr-id="" onkeyup=" if($(this).val().length &gt;= 12) $(this).val($(this).val().substr(0,12))">						
						<span class="password_title">设置听众获取密码提示</span>
						<span>
							<textarea placeholder="提示用户如何获取密码" class="topicpassword_tips"></textarea>
						</span>
						<div class="passwordqr_choose" style="display:block;">
							<div class="otherqr">
							<span class="upload_topic_otherqr" style="overflow: hidden;">
							
							</span>
							  上传二维码
							</div>
							<input type="hidden" id="qrcode_url" name="qrcode_url">
						</div>
					</div>
					<div class="password_tab password_ticket_tab" name="password_ticket">
						<span class="password_title" attr-label="fixedp">设置入场票费用</span>
						<span class="ticket_wkBox"><input type="number" placeholder="最小金额1元" value="" class="ticket_price_value ticket_boxFl TicketPriceValue" attr-id="" onkeyup=" if($(this).val().length &gt;= 12) $(this).val($(this).val().substr(0,12))">
						<i>元</i></span>
					</div>
				</dd>
			</dl>
			
			<div class="passwordqr_choose_box">
				<a href="javascript:;" class="backone">上一步</a><a class="setNewTopicBtn" href="javascript:;">完成</a>
			</div>	
		</div>
</div>


<!--修改话题名称-->
<div class="geneBox TopicNextTalkBox">
	<div class="main">
	<div class="gene_content">
		<textarea class="nexttopic_talk_textarea" value="" placeholder="请输入话题名称"></textarea>
	</div>
	<div class="gene_bottom both">
		<span><a href="javascript:;" class="gene_btn gene_cancel">取消</a></span>
		<span><a href="javascript:;" class="gene_btn gene_confirm">确定</a></span>
	</div>
	</div>
</div>


<div class="geneBox TopicNextTalkDescBox">
	<div class="main">
	<div class="gene_content">
		<textarea class="nexttopic_talkdesc_textarea nexttopic_talk_textarea" value="" placeholder="请输入话题概要"></textarea>
	</div>
	<div class="gene_bottom both">
		<span><a href="javascript:;" class="gene_btn gene_cancel">取消</a></span>
		<span><a href="javascript:;" class="gene_btn gene_confirm">确定</a></span>
	</div>
	</div>
</div>

<div class="geneBox TopicNextTalkGuestBox">
	<div class="main">
	<div class="gene_content">
		<textarea class="nexttopic_talkguest_textarea nexttopic_talk_textarea" value="" placeholder="请输入主讲人,多个请用空格隔开"></textarea>
	</div>
	<div class="gene_bottom both">
		<span><a href="javascript:;" class="gene_btn gene_cancel">取消</a></span>
		<span><a href="javascript:;" class="gene_btn gene_confirm">确定</a></span>
	</div>
	</div>
</div>

<div class="geneBox TopicNextTalkGuestInfoBox">
	<div class="main">
	<div class="gene_content">
		<textarea class="nexttopic_talkguestinfo_textarea nexttopic_talk_textarea" value="" placeholder="请输入主要讲人介绍信息"></textarea>
	</div>
	<div class="gene_bottom both">
		<span><a href="javascript:;" class="gene_btn gene_cancel">取消</a></span>
		<span><a href="javascript:;" class="gene_btn gene_confirm">确定</a></span>
	</div>
	</div>
</div>

<script type="text/javascript">
function chooseImage(){
	var posturl=location.href;
	wx.chooseImage({
	    count: 1, 
	    sizeType: ['compressed'], // 可以指定是原图还是压缩图，默认二者都有
	    sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
	    success: function (res) {
	       var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
	       var firstId=localIds.toString();
	       wx.uploadImage({
	    	    localId: firstId, // 需要上传的图片的本地ID，由chooseImage接口获得
	    	    isShowProgressTips: 1, // 默认为1，显示进度提示
	    	    success: function (res) {
	    	        var serverId = res.serverId; // 返回图片的服务器端ID
	    	        $.getJSON(posturl+"&mediaid="+serverId, function(result){
	    	        	$(".upload_topic_otherqr").empty();
	    	        	$(".upload_topic_otherqr").append('<img id="otherqr_logo" src="'+result.imgurl+'">');
	    	        	$("#qrcode_url").val(result.imgurl);
	    	        	$("otherqr").addClass('on');
	    	        });
	    	    }
	    	});
	    }
	});
}

$(function(){
	$('.topicDateTime').mobiscroll().datetime({
        theme: "android-holo-light",
        mode: "scroller",
        display: "bottom",
        lang: "zh",
        minDate: new Date(),
        maxDate: new Date(new Date().setMonth(new Date().getMonth() + 6)),
        dateFormat:"yy-mm-dd",
        timeFormat:"HH:ii",
        stepMinute: 1  
    });
	
	$(".passwordqr_choose").click(function(){
		chooseImage();
	});
	
	$(".setTalk").click(function(){
		$(".TopicNextTalkBox").toggle();
	});
	
	$(".setTalkDesc").click(function(){
		$(".TopicNextTalkDescBox").toggle();
	});
	
	$(".setTalkGuest").click(function(){
		$(".TopicNextTalkGuestBox").toggle();
	});
	
	$(".setTalkGuestInfo").click(function(){
		$(".TopicNextTalkGuestInfoBox").toggle();
	});
	
	$(".gene_cancel").click(function(){
		$(".geneBox").hide();
	});
	$(".setTalkDm").click(function(){
		var text=$(this).text()=='已开启'?'已关闭':'已开启';
		$(this).text(text);
	});
	
	$(".TopicNextTalkBox .gene_confirm").click(function(){
		var text=$(".nexttopic_talk_textarea").val();
		$(".setTalk p").eq(0).text(text);
		$(".geneBox").hide();
	});
	
	$(".TopicNextTalkDescBox .gene_confirm").click(function(){
		var text=$(".nexttopic_talkdesc_textarea").val();
		$(".setTalkDesc p").eq(0).text(text);
		$(".geneBox").hide();
	});
	
	$(".TopicNextTalkGuestBox .gene_confirm").click(function(){
		var text=$(".nexttopic_talkguest_textarea").val();
		$(".setTalkGuest p").eq(0).text(text);
		$(".geneBox").hide();
	});
	
	$(".TopicNextTalkGuestInfoBox .gene_confirm").click(function(){
		var text=$(".nexttopic_talkguestinfo_textarea").val();
		$(".setTalkGuestInfo p").eq(0).text(text);
		$(".geneBox").hide();
	});
		
	$(".setNewLiveNext,.backone").click(function(){
		if($(".setTalk p").eq(0).text()==''){
			alert("请设置本期话题!");
			return false;
		}
		if($(".setTalkDesc p").eq(0).text()==''){
			alert("请设置本期话题概要!");
			return false;
		}
		if($('.topicDateTime').val()==''){
			alert("请设置开始时间!");
			return false;
		}
				
		$(".topic_create_one").toggle();
		$(".topic_create_two").toggle();
	});
	
	$(".password_type").click(function(){
		$(".password_type").removeClass('on');
		$(this).addClass('on');
		$(".password_tab").hide();
		if($(this).hasClass('password_public')){
			$(".password_public_tab").show();
		}else if($(this).hasClass('password_random')){
			$(".password_random_tab").show();
		}else{
			$(".password_ticket_tab").show();
		}
	});
	//完成
	$(".setNewTopicBtn").click(function(){
		var Topic={topic_type:'public'};
		if($(".password_type.on").size()>0)
		    topic_type=$(".password_type.on").eq(0).attr('name');
		Topic.topic_name=$(".setTalk p").eq(0).text();
		Topic.topic_desc=$(".setTalkDesc p").eq(0).text();
		Topic.begin_time=$('.topicDateTime').val();
		Topic.is_opendm=$(".setTalkDm").text()=='已开启'?1:0;
		Topic.topic_type=topic_type;
		Topic.topic_icon=$(".img_logo").attr('src');
		Topic.guest_name=$(".setTalkGuest p").eq(0).text();
	    Topic.guest_info=$(".setTalkGuestInfo p").eq(0).text();
		if(Topic.topic_type=="password"){
		  Topic.room_password=$(".fixedCodeValue").val();
		  Topic.qrcode_desc=$(".topicpassword_tips").val();
		  Topic.qrcode_url=$("#qrcode_url").val();
		  if(Topic.room_password==''){
				alert('请设置密码！');
				return false;
		  }
		  if(Topic.qrcode_desc==''){
				alert('请设置密码提示！');
				return false;
		  }
		}
		if(Topic.topic_type=="ticket"){
			  Topic.room_paymoney=$(".TicketPriceValue").val();
			  if(Topic.room_paymoney==''){
					alert('请设置入场费用！');
					return false;
			  }
		}
		var post_url=location.href+"&create=true";
		$.post(post_url,Topic,function(result){
			if(result.success==1){
				location.href=result.data;
			}else{
				alert(result.data);
			}
		});
           	
	});
})
</script>

</body></html>
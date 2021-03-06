<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>修改话题</title>
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
					<img class="img_logo" src="<?php  echo $topic['topic_icon'];?>" width="100%"></i></a></span>
			</li>
			
			<li class="webkitBox">
					<label class="title_2">本期话题</label>
					<span class="flex"><a href="javascript:;" class="list_btn_1 setTalk"><p><?php  echo $topic['topic_name'];?></p></a></span>
			</li>
			
			<li class="webkitBox">
					<label class="title_2">话题概要</label>
					<span class="flex"><a href="javascript:;" class="list_btn_1 setTalkDesc"><p><?php  echo $topic['topic_desc'];?></p></a></span>
			</li>
			</ul>
			<ul class="nav_list">
			<li class="webkitBox">
					<label class="title_2">主讲人</label>
					<span class="flex"><a href="javascript:;" class="list_btn_1 setTalkGuest"><p><?php  echo $topic['guest_name'];?></p></a></span>
			</li>
			
			<li class="webkitBox">
					<label class="title_2">主讲人介绍</label>
					<span class="flex"><a href="javascript:;" class="list_btn_1 setTalkGuestInfo"><p><?php  echo $topic['guest_info'];?></p></a></span>
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
						<input type="text" class="date_time topicDateTime" placeholder="请选择时间" id="mobiscroll" readonly="" value="<?php  echo $topic['begin_time'];?>">
					</span>
			</li>
			</ul>
			
			<div class="submit_box">
				<a class="wt_btn_1 setNewLiveNext" href="javascript:;">保存</a>
			</div>
		</div>
</div>


<!--修改话题名称-->
<div class="geneBox TopicNextTalkBox">
	<div class="main">
	<div class="gene_content">
		<textarea class="nexttopic_talk_textarea nexttopic_talkname_textarea" value="" placeholder="请输入话题名称"></textarea>
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
	
	$(".setTalkDm").click(function(){
		var text=$(this).text()=='已开启'?'已关闭':'已开启';
		$(this).text(text);
	});
	
	$(".passwordqr_choose").click(function(){
		chooseImage();
	});
	
	$(".setTalk").click(function(){
		$(".nexttopic_talkname_textarea").val($(this).text());
		$(".TopicNextTalkBox").toggle();
	});
	
	$(".setTalkDesc").click(function(){
		$(".nexttopic_talkdesc_textarea").val($(this).text());
		$(".TopicNextTalkDescBox").toggle();
	});
	
	$(".setTalkGuest").click(function(){
		$(".nexttopic_talkguest_textarea").val($(this).text());
		$(".TopicNextTalkGuestBox").toggle();
	});
	
	$(".setTalkGuestInfo").click(function(){
		$(".nexttopic_talkguestinfo_textarea").val($(this).text());
		$(".TopicNextTalkGuestInfoBox").toggle();
	});
	
	$(".gene_cancel").click(function(){
		$(".geneBox").hide();
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
		
		var Topic={};
		Topic.topic_name=$(".setTalk p").eq(0).text();
		Topic.topic_desc=$(".setTalkDesc p").eq(0).text();
		Topic.begin_time=$('.topicDateTime').val();
        Topic.is_opendm=$(".setTalkDm").text()=='已开启'?1:0;
		Topic.topic_icon=$(".img_logo").attr('src');
		Topic.guest_name=$(".setTalkGuest p").eq(0).text();
	    Topic.guest_info=$(".setTalkGuestInfo p").eq(0).text();
		
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
<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php  echo $chat_room['room_name'];?></title>

<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no">
<meta name="format-detection" content="address=no">
<link rel="shortcut icon" href="http://img.qlchat.com/qlLive/ico/favicon.ico" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<script src="http://cdn.bootcss.com/zepto/1.1.6/zepto.min.js"></script>
<link rel="stylesheet" href="<?php echo TEMPLATE_PATH;?>/wtCommon.css?v=<?php  echo time();?>">
<link rel="stylesheet" href="<?php echo TEMPLATE_PATH;?>/live.css?v=<?php  echo time();?>">
<?php  echo register_jssdk();?>
<script type="text/javascript">
var posturl="<?php  echo $this->createMobileUrl('chat_setting',array('room_id'=>$chat_room['room_id']))?>";
function chooseImage(uptype){
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
	    	        $.post(posturl+"&"+uptype+"="+serverId, function(result){
	    	        	if(uptype=='room_icon')
	    	        	  $(".img_logo").attr('src',result.data);
	    	        	else
	    	        		$(".img_qrcode").attr('src',result.data);
	    	        });
	    	    }
	    	});
	    }
	});
}

$(function(){
	$(".changeLiveLogo").click(function(){
		$(".changeFLogoBox").toggle();
	});
	$(".uploadStatus2").click(function(){
		 chooseImage('room_icon');
	});
	
	$(".live_code").click(function(){
		$(".forumQRBox").toggle();
	});
	
	$(".logo_QRcode").click(function(){
		 chooseImage('qrcode_url');
	});
	
	
	$(".gene_cancel").click(function(){
		$(".geneBox").hide();
	});
	
	$(".changeFLogoBox .gene_confirm").click(function(){
		$(".geneBox").hide();
	});
	
	$(".changeLiveName").click(function(){
		$(".changeFNameBox").toggle();
	});
	
	$(".changeLiveIntroduce").click(function(){
		$(".changeFIntroduceBox").toggle();
	});
	
	$(".changeFNameBox .gene_confirm").click(function(){
		if($(".live_name_input").val()==''){
			return false;
		}
		$.post(posturl+"&room_name="+$(".live_name_input").val(), function(result){
        	 $(".changeLiveName p").eq(0).text(result.data);
        	 $(".live_name_input").val('');
        });
		
		$(".geneBox").hide();
	});
	
	$(".changeFIntroduceBox .gene_confirm").click(function(){
		if($(".reply_textarea").val()==''){
			return false;
		}
		
		$.post(posturl+"&room_desc="+$(".reply_textarea").val(), function(result){
        	 $(".changeLiveIntroduce p").eq(0).text(result.data);
        	 $(".reply_textarea").val('');
        });
		
		$(".geneBox").hide();
	});
	
	
	
});
</script>
</head>
<body class="gary">

	<div id="" class="main_box_4">
		<ul class="nav_list list_1">
			<li><span class="title_2">直播间图标</span><span class="flex"><a class="list_btn_2 changeLiveLogo" href="javascript:;"><i class="live_logoshow"><img class="img_logo" src="<?php  echo $chat_room['room_icon'];?>"></i></a></span></li>
			<li><span class="title_2">直播间名称</span><span class="flex"><a class="list_btn_1 changeLiveName" href="javascript:;"><p><?php  echo $chat_room['room_name'];?></p></a></span></li>
			<li><span class="title_2">直播间简介</span><span class="flex"><a class="list_btn_1 changeLiveIntroduce" href="javascript:;"><p><?php  echo $chat_room['room_desc'];?></p></a></span></li>
			<li><span class="title_2">设置公众号二维码</span><span class="flex"><a class="list_btn_1 live_code" href="javascript:;"><i class="ico_QR_code"></i></a></span></li>
			<li><span class="title_2">管理员</span><span class="flex"><a class="list_btn_1" href="<?php  echo $roommanager_url;?>">
			<i class="live_managershow"><img src="<?php  echo $chat_room['create_avatar'];?>"></i>
			<?php  if(is_array($room_nanager)) { foreach($room_nanager as $manager) { ?>
			  <i class="live_managershow"><img src="<?php  echo $manager['manage_avatar'];?>"></i>
			<?php  } } ?>
			</a></span></li>
			<li><span class="title_2">直播间禁言用户管理</span><span class="flex"><a class="list_btn_1" href="<?php  echo $blacks_url;?>"></a></span></li>
			<li><span class="title_2">本直播间可提现金额</span><span class="flex"><a class="list_btn_1" href="<?php  echo $roomcash_url;?>"><p><var><?php  echo $room_cash;?></var>元</p></a></span></li>
		    <li><span class="title_2" attr-npval="penny">赞赏功能</span>
		    <span class="flex"><a class="list_btn_1 newPointBtn" attr-npval="penny" href="<?php  echo $this->createMobileUrl('reward_setting',array('room_id'=>$room_id))?>"><p><?php  if($chat_room['reward_status']==1) { ?>已开启<?php  } else { ?>未开启<?php  } ?></p></a></span>
		    </li>
		</ul>
		
		<div class="submit_box">
			<a class="wt_btn_1" href="<?php  echo $room_url;?>">返回直播间</a>
		</div>
	</div>

<!--修改logo-->
<div class="geneBox changeFLogoBox" style="/* display: block; */">
	<div class="main">
	<div class="gene_content">
		<span class="change_img_box change_live_logo" style="overflow: hidden;">
			<img src="<?php  echo $chat_room['room_icon'];?>" class="img_logo"><i class="marker" style="display:none;"></i>
		</span>
		
		<span class="upload_status uploadStatus2">点击上传图片</span>
	</div>
	<div class="gene_bottom both">
		<span><a href="javascript:;" class="gene_btn gene_cancel">取消</a></span>
		<span><a href="javascript:;" class="gene_btn gene_confirm">确定</a></span>
	</div>
	</div>
</div>

<!--修改名字-->
<div class="geneBox changeFNameBox">
	<div class="main">
	<div class="gene_content">
		<input class="live_name_input" value="" placeholder="请输入直播间名称,最多输入32个字" onkeyup=" if($(this).val().length &gt; 32) $(this).val($(this).val().substr(0,32))">
	</div>
	<div class="gene_bottom both">
		<span><a href="javascript:;" class="gene_btn gene_cancel">取消</a></span>
		<span><a href="javascript:;" class="gene_btn gene_confirm">确定</a></span>
	</div>
	</div>
</div>

<!--修改简介-->
<div class="geneBox changeFIntroduceBox" style="display: none;">
	<div class="main">
	<div class="gene_content">
		<textarea class="reply_textarea" placeholder="请输入直播间简介,最多输入200个字" onkeyup=" if($(this).val().length &gt; 200) $(this).val($(this).val().substr(0,200))"></textarea>
	</div>
	<div class="gene_bottom both">
		<span><a href="javascript:;" class="gene_btn gene_cancel">取消</a></span>
		<span><a href="javascript:;" class="gene_btn gene_confirm">确定</a></span>
	</div>
	</div>
</div>

<!--查看论坛QR-->
<div class="geneBox forumQRBox">
	<div class="main">
		<div class="gene_content">
			<span class="change_img_box logo_QRcode">
				<img class="img_qrcode" src="<?php  echo $chat_room['qrcode_url'];?>">
			</span>
		</div>
		<div class="gene_bottom">
			<span><a href="javascript:;" class="gene_btn gene_cancel">关闭</a></span>
		</div>
	</div>
</div>

<div id="geneQRcode" style="display: none;"></div>
<div class="loadingBox"><span></span></div>
</body></html>
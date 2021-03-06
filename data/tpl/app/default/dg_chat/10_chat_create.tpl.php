<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>创建直播间</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no">
<meta name="format-detection" content="address=no">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="<?php echo TEMPLATE_PATH;?>/wtCommon.css?v=<?php  echo time();?>">
<script src="http://cdn.bootcss.com/zepto/1.1.6/zepto.min.js"></script>
<script src="//cdn.bootcss.com/json2/20150503/json2.min.js"></script>
<link rel="stylesheet" href="<?php echo TEMPLATE_PATH;?>/live.css?v=<?php  echo time();?>">
<?php  echo register_jssdk();?>
<script type="text/javascript">
var posturl="<?php  echo $this->createMobileUrl('chat_create')?>";
var nexturl="<?php  echo $this->createMobileUrl('chat_index')?>";
function chooseImage(){
	wx.chooseImage({
	    count: 1, 
	    sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
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
	    	        	$("#live_logo").attr('src',result.imgurl);
	    	        	$("#logo").val(result.imgurl);
	    	        });
	    	    }
	    	});
	    }
	});
}

$(function(){
	$(".createLiveSubmit").click(function(){
		if($("#live_name").val()==""){
			alert("直播间名称不能为空！");
			return false;
		}
		
		if($("#live_introduce").val()==""){
			alert("直播间介绍不能为空！");
			return false;
		}
		
		if($("#logo").val()==''){
			alert("请上传直播间头像！");
			return false;
		}		
		$.post(posturl+"&create=true", { room_name: $("#live_name").val(), room_desc: $("#live_introduce").val(),room_icon:$("#logo").val()},
		   function(data){
			    if(data.success==1){
			    	location.href=nexturl+"&room_id="+data.room_id;
			    }else if(data.success==-1){
			    	alert("每人只能创建一个直播间!");
			    }else{
			    	alert("创建直播间失败!");
			    }
		 });
		
	});
});
</script>
</head>
<body>
   
<div id="liveMainBox" class="main_box_4">
	<div class="new_live">
		<span class="live_logo upload_live_logo" onclick="chooseImage()" style="overflow: hidden;"><img src="<?php echo TEMPLATE_PATH;?>/normalLogo.png" id="live_logo">
		<i class="marker" style="display:none;">
		<input type="hidden" id="logo" name="logo">
		</i></span>
		<span class="upload_status uploadStatus2">点击上传直播间头像</span>
		<ul>
			<li>
				<label class="title_2">直播间名称：</label>
				<span class="input_1">
					<textarea id="live_name" placeholder="请输入直播间名称（最多30字）"></textarea>
				</span>
			</li>
			<li>
				<label class="title_2">直播间介绍：</label>
				<span class="textarea_1">
					<textarea id="live_introduce" placeholder="请输入直播间介绍（最多200字）"></textarea>
				</span>
			</li>
			<li class="createlivetips">
				<span>一个直播间可以创建多个话题</span>
				<span>直播间的名字可以修改</span>
			</li>
		</ul>
		
	</div>
	
	<div class="submit_box">
		<a class="wt_btn_1 createLiveSubmit" href="javascript:;">创建直播间</a>
	</div>
		
</div>


<div class="loadingBox"><span></span></div>
   
</body>
</html>
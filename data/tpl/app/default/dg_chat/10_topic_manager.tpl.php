<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>话题参与人设置</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no">
<meta name="format-detection" content="address=no">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="<?php echo TEMPLATE_PATH;?>/wtCommon.css?v=<?php  echo time();?>">
<link rel="stylesheet" href="<?php echo TEMPLATE_PATH;?>/live.css?v=<?php  echo time();?>">
<style type="text/css">
.live_speaker_list{display:block;padding:0;margin:0 0 1rem;background:#fff}.live_speaker_list dd{position:relative;display:block;padding:1.5rem 0;border-bottom:solid 1px #e5e5e5}
.live_speaker_list dd:last-child{border:none}
.live_speaker_list .uesr_head{float:left;width:6rem;height:6rem;margin:0 0 0 1.5rem;overflow:hidden;border-radius:100%;border-radius:6rem;border:solid 1px #e5e5e5;overflow:hidden}.live_speaker_list .uesr_head img{width:100%;height:100%}
.live_speaker_list .user_info{display:block;padding:0 0 0 9rem}
.live_speaker_list .user_info .li_1,.live_speaker_list .user_info .li_2{height:2rem;line-height:2rem;font-size:1.5rem;color:#333;overflow:hidden;white-space:nowrap}.live_speaker_list .user_info .li_2{margin-top:2rem}
.live_speaker_list .user_info .li_3{line-height:2rem;margin:0 0 .3rem;font-size:1.2rem;color:#949fa4;word-break:break-all}.live_speaker_list .user_info .li_4{line-height:2rem;margin:0 0 .3rem;font-size:1.2rem;color:#949fa4}.user_info .li_4 .s_1{display:inline-block;padding:0 2rem 0 0}
.live_speaker_list .wt_btn_no_open,.live_speaker_list .wt_btn_open_ws{position:absolute;right:3rem;top:2.5rem;min-width:9rem;height:3.5rem;padding:0 1.5rem;line-height:3.5rem;font-size:1.4rem;border-radius:4rem}
.live_speaker_list .wt_btn_open_ws:after{content:"";position:absolute;right:-2.5rem;top:50%;margin-top:-1rem;width:2rem;height:2rem;display:inline-block;background-position:-2rem -2rem;vertical-align:top}.live_speaker_list .wt_btn_open_ws{background:#ddf4ff;color:#00acff}
.live_speaker_list .wt_btn_no_open{background:#cedae0}.live_speaker_list .wt_btn_to_ans,.live_speaker_list .wt_btn_to_ask{width:12rem;height:4rem;line-height:4rem;font-size:1.4rem;border-radius:4rem;margin:1rem 0 0 9rem}.live_speaker_list .wt_btn_to_ans var{color:#ffd800}
.live_speaker_list .lsl_tips{display:block;color:#949fa4;font-size:1.2rem;line-height:1.8rem;padding:0 1rem}
</style>
<script src="http://cdn.bootcss.com/zepto/1.1.6/zepto.min.js"></script>
<?php  echo register_jssdk();?>
<script type="text/javascript">
$(function(){
	$(".m_delete").click(function(){
		var conf=confirm("确认删除吗?");
		if(!conf){return;}
		var guest_id=$(this).attr('attr-id');
		var guest_handler=$(this);
		$.post(location.href,{guest_id:guest_id},function(result){
			if(result.success==1){
				//alert('删除成功！');
				guest_handler.parents('dd').remove();
			}
		});
	});
});
</script>
</head>
<body class="liveroom_bg">
<div class="main_box_4" id="forumPageBox"> 
      <?php  if($is_manager ) { ?>
		<ul class="nav_list">
			<li class="invitate_people"><span class="list_btn_2"><a href="<?php  echo $invite_url;?>">邀请嘉宾（请通过手机端发出邀请）</a></span></li>
		</ul>
	 <?php  } ?>
	<p class="people_t">话题参与人</p>
		<dl class="live_speaker_list">
		<dd class="clearfix">
				<span class="uesr_head">
						<a href="">
					<img src="<?php  echo $chat_room['create_avatar'];?>">
					</a>
				</span>
				<ul class="user_info">
						<li class="li_1"><?php  echo $chat_room['create_nickname'];?>(直播间创建者)</li>
						<li class="li_3"><?php  echo $chat_room['real_name'];?>,<?php  echo $chat_room['user_title'];?>,<?php  echo $chat_room['user_desc'];?></li>

				</ul>
				 <?php  if($chat_room['is_openask']==1) { ?>
						<a class="wt_btn_to_ask" style="display:none;" href="<?php  echo $this->createMobileUrl('my_ask_index',array('uid'=>$chat_room['uid']));?>">向TA提问</a>
				 <?php  } ?>
			</dd>
		
		<?php  if(is_array($managers)) { foreach($managers as $manager) { ?>
			<dd class="clearfix">
				<span class="uesr_head">
						<a href="#">
					<img src="<?php  echo $manager['avatar'];?>">
					</a>
				</span>
				<ul class="user_info">
						<li class="li_1"><?php  echo $manager['manage_nickname'];?>(直播间管理员)</li>
						<li class="li_3"><?php  echo $manager['real_name'];?>,<?php  echo $manager['user_title'];?>,<?php  echo $manager['user_desc'];?></li>

				</ul>
			    <?php  if($manager['is_openask']==1) { ?>
				<a class="wt_btn_to_ask" style="display:none;" href="<?php  echo $this->createMobileUrl('my_ask_index',array('uid'=>$manager['id']));?>">向TA提问</a>
				<?php  } ?>
			</dd>
		<?php  } } ?>
		
		<?php  if(is_array($guests)) { foreach($guests as $guest) { ?>
			<dd class="clearfix">
			<span class="uesr_head">
				 <img src="<?php  echo $guest['avatar'];?>">
			</span>
				<ul class="user_info">
						<li class="li_1"><?php  echo $guest['guest_nickname'];?>(特邀嘉宾)
						<?php  if($is_manager ) { ?>
						  <span class="m_delete" attr-id="<?php  echo $guest['id'];?>" style="float:right;font-size:13px;margin-right:3px;color:#09BB07">删除</span>
						<?php  } ?>
						</li>
						<li class="li_3"><?php  echo $guest['real_name'];?>,<?php  echo $guest['user_title'];?>,<?php  echo $guest['user_desc'];?></li>
				</ul>
				<?php  if($guest['is_openask']==1) { ?>
				<a class="wt_btn_to_ask" style="display:none;" href="<?php  echo $this->createMobileUrl('my_ask_index',array('uid'=>$guest['id']));?>">向TA提问</a>
				<?php  } ?>
			</dd>
		<?php  } } ?>
            
	</dl>	
	<!--删除提示-->
	<div class="geneBox admDeleteBox">
		<div class="main">
		<div class="gene_content">
			确定要删除  <span class="nowname" style="display:inline;"></span> ?
		</div>
		<div class="gene_bottom both">
			<span><a href="javascript:;" class="gene_btn gene_cancel">取消</a></span>
			<span><a href="javascript:;" class="gene_btn gene_confirm" attr-id="">确定</a></span>
		</div>
		</div>
	</div>
</div>
<div class="loadingBox"><span></span></div>
</body></html>
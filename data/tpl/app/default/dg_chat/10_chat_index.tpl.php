<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php  echo $chat_room['room_name'];?></title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no">
<meta name="format-detection" content="address=no">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_PATH;?>/js/jq_addons.js"></script>
<link rel="stylesheet" href="<?php echo TEMPLATE_PATH;?>/wtCommon.css">
<link rel="stylesheet" href="<?php echo TEMPLATE_PATH;?>/live.css">
<?php  echo register_jssdk();?>
<script type="text/javascript">
var chat_url="<?php  echo $this->createMobileUrl('chat')?>";
var pindex=1;
  function setTips(obj,topic_id){
	  chat_url=chat_url+"&topic_id="+topic_id;
	  $.post(chat_url,{tips:true},function(result){
			if(result.success==1){
				$(document).minTipsBox({
					tipsContent: "设置成功",
					tipsTime: 2
				});
				$(obj).text('取消提醒');
			}else{
				$(document).minTipsBox({
					tipsContent: "已取消",
					tipsTime: 2
				});
				$(obj).text('开课提醒');
			}
		});
  }
  
  function getHtml(Qindex,List){
	  var html="";
	  html+='<dl class="topic_list_dl">';
	 
	  html+='<dd>';
	  html+='<a href="'+chat_url+"&topic_id="+List[Qindex].id+'">';
	  html+='<ul class="heads_box st_1">';
	  html+='<li><img src="'+List[Qindex].icon+'"></li>';
	  html+='</ul>';
	  html+='<span class="topic_title"><i>本期话题</i>'+List[Qindex].topic_name+'</span>';
	  html+='<span class="topic_date">'+List[Qindex].end_text+' 结束</span>';
	    html+='</a>';
	  html+='<div class="manage_bar">';
	  html+='<b class="btn_topic_ctrl" attr-id="'+List[Qindex].id+'"></b>';
	  html+='<b class="topic_views">'+List[Qindex].look_numbers+'</b>';
	  html+='<b class="commnet_quantity">'+List[Qindex].comment_numbers+'</b> ';
	  html+='</div>';
      html+='</dd>';
  
      html+='</dl>';
      return html;
  }
  
  function pageLoadCommon(a, b) {
	     a.scroll(function() {
			distanceScrollCount = a[0].scrollHeight;
			distanceScroll = a[0].scrollTop;
			topicPageHight = a.height();
			//console.dir(distanceScrollCount +"-"+ distanceScroll +"-"+ topicPageHight+"="+(distanceScrollCount - distanceScroll - topicPageHight));
			2 >= distanceScrollCount - distanceScroll - topicPageHight && b()
		})
  }
  
  $(function(){
	  $(".liveroomGonghr").click(function(){
		  $(this).toggleClass('on');
		  $(".liveroomFollowBox").toggle();
	  });	  
	  
	  /**/
	  $(".btn_topic_ctrl").click(function(){
		  var id=$(this).attr('attr-id');
		  var url=chat_url.replace("do=chat","do=topic_edit")+"&topic_id="+id;
		  location.href=url;
		  
	  });
	  
	  function setTips(topic_id){
		  alert(topic_id);
	  }
	  
	  $(".nowlive_over").click(function(){
		  var topic_id=$(this).attr('attr-topicid');
		  var conf=confirm("确定要结束吗?");
		  if(conf){
			  $.post("<?php  echo $this->createMobileUrl('chat_over');?>",{topic_id:topic_id},function(result){
				  if(result.success==1){
					  location.href=location.href+"&r=1";
				  }else{
					  alert(result.data);
				  }
			  });
		  }
	  });
	  
	  //关注设置
	  $(".liveroom_focus").click(function(){
		  var text=$(this).text();
		  if(text.indexOf('直播间')>0){
			  text="确认关注本直播间吗?";
		  }else{
			  text="确认取消关注此直播间吗?";
		  }
		  var conf=confirm(text);
		  if(conf){
			  $.post(location.href,{'focus':true},function(result){
				  if(result.success==1){
					  alert(result.data);
					  $(".liveroom_focus").find('span').text('取消关注');
				  }else{
					  alert(result.data);
					  $(".liveroom_focus").find('span').text('关注直播间');
				  }
			  });
		  }
	  });
	  
	  
	  wx.ready(function () {
		    sharedata = {
		        title: "<?php  echo $sharedata['title'];?>",
		        desc: "<?php  echo $sharedata['desc'];?>",
		        link: "<?php  echo $sharedata['link'];?>",
		        imgUrl: "<?php  echo $sharedata['imgUrl'];?>",
		        success:function(){
		        	//ajax
		        }
		    };
		    wx.onMenuShareAppMessage(sharedata);
		    wx.onMenuShareTimeline(sharedata);
		});
	  
	  pageLoadCommon($("#commonPageBox"),function(){
		  pindex++;
		  var postData={pindex: pindex};
		  $.post(location.href, postData, function(result){
				$(".loading").hide();
				if(result.pages<pindex){
					$(".noMore").show();
					return false;
				}
				pindex=result.pindex;
				console.dir(result);
				var last_html="";
				for(var qindex in result.list){
				  last_html+=getHtml(qindex,result.list);
				}
				//console.dir(last_html);
				$(".topic_list").append(last_html);
				$(".btn_topic_ctrl").unbind();
				 $(".btn_topic_ctrl").click(function(){
					  var id=$(this).attr('attr-id');
					  var url=chat_url.replace("do=chat","do=topic_edit")+"&topic_id="+id;
					  location.href=url;
					  
				  });
			});	
	  });
	  
  });
</script>
</head>
<body class="liveroom_bg">
<div class="main_box_3" id="commonPageBox"> 

<div id="liveroomHeader" class="liveroom_header_1">
	
	<div class="live_header_bg">
		<img src="<?php echo TEMPLATE_PATH;?>/bg-1.png">
	</div>
	<div class="live_title_bar webkitBox">
		<span class="liveroom_logo"><img src="<?php  echo $chat_room['room_icon'];?>"></span>
		<span class="boxFlex">
			<b class="live_title"><?php  echo $chat_room['room_name'];?></b>
			<b class="live_info"><?php  echo $chat_room['room_desc'];?></b>
			<span class="live_fans">粉丝<var class="focusnum"><?php  echo $sub_count;?></var>人</span>
		</span>
		<div class="liveroom_tab">
			<a class="liveroom_gonghr liveroomGonghr" href="javascript:;">关注公众号</a>
			<?php  if($is_manager ) { ?>
			<a class="liveroom_manage" href="<?php  echo $setting_url;?>">直播间设置</a>
			<?php  } else { ?>
			<a class="liveroom_focus  on" href="javascript:;">
			 	<span><?php  if($is_subscribe==1) { ?>取消关注<?php  } else { ?>关注直播间<?php  } ?></span>
			 </a>
			<?php  } ?> 
		</div>
	</div>
	
</div>

<div class="liveroom_topics">
	<div class="liveroom_follow_box liveroomFollowBox">
		<input type="hidden" value="share" class="shareUrl">
		<p class="liveroom_QRcode_name">请在直播间设置页面添加公众号的二维码</p>
		<p class="liveroom_QRcode">
			<img src="<?php  if($chat_room['qrcode_url'] ) { ?><?php  echo $chat_room['qrcode_url'];?><?php  } else { ?><?php echo TEMPLATE_PATH;?>/ico-noQCode.png<?php  } ?>">
		</p>
		<p class="liveroom_qrtips">手机端请长按图中二维码，关注公众号</p>
		
	</div>
	
	<?php  if($is_manager ) { ?>
	<div class="createbtn_container">
			<a class="createlivebtn" href="<?php  echo $topic_createurl;?>">
			新建直播话题</a>
	</div>
	<?php  } ?>
	
<?php  if($chat_room['reward_status']==1) { ?>		
<div class="guidebox redbag2func_btn"  style="display:none;">
	<a href="javascript:;" style="display:none;" class="fct_close redbagfuncbox2_close"></a>
	<dl class="redbagfunc_pic">
		<dd class="func_dd1">创建者<var><?php  echo $chat_room['create_nickname'];?></var>开启了赞赏</dd>
		<dd class="func_dd2">也可以在直播间设置开启和关闭</dd>
	</dl>
</div>
<?php  } ?>

	 <?php  if(is_array($topics_ing)) { foreach($topics_ing as $topicing) { ?>
		<div class="nowlive_topic" style="display:block;">
						
						<p class="topic_p1"><?php  echo $topicing['ing_text'];?>
						<?php  if($is_manager ) { ?>
						<span attr-id='<?php  echo $topicing['id'];?>' class="btn_topic_ctrl" style="float:right;color:#fff">编辑</span>
						<?php  } ?>
						</p>
						<p>【话题】<?php  echo $topicing['topic_name'];?></p>

						<p class="nowlive_operate">
						<?php  if($is_manager ) { ?>
						<a href="javascript:;" class="nowlive_over" attr-topicid="<?php  echo $topicing['id'];?>">结束本次直播</a>
						<?php  } else if($topicing['begin_time']>time()) { ?>
						 <a href="javascript:" onclick="return setTips(this,<?php  echo $topicing['id'];?>)" class="nowlive_into"><?php  echo $topicing['sub_text'];?></a>
						<?php  } ?>
						<a href="<?php  echo $this->createMobileUrl('chat',array('topic_id'=>$topicing['id']))?>" class="nowlive_into">进入直播</a></p>
	 </div>
	<?php  } } ?>


<?php  if($topic_his ) { ?>	
		<div class="topic_list">
			<span class="oldlive_topichead">往期直播</span>
			<?php  if(is_array($topic_his)) { foreach($topic_his as $topic) { ?>
			<dl class="topic_list_dl">
			<dd>
			<a href="<?php  echo $this->createMobileUrl('chat',array('topic_id'=>$topic['id']))?>">
				<ul class="heads_box st_1">
				<li><img src="<?php  if($topic['topic_icon']) { ?><?php  echo $topic['topic_icon'];?><?php  } else { ?><?php  echo $chat_room['room_icon'];?><?php  } ?>"></li>
				</ul>
				<span class="topic_title"><i>本期话题</i><?php  echo $topic['topic_name'];?></span>
				<span class="topic_date"><?php  echo date('Y-m-d H:i:s', $topic['end_time']);?> 结束</span>
				</a>
				<div class="manage_bar">
				<?php  if($is_manager) { ?>
				    <b class="btn_topic_ctrl" attr-id='<?php  echo $topic['id'];?>'></b>
				<?php  } ?>
					<b class="topic_views"><?php  echo $topic['look_numbers'];?></b>
					<b class="commnet_quantity"><?php  echo $topic['comment_numbers'];?></b> 
				</div>
				
			</dd>
			
			</dl>
			<?php  } } ?>
		</div>
<?php  } ?>	


</div>

</div>

<!--关闭引导弹框-->
<div class="geneBox funcRTips">
	<div class="main">
		<a href="javascript:;" class="gene_btn gene_cancel"></a>
		<div class="gene_top"><b>暂不开启赞赏功能？</b></div>
		<div class="gene_content alignLeft">
			<span class="lmtipsSpan">
				以后也可在直播间【设置】页面开启
			</span>
		</div>
		<div class="gene_bottom both">
		<span>
			<a href="javascript:;" class="gene_btn gene_confirm">以后再说</a>
		</span>
		<span><a href="" class="gene_btn this_close">现在开启</a></span>
		</div>
	</div>
</div>

<!-- 一对一服务设置引导弹框 -->


<!-- 关注二维码 -->
<div class="geneBox focusQr2Box">
	<div class="main">
		<div class="gene_content">
			
		</div>
		<span class="focusQr_span_1">长按二维码，识别图中二维码</span>
		<span class="focusQr_span_2">有新直播，会提醒你</span>
	</div>
</div>


<div id="pageLoadBox"></div>
		
<div class="page_loading_box" style="display: none;">
	正在加载中...
</div>


<div class="qlSelectBox topicListCtrl">
	<b class="qlSlBg"></b>
	<div class="main">
		<ul class="selectUl">
			<li class="btn_topic_del">删除</li>
		</ul>
	</div>
</div>


<div class="menu_wkBox back_box">
    <a href="<?php  echo $cchat_url;?>" class="menu_boxFl menu_home">首页</a>
	<a href="javascript:;" class="menu_boxFl menu_live on">直播间</a>
	<a href="<?php  echo $mychat_url;?>" class="menu_boxFl menu_mine">我的</a>
</div>

<div class="loadingBox"><span></span></div>

</body></html>
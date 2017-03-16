<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		<link rel="stylesheet" href="<?php echo TEMPLATE_PATH;?>/wtCommon.css" />
		<link rel="stylesheet" href="<?php echo TEMPLATE_PATH;?>/live.css" />
		<link rel="stylesheet" href="<?php echo TEMPLATE_PATH;?>/css/style_new.css" />
		<script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
		<title><?php  echo $chat_room['room_name'];?></title>
		<style type="text/css">
		 .tMain{
		    top: 0rem;
            bottom: 1.2rem;
		    position: absolute;
		    overflow: scroll;
		    overflow-x: hidden;
		    width:100%; 
		    -webkit-overflow-scrolling: touch;
		 }		 
		</style>
		<?php  echo register_jssdk();?>
		<script type="text/javascript">
		var chat_url="<?php  echo $this->createMobileUrl('chat')?>";
		   wx.ready(function () {
			    sharedata = {
			        title: "<?php  echo $sharedata['title'];?>",
			        desc: "<?php  echo $sharedata['desc'];?>",
			        link: "<?php  echo $sharedata['link'];?>",
			        imgUrl: "<?php  echo $sharedata['imgUrl'];?>",
			        success:function(){}
			    };
			    wx.onMenuShareAppMessage(sharedata);
			    wx.onMenuShareTimeline(sharedata);
			});
		   
		   function pageLoadCommon(a, b) {
			     a.scroll(function() {
					distanceScrollCount = a[0].scrollHeight;
					distanceScroll = a[0].scrollTop;
					topicPageHight = a.height();
					//console.dir(distanceScrollCount +"-"+ distanceScroll +"-"+ topicPageHight+"="+(distanceScrollCount - distanceScroll - topicPageHight));
					2 >= distanceScrollCount - distanceScroll - topicPageHight && b()
				})
			}
		   
		   
		   function getHtml(Qindex,List){
			      var html="<li>";
			      html+='<a href="'+chat_url+"&topic_id="+List[Qindex].id+'">';
			      html+='<div class="imgBox">';
			      html+='<img height="120" src="'+List[Qindex].icon+'" width="100%">';
			      html+='<div class="state">回放中</div>';
			      html+='<div class="info">';
			      if(List[Qindex].room_paymoney>0)
			          html+='<span class="pr"><i>&yen; '+List[Qindex].room_paymoney+'</i></span>';
			      else
			    	  html+='<span class="pr"><i>免费</i></span>';
			      html+='<span>'+List[Qindex].look_numbers+'人正在参加</span>';
			      html+='</div>';
			      html+='</div>';
			      html+='<h3>'+List[Qindex].topic_name+'</h3>';
			      html+='</a></li>';
			      
			      return html;
			}
		   
		var pindex=1; 
		$(function(){
			
			$(".liveRoom,.liveRoomBox .close").click(function(){
				$(".liveRoom").toggleClass("tFadeIn");
				var livA = $(".liveRoomBox,.liveRoomBox .box");				
				if(livA.hasClass("tFadeIn")){
					livA.removeClass("tFadeIn");
					livA.addClass("tFadeOut");
				}
				else if(livA.hasClass("tFadeOut")){
					livA.removeClass("tFadeOut");
					livA.addClass("tFadeIn");		
				}
				else{
					livA.toggleClass("tFadeIn");
				}
			})
			
			pageLoadCommon($(".tMain"),function(){
				  pindex++;
				  var postData={pindex: pindex};
				  $.post(location.href, postData, function(result){
						$(".loading").hide();
						if(result.pages<pindex){
							$(".noMore").show();
							return false;
						}
						pindex=result.pindex;

						var last_html="";
						for(var qindex in result.list){
						  last_html+=getHtml(qindex,result.list);
						}
						$("#topic_list").append(last_html);
						
					});	
			  });
			
			var ing_size=$("#topic_ing").children("li").size();
			if(ing_size==1){
				var topic_li=$("#topic_ing").children("li").eq(0);
				//topic_li.css('width','100%');
				//topic_li.find('img').css('height','210');
			}
		});
		  
		</script>
		
	</head>

	<body>	
		
	<div class="tMain">
		
		<!--简介 start-->
		<div class="liveRoom"><img src="<?php  echo $chat_room['room_icon'];?>" width="100%" height="100%"></div>
		<div class="liveRoomBox">
			<div class="box">
				<div class="close"></div>
				<h2><?php  echo $chat_room['room_name'];?></h2>
				<div class="txt">
					<p><?php  echo $chat_room['room_desc'];?></p>
				</div>
				<div class="ma"><img src="<?php  echo $_W['account']['qrcode'];?>" width="120" height="120"></div>
			</div>
		</div>
		<!--简介 end-->

		
	<?php  if($pic_record) { ?>
		<div class="tHeader">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php  if(is_array($pic_record)) { foreach($pic_record as $precord) { ?>
					<div class="swiper-slide">
						<a href="<?php  echo $precord['link'];?>">
						<img height="200" src="<?php  echo $precord['thumb'];?>" width="100%">
						<h2 style="color:#fff;padding:2px;" class="gallerytitle"><?php  echo $precord['bannername'];?></h2>
						</a>
						
					</div>
					<?php  } } ?>
				</div>
				<div class="swiper-pagination"></div>
			</div>
			<link rel="stylesheet" href="<?php echo TEMPLATE_PATH;?>/css/swiper.css" />
			<script src="<?php echo TEMPLATE_PATH;?>/js/swiper.jquery.min.js"></script>
			<script type="text/javascript">
				var swiper = new Swiper('.swiper-container', {
					pagination: '.swiper-pagination',
					autoplay: 3000,
					speed: 400,
					autoplayDisableOnInteraction: false,
				});
			</script>
		</div>
	<?php  } ?>
	
	<?php  if($topic_ing ) { ?>
	<div class="tHome clearfix">
			<div class="tit">正在直播</div>
			<ul class="clearfix" id="topic_ing">
			
				<?php  if(is_array($topic_ing)) { foreach($topic_ing as $topic) { ?>
					<li>
					<a href="<?php  echo $this->createMobileUrl('topic_info',array('topic_id'=>$topic['id']))?>">
							<div class="imgBox">
								<img height="120" src="<?php  if($topic['topic_icon']) { ?><?php  echo $topic['topic_icon'];?><?php  } else { ?><?php  echo $chat_room['room_icon'];?><?php  } ?>" width="100%">
								<div class="state"><?php  if($topic['ing']==1) { ?><i>正</i><i>在</i><i>直</i><i>播</i><?php  } else { ?><i>即</i><i>将</i><i>开</i><i>始</i><?php  } ?></div>
								<div class="info">
									<span class="pr"><i><?php  if($topic['room_paymoney']>0) { ?>&yen; <?php  echo $topic['room_paymoney'];?><?php  } else { ?>免费<?php  } ?></i></span>
									<span><?php  echo $topic['look_numbers'];?>人正在参加</span>
								</div>
							</div>
							<h3><?php  echo $topic['topic_name'];?></h3>
					</a>
					</li>
				<?php  } } ?>
			</ul>
		</div>
			<?php  } ?>	
		
	<?php  if($topic_his ) { ?>
		<div class="tHome clearfix">
			<div class="tit">往期直播</div>
			<ul class="clearfix" id="topic_list">
			
				<?php  if(is_array($topic_his)) { foreach($topic_his as $topic) { ?>
					<li>
					<a href="<?php  echo $this->createMobileUrl('topic_info',array('topic_id'=>$topic['id']))?>">
							<div class="imgBox">
								<img height="120" src="<?php  if($topic['topic_icon']) { ?><?php  echo $topic['topic_icon'];?><?php  } else { ?><?php  echo $chat_room['room_icon'];?><?php  } ?>" width="100%">
								<div class="state">回放中</div>
								<div class="info">
									<span class="pr"><i><?php  if($topic['room_paymoney']>0) { ?>&yen; <?php  echo $topic['room_paymoney'];?><?php  } else { ?>免费<?php  } ?></i></span>
									<span><?php  echo $topic['look_numbers'];?>人正在参加</span>
								</div>
							</div>
							<h3><?php  echo $topic['topic_name'];?></h3>
					</a>
					</li>
				<?php  } } ?>	
			</ul>
		</div>
	<?php  } ?>
	</div>
	
<div class="menu_wkBox back_box">
    <a href="javascript:;" class="menu_boxFl menu_home on">首页</a>
    <?php  if($is_manager) { ?>
	   <a href="<?php  echo $chat_url;?>" class="menu_boxFl menu_live">直播间</a>
	<?php  } ?>
	<a href="<?php  echo $mychat_url;?>" class="menu_boxFl menu_mine">我的</a>
</div>
	
	
	</body>

</html>
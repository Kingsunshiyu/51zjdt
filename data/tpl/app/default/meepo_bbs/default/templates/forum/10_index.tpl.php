<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('default/templates/common/header-base', TEMPLATE_INCLUDEPATH)) : (include template('default/templates/common/header-base', TEMPLATE_INCLUDEPATH));?>
<link id="barindexCss" rel="stylesheet" href="../addons/meepo_bbs/template/mobile/default/css/barindex.min.384d01f8.css" />
<body class="waiting-render wraper indexpage indexpage1" id="js_bar_main">
		<style>
			.sosoid {
			  position: fixed;
			  top: 0;
			  left: 0;
			  height: 50px;
			  width: 100%;
			  background: #f9f9f9;
			  border-top: solid #dfdddf 1px;
			  z-index:99999;
			  display:none;
			}
			.mengceng {
  height: 100%;
  width: 100%;
  background: #000;
  opacity: 0.5;
  z-index: 9999;
  float: left;
  position: absolute;
  top: 0;
  left: 0;
  display:none;
}

.sosoid .soso_text {
  width: 76%;
  margin: 8px 3%;
  text-align: center;
  float: left;
}
.sosoid .soso_text .soso_ts {
  width: 100%;
  height: 34px;
}
.sosoid .soso_submit {
  width: 18%;
  text-align: center;
  float: left;
}
.sosoid .soso_submit .soso_ss {
  height: 34px;
  margin: 8px auto;
  color: #fff;
  background: #0078fe;
  border-radius: 5px;
  padding: 0 12px;
}
		</style>
		<div class="mengceng" style="opacity: 0.5; height: 2424px;z-index: 9999;" onclick="close_click()"></div>
		<div class="sosoid" id="sosoid">
			<form id="searchform" method="get" action="index.php?">
			<input type="hidden" name="i" value="<?php  echo $_W['uniacid'];?>">
			<input type="hidden" name="c" value="entry">
			<input type="hidden" name="m" value="meepo_bbs">
			<input type="hidden" name="do" value="forum">
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
			<div class="soso_text">
			  <input type="text" class="soso_ts" name="srchtxt" id="scform_srchtxt" placeholder="输入帖子关键字">
			</div>
			<div class="soso_submit">
			  <button type="submit" class="soso_ss" id="scform_submit"><i class="glyphicon glyphicon-search"></i>搜索</button>
			</div>
			</form>
		</div>
        <div id="js_bar_wraper">
        	<?php  if(!empty($advs)) { ?>
            <div class="wechat-banner" style="height:66px;">
            	<a href="<?php  echo $advs['link']?>">
                <img id="banner-img" src="<?php  echo tomedia($advs['thumb'])?>" alt="banner" />
                </a>
            </div>
            <?php  } ?>
            <div class="top-refresh-loading">
                <div class="spinner" id="loadingIcon">
                </div>
            </div>
            <div class="header-cover" id="js_bar_basic">
            	<div class="header-cover-img" style="background-image: url(<?php  echo tomedia($forum['bg'])?>);">
            	</div> 
            	<div class="header"> 
            		<div class="cover mask-gray"></div> 
            		<div class="info" id="js_bar_info"> 
            			<div class="logo-container" onclick="window.location.href='<?php  echo $this->createMobileUrl('forum')?>'"> 
            				<img class="logo" src="<?php  echo tomedia($forum['logo'])?>"> 
            			</div>
            			<?php  if(!empty($forum['tab'])) { ?>    
            			<div class="logo-rank"> <span><?php  echo $forum['tab'];?></span> </div> 
            			<?php  } ?>  
            			<div class="name-info"> 
            				<div class="labels"> 
            					<span class="name"><?php  echo $forum['title'];?></span>  
            				</div> 
	            			<div class="info-num" id="js_bar_info_num">  
	            				<label>话题 </label>
	            				<span id="js_bar_pids_count"><?php  echo $forum['topic_num']+$topic_num?></span>  
	            				<label>会员 </label>
	            				<span id="js_bar_vote_count"><?php  echo $forum['member_num']+$member_num?></span>  
	            			</div>  
            				<div class="bar-info-text"><?php  echo $forum['desc'];?></div>  
            			</div> 
            			<div class="sign" id="signArea"> </div> 
            			<div class="op" id="opArea" style="display: block;">
            				<?php  if(!$_W['fans']['follow']) { ?>
	            			<a class="vote-btn btn" id="followTo" href="<?php  echo $forum['subscribeurl']?>"> 
	            			<i class="vote-btn-icon"></i> 关注 </a> 
	            			<?php  } else if(!empty($nsign)) { ?>
	            			<a class="vote-btn btn" href="<?php  echo murl('entry',array('do'=>'index','m'=>'meepo_nsign'))?>"> 
	            			<i class="vote-btn-icon"></i> 签到 </a> 
	            			<?php  } else { ?>
	            			<a class="vote-btn btn" href="<?php  echo $this->createMobileUrl('home')?>"> 
	            			<i class="vote-btn-icon"></i> 我的 </a> 
	            			<?php  } ?>
            			</div>  
            		</div> 
            	</div> 
            </div>
            <div id="uiTestNavWrap" class="ui-test-nav-wrap" style="display: block;">
                <div id="uiTestNav" class="ui-test-nav nohighlight">
                	<div class="new-tab-list" style="overflow-x:auto;">   
                		<?php  if(is_array($navs)) { foreach($navs as $cat) { ?>
                			<div>
                				<a class="myTab_<?php  echo $cat['id'];?>_link" href="<?php  echo $cat['link'];?>" ><?php  echo $cat['name'];?></a>
                			</div>
                		<?php  } } ?>
                	</div>
                	<style type="text/css">
                	<?php  if(is_array($navs)) { foreach($navs as $cat) { ?>
                		.tab_video:before,.myTab_<?php  echo $cat['id']?>_link:before,.myTab_2:before {
                			background-image: url(<?php  echo tomedia($cat['icon'])?>) !important;
                		}
                	<?php  } } ?>
                	</style>
                </div>
            </div>
            <div class="star_info" id="js_bar_star_info">
            </div>
            <div class="empty-container hide">
            </div>
            <style>
            .s_soso {
			  margin: 0 auto;
			  padding: 8px 0;
			  width: 100%;
			  text-align: center;
			  background: #cfd3cf;
			}
			.s_soso a {
			  color: #ababab;
			  display: block;
			  clear: both;
			  width: 96%;
			  margin: 0 2%;
			  height: 30px;
			  line-height: 30px;
			  background: #fff;
			  border-radius: 5px;
			  font-weight: 400;
			}
			a:link, a:visited, a:hover {
			  color: #9f9f9f;
			  text-decoration: none;
			}
            </style>
            <div class="s_soso">
            	<a href="javascript:;" onclick="do_click('#soso')">
            	<i class="fa fa-search fa-1x ">&nbsp;</i>搜索</a>
            </div>
            <script>
            function do_click(id){
     		   $('.mengceng').show();
     		   $('#sosoid').show();
     	   }
            
            $('.mengceng').click(function(){
            	$('.mengceng').hide();
      		   $('#sosoid').hide();
            });
            </script>
            <div class="top" id="js_bar_top">
            	<div class="top-list-wrap">
            		<?php  if(is_array($tops)) { foreach($tops as $top) { ?>  
            		<div class="top-list">  
	            		<div class="top-list-item">  
		            		<a href="<?php  echo $this->createMobileUrl('forum_topic',array('id'=>$top['id']))?>" class="link"> 
		            			<label class="rec">顶</label> <span class="name"><?php  echo $top['title'];?></span> 
		            		</a> 
	            		</div> 
	            	</div>
	            	<?php  } } ?>
	            </div>
            </div>
            <div id="js_best_top" class="best-top section-1px">
                
            </div>
            <div class="top section-1px" id="js_bar_top_menu" style="display:none">
            </div>
            <ul class="item list" id="js_bar_list" style="margin-bottom:50px;">
            	 <?php  if(is_array($list)) { foreach($list as $for) { ?>
            	 <li class="section-1px " onclick="window.location.href='<?php  echo $this->createMobileUrl('forum_topic',array('id'=>$for['id']))?>'">  
            	 	<div class="detail-text-content <?php  if(!empty($for['thumb'])) { ?>haspic<?php  } else { ?>nopic<?php  } ?>">  
            	 		<?php  if(!empty($for['thumb'])) { ?>
            	 		<div class="act-img img-gallary  hide-bg">  
            	 			<img style="min-width:80px;height:80px;" src="<?php  echo tomedia($for['thumb']['0'])?>">   
            	 			<div class="pic-count-tips"><?php  echo $for['thumb_num'];?>图 </div>  
            	 		</div>  
            	 		<?php  } ?>
            	 		<div class="text-container"> 
            	 			<h3 class="text">
            	 				<?php  if($for['tab'] == 'new') { ?>
            	 				<div class="post-tags"><label class="new">新</label></div>
            	 				<?php  } ?>
            	 				<?php  if($for['tab'] == 'jing') { ?>
            	 					<div class="post-tags"><label class="best">精</label></div>
            	 				<?php  } ?>
            	 				<?php  if($for['tab'] == 'begging') { ?>
            	 				<div class="post-tags"><label class="rec">赏</label></div>
            	 				<?php  } ?>
            	 				<?php  echo cutstr(strip_tags(trim($for['title'])),15,'...');?>
            	 				<?php  if($for['tab'] == 'begging') { ?>
            	 				<div class="post-tags">
            	 					<label class="best">【<?php  echo cutstr($for['ctitle'],8)?>】<?php  echo $for['begging_money'];?>元</label>
            	 				</div>
            	 				<?php  } ?>
            	 			</h3> 
            	 			<div class="list-content "><?php  if(!empty($for['thumb'])) { ?>&nbsp;<?php  } ?><?php  echo cutstr(strip_tags($for['content']),65,'...');?></div> 
            	 			
            	 		</div> 
            	 		<div class="info ">  
	            	 		<div> 
		            	 		<span class="nick"> 
		            	 			<span class="single-ellipsis" style="max-width: 150px;">  <?php  if(!empty($for['author']['nickname'])) { ?><?php  echo cutstr($for['author']['nickname'],8)?> <?php  } else { ?>游客<?php  } ?></span> 
		            	 			<span class="ver-middle"> <span class="honour border-1px">&nbsp;<?php  echo cutstr($for['ctitle'],5)?></span> </span> 
		            	 		</span> 
	            	 		</div>
	            	 		<div class="fl-right"> 
	            	 			<i class="read-icon"></i> 
	            	 			<span class="read-num-text"><?php  echo $for['lnum']?></span> 
	            	 			<i class="reply-icon"></i> 
	            	 			<span class="reply-num-text" style="margin-right: 0;"><?php  echo $for['replynum']?></span> 
	            	 		</div>  
            	 		</div> 
            	 	</div>   
            	 </li>
            	 <?php  } } ?>

            </ul>
            <div id="js_menu_list" class="item list">
            </div>
            <div class="rank_tab_container" style="display:none">
                <div class="container_inner">
                    <div id="rankHeader" class="rank_header section-1px">
                    </div>
                    <div id="rankQzInfo" class="rank_qz_info rank_qz_info_size section-1px">
                    </div>
                    <div id="rankInfo" class="rank_info section-1px">
                    </div>
                    <div id="rankList" class="rank_list section-1px">
                        <ul id="rankBarList" class="rank_bar_list">
                        </ul>
                    </div>
                    <div id="showMoreRankBar" class="show_more_rank_bar section-1px">
                        显示更多...
                    </div>
                    <div class="unsubscribe_btn_wrapper">
                        <a class="unsubscribe_btn">
                            取消关注
                        </a>
                    </div>
                </div>
            </div>
            <div id="wechat_more" class="wechat" style="display:none">
            </div>
            
        </div>
        <div class="publish-btn-container section-1px">
            <div class="publish-btn appbox">
                <i class="publish-btn-icon">
                </i>
                <a id="tab-publish" href="<?php  echo $this->createMobileUrl('forum_post')?>">
                    发布话题
                </a>
            </div>
        </div>
        <div class="all-tab-refresh-btn hide-refresh-btn">
        </div>
        <div id="follow-mask">
            <b id="follow-mask-close">
            </b>
            <div id="follow-tips">
                恭喜你成为
                <span id="follow-tips-barname">
                </span>
                部落
                <br />
                第
                <span id="follow-tips-num">
                </span>
                个粉丝
            </div>
            <div id="follow-tips-icon">
            </div>
            <div id="follow-sign">
                立即签到，获取经验值
            </div>
        </div>
        <div id="guide-wsq-mask">
            <div id="WsqGuideCarousel" class="ui-carousel js-slide guide-wsq-center"
            data-ride="carousel">
                <div class="ui-carousel-inner">
                    <div class="ui-carousel-item js-active">
                        <img class="wsq-pic" data-src="http://pub.idqqimg.com/qqun/xiaoqu/mobile/img/nopack/wsq/wsq-pic1.png"
                        />
                        <img class="wsq-text" data-src="http://pub.idqqimg.com/qqun/xiaoqu/mobile/img/nopack/wsq/wsq-text1.png"
                        />
                    </div>
                    <div class="ui-carousel-item">
                        <img class="wsq-pic" data-src="http://pub.idqqimg.com/qqun/xiaoqu/mobile/img/nopack/wsq/wsq-pic2.png"
                        />
                        <img class="wsq-text" data-src="http://pub.idqqimg.com/qqun/xiaoqu/mobile/img/nopack/wsq/wsq-text2.png"
                        />
                    </div>
                    <div class="ui-carousel-item" id="WsqLastCarouselItem">
                        <img class="wsq-pic" data-src="http://pub.idqqimg.com/qqun/xiaoqu/mobile/img/nopack/wsq/wsq-pic3.png"
                        />
                        <img class="wsq-text" data-src="http://pub.idqqimg.com/qqun/xiaoqu/mobile/img/nopack/wsq/wsq-text3.png"
                        />
                        <div id="guide-wsq-button" class="guide-wsq-button">
                            开启新旅程
                        </div>
                    </div>
                </div>
                <ol class="ui-carousel-indicators">
                    <li class="js-active">
                    </li>
                    <li class="">
                    </li>
                    <li class="">
                    </li>
                </ol>
            </div>
            <div id="wsqSkipBtn" class="wsq-skip">
            </div>
        </div>
        <div id="js_bar_checkcode" onclick="">
        </div>
       <script>
       $(function(){
    	   
    	   $('#followTo').click(function(){
    		   
    	   });
    	   $('.all-tab-refresh-btn').click(function(){
    		   $(window).scrollTop(0);
    	   });
    	   $(window).bind('scroll',function(){show()});
    	   function show(){
				if($(window).scrollTop()+$(window).height()>=$(document).height()){
					$('#showMoreRankBar').show();
    	            ajaxRead();
    	        }
    	    }
    	   
    	   function ajaxRead(){
				var html="";
				var start = $('#js_bar_list li').length;
				<?php  if(empty($_GPC['id'])) { ?>
				var url = "<?php  echo $this->createMobileUrl('forum')?>";
				<?php  } else { ?>
				var url = "<?php  echo $this->createMobileUrl('forum',array('id'=>$_GPC['id']))?>";
				<?php  } ?>
				$.get(url, {'start' : start}, function(html){
					$('#js_bar_list').append(html);
				});
    	    }
    	   
    	   
       });
       </script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('default/templates/common/footer-base', TEMPLATE_INCLUDEPATH)) : (include template('default/templates/common/footer-base', TEMPLATE_INCLUDEPATH));?>
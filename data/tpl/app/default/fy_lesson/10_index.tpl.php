<?php defined('IN_IA') or exit('Access Denied');?><!-- 
 * 微课堂首页
 * ============================================================================
-->
<?php  include $this->template('_header');?>
<link href="<?php echo MODULE_URL;?>template/mobile/style/index.css?v=1.3.2" rel="stylesheet" />
<script src="<?php echo MODULE_URL;?>template/mobile/style/js/breakingnews.js?v=1.3.2"></script>
<script>
$(function(){
	$('#breakingnews1').BreakingNews({
		title: '全部公告'
	});

});
</script>

<?php  if($setting['isfollow']==1 && !empty($fans) && $fans['follow']==0) { ?>
<div class="follow_topbar"><div class="headimg"><img src="<?php  echo $_W['attachurl'];?><?php  echo $setting['qrcode'];?>"></div><div class="info"><div class="i"><?php  echo $_W['account']['name'];?></div><div class="i">关注公众号，享海量课程</div></div><div class="sub" onclick="location.href='<?php  echo $this->createMobileUrl('follow');?>'">立即关注</div></div>
<div style='height:44px;'>&nbsp;</div>
<?php  } ?>

<!-- Start head -->
<header class="head cbox">
    <a href="<?php  echo $this->createMobileUrl('index');?>" <?php  if(!empty($setting['logo'])) { ?>style="background-image:url(<?php  echo $_W['attachurl'];?><?php  echo $setting['logo'];?>);"<?php  } ?> class="ico ico-logo"></a>
    <div class="flex head-search">
        <form action="javascript:return true;">
        <input type="search" class="input-text" id="head_searchKeywords" placeholder="搜索课程名称或讲师">
        </form>
    </div>
    <a href="javascript:;" class="head-features cbox">
        <i class="ico ico-features"></i>
    </a>
</header>
<!-- Start 内容 -->
<div class="content">
    <!-- 焦点图 START-->
	<?php  if(!empty($setting['banner'])) { ?>
    <div class="focus" id="banner">
        <div class="focus-box">
            <ul>
			<?php  if(is_array($banner)) { foreach($banner as $b) { ?>
				<?php  if(!empty($b['img'])) { ?>
                <li><a href="<?php  echo $b['link'];?>"><img src="<?php  echo $_W['attachurl'];?><?php  echo $b['img'];?>" width="320" height="126"/></a></li>
				<?php  } ?>
			<?php  } } ?>
			</ul>
        </div>
    </div>
	<?php  } ?>
	<!-- 焦点图 END-->

	<!-- 文章公告  START -->
	<?php  if(!empty($articlelist) && is_array($articlelist)) { ?>
	<div class="BreakingNewsController easing" id="breakingnews1">
		<div class="bn-title" onclick="location.href='<?php  echo $this->createMobileUrl('article', array('op'=>'list'));?>'"></div>
		<ul>
			<?php  if(is_array($articlelist)) { foreach($articlelist as $article) { ?>
			<li><a href="<?php  echo $this->createMobileUrl('article', array('op'=>'display','aid'=>$article['id']));?>">[<?php  echo date('m-d',$article['addtime']);?>]<?php  echo $article['title'];?></a></li>
			<?php  } } ?>
		</ul>
	</div>
	<?php  } ?>

	<!-- 分类 START-->
	<div class="category-home-nav fixed-Width">
		<ul>
			<?php  if(is_array($category_list)) { foreach($category_list as $cat) { ?>
			<li>
				<a href="<?php  echo $this->createMobileUrl('search', array('cid'=>$cat['id']));?>"><span><img src="<?php  echo $_W['attachurl'];?><?php  echo $cat['ico'];?>"></span>
					<p><?php  echo $cat['name'];?></p>
				</a>
			</li>
			<?php  } } ?>
			<li>
				<a href="<?php  echo $this->createMobileUrl('search',array('op'=>'allcategory'));?>"><span><img src="<?php echo MODULE_URL;?>template/mobile/images/ico-allcategory.png"></span>
					<p>全部分类</p>
				</a>
			</li>
		</ul>
	</div>
	<!-- 分类 END-->

	<?php  if(!empty($list)) { ?>
	<!-- 课程模块遍历 START-->
	<?php  if(is_array($list)) { foreach($list as $rec) { ?>
    <div class="index-course shadow">
        <h3 class="g-title"><?php  echo $rec['rec_name'];?></h3>
        <ul class="course-list row2 wider">
			<?php  if(is_array($rec['lesson'])) { foreach($rec['lesson'] as $item) { ?>
			<?php  if($setting['lessonshow']==1) { ?>
			<li class="item">
                <a href="<?php  echo $this->createMobileUrl('lesson', array('op'=>'display', 'id'=>$item['id']));?>">
                    <img src="<?php  echo $_W['attachurl'];?><?php  echo $item['images'];?>">
                    <div class="con">
                        <h3 class="title te2"><?php  echo $item['bookname'];?></h3>
                        <p class="info te2"><span class="evaluate"><?php  echo $item['score']*100;?>%</span> 好评/(共<span class="evaluate"><?php  echo $item['evaluate'];?></span>条评论)<?php  if($item['price']>0 && $item['vipview']==1) { ?><span style="float:right;color:#62CC45;">VIP免费</span><?php  } ?></p>
                        <div class="cbox overview">
                            <p class="flex te">共<em class="c-green"><?php  echo $item['count'];?></em>节课&nbsp;&nbsp;&nbsp;&nbsp;<em style="color:#3BC0B6;"><?php echo $item['price']>0?$item['price'].'元':'免费';?></em></p>
                            <span class="te"><em class="c-green"><?php  if($item['price']>0) { ?><?php  echo $item['buynum']+$item['virtual_buynum'];?><?php  } else { ?><?php  echo $item['buynum']+$item['virtual_buynum']+$item['visit'];?><?php  } ?></em>人已学习</span>
                        </div>
                    </div>
                </a>
			</li>
			<?php  } else if($setting['lessonshow']==2) { ?>
			<li class="module-courseList__item">
				<a href="<?php  echo $this->createMobileUrl('lesson', array('op'=>'display', 'id'=>$item['id']));?>">
					<div class="module-courseCard">
						<div class="module-courseCard__img">
							<img src="<?php  echo $_W['attachurl'];?><?php  echo $item['images'];?>" alt="<?php  echo $item['bookname'];?>" width="100%" height="100%">
						</div>
						<div class="module-courseCard__title">
							<?php  echo $item['bookname'];?>
						</div>
						<div class="module-courseCard__info">
							<span class="module-courseCard__price u-price"><?php echo $item['price']>0?'¥'.$item['price']:'免费';?></span>
							<span class="module-courseCard__classify">共<em class="c-green"><?php  echo $item['count'];?></em>节课</span>
						</div>
						<div class="module-courseCard__info">
							<span class="module-courseCard__price u-price"><?php  if($item['price']>0 && $item['vipview']==1) { ?><span style="font-size:13px;color:#62CC45;">VIP免费</span><?php  } ?></span>
							<span class="module-courseCard__classify"><?php  if($item['price']>0) { ?><?php  echo $item['buynum']+$item['virtual_buynum'];?><?php  } else { ?><?php  echo $item['buynum']+$item['virtual_buynum']+$item['visit'];?><?php  } ?>人已学习</span>
						</div>
					</div>
				</a>
			</li>
			<?php  } ?>
			<?php  } } ?>
		</ul>
    </div>
	<?php  } } ?>
	<!-- 课程模块遍历 END-->
	<?php  } ?>
   
	<a href="<?php  echo $this->createMobileUrl('search');?>" class="index-btn-view">查看更多课程</a>
</div>
<script src="<?php echo MODULE_URL;?>template/mobile/style/js/jquery.touchSlider.js"></script>
<script type="text/javascript">
var numpic = $('.focus-box li').size() - 1,
    ulstart   = '<div class="focus-point">',
    ulcontent = '',
    ulend     = '</div>',
    html   = '';

var add_ul_li = function() {
    for(var i = 0; i <= numpic; i++) {
        ulcontent += '<a href="javascript:;">' + (i + 1) + '</a>';
    }
    $('.focus-box').after(ulstart + ulcontent + ulend);
}
$(function() {
    add_ul_li();
    $('#banner .focus-box').touchSlider({
        flexible : true,
        speed    : 600,
        paging   : $('#banner .focus-point a'),
        widthHeightRatio : 320/126,
        counter : function (e) {
            $('#banner .focus-point a').removeClass('cur').eq(e.current-1).addClass('cur');
        }
    });
})
</script>

<?php  echo register_jssdk(false);?>
<script type="text/javascript">
wx.ready(function(){
	var shareData = {
		title: "<?php  echo $sharelink['title'];?> - <?php  echo $setting['sitename'];?> - <?php  echo $_W['account']['name'];?>",
		desc: "<?php  echo $sharelink['desc'];?>",
		link: "<?php  echo $shareurl;?>",
		imgUrl: "<?php  echo $_W['attachurl'];?><?php  echo $sharelink['images'];?>",
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

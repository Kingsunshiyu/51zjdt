<?php defined('IN_IA') or exit('Access Denied');?><!-- 
 * 微课堂首页
 * ============================================================================
-->
<?php  include $this->template('_header');?>
<link href="<?php echo MODULE_URL;?>template/mobile/style/search.css?v=1.2.0" rel="stylesheet" />

<!-- Start head -->
<header class="head cbox">
    <a href="<?php  echo $this->createMobileUrl('index');?>" <?php  if(!empty($setting['logo'])) { ?>style="background-image:url(<?php  echo $_W['attachurl'];?><?php  echo $setting['logo'];?>);"<?php  } ?> class="ico ico-logo"></a>
    <div class="flex head-search">
        <form action="javascript:return true;">
        <input type="search" class="input-text" id="head_searchKeywords" placeholder="搜索课程名称或讲师" value="<?php  echo $_GPC['keyword'];?>">
        </form>
    </div>
    <a href="javascript:;" class="head-features cbox">
        <i class="ico ico-features"></i>
    </a>
</header>
<?php  if($op=='display') { ?>
<style type="text/css">
.category-name{padding-left:3%; display:inline;}
.category-ico{border-radius:50%; width:.25rem;}
</style>
<div id="mask_filter" style="position: fixed; cursor: default; top: 0px; left: 0px; right: 0px; bottom: 0px; z-index: 11; opacity: 0.5; background: rgb(0, 0, 0); display:none;"></div>

<!-- Start 内容 -->
<div class="filter_wrap" id="nav" style="position: relative;">
	<div class="filter_item" onclick="location.href='<?php  echo $this->createMobileUrl('search', array('op'=>'allcategory'));?>'"><span class="filter_text"><?php  echo $catname;?></span></div>
	<div id="soft" class="filter_item"><span class="filter_text"><?php  echo $softname;?></span></div>
</div>
<div id="softcontent" class="pop">
	<a href="<?php  echo $_W['siteurl'];?>&soft=" class="type_item single <?php  if(empty($_GPC['soft'])) { ?>type_item_on<?php  } ?>"><img src="<?php echo MODULE_URL;?>template/mobile/images/ico-default.png" class="category-ico"><p class="category-name">默认排序</p></a>
	<a href="<?php  echo $_W['siteurl'];?>&soft=free" class="type_item single <?php  if($_GPC['soft']=='free') { ?>type_item_on<?php  } ?>"><img src="<?php echo MODULE_URL;?>template/mobile/images/ico-free.png" class="category-ico"><p class="category-name">免费课程</p></a>
	<a href="<?php  echo $_W['siteurl'];?>&soft=price" class="type_item single <?php  if($_GPC['soft']=='price') { ?>type_item_on<?php  } ?>"><img src="<?php echo MODULE_URL;?>template/mobile/images/ico-price.png" class="category-ico"><p class="category-name">价格优先</p></a>
	<a href="<?php  echo $_W['siteurl'];?>&soft=hot" class="type_item single <?php  if($_GPC['soft']=='hot') { ?>type_item_on<?php  } ?>"><img src="<?php echo MODULE_URL;?>template/mobile/images/ico-hot.png" class="category-ico"><p class="category-name">销量优先</p></a>
	<a href="<?php  echo $_W['siteurl'];?>&soft=score" class="type_item single <?php  if($_GPC['soft']=='score') { ?>type_item_on<?php  } ?>"><img src="<?php echo MODULE_URL;?>template/mobile/images/ico-score.png" class="category-ico"><p class="category-name">好评优先</p></a>
</div>
<div id="content" class="content">
	<p class="c_count">共找到<em><?php  echo $total;?></em>节课程</p>
	<div class="c_part cf">
		<div class="con">
			<?php  if(is_array($list)) { foreach($list as $item) { ?>
			<a href="<?php  echo $this->createMobileUrl('lesson', array('op'=>'display', 'id'=>$item['id']));?>" class="pic">
				<dl class="list">
					<dt><img src="<?php  echo $_W['attachurl'];?><?php  echo $item['images'];?>"></dt>
					<dd>
						<p class="s_tit"><?php  echo $item['bookname'];?></p>
						<div class="s_ext">
							<span>共<em class="n"><?php  echo $item['soncount'];?></em>节课</span>&nbsp;&nbsp;
							<span class="ml20"><em style="color:#3BC0B6;"><?php echo $item['price']>0?$item['price'].'元':'免费';?></em></span>&nbsp;&nbsp;
							<span style="float:right;"><em style="color:#4A45FB;"><?php  if($item['price']>0) { ?><?php  echo $item['buynum']+$item['virtual_buynum'];?><?php  } else { ?><?php  echo $item['buynum']+$item['virtual_buynum']+$item['visit'];?><?php  } ?></em>人已学习</span>
						</div>
						<div style="padding-top:.1rem;">
							<span class="evaluate"><?php  echo $item['score']*100;?>%</span> 好评/(共<span class="evaluate"><?php  echo $item['evaluate'];?></span>条评论)&nbsp;&nbsp;<?php  if($item['price']>0 && $item['vipview']==1) { ?><span style="float:right;color:#62CC45;">VIP免费</span><?php  } ?>
						</div>
					</dd>
				</dl>
			</a>
			<?php  } } ?>
		</div>
	</div><!-- =E c_part -->
	<?php  echo $pager;?>
</div>
<script type="text/javascript">
	var nav = document.getElementById("nav");
	var _getHeight = nav.offsetTop;
	window.onscroll = function(){
		var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
		if(scrollTop < _getHeight){
			nav.style.position = 'relative';
		}else{
			nav.style.position = 'fixed';
		}
	}

	var soft  = document.getElementById("soft");
	var softcontent  = document.getElementById("softcontent");
	var mask_filter  = document.getElementById("mask_filter");
	var content  = document.getElementById("content");
	$("#serve").click(function(){
		softcontent.style.display = 'none';
		mask_filter.style.display = 'block';
		content.style.display = 'none';
	});
	$("#soft").click(function(){
		soft.style.display = 'block';
		softcontent.style.display = 'block';
		softcontent.style.top = '0px';
		mask_filter.style.display = 'block';
		content.style.display = 'none';
	});

	$("#mask_filter").click(function(){
		soft.style.display = 'block';
		softcontent.style.display = 'none';
		mask_filter.style.display = 'none';
		content.style.display = 'block';
	});
</script>

<?php  } else if($op='allcategory') { ?>
<link href="<?php echo MODULE_URL;?>template/mobile/style/index.css?v=1.1.9" rel="stylesheet" />
<style type="text/css">
.allcategory-wrap{width:99%;margin:10px auto;}
.allcategory-wrap .allcategory{
    font-size: 16px;
    font-weight: 400;    display: block;
    line-height: 40px;
    text-align: center;
    border-radius: 2px;
    color: #666;
    border: 1px solid #ccc;
    background-color: #fff;}
</style>
<!-- 分类 START-->
<div class="allcategory-wrap">
	<a class="allcategory" href="<?php  echo $this->createMobileUrl('search');?>">全部分类</a>
</div>
<div class="category-home-nav fixed-Width">
	<ul>
		<?php  if(is_array($categorylist)) { foreach($categorylist as $cat) { ?>
		<li>
			<a href="<?php  echo $this->createMobileUrl('search', array('cid'=>$cat['id']));?>"><span><img src="<?php  echo $_W['attachurl'];?><?php  echo $cat['ico'];?>"></span>
				<p><?php  echo $cat['name'];?></p>
			</a>
		</li>
		<?php  } } ?>
	</ul>
</div>
<!-- 分类 END-->
<?php  } ?>

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
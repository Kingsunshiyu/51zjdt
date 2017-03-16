<?php defined('IN_IA') or exit('Access Denied');?><?php  if($_GPC['do']!='follow') { ?>
<footer>
    <a href="<?php  echo $this->createMobileUrl('index');?>"><?php  echo $setting['copyright'];?></a>
</footer>
<?php  } ?>

<?php  if($setting['footnav']==1 || in_array($_GPC['do'], array('lesson'))) { ?>
<!-- Start 悬浮菜单 -->
<ul class="back-top">
    <li class="g-features">
        <a class="link" href="javascript:;" onclick="$(this).next('ul:visible').slideUp('fast');$(this).next('ul:hidden').slideDown('fast');">
            <i class="ico ico-features"></i>
        </a>
        <ul style="display: none;" class="down arrow-b">
            <li><a href="<?php  echo $this->createMobileUrl('index');?>">首 页</a></li>
            <li><a href="<?php  echo $this->createMobileUrl('search');?>">搜 索</a></li>
            <li><a href="<?php  echo $this->createMobileUrl('self');?>">个人中心</a></li>
			<li><a href="javascript:history.go(-1);">返回上页</a></li>
        </ul>
        <span class="arrow-down"></span>
    </li>
    <li id="ico-top">
        <a class="link" href="#"><i class="ico ico-top">返回顶部</i></a>
    </li>
</ul>

<script type="text/javascript">
    if ($(window).scrollTop() <= 300) {
        $('#ico-top').hide();
    }
    $(window).scroll(function () {
        if ($(window).scrollTop() <= 300) {
            $('#ico-top').hide();
        } else {
            $('#ico-top').show();
        }
        if ($('.arrow-b').css('display') == 'block') {
            $('.arrow-b').hide();
        }
    })
</script>
<!-- End 悬浮菜单 -->

<?php  } else { ?>
	<?php  if(!in_array($_GPC['do'], array('lesson'))) { ?>
	<!-- Start 底部菜单 -->
	<div class="nav-top_bar" style="-webkit-transform:translate3d(0,0,0)">
		<nav>
			<ul class="nav-top_menu">
				<li><a <?php  if($_GPC['do']=='index') { ?>class="active"<?php  } ?> href="<?php  echo $this->createMobileUrl('index');?>"><img src="../addons/fy_lesson/template/mobile/images/nav-home.png"><label>首 页</label></a></li>
				<li><a <?php  if($_GPC['do']=='search') { ?>class="active"<?php  } ?>  href="<?php  echo $this->createMobileUrl('search');?>"><img src="../addons/fy_lesson/template/mobile/images/nav-search.png"><label>搜 索</label></a></li>    
				<li><a <?php  if($_GPC['do']=='mylesson') { ?>class="active"<?php  } ?>  href="<?php  echo $this->createMobileUrl('mylesson');?>"><img src="../addons/fy_lesson/template/mobile/images/nav-mylesson.png"><label>我的课程</label></a></li>
				<li><a <?php  if($_GPC['do']=='self') { ?>class="active"<?php  } ?>  href="<?php  echo $this->createMobileUrl('self');?>"><img src="../addons/fy_lesson/template/mobile/images/nav-self.png"><label>个人中心</label></a>
			</ul>
		</nav>
	</div>
	<!-- End 底部菜单 -->
	<?php  } ?>
<?php  } ?>

<!-- End footer -->
<script type="text/javascript">
var search = function() {
    var keywords = $.trim($("#head_searchKeywords").val());
    if (keywords == '') {
        searchUrl = '<?php  echo $this->createMobileUrl("search");?>';
    } else {
        searchUrl = '<?php  echo $this->createMobileUrl("search");?>&keyword=' + encodeURIComponent(keywords);
    }
    document.location.href = searchUrl;
    return false;
};
$("#head_searchKeywords").keydown(function(event) {
	if (event.keyCode == 13) {
		search();
	}
});

</script>
<div style="height:.5rem;"></div>
</body>
</html>
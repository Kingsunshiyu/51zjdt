<?php defined('IN_IA') or exit('Access Denied');?><!--
 * ============================================================================
 * ============================================================================
-->
<?php  include $this->template('_header');?>
<style type="text/css">
*{   
    -webkit-touch-callout:none;
    -webkit-user-select:none;
    -khtml-user-select:none;
    -moz-user-select:none;
    -ms-user-select:none;
    user-select:none;
} 
</style>
<link href="<?php echo MODULE_URL;?>template/mobile/style/article.css" rel="stylesheet" />
<div class="rich_primary">
	<div class="rich_title"><?php  echo $section['title'];?></div>
	<div class="rich_mate">
		<div class="rich_mate_text"><?php  echo date('Y-m-d', $section['addtime']);?></div>
		<div class="rich_mate_text"></div>
		<a href="<?php  echo $this->createMobileUrl('teacher', array('teacherid'=>$lesson['teacherid']));?>"><div class="rich_mate_text href"><?php  echo $lesson['teacher'];?></div></a>
	</div>
	<div class="rich_content">
		<?php  echo htmlspecialchars_decode($section['content']);?>
	</div>
</div>

<script type="text/javascript">
<?php  if($sectionid>0){ ?>
	var recordurl = "<?php  echo $this->createMobileUrl('record', array('lessonid'=>$_GPC['id'],'sectionid'=>$_GPC['sectionid'],'openid'=>$openid));?>";

	$(document).ready(function(){  
		$.get(recordurl, {}, function (data){});
	});
	
<?php  } ?>
</script>

<?php  echo register_jssdk(false);?>
<script type="text/javascript">
wx.ready(function(){
	var shareData = {
		title: "<?php  echo $lesson['bookname'];?> - <?php  echo $setting['sitename'];?> - <?php  echo $_W['account']['name'];?>",
		desc: "<?php  echo $sharelesson['title'];?>",
		link: "<?php  echo $url;?>&uid=<?php  echo $lessonmember['uid'];?>",
		imgUrl: "<?php  echo $_W['attachurl'];?><?php echo $sharelesson['images']?$sharelesson['images']:$lesson['images']?>",
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

<?php defined('IN_IA') or exit('Access Denied');?><!-- 
 * 个人中心
 * ============================================================================
-->
<?php  include $this->template('_header');?>
<link href="<?php echo MODULE_URL;?>template/mobile/style/self.css" rel="stylesheet" />
<link href="<?php echo MODULE_URL;?>template/mobile/style/self-font.css" rel="stylesheet" />

<style type="text/css">
*, *:before, *:after {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
</style>
<body>
<div class="vipcenter">
  <div class="vipheader">
  <a href="<?php  echo $this->createMobileUrl('self', array('op'=>'upheaderimg'));?>" onclick="return confirm('是否更新粉丝头像?');return false;">
    <div class="touxiang"><img src="<?php  echo $memberinfo['avatar'];?>" style="vertical-align: top;" alt=""></div>
    <div class="name"><?php  echo $memberinfo['nickname'];?></div>
    <div class="gztt">学号：<?php  echo $studenno;?></div>
  </a>
  </div>
  <div class="vipsan">
    <div><a><h4>会员积分</h4><p><?php  echo $memberinfo['credit1'];?></p></a></div>
	<div><a><h4>会员余额</h4><p><?php  echo $memberinfo['credit2'];?></p></a></div>
    <div><a><h4>收藏课程</h4><p><?php  echo $collect_lesson;?></p></a></div>
    <div><a><h4>收藏讲师</h4><p><?php  echo $collect_teacher;?></p></a></div>
  </div>
  <ul class="vipul">
    <li>
      <a href="<?php  echo $this->createMobileUrl('vip');?>">
       <div class="icc"><i class="iconfont icon-xitongmingpian"></i></div>
       <div class="lzz">VIP服务</div>
       <div class="rizi <?php  if($lessonmember['vip']==1) { ?>lvzi<?php  } ?>"><?php echo $lessonmember['vip']==1?'已开通':'未开通';?></div>
      </a>
    </li>
	<li>
      <a href="<?php  echo $this->createMobileUrl('mylesson', array('status'=>'all'));?>">
       <div class="icc"><i class="iconfont icon-liebiao"></i></div>
       <div class="lzz">我的课程</div>
       <div class="rizi"><i class="iconfont icon-jiantouri"></i></div>
      </a>
    </li>
    <li>
      <a href="<?php  echo $this->createMobileUrl('history');?>">
       <div class="icc"><i class="iconfont icon-huodongfj"></i></div>
       <div class="lzz">我的足迹</div>
       <div class="rizi"><i class="iconfont icon-jiantouri"></i></div>
      </a>
    </li>
    <li>
      <a href="<?php  echo $this->createMobileUrl('collect', array('ctype'=>1));?>">
       <div class="icc"><i class="iconfont icon-wenjian"></i></div>
       <div class="lzz">收藏课程</div>
       <div class="rizi"><i class="iconfont icon-jiantouri"></i></div>
      </a>
    </li>
    <li>
      <a href="<?php  echo $this->createMobileUrl('collect', array('ctype'=>2));?>">
       <div class="icc"><i class="iconfont icon-yonghux"></i></div>
       <div class="lzz">收藏讲师</div>
       <div class="rizi"><i class="iconfont icon-jiantouri"></i></div>
      </a>
    </li>
	<?php  if($setting['teacher_income']>0 || !empty($teacher)) { ?>
	<li>
      <a href="<?php  echo $this->createMobileUrl('teachercenter');?>">
       <div class="icc"><i class="iconfont icon-xiaoyuanqiandao" style="color:#21CA0E;"></i></div>
       <div class="lzz">讲师中心</div>
       <div class="rizi"><i class="iconfont icon-jiantouri"></i></div>
      </a>
    </li>
	<?php  } ?>
	<?php  if($setting['is_sale']==1) { ?>
	  <?php  if(($setting['sale_rank']==1) || ($setting['sale_rank']==2 && $lessonmember['vip']==1)) { ?>
		<li>
		  <a href="<?php  echo $this->createMobileUrl('commission');?>">
		   <div class="icc"><i class="iconfont icon-fenxiang" style="color:red;"></i></div>
		   <div class="lzz">分销中心</div>
		   <div class="rizi"><i class="iconfont icon-jiantouri"></i></div>
		  </a>
		</li>
	  <?php  } ?>
	<?php  } ?>
  </ul>
</div>

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

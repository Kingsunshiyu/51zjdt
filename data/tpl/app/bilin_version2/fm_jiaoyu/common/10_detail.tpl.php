<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
        <meta content="telephone=no" name="format-detection" /> 
        <style>
            body > a:first-child,body > a:first-child img{ width: 0px !important; height: 0px !important; overflow: hidden; position: absolute}
            body{padding-bottom: 0 !important;}
        </style>
        <meta id="viewport" name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
        <title><?php  echo $title;?></title>
        <link rel="stylesheet" href="../addons/fm_jiaoyu/public/mobile/css/weixin.css">
		<link rel="stylesheet" href="../addons/fm_jiaoyu/public/mobile/css/reset.css">
		<script src="../addons/fm_jiaoyu/public/mobile/js/banner.js"></script>
        <script src="../addons/fm_jiaoyu/public/mobile/js/jquery.js"></script>
		<script type="text/javascript" src="../addons/fm_jiaoyu/public/mobile/js/swipe.js"></script>
</head>
<body>
<!--header>
<div class="main-box">
        <header>
            <span class="header-logo"><img src="<?php  echo tomedia($item['logo']);?>"></span>
            <div class="header-login">
                <span><a href="#">注册</a></span>
                <span>|</span>
                <span><a href="#">登录</a></span>
            </div>
</div>
</header-->
<div id="wrap" class="count_inf">
		<?php  if(!empty($banners)) { ?>
<div id="wrap" class = "count_ban">	
  <style type="text/css">
      .box_swipe {
        overflow: hidden;
        position: relative;
      }
      .box_swipe ul {
        overflow: hidden;
        position: relative;
      }
      .box_swipe ul > li {
        float:left;
        width:100%;
        position: relative;
      }
      .box_swipe ul > li a{
        color:#FFF;
        text-decoration:none;
      }
      .box_swipe ul > li .title{
        position: absolute;
        bottom: 6px;
        display: block;
        width: 70%;
        height:20px;
        padding:0 10px;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        color:#FFF;
        z-index:100;
         line-height: 20px;

      }
      .box_swipe>ol{
        height:20px;
        position: relative;
        z-index:10;
        margin-top:-25px;
        text-align:right;
        padding-right:15px;
        background-color:rgba(0,0,0,0.3);
      }
      .box_swipe>ol>li{
        display:inline-block;
        margin-bottom:1px;
        width:8px;
        height:8px;
        background-color:#757575;
        border-radius: 8px;
      }
      .box_swipe>ol>li.on{
        background-color:#ffffff;
      }
  </style>
  <div id="banner_box" class="box_swipe" style="  max-width: 640px;  margin: 0 auto;  margin-bottom: 0px;">
      <ul id="bheight">
			
          <?php  if(is_array($barr)) { foreach($barr as $mid => $banner) { ?>
            <li>
                <a href="<?php  if(empty($banner['link'])) { ?>#<?php  } else { ?><?php  echo $banner['link'];?><?php  } ?>"><img src="<?php  echo toimage($banner['thumb'])?>" alt="<?php  echo $banner['bannername'];?>"  width='100%' style="max-height:600px;" />
                </a>
                <span class="title" style="color:#fff;"><?php  echo $banner['bannername'];?></span>
            </li>
          <?php  } } ?>
      </ul>
      <ol>
        <?php  if(is_array($barr)) { foreach($barr as $slideNum => $banner) { ?>
			<li<?php  if($slideNum == 0) { ?> class="on"<?php  } ?>></li>
        <?php  } } ?>
      </ol>
  </div>
  </div>
  <?php  } ?>
     <dl id="main">
            <dt class="count_tit"><?php  echo $item['title'];?></dt>
            <dd class="count_inf">
                <div class="teacher">
                    <div style=" background-image:url(<?php  echo tomedia($item['logo']);?>)"></div>
                    
                </div>
                <ul style="display: block;">
                    <li>简介：<?php  echo $item['info'];?></li>
                </ul>               
                <div style="clear:both"></div>
            </dd>					
            <dd class="count_num">
			<?php  if($item['is_hot']==0) { ?>
			    <span>已报<?php  echo pdo_fetchcolumn("select count(*) FROM ".tablename('wx_school_students')." WHERE schoolid = '".$item['id']."'")?>人</span>
                <span value="热报" class="count_hot" style="font-size:12px;"></span>
				<?php  if($isxz['status'] == 2 || $isxz['status'] == 1) { ?>
				<div class="btn_none"><a href="<?php  echo $this->createMobileUrl('myschool', array('schoolid' => $schoolid), true)?>">管理</a></div>
				<?php  } else { ?>
				<div class="btn_none"><a href="<?php  echo $this->createMobileUrl('bangding', array('schoolid' => $schoolid), true)?>">绑定</a></div>
				<?php  } ?>
            <?php  } else { ?>
                <span>已报<?php  echo pdo_fetchcolumn("select count(*) FROM ".tablename('wx_school_students')." WHERE schoolid = '".$item['id']."'")?>人</span>
                <span value="已满" class="count_none" style="font-size:12px;"></span>
				<?php  if($isxz['status'] == 2 || $isxz['status'] == 1) { ?>
				<div class="btn_none"><a href="<?php  echo $this->createMobileUrl('myschool', array('schoolid' => $schoolid), true)?>">管理</a></div>
				<?php  } else { ?>
				<div class="btn_none"><a href="<?php  echo $this->createMobileUrl('bangding', array('schoolid' => $schoolid), true)?>">绑定</a></div>
				<?php  } ?>
            <?php  } ?>    
            </dd>
    </dl>
    <div id="ddb-branch-show" class="main-view ng-scope">
        <?php  if(!empty($item['gonggao'])) { ?>
        <div class="notification-section">
            <div class="notice">
                <i class="fa fa-volume-up red"></i>
                <marquee behavior="alternate" scrollamount="1" scrolldelay="1" class="ng-binding"><?php  echo $item['gonggao'];?></marquee>
            </div>
        </div>
        <?php  } ?>
        <div class="operation-navs ng-scope">
            <div class="operation-nav-item ng-scope">
                <a href="<?php  echo $this->createMobileUrl('teachers', array('schoolid' => $schoolid), true)?>">
                    <div class="icon red ng-scope"><i class="fa fa-group"></i>
                    </div>
                    <div class="text ng-binding">老师</div>
                </a>
            </div>
            <div class="operation-nav-item ng-scope">
                <a href="<?php  echo $this->createMobileUrl('kc', array('schoolid' => $schoolid), true)?>">
                    <div class="icon red ng-scope"><i class="fa fa-list"></i></div>
                    <div class="text ng-binding">课程</div>
                </a>
            </div>
            <div class="operation-nav-item ng-scope">
                <a href="<?php  echo $this->createMobileUrl('chengji', array('schoolid' => $schoolid), true)?>">
                    <div class="icon red ng-scope"><i class="fa fa-graduation-cap"></i></div>
                    <div class="text ng-binding">成绩</div>
                </a>
            </div>
			<?php  if($item['is_rest']==1) { ?>
            <div class="operation-nav-item ng-scope">
                <a href="<?php  echo $this->createMobileUrl('cooklist', array('schoolid' => $schoolid), true)?>">
                    <div class="icon red ng-scope"><i class="fa fa-fire"></i></div>
                    <div class="text ng-binding">食谱</div>
                </a>
            </div>	
            <?php  } ?> 			
        </div>
     </div>	
	<dl id="main" style="margin-bottom:55px;">
        <dl class="count_tips">
            <dt>联系方式</dt>
			    <dd class="red phone">
                    <a href="<?php  echo $this->createMobileUrl('jianjie', array('schoolid' => $schoolid), true)?>"><i class="fa fa-university"></i>&nbsp;&nbsp;学校简介及招生简章</a>
                </dd>
                <dd class="red phone">
                    <a href="tel:<?php  echo $item['tel'];?>"><i class="fa fa-phone"></i>&nbsp;&nbsp;<?php  echo $item['tel'];?></a>
                </dd>
                <dd class="red location-address">
                    <a href="http://api.map.baidu.com/marker?location=<?php  echo $item['lat'];?>,<?php  echo $item['lng'];?>&title=<?php  echo $item['title'];?>&content=<?php  echo $item['address'];?>&output=html&src=wzj|wzj" style="color:#ef4437;"><i class="fa fa-map-marker">&nbsp;&nbsp;&nbsp;<?php  echo $item['address'];?></i></a>
                </dd>
        </dl>
        <!--dl class="counts">
            <dt>开设科目</dt>
            <div>
			 <?php  if(is_array($km)) { foreach($km as $it) { ?>
                  <dd class="click"><span><?php  echo $it['sname'];?></span><br/></dd>
			 <?php  } } ?>	  
                  <div style="clear:both"></div>
            </div>
		</dl-->	
	</dl>
   <?php  include $this->template('footer');?> 
    </div>

	 <!-- <?php  include $this->template('footer');?> -->
</body>
</html>
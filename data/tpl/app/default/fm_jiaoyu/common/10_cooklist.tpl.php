<?php defined('IN_IA') or exit('Access Denied');?><!--正文导航-->
<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
        <meta content="telephone=no" name="format-detection" /> 
        <meta name="google-site-verification" content="DVVM1p1HEm8vE1wVOQ9UjcKP--pNAsg_pleTU5TkFaM">
        <style>
            body > a:first-child,body > a:first-child img{ width: 0px !important; height: 0px !important; overflow: hidden; position: absolute}
            body{padding-bottom: 0 !important;}
        </style>
        <meta id="viewport" name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
        <title>食谱</title>
		<link rel="stylesheet" href="../addons/fm_jiaoyu/public/mobile/css/weixin.css">
        <link rel="stylesheet" href="../addons/fm_jiaoyu/public/mobile/css/reset.css">
        <script src="../addons/fm_jiaoyu/public/mobile/js/jquery.js"></script>
<style>
    body{ position: relative; top: 0; bottom: 0; left: 0; right:0;}
    
</style>
</head>
<body>
    <div id="wrap" class="teacher_list">
        <!--header id="header">

        </header-->

        <div id="content_list">
			<section class="teachers">	
               <a href="#">
                    <div class="photo" style=" background-image:url(<?php  echo tomedia($school['logo']);?>)"></div>
                    <ul>
                       <li><label>学&nbsp;&nbsp;&nbsp;&nbsp;校：</label><?php  echo $school['title'];?></li>
                       <li><label>学校类型：</label><?php  if(!empty($leixing[$school['typeid']])) { ?><?php  echo $leixing[$school['typeid']]['name'];?><?php  } ?></li>
                       <li><label>学校地址：</label><div><?php  echo $school['address'];?></div></li>
                    </ul>
               </a>			
			  <?php  if(is_array($list)) { foreach($list as $item) { ?>
                      <a href="<?php  echo $this->createMobileUrl('cook', array('schoolid' => $schoolid, 'id' => $item['id']), true)?>">
                            <div class="photo" style=" background-image:url(<?php  echo tomedia($monarr['mon_zc_pic']);?>)"></div>
                            <ul>
                                <li><label>名&nbsp;&nbsp;&nbsp;&nbsp;称：</label><?php  echo $item['title'];?></li>
                                <li><label></label></li>
                                <li><label>时&nbsp;&nbsp;&nbsp;&nbsp;间：</label><div><?php  echo date('Y/m/d',$item['begintime'])?>-<?php  echo date('Y/m/d',$item['endtime'])?></div></li>
                            </ul>
                            <span></span>
                      </a>
			 <?php  } } ?>		  
             </section>
       </div>
	</div>    
  <?php  include $this->template('footer');?>  	
</body>
</html>
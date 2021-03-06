<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <title><?php  echo $result['student_name'];?>-学生中心-<?php  echo $_SESSION['school_name'];?></title>
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>	
    <link href="<?php echo MODULE_URL;?>template/mobile/style/user.min.css" rel="stylesheet" type="text/css" />
	<link href="http://cdn.bootcss.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<style>
body{
background-color:#efefef;
}
</style>
</head>
<body>
    <div class="box">
	    <div class="home_bg">
<div class="change">
<div class="changeL">
			 <a href="<?php  echo $this->createMobileUrl('add_student');?>" ><img src="<?php echo MODULE_URL;?>template/mobile/style/bangding.png"/></a>
			 </div>
			 <div class="changeR">
			 <a href="<?php  echo $this->createMobileUrl('change_student');?>" ><img src="<?php echo MODULE_URL;?>template/mobile/style/change.png" /></a>
			 </div>
			</div>
        <div class="id_box user_bg">
            <a href="<?php  echo $this->createMobileUrl('real_xiangxi',array('op'=>'work_record'))?>">
			<div class="icon-level-p1" ><img src="<?php  echo $_W['attachurl'];?><?php  echo $result['student_img'];?>"/> </div>
			<div class="stu_name"><?php  echo $result['student_name'];?><img src="<?php echo MODULE_URL;?>template/mobile/style/info.png" /></div>
           <div class="name_bg">
            <div class="name_edit" id="div_about"><span class="name_sm"></span><span class="dji">学号：<?php  echo $result['xuehao'];?></span>
			</div>  
			 <div class="name_edit" id="div_about"><span class="name_sm"></span><span class="dji">班级：<?php  echo $result['class_name'];?></span></div>  
			  <div class="name_edit" id="div_about" style="border:none;"><span class="name_sm"></span><span class="dji">班主任：<?php  echo $result['teacher_realname'];?></span></div>  
			</div>
            </a>
</div>	
</div>
        <div class="id_jf">
              <?php  if(is_array($out)) { foreach($out as $row) { ?>
              <a href="<?php  echo $this->createMobileUrl('Record',array('op'=>$row['id']))?>" class="count-a"> <li><?php  echo $row['name'];?><span><?php  echo $row['count'];?></span></li></a>              
              <?php  } } ?>
			 <a href="<?php  echo $this->createMobileUrl('neimsg')?>" ><li>学校公告<span><?php  echo $msg_count;?></span></li></a>
			 <!-- <a href="<?php  echo $this->createMobileUrl('give_money')?>" class="count-a"><li>缴费管理<span><?php  echo $need_money;?></span></li></a>-->
        </div>
		
        <div class="userlist">
           <a href="<?php  echo $this->createMobileUrl('Record',array('op'=>1))?>"> <li class="user_bg"><i   class="ca ca-bars" style="color:#A5DE37;"></i><div class="ca_name">学生记录</div></li></a>
            <a href="<?php  echo $this->createMobileUrl('syllabus')?>"> <li class="user_bg" id="mycomments"><i   class="ca ca-language" style="color:#0880D7"></i><div class="ca_name">&nbsp;课程表</div></li></a>
            <a href="<?php  echo $this->createMobileUrl('score')?>"><li class="user_bg" style="border:none;"><i   class="ca ca-line-chart" style="color:#ff1022"></i><div class="ca_name">考试成绩</div></li></a>
		</div>
	 <div class="userlist">
            <a href="<?php  echo $this->createMobileUrl('Personer_list')?>"><li class="user_bg" ><i   class="ca ca-users" style="color:#A5DE37;"></i><div class="ca_name">班级老师</div></li></a>
           
            <a href="<?php  echo $this->createMobileUrl('applist')?>"><li class="user_bg" id="mycomments"><i   class="ca ca-file" style="color:#e59501"></i><div class="ca_name">预约项目</div></li></a>
			
              <a href="<?php  echo $this->createMobileUrl('applist_result')?>"><li class="user_bg" style="border:none;"> <i   class="ca ca-inbox" style="color:#0880D7;"></i><div class="ca_name">预约结果</div></li></a>      
		</div>
		 <div class="userlist">
			 <a href="<?php  echo $this->createMobileUrl('leave')?>"><li class="user_bg" style="border-bottom:none;" ><i   class="ca ca-holiday" style="color:#0880D7"></i><div class="ca_name">请假申请</div></li></a>
			 <a href="<?php  echo $this->createMobileUrl('give_money')?>"><li class="user_bg" style="border-bottom:none; "> <i   class="ca ca-rmb" style="color:#A5DE37;"></i><div class="ca_name">缴费管理</div></li></a>
			  <a href="<?php  echo $this->createMobileUrl('video')?>"><li class="user_bg" style="border:none;"> <i   class="ca ca-video-camera" style="color:#5246e2;"></i><div class="ca_name">教室监控</div></li></a>
		</div>
		 <div class="userlist">
			 <a href="<?php  echo $this->createMobileUrl('line_other',array('op'=>'home_work'))?>"><li class="user_bg" style="border-bottom:none;" ><i   class="fa fa-folder" style="color:#e59501"></i><div class="ca_name">家庭作业</div></li></a>
			 <a href="<?php  echo $this->createMobileUrl('cookbook')?>"><li class="user_bg" style="border-bottom:none; "> <i   class="fa fa-coffee" style="color:#ff1022;"></i><div class="ca_name">校园食谱</div></li></a>
		</div>
</div>
<script>
    var width=$(window).width();
    $(function(){
        w=(width-104*3+10)/2;
        $('.row_left').css('padding-left',w);
    });
</script>
<div style="height:80px"></div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jsweixin', TEMPLATE_INCLUDEPATH)) : (include template('jsweixin', TEMPLATE_INCLUDEPATH));?>

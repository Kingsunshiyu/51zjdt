<?php defined('IN_IA') or exit('Access Denied');?><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php  echo $_W['mobile']['share']['mobile_title'];?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <meta name="msapplication-TileColor" content="#0e90d2">
    <link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.3.0/css/amazeui.min.css">
    <link rel="stylesheet" href="../addons/q_3354988381_rencai/amaze/css/app.css">
    <script src="../addons/q_3354988381_rencai/amaze/assets/js/jquery.min.js"></script>

    <!-- 手机端日期控件 -->
    <script src="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.core-2.5.2.js"></script>
    <script src="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.core-2.5.2-zh.js" type="text/javascript"></script>
    <link href="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.core-2.5.2.css" rel="stylesheet" type="text/css" />
    <link href="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.animation-2.5.2.css" rel="stylesheet" type="text/css" />
    <script src="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.datetime-2.5.1.js" type="text/javascript"></script>
    <script src="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.datetime-2.5.1-zh.js" type="text/javascript"></script>
    <script src="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.android-ics-2.5.2.js" type="text/javascript"></script>
    <link href="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.android-ics-2.5.2.css" type="text/css" />
<style>
.dw {
    color: #31b6e7;
	font-size: 20px;
}
.dwv {
    padding: 10px 0;
    border-bottom: 1px solid #31b6e7;
}
</style>
</head>
<body>
<?php  if(false) { ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php  echo $_W['mobile']['share']['mobile_title'];?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <meta name="msapplication-TileColor" content="#0e90d2">
    <link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.3.0/css/amazeui.min.css">
    <link rel="stylesheet" href="../addons/q_3354988381_rencai/amaze/css/app.css">
    <script src="../addons/q_3354988381_rencai/amaze/assets/js/jquery.min.js"></script>

    <!-- 手机端日期控件 -->
    <script src="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.core-2.5.2.js"></script>
    <script src="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.core-2.5.2-zh.js" type="text/javascript"></script>
    <link href="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.core-2.5.2.css" rel="stylesheet" type="text/css" />
    <link href="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.animation-2.5.2.css" rel="stylesheet" type="text/css" />
    <script src="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.datetime-2.5.1.js" type="text/javascript"></script>
    <script src="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.datetime-2.5.1-zh.js" type="text/javascript"></script>
    <script src="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.android-ics-2.5.2.js" type="text/javascript"></script>
    <link href="../addons/q_3354988381_rencai/template/static/mobiscroll/mobiscroll.android-ics-2.5.2.css" type="text/css" />
    
	
</head>
<body>
<header data-am-widget="header" class="am-header am-header-default" style="background-color: #0e90d2;margin-bottom: 2px">
    <div class="am-header-left am-header-nav">
        <a href="javascript:history.back();" style="padding-top: 17px">
            <i class="am-icon-chevron-left"></i>
        </a>
    </div>
    <h1 class="am-header-title">
        <a href="#title-link" class=""><?php  echo $title;?></a>
    </h1>
    <div class="am-header-right am-header-nav">
        <!--<a href="#right-link" class="">-->
        <!--<i class="am-header-icon am-icon-bars"></i>-->
        <!--</a>-->
    </div>
</header>
<?php  } ?> 
<script type="text/javascript">
        $(function () {
            var currYear = (new Date()).getFullYear();
            var opt={};
            opt.date = {preset : 'date'};
            //opt.datetime = { preset : 'datetime', minDate: new Date(2012,3,10,9,22), maxDate: new Date(2014,7,30,15,44), stepMinute: 5  };
            opt.datetime = {preset : 'datetime'};
            opt.time = {preset : 'time'};
            opt.default = {
                theme: 'android-ics light', //皮肤样式
                display: 'modal', //显示方式
                mode: 'scroller', //日期选择模式
                lang:'zh',
                startYear:currYear - 10, //开始年份
                endYear:currYear + 10 //结束年份
            };
            $("#start_time").val("<?php  echo $resume_info['start_time'];?>").scroller('destroy').scroller($.extend(opt['date'], opt['default']));
            $("#end_time").val("<?php  echo $resume_info['end_time'];?>").scroller('destroy').scroller($.extend(opt['date'], opt['default']));
        });
    </script>   


    <div class="am-g" style="background-color:#FFF;">

        <div class="am-u-sm-12" >
            <div class="am-u-sm-6" style="padding-right:0">
                <a class="am-btn am-btn-block am-btn-default" href="<?php  echo $this->createMobileUrl('PublicResumeBasic', array('person_id' => $person_id));?>">基本信息</a>
            </div>
            <div class="am-u-sm-6" style="padding-left:0">
                <a class="am-btn am-btn-block am-btn-success" href="<?php  echo $this->createMobileUrl('PublicResumeWorkExperience', array('person_id' => $person_id));?>">工作经验</a>
            </div>
        </div>

        <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>

        <!-- 工作经验 -->
        <div class="am-u-sm-12"  style="background-color: #FFF">
                <!-- 列表 -->
                <?php  if($resumes) { ?>
                <table class="am-table">
                    <thead>
                        <tr>
                            <th>公司名称</th>
                            <th>时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                     <tbody>
                         <?php  if(is_array($resumes)) { foreach($resumes as $resume) { ?>
                        <tr>
                            <td><a href="<?php  echo 'javascript:;';//$this->createMobileUrl('MyPublicJob');?>"><?php  echo $resume['company_name'];?></a></td>
                            <td><?php  echo $resume['start_time'];?> <br> <?php  echo $resume['end_time'];?></td>
							<td colspan="1">
                                <a href="<?php  echo $this->createMobileUrl('PublicResumeWorkExperience', array('person_id' => $resume['person_id'], 'resume_id' => $resume['id']));?>"  class="am-btn am-btn-primary am-btn-xs am-round" style="color:#FFF">编辑</a>
                                <a href="<?php  echo $this->createMobileUrl('PublicResumeWorkExperience', array('op' => 'delete', 'resume_id' => $resume['id']));?>"  class="am-btn am-btn-danger am-btn-xs am-round" style="color:#FFF">删除</a>
                            </td> 
                        </tr>
                        <?php  } } ?>
                     </tbody>
                </table>
                <?php  } ?>

                <!-- 添加、更新 -->
                <form action="" class="am-form am-form-horizontal" method="POST" data-am-validator style="padding-bottom:80px">  
                  <input type="hidden" value="<?php  echo $_W['token'];?>" name="token">
                  <input type="hidden" value="<?php  echo $person_id;?>" name="person_id">
                  <input type="hidden" value="<?php  echo $resume_id;?>" name="resume_id">
                  <div class="am-form-group">
                    <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">公司名称</label>
                    <div class="am-u-sm-9">
                      <input type="text" name="data_resume[company_name]" value="<?php  echo $resume_info['company_name'];?>" class="am-input-sm" placeholder="公司名称" minlength="2" required>
                    </div>
                  </div>
                  
                  <div class="am-form-group">
                    <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">开始时间</label>
                    <div class="am-u-sm-9">
                        <input type="text" name="data_resume[start_time]" id="start_time" value="<?php  echo $resume_info['start_time'];?>"/>
                    </div>
                  </div>
                  
                  <div class="am-form-group">
                    <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">结束时间</label>
                    <div class="am-u-sm-9">
                        <input type="text" name="data_resume[end_time]" id="end_time" value="<?php  echo $resume_info['end_time'];?>" />
                    </div>
                  </div>
                
                  <div class="am-form-group">
                    <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">税前工资</label>
                    <div class="am-u-sm-9">
                      <input type="number" name="data_resume[wage]" value="<?php  echo $resume_info['wage'];?>" class="am-input-sm" placeholder="税前工资" minlength="2" required>
                    </div>
                  </div>
                  
                  <div class="am-form-group">
                    <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">工作描述</label>
                    <div class="am-u-sm-9">
                      <textarea name="data_resume[work_description]" minlength="10" maxlength="500" class="" rows="10" required><?php  echo $resume_info['work_description'];?></textarea>
                      <em class="am-text-xs">10~500个汉字</em>
                    </div>
                  </div>
                  
                  <div class="am-form-group">
                    <input type="submit" name="save_resume_workexperience" value="保存" class="am-btn am-btn-block am-btn-success">
                  </div>
                </form>
           </div>

    </div>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_footer', TEMPLATE_INCLUDEPATH)) : (include template('common_footer', TEMPLATE_INCLUDEPATH));?>
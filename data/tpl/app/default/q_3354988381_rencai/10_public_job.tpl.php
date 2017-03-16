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
  <link rel="stylesheet" href="../addons/q_3354988381_rencai/amaze/assets/css/amazeui.min.css">
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
        $("#end_time").val("<?php  echo date('Y-m-d');?>").scroller('destroy').scroller($.extend(opt['date'], opt['default']));
	});
  </script>
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

    <div class="am-g" style="background-color:#FFF">
      <div class="am-u-sm-12" style="margin-top:5px;margin-bottom: 50px">

          <form action="" class="am-form am-form-horizontal" method="POST" data-am-validator>
            <input type="hidden" value="<?php  echo $_W['token'];?>" name="token">

            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">职位名称</label>
              <div class="am-u-sm-9">
                <input type="text" name="data[title]" class="am-input-sm" placeholder="输入职位名称" minlength="2" required>
                <em class="am-text-xs">至少两个汉字</em>
              </div>
            </div>

            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">招聘人数</label>
              <div class="am-u-sm-9">
                <input type="number" name="data[nums]" class="am-input-sm" placeholder="输入招聘人数"  min=1 required>
                <em class="am-text-xs">只能是数字</em>
              </div>
            </div>

            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">薪资水平</label>
              <div class="am-u-sm-9">
                  <select class="am-input-sm" name="data[payroll]">
                    <?php  if(is_array($config['payroll'])) { foreach($config['payroll'] as $key => $payroll) { ?>
                    <option value="<?php  echo $key;?>"><?php  echo $payroll;?></option>
                    <?php  } } ?>
                  </select>
              </div>
            </div>

            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">截止日期</label>
              <div class="am-u-sm-9">
                  <input type="text" name="data[end_time]" id="end_time" value="" />
              </div>
            </div>
            
            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">福利保障</label>
              <div class="am-u-sm-9">
				<?php  if(is_array($config['welfare'])) { foreach($config['welfare'] as $key => $welfare) { ?>
			      <label class="am-checkbox">
			        <input type="checkbox" name="welfare" value="<?php  echo $key;?>" class="am-text-xs am-input-lg"}> <?php  echo $welfare;?>
			      </label>
		        <?php  } } ?>
              </div>
              <input type="hidden" id="data_welfare" name="data[welfare]" value="">
            </div>
    
            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">工作地点</label>
              <div class="am-u-sm-9">
                <input type="text" name="data[workaddress]" class="am-input-sm" placeholder="输入工作地点" minlength="2" required>
                <em class="am-text-xs">至少两个汉字</em>
              </div>
            </div>
            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">职位类别</label>
              <div class="am-u-sm-9">
                <select class="am-input-sm" name="data[cid]" minchecked=1>
                  <?php  if(is_array($parent_cate)) { foreach($parent_cate as $key => $parent) { ?>
                    <option value="<?php  echo $parent['id'];?>" <?php  if(!empty($parent['sub'])) { ?> disabled="disabled" <?php  } ?>><?php  echo $parent['name'];?></option>
                    <?php  if(is_array($parent['sub'])) { foreach($parent['sub'] as $sub) { ?>
                      <option value="<?php  echo $sub['id'];?>">&nbsp;&nbsp;|—<?php  echo $sub['name'];?></option>
                    <?php  } } ?>
                  <?php  } } ?>
                </select>
              </div>
            </div>  

            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">学历要求</label>
              <div class="am-u-sm-9">
                  <select name="data[educational]" class="am-input-sm">
                    <?php  if(is_array($config['educational'])) { foreach($config['educational'] as $key => $educational) { ?>
                    <option value="<?php  echo $key;?>"><?php  echo $educational;?></option>
                    <?php  } } ?>
                  </select>
              </div>
            </div> 

            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">工作年限</label>
              <div class="am-u-sm-9">
                  <select name="data[workexperience]" class="am-input-sm">
                    <?php  if(is_array($config['workexperience'])) { foreach($config['workexperience'] as $key => $workexperience) { ?>
                    <option value="<?php  echo $key;?>"><?php  echo $workexperience;?></option>
                    <?php  } } ?>
                  </select>
              </div>
            </div> 

            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">职位性质</label>
              <div class="am-u-sm-9">
                  <select name="data[positiontype]" id="doc-select-1" class="am-input-sm">
                    <?php  if(is_array($config['positiontype'])) { foreach($config['positiontype'] as $key => $positiontype) { ?>
                    <option value="<?php  echo $key;?>"><?php  echo $positiontype;?></option>
                    <?php  } } ?>
                  </select>
              </div>
            </div> 

            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">职位简介</label>
              <div class="am-u-sm-9">
                <textarea name="data[description]" minlength="2" maxlength="500" class="" rows="5" required></textarea>
                <em class="am-text-xs">至少2个汉字，最多500个。</em>
              </div>
            </div> 

            <hr>
			<?php  if($company == false) { ?>
			
            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">公司名称</label>
              <div class="am-u-sm-9">
                <input type="text" name="data2[name]" minlength="4" class="am-input-sm" placeholder="输入公司名称" required>
                <em class="am-text-xs">至少四个汉字</em>
              </div>
            </div> 
            
            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">所属行业</label>
              <div class="am-u-sm-9">
                  <select name="data2[industry]" class="am-input-sm">
                    <?php  if(is_array($parent_industry)) { foreach($parent_industry as $key => $industry) { ?>
                    	<option value="<?php  echo $industry['id'];?>" <?php  if(!empty($industry['sub'])) { ?> disabled="disabled" <?php  } ?>><?php  echo $industry['name'];?></option>
                    	<?php  if(is_array($industry['sub'])) { foreach($industry['sub'] as $k => $subs) { ?>
                    		<option value="<?php  echo $subs['id'];?>">&nbsp;|— <?php  echo $subs['name'];?></option>
                    	<?php  } } ?>
                    <?php  } } ?>
                  </select>
              </div>
            </div> 
            
            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">联系人</label>
              <div class="am-u-sm-9">
                <input type="text" name="data2[contact]" minlength="1" class="am-input-sm" placeholder="输入联系人" required>
                <em class="am-text-xs">至少一个汉字</em>
              </div>
            </div> 

            <div class="am-form-group">
              <label class="am-u-sm-3 am-text-sm am-form-label" style="padding-right:0">联系电话</label>
              <div class="am-u-sm-9">
                <input type="number" name="data2[mobile]" class="am-input-sm" placeholder="输入联系电话" required>
                <em class="am-text-xs">必须是手机、固话</em>
              </div>
            </div>

            <?php  } ?>
            <div class="am-form-group">
              <input type="submit" name="savejobsubmit" value="发布" class="am-btn am-btn-block am-btn-success">
            </div>

          </form>
      </div>
    </div>

    <!-- 获取福利保障 -->
    <script>
        $("input[name='welfare']").change(function(data){
            var obj=document.getElementsByName('welfare');
            var s='';
            for(var i=0; i<obj.length; i++){
                if(obj[i].checked) s+=obj[i].value+',';  //如果选中，将value添加到变量s中
            }
            $("#data_welfare").val(s);
        });
    </script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_footer', TEMPLATE_INCLUDEPATH)) : (include template('common_footer', TEMPLATE_INCLUDEPATH));?>
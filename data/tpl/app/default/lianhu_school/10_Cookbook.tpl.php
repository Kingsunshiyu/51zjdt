<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <title>校园食堂-<?php  echo $class_name;?>-<?php  echo $_SESSION['school_name'];?></title>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo MODULE_URL;?>style/css/style.css">
    <link rel="stylesheet" href="<?php echo MODULE_URL;?>style/css/buttons.css">
    <link href="http://cdn.bootcss.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body >
    <div class="top-wrap">
    <div class="fn-clear tr-box top">
       <div class='text_center'>校园食堂</div>
  </div>
</div>
	<div class="main" style="margin-bottom:60px">
					<?php  if(is_array($display_list)) { foreach($display_list as $key => $row) { ?>
					 	 <?php  if($key+1 <= $on_school ) { ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									星期 <?php  echo $begin_course+$key;?> 
								</div>
								<div class="panel-body">
									<div class="tab-content">
										<div class="form-group">
												<label class="col-xs-12 col-sm-3 col-md-2 control-label">早餐：</label>
												<div class="col-sm-9 col-xs-12">
													<input type='text'   name='breakfast[<?php  echo $key;?>]'  class='form-control' value='<?php  echo $list[$key]['cookbooK_breakfast'];?>' readonly> 					
												</div>
										</div> 
										<div class="form-group">
												<label class="col-xs-12 col-sm-3 col-md-2 control-label">午餐：</label>
												<div class="col-sm-9 col-xs-12">
													<input type='text'   name='lunch[<?php  echo $key;?>]'  class='form-control' value="<?php  echo $list[$key]['cookbook_lunch'];?>" readonly> 					
												</div>
										</div> 
										<div class="form-group">
												<label class="col-xs-12 col-sm-3 col-md-2 control-label">下午餐：</label>
												<div class="col-sm-9 col-xs-12">
													<input type='text'   name='dinner[<?php  echo $key;?>]'  class='form-control' value='<?php  echo $list[$key]['cookbook_dinner'];?>' readonly> 					
												</div>
										</div> 																			
									</div>
								</div>			
							</div>
						 <?php  } ?>
					<?php  } } ?>
	</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jsweixin', TEMPLATE_INCLUDEPATH)) : (include template('jsweixin', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>

<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<div class="main">
	<form action="" method="post" class="form-horizontal form" id="setting-form">
		<div class="panel panel-default">
			<div class="panel-heading">七牛存储设置</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label"><span style="color:red;">*</span>七牛AccessKey</label>
					<div class="col-sm-8">
						<input type="text" name="qn_accesskey" class="form-control" value="<?php  echo $settings['qn_accesskey'];?>" />
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label"><span style="color:red;">*</span>七牛SecretKey</label>
					<div class="col-sm-8">
						<input type="text" name="qn_secretkey" class="form-control" value="<?php  echo $settings['qn_secretkey'];?>" />
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label"><span style="color:red;">*</span>七牛Bucket</label>
					<div class="col-sm-8">
						<input type="text" name="qn_bucket" class="form-control" value="<?php  echo $settings['qn_bucket'];?>" />
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label"><span style="color:red;">*</span>七牛队列名</label>
					<div class="col-sm-8">
						<input type="text" name="qn_queuename" class="form-control" value="<?php  echo $settings['qn_queuename'];?>" />
					<div class="help-block">媒体转码队列名,声音文件需要转码后才能在安卓和苹果上使用</div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label"><span style="color:red;">*</span>七牛访问域名</label>
					<div class="col-sm-8">
						<input type="text" name="qn_domain" class="form-control" value="<?php  echo $settings['qn_domain'];?>" />
					<div class="help-block">七牛上可以绑定自己的域名来访问资源,此处填写绑定到七牛的域名</div>
					</div>
				</div>
				
			</div>
		</div>
		
		
		<div class="panel panel-default">
			<div class="panel-heading">直播设置</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">课程开始模板消息</label>
					<div class="col-sm-8">
						<input type="text" name="lesson_templete" class="form-control" value="<?php  echo $settings['lesson_templete'];?>" />
					<div class="help-block">课程即将开始时提醒,模板为 互联网|电子商务>>预约课程开始提醒</div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">新开课模板消息</label>
					<div class="col-sm-8">
						<input type="text" name="new_lesson" class="form-control" value="<?php  echo $settings['new_lesson'];?>" />
					<div class="help-block">开课提醒,模板为 互联网|电子商务>>开课提醒</div>
					</div>
				</div>
				
				  <div class="form-group">
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">提现限额设置</label>
            <div class="col-sm-9 col-xs-6">
				<div class="input-group">
					<span class="input-group-addon">满</span>
					<input type="text" class="form-control" name="cash_money" value="<?php  echo $settings['cash_money'];?>">
					<span class="input-group-addon">元可提现</span>
				</div>
				<div class="help-block">设置提现的最低金额，当收入大于等于此金额后方可申请提现</div>
            </div>
          </div>
          
        <div class="form-group" style="display:none;">
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">创建直播间</label>
            <div class="col-sm-9 col-xs-6">
				<div class="input-group">
					<label class="radio-inline">
                	<input type="radio" name="create_room" value="1" <?php  if($settings['create_room']==1 ) { ?>checked="checked"<?php  } ?>>只允许管理员创建
	                </label>
	                <label class="radio-inline">
	                	<input type="radio" name="create_room" value="2" <?php  if($settings['create_room']==2 ) { ?>checked="checked"<?php  } ?>>任何人可创建
	                </label>    
				</div>
            </div>
         </div>
          
		</div>
		
	</div>
		
		<div class="form-group col-sm-12">
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</form>
</div>

<script>
require(['jquery', 'util'], function($, util){
	$(function(){
		$('#setting-form').submit(function(){
			var result = true;
			if($('input[name="qn_accesskey"]').val() == ''){
				result = false;
				util.message('未填写accesskey.');
			}
			if($('input[name="qn_secretkey"]').val() == ''){
				result = false;
				util.message('未填写secretkey.');
			}
			if($('input[name="qn_bucket"]').val() == ''){
				result = false;
				util.message('未填写bucket.');
			}
			if($('input[name="qn_queuename"]').val() == ''){
				result = false;
				util.message('未填写队列名.');
			}
			return result;
		});
	});
});
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
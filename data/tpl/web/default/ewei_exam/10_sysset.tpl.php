<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style type='text/css'>
	.tab-pane { padding:20px 0 20px 0;}
</style>
<div class="main">
	<form action="" method="post" class="form-horizontal form">
      	<input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
        <div class="panel panel-default">
        	<div class="panel-heading">
                基本设置
            </div>
            <div class="panel-body">
          	<div class="form-group">
               	<label class="col-xs-12 col-sm-3 col-md-2 control-label">系统帮助</label>
                <div class="col-sm-9 col-xs-12">
                	<textarea style="height:200px;" class="span6 richtext-clone" name="about" id="about"cols="70"><?php  echo $item['about'];?></textarea>
                </div>
            </div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">课程开关</label>
				<div class="col-sm-9 col-xs-12">
					<label class="radio-inline">
						<input type="radio" name="classopen" value="1" <?php  if($item['classopen'] == 1) { ?>checked<?php  } ?>/>显示
					</label>
					<label class="radio-inline">
						<input type="radio" name="classopen" value="0" <?php  if($item['classopen'] == 0) { ?>checked<?php  } ?>/>隐藏
					</label>
					<span class='help-block'>手机前台是否显示</span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">登录开关</label>
				<div class="col-sm-9 col-xs-12">
					<label class="radio-inline">
						<input type="radio" name="login_flag" value="1" <?php  if($item['login_flag'] == 1) { ?>checked<?php  } ?>/>开启
					</label>
					<label class="radio-inline">
						<input type="radio" name="login_flag" value="0" <?php  if($item['login_flag'] == 0) { ?>checked<?php  } ?>/>关闭
					</label>
					<span class='help-block'>如果开启，需要提前在系统中录入用户基本信息，用户第一次访问，录入的信息在系统中存在才能使用</span>
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

<script type="text/javascript">
require(['util'],function(util){
    util.editor($('.richtext-clone')[0]) ;
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
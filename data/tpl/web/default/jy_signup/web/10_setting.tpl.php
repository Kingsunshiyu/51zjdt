<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/nav', TEMPLATE_INCLUDEPATH)) : (include template('web/nav', TEMPLATE_INCLUDEPATH));?>

<div class="main">
	<form action="" method="post" class="form-horizontal form"
		enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php  echo $item['id'];?>" />


		<div class="panel panel-default">
			<div class="panel-heading">
				基本设置
			</div>
			<div class="panel-body">

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">系统名称</label>
					<div class="col-sm-7 col-xs-12">
						<input type="text" name="aname" class="form-control" value="<?php  echo $item['aname'];?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">系统标题</label>
					<div class="col-sm-7 col-xs-12">
						<input type="text" name="title" class="form-control"
							   value="<?php  echo $item['title'];?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">分享标题</label>
					<div class="col-sm-7 col-xs-12">
						<input type="text" name="sharetitle" class="form-control"
							   value="<?php  echo $item['sharetitle'];?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">分享描述</label>
					<div class="col-sm-7 col-xs-12">
						<input type="text" name="sharedesc" class="form-control"
							   value="<?php  echo $item['sharedesc'];?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">分享logo</label>
					<div class="col-sm-7 col-xs-12">
						<?php  echo tpl_form_field_image('sharelogo', $item['sharelogo']);?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">默认头像</label>
					<div class="col-sm-7 col-xs-12">
						<?php  echo tpl_form_field_image('thumb', $item['thumb']);?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">系统主色调</label>
					<div class="col-sm-7 col-xs-12">
						<?php  echo tpl_form_field_color('color',$item['color']);?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">版权文字</label>
					<div class="col-sm-7 col-xs-12">
						<input type="text" name="copyright" class="form-control" value="<?php  echo $item['copyright'];?>" />
						<span>不填则无版权显示</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">版权跳转url</label>
					<div class="col-sm-7 col-xs-12">
						<input type="text" name="copyrighturl" class="form-control" value="<?php  echo $item['copyrighturl'];?>" />
						<span>不填则不跳转</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<input name="submit" type="submit" value="提交" class="btn btn-primary span3"> 
						<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
					</div>
				</div>

			</div>
		</div>

	</form>
</div>
<script>
require(['jquery', 'util'], function($, u){
	$(function(){
		u.editor($('#rule')[0]);
	});
});
</script>
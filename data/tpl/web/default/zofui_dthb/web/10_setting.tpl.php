<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" id="setting-form">
		<div class="panel panel-default">
			<div class="panel-heading">参数设置</div>
			<div class="panel-body">
				<ul class="nav nav-tabs" id="myTab">
					<li class="active" ><a href="#tab_basic">基本设置</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane  active" id="tab_basic">
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">每天最多答题次数</label>
							<div class="col-xs-12 col-sm-8">
								<input type="text" name="answernum" class="form-control" value="<?php  echo $settings['answernum'];?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">红包金额</label>
							<div class="col-xs-12 col-sm-8">
								<input type="text" name="fee" class="form-control" value="<?php  echo $settings['fee'];?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">问题个数</label>
							<div class="col-xs-12 col-sm-8">
								<input type="text" name="questionnum" class="form-control" value="<?php  echo $settings['questionnum'];?>" />
							</div>
						</div>						
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">答题提示内容</label>
							<div class="col-xs-12 col-sm-8">
								<textarea name="explain" class="form-control richtext" cols="70"><?php  echo $settings['explain'];?></textarea>
							</div>
						</div>						
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">微信支付商户号(MchId)</label>
							<div class="col-xs-12 col-sm-8">
								<input type="text" name="mchid" class="form-control" value="<?php  echo $settings['mchid'];?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">商户支付密钥(API密钥)</label>
							<div class="col-xs-12 col-sm-8">
								<input type="text" name="apikey" class="form-control" value="<?php  echo $settings['apikey'];?>" />
							</div>
						</div>
						<div class="form-group">
		                    <label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">cert证书</label>
		                    <div class="col-sm-8 col-xs-12">
		                        <textarea class="form-control" name="cert" rows="8" placeholder="为保证安全性, 不显示证书内容. 若要修改, 请直接输入"></textarea>
		                        <span class="help-block">从商户平台上下载支付证书, 解压并取得其中的 <mark>apiclient_cert.pem</mark> 用记事本打开并复制文件内容, 填至此处</span>
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">key证书</label>
		                    <div class="col-sm-8 col-xs-12">
		                        <textarea class="form-control" name="key" rows="8" placeholder="为保证安全性, 不显示证书内容. 若要修改, 请直接输入"></textarea>
		                        <span class="help-block">从商户平台上下载支付证书, 解压并取得其中的 <mark>apiclient_key.pem</mark> 用记事本打开并复制文件内容, 填至此处</span>
		                    </div>
		                </div>
		                <div class="form-group">
		                    <label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">rootca证书</label>
		                    <div class="col-sm-8 col-xs-12">
		                        <textarea class="form-control" name="rootca" rows="8" placeholder="为保证安全性, 不显示证书内容. 若要修改, 请直接输入"></textarea>
		                        <span class="help-block">从商户平台上下载支付证书, 解压并取得其中的 <mark>rootca.pem</mark> 用记事本打开并复制文件内容, 填至此处</span>
		                    </div>
		                </div>	
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label"></label>
							<div class="col-xs-12 col-sm-8"><div class="alert alert-danger">模块作者：深圳众惠科技有限公司，专业承接微信功能开发，联系QQ273734268</div>
							</div>
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
require(['jquery', 'util'], function($, u){
	$(function(){
		u.editor($('.richtext')[0]);
	});
});
$(function () {
		window.optionchanged = false;
		$('#myTab a').click(function (e) {
			e.preventDefault();//阻止a链接的跳转行为
			$(this).tab('show');//显示当前选中的链接及关联的content
		})
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
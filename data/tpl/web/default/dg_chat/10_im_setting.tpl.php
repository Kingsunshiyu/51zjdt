<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<div class="main" style="padding-top:5px;">
 <form id="payform" action="" method="post" enctype="multipart/form-data" method="post" class="form-horizontal form" 
 onsubmit="return validate();">
		<div class="panel panel-default">
			<div class="panel-heading">
				设置实时通讯相关信息(<a href="https://www.qcloud.com/product/im.html" target="_blank">云通信IM开通设置</a>)
			</div>
			<div class="panel-body">
				<div>
                <div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label"><span style="color:red;">*</span>SdkAppId</label>
					<div class="col-sm-8">
						<input type="text" name="sdkappid" class="form-control" value="<?php  echo $record['sdkappid'];?>" />
					</div>
				</div>
				
		<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label"><span style="color:red;">*</span>accountType</label>
					<div class="col-sm-8">
						<input type="text" name="account_type" class="form-control" value="<?php  echo $record['account_type'];?>" />
					</div>
				</div>
				
						<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label"><span style="color:red;">*</span>账号管理员</label>
					<div class="col-sm-8">
						<input type="text" name="admin_account" class="form-control" value="<?php  echo $record['admin_account'];?>" />
					</div>
				</div>
				
					<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red;"> * </span>私钥上传</label>
					<div class="col-sm-9 col-xs-12 form-control-static">
						<?php  if($wechat['privateexists']) { ?>
						私钥已上传&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="wechat[privatepath]" id="amendsec" class="hidden">
						<input type="button" value="修改" onclick="amendsec.click()" class="btn btn-success btn-sm" style="padding: .2em .6em;">
						<?php  } else { ?>
						<input type="file" name="wechat[privatepath]" value="">
						<?php  } ?>
						<span class="help-block">下载公私钥压缩包中的 private_key</span>
					</div>
				</div>	
				
				
		<div class="form-group">
 			<label class="col-xs-12 col-sm-3 col-md-2 control-label">获取签名方式</label>
            <div class="col-sm-9 col-xs-6">
				<div class="input-group">
					<label class="radio-inline">
                	   <input type="radio" name="check_type" value="local" <?php  if($record['check_type']=='local' ) { ?>checked="checked"<?php  } ?>>本地签名
	                </label>
	                <!--<label class="radio-inline">
	                	<input type="radio" name="check_type" value="remote" <?php  if($record['check_type']=='remote' ) { ?>checked="checked"<?php  } ?>>远程签名
	                </label>-->
				</div>
            </div>
       </div>	
			</div>
			<div class="form-group col-sm-12">
			<input name="do-submit" type="submit" value="提交" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
		</div>
		</div>	
	</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
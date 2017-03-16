<?php defined('IN_IA') or exit('Access Denied');?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
<div class="alert alert-success alert-dismissable">
【温馨提示】：新版本程序，卡券支付默认自动开启，所以无需另外设置开启，会员已经领取了卡券的，会显示卡券消费！
</div>
	<form id="payform" action="<?php  echo url('profile/payment')?>" enctype="multipart/form-data" method="post" class="form-horizontal form" onsubmit="return validate();" ng-controller="paySetting">
		<div class="panel panel-default">
			<div class="panel-heading">
				设置货到支付开关
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">货到支付</label>
					<div class="col-sm-8 col-xs-12">
						<label class="radio-inline">
							<input type="radio" name="delivery[switch]" ng-model="delivery.switch" value="true"/>
							开启
						</label>
						<label class="radio-inline">
							<input type="radio" name="delivery[switch]" ng-model="delivery.switch" value="false"/>
							关闭
						</label>
						<span class="help-block">是否支持货到付款</span>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				设置余额支付开关
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">余额支付</label>
					<div class="col-sm-8 col-xs-12">
						<label class="radio-inline">
							<input type="radio" name="credit[switch]" ng-model="credit.switch" value="true"/>
							开启
						</label>
						<label class="radio-inline">
							<input type="radio" name="credit[switch]" ng-model="credit.switch" value="false"/>
							关闭
						</label>
						<span class="help-block">是否使用粉丝中心的余额直接支付</span>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				设置支付宝支付开关
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">支付宝无线支付</label>
					<div class="col-sm-9 col-xs-12">
						<div class="alert alert-warning">
							您的支付宝账号必须支持手机网页即时到账接口, 才能使用手机支付功能, <a href="https://b.alipay.com/order/productDetail.htm?productId=2013080604609688" target="_blank">申请及详情请查看这里</a>.
						</div>
						<label class="radio-inline">
							<input type="radio" name="alipay[switch]" ng-model="alipay.switch" value="true"/>
							开启
						</label>
						<label class="radio-inline">
							<input type="radio" name="alipay[switch]" ng-model="alipay.switch" value="false"/>
							关闭
						</label>
						<span class="help-block">是否使用支付宝无线支付</span>
						<input type="hidden" name="alipay[t]" />
					</div>
				</div>
				<div ng-show="alipay.switch == 'true'">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">收款支付宝账号</label>
						<div class="col-sm-9 col-xs-12">
							<input type="text" name="alipay[account]" class="form-control" value="<?php  echo $pay['alipay']['account'];?>" autocomplete="off">
							<span class="help-block">如果开启兑换或交易功能，请填写真实有效的支付宝账号，用于收取用户以现金兑换交易积分的相关款项。如账号无效或安全码有误，将导致用户支付后无法正确对其积分账户自动充值，或进行正常的交易对其积分账户自动充值，或进行正常的交易。 如您没有支付宝帐号，<a href="https://memberprod.alipay.com/account/reg/enterpriseIndex.htm" target="_blank">请点击这里注册</a></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">合作者身份</label>
						<div class="col-sm-9 col-xs-12">
							<input type="text" name="alipay[partner]" class="form-control" value="<?php  echo $pay['alipay']['partner'];?>" autocomplete="off"/>
							<span class="help-block">支付宝签约用户请在此处填写支付宝分配给您的合作者身份，签约用户的手续费按照您与支付宝官方的签约协议为准。<br>如果您还未签约，<a href="https://memberprod.alipay.com/account/reg/enterpriseIndex.htm" target="_blank">请点击这里签约</a>；如果已签约,<a href="https://b.alipay.com/order/pidKey.htm?pid=2088501719138773&amp;product=fastpay" target="_blank">请点击这里获取PID、Key</a>;如果在签约时出现合同模板冲突，请咨询0571-88158090</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">校验密钥</label>
						<div class="col-sm-9 col-xs-12">
							<input type="text" name="alipay[secret]" class="form-control" value="<?php  echo $pay['alipay']['secret'];?>" autocomplete="off"/>
							<span class="help-block">支付宝签约用户可以在此处填写支付宝分配给您的交易安全校验码，此校验码您可以到支付宝官方的商家服务功能处查看</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">模拟测试</label>
						<div class="col-sm-9 col-xs-12 form-control-static">
							<a href="javascript:;" id="tPost">交易模拟测试</a>
							<span class="help-block">本测试将模拟提交 0.01 元人民币的订单进行测试，如果提交后成功出现付款界面，说明您站点的支付宝功能可以正常使用</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				设置微信支付开关
			</div>
			<div class="panel-body">
				<?php  if(!empty($accounts)) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">微信支付</label>
					<div class="col-sm-9 col-xs-12">
						<div class="alert alert-danger hide">
							因微信公众平台对部分认证订阅号开放申请微信支付的能力,系统在设置支付公众号时,认证的订阅号会出现在下拉选择框,请您根据自己的公众号类型进行选择。 <a href="https://mp.weixin.qq.com/cgi-bin/announce?action=getannouncement&key=1430372687&version=4&lang=zh_CN" target="_blank">详情请查看这里（登陆公众号后可查看）</a>.
						</div>
						<div class="alert alert-warning">
							你必须向微信公众平台提交企业信息以及银行账户资料，审核通过并签约后才能使用微信支付功能 <a href="https://mp.weixin.qq.com/paymch/readtemplate?t=mp/business/faq_tmpl" target="_blank">申请及详情请查看这里</a>.
						</div>
						<div class="alert alert-warning">
							<p>系统0.6支持微信支付接口，注意你的系统访问地址一定不要写错了，这里我们用访问地址代替下面说明中出现的链接，申请微信支付的接口说明如下：</p>
							<br>
							<h4>JS API网页支付参数</h4>
							<p>支付授权目录01: <?php  echo $_W['siteroot'];?>payment/wechat/</p>
							<p>支付授权目录02: <?php  echo $_W['siteroot'];?>app/</p>
							<p>支付请求实例: <?php  echo $_W['siteroot'];?>payment/wechat/pay.php</p>
							<p>共享收货地址: 选择"是"</p>
							<br>
							<h4>Native原生支付</h4>
							<p>支付回调URL: <?php  echo $_W['siteroot'];?>payment/wechat/native.php</p>
							<p>维权通知URL: <?php  echo $_W['siteroot'];?>payment/wechat/rights.php</p>
							<p>警告通知URL: <?php  echo $_W['siteroot'];?>payment/wechat/warning.php</p>
						</div>
						<?php  if($accounts[$_W['acid']]['level'] > 2) { ?>
						<?php  if($accounts[$_W['acid']]['level'] == 4) { ?>
						<label class="radio-inline">
							<input type="radio" name="wechat[switch]" ng-model="wechat.switch" value="1" ng-checked="wechat.switch == 1 || wechat.switch == 'true'" onclick="<?php  if($accounts[$_W['acid']]['level'] <= 2) { ?>alert('您的公众号没有开通微信支付的权限'); return false;<?php  } else { ?>$('.s').hide();$('#mchid').show();<?php  if($accounts[$_W['acid']]['level'] != 3) { ?>$('#apikey').show();<?php  } ?><?php  } ?>"/>
							微信支付
						</label>
						<?php  } ?>
						<label class="radio-inline">
							<input type="radio" name="wechat[switch]" id="wechat_borrow" ng-model="wechat.switch" ng-checked="wechat.switch == 2" ng-disabled="wechat_facilitator.switch == 'true'" value="2" />
							借用支付
						</label>
						<label class="radio-inline">
							<input type="radio" name="wechat[switch]" id="wechat_service" ng-model="wechat.switch" ng-checked="wechat.switch == 3" ng-disabled="wechat_facilitator.switch == 'true'" value="3" />
							服务商支付
						</label>
						<label class="radio-inline">
							<input type="radio" name="wechat[switch]" id="wechat_close" ng-model="wechat.switch" ng-checked="wechat.switch == 4 || wechat.switch == 'false'" value="4" />
							关闭
						</label>
						<span class="help-block">是否使用微信支付</span>
						<?php  } else { ?>
						<div class="alert alert-warning">
							 【温馨提示】：只有“普通服务号，认证订阅号”才可以借用微信支付和服务商支付
						</div>
						<?php  } ?>
					</div>
				</div>
				<?php  if(empty($pay['wechat']['version']) && !empty($pay['wechat']['signkey'])) { ?>
				<?php  $pay['wechat']['version'] = 1;?>
				<?php  } ?>
				<div ng-show="wechat.switch == '2'">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">借用公众号</label>
						<div class="col-sm-9 col-xs-12">
							<select name="wechat[borrow]" class="form-control">
								<option value="0">不借用任何公众号</option>
								<?php  if(is_array($borrow)) { foreach($borrow as $acid => $name) { ?>
								<option value="<?php  echo $acid;?>" <?php  if($pay['wechat']['borrow'] == $acid) { ?>selected<?php  } ?>><?php  echo $name;?></option>
								<?php  } } ?>
							</select>
							<span class="help-block">借用认证服务号支付权限完成支付。</span>
						</div>
					</div>
				</div>
				<div ng-show="wechat.switch == '3'">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">服务商公众号</label>
						<div class="col-sm-9 col-xs-12">
							<select name="wechat[service]" id="ss" class="form-control">
								<option value="0">不授权给服务商</option>
								<?php  if(is_array($service)) { foreach($service as $acid => $name) { ?>
								<option value="<?php  echo $acid;?>" <?php  if($pay['wechat']['service'] == $acid) { ?>selected<?php  } ?>><?php  echo $name;?></option>
								<?php  } } ?>
							</select>
							<span class="help-block">在微信公众号请求用户网页授权之前，开发者需要先到公众平台网站的【开发者中心】<b>网页服务</b>中配置授权回调域名。<mark>并在支付参数中完善相关信息。</mark></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">子商户号(sub_mch_id)</label>
						<div class="col-sm-9 col-xs-12">
							<input type="text" name="wechat[sub_mch_id]" class="form-control" value="<?php  echo $pay['wechat']['sub_mch_id'];?>" autocomplete="off"/>
							<span class="help-block">子商户号是在服务商商户号下申请的子商户号</span>
						</div>
					</div>
				</div>
				<div ng-show="wechat.switch == '1'">
					<div class="form-group" <?php  if($accounts[$_W['acid']]['level'] == 3) { ?>style="display: none"<?php  } ?>>
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">接口类型</label>
					<div class="col-sm-9 col-xs-12">
						<label class="radio-inline" onclick="$('.s').show();$('#mchid').hide();$('#apikey').hide();">
							<input type="radio" name="wechat[version]" value="1" <?php  if($pay['wechat']['version'] == 1) { ?> checked="checked"<?php  } ?> autocomplete="off" />
							旧版
						</label>
						<label class="radio-inline" onclick="$('.s').hide();$('#mchid').show();$('#apikey').show();">
							<input type="radio" name="wechat[version]" value="2" <?php  if($pay['wechat']['version'] == 2 || empty($pay['wechat']['version'])) { ?> checked="checked"<?php  } ?> autocomplete="off" />
							新版(2014年9月之后申请的)
						</label>
						<span class="help-block">由于微信支付接口调整，需要根据申请时间来区分支付接口</span>
					</div>
				</div>
				<div class="form-group" <?php  if($accounts[$_W['acid']]['level'] == 3) { ?>style="display: none"<?php  } ?>>
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">支付账号</label>
				<div class="col-sm-9 col-xs-12">
					<p class="form-control-static"><?php  echo $_W['account']['name'];?></p>
					<?php  if($_W['account']['level'] < 4) { ?>
					<span class="help-block"><strong class="text-danger">微信支付要求公众号为“认证服务号”，该公众号没有微信支付的权限</strong></span>
					<?php  } ?>
					<input type="hidden" name="wechat[account]" value="<?php  echo $_W['account']['acid'];?>"/>
				</div>
			</div>
			<div class="form-group" <?php  if($accounts[$_W['acid']]['level'] == 3) { ?>style="display: none"<?php  } ?>>
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">身份标识<br />(appId)</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" value="<?php  echo $_W['account']['key'];?>" readonly="readonly" autocomplete="off">
				<span class="help-block">公众号身份标识 <a href="<?php  echo url('account/post', array('uniacid' => $_W['uniacid']))?>">请通过修改公众号信息来保存</a></span>
			</div>
		</div>
		<div class="form-group" <?php  if($accounts[$_W['acid']]['level'] == 3) { ?>style="display: none"<?php  } ?>>
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">身份密钥<br />(appSecret)</label>
		<div class="col-sm-9 col-xs-12">
			<input type="text" class="form-control" value="<?php  echo $_W['account']['secret'];?>" readonly="readonly" autocomplete="off"/>
			<span class="help-block">公众平台API(参考文档API 接口部分)的权限获取所需密钥Key <a href="<?php  echo url('account/post', array('uniacid' => $_W['uniacid']))?>">请通过修改公众号信息来保存</a></span>
		</div>
</div>
<div class="form-group s" <?php  if($pay['wechat']['version'] == 2 || $accounts[$_W['acid']]['level'] == 3) { ?> style="display:none;" <?php  } ?>>
<label class="col-xs-12 col-sm-3 col-md-2 control-label">商户身份<br />(partnerId)</label>
<div class="col-sm-9 col-xs-12">
	<input type="text" name="wechat[partner]" class="form-control" value="<?php  echo $pay['wechat']['partner'];?>" autocomplete="off"/>
	<span class="help-block">财付通商户身份标识</span>
	<span class="help-block">公众号支付请求中用于加密的密钥Key</span>
</div>
</div>
<div class="form-group s" <?php  if($pay['wechat']['version'] == 2 || $accounts[$_W['acid']]['level'] == 3) { ?> style="display:none;" <?php  } ?>>
<label class="col-xs-12 col-sm-3 col-md-2 control-label">商户密钥<br />(partnerKey)</label>
<div class="col-sm-9 col-xs-12">
	<input type="text" name="wechat[key]" class="form-control" value="<?php  echo $pay['wechat']['key'];?>" autocomplete="off"/>
	<span class="help-block">财付通商户权限密钥Key</span>
</div>
</div>
<div class="form-group" id="mchid" <?php  if($pay['wechat']['version'] == 1) { ?> style="display:none;" <?php  } ?>>
<label class="col-xs-12 col-sm-3 col-md-2 control-label">微信支付商户号(MchId)</label>
<div class="col-sm-9 col-xs-12">
	<input type="text" name="wechat[mchid]" class="form-control" value="<?php  echo $pay['wechat']['mchid'];?>" autocomplete="off"/>
	<span class="help-block">公众号支付请求中用于加密的密钥Key</span>
</div>
</div>
<div class="form-group s" id="signkey" <?php  if($pay['wechat']['version'] == 2 || $accounts[$_W['acid']]['level'] == 3) { ?> style="display:none;" <?php  } ?>>
<label class="col-xs-12 col-sm-3 col-md-2 control-label">通信密钥(paySignKey)</label>
<div class="col-sm-9 col-xs-12">
	<input type="text" name="wechat[signkey]" class="form-control" value="<?php  echo $pay['wechat']['signkey'];?>" autocomplete="off"/>
	<span class="help-block">公众号支付请求中用于加密的密钥Key</span>
</div>
</div>
<div class="form-group s" id="apikey" <?php  if($pay['wechat']['version'] == 1 ||  $accounts[$_W['acid']]['level'] == 3) { ?> style="display:none;" <?php  } ?>>
<label class="col-xs-12 col-sm-3 col-md-2 control-label">商户支付密钥(API密钥)</label>
<div class="col-sm-9 col-xs-12">
	<div class="input-group">
		<input type="text" name="wechat[apikey]" id="wechat_apikey" class="form-control" maxlength="32" value="<?php  if(empty($pay['wechat']['signkey'])) { ?><?php  echo random(32);?><?php  } else { ?><?php  echo substr($pay['wechat']['signkey'], 0 , 32)?><?php  } ?>" autocomplete="off"/>
		<span onclick="tokenGen('wechat_apikey');" style="cursor:pointer" class="input-group-addon">生成新的</span>
	</div>
	<span class="help-block">此值需要手动在腾讯商户后台API密钥保持一致。<?php  if($_W['isfounder']) { ?><a href="http://help.012wz.com/" target="_blank">查看设置教程</a><?php  } ?></span>
</div>
</div>
</div>
<?php  } else { ?>
<div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">微信支付</label>
	<div class="col-sm-9 col-xs-12">
		<div class="alert alert-warning">
			你必须向微信公众平台提交企业信息以及银行账户资料，审核通过并签约后才能使用微信支付功能 <a href="http://help.012wz.com/" target="_blank">申请及详情请查看这里</a>.
		</div>
		<span class="help-block">你还没有支持微信支付的账号, <a href="<?php  echo url('account/post/list', array('uniacid' => $_W['uniacid']))?>">请添加或修改你的微信账号为认证服务号</a></span>
	</div>
</div>
<?php  } ?>
</div>
</div>
<?php  if($accounts[$_W['acid']]['level'] == 4) { ?>
<div class="panel panel-default">
	<div class="panel-heading">
		设置微信服务商开关
	</div>
	<div class="panel-body">
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">服务商</label>
			<div class="col-sm-8 col-xs-12">
				<label class="radio-inline">
					<input type="radio" name="wechat_facilitator[switch]" ng-model="wechat_facilitator.switch" value="true"/>
					开启
				</label>
				<label class="radio-inline">
					<input type="radio" name="wechat_facilitator[switch]" ng-model="wechat_facilitator.switch" value="false"/>
					关闭
				</label>
				<span class="help-block">设置为服务商，其他商户可以授权给服务商，让服务商完成支付。</span>
			</div>
		</div>
	</div>
	<div ng-show="wechat_facilitator.switch == 'true'">
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">服务商商户号</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="wechat_facilitator[mchid]" class="form-control" value="<?php  echo $pay['wechat_facilitator']['mchid'];?>" autocomplete="off"/>
				<span class="help-block">需要填写申请为服务商的商户号。注：服务商的商户号与微信支付的商户号不是同一个号。</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">商户支付密钥(API密钥)</label>
			<div class="col-sm-9 col-xs-12">
				<div class="input-group">
					<input type="text" name="wechat_facilitator[signkey]" id="facilitator_signkey" class="form-control" maxlength="32" value="<?php  echo substr($pay['wechat_facilitator']['signkey'], 0 , 32)?>" autocomplete="off"/>
					<span onclick="tokenGen('facilitator_signkey');" style="cursor:pointer" class="input-group-addon">生成新的</span>
				</div>
				<span class="help-block">此商户秘钥为服务商商户号对应的支付秘钥，与微信支付的支付秘钥不相同。</span>
			</div>
		</div>
	</div>
</div>
<?php  } ?>
<div class="panel panel-default">
	<div class="panel-heading">
		设置银联支付开关
	</div>
	<div class="panel-body">
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">银联支付</label>
			<div class="col-sm-8 col-xs-12">
				<label class="radio-inline">
					<input type="radio" name="unionpay[switch]" ng-model="unionpay.switch" value="true"/>
					开启
				</label>
				<label class="radio-inline">
					<input type="radio" name="unionpay[switch]" ng-model="unionpay.switch" value="false"/>
					关闭
				</label>
				<span class="help-block">是否使用银联支付</span>
			</div>
		</div>
	</div>
	<div ng-show="unionpay.switch == 'true'">
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">商户私钥证书（签名）</label>
			<div class="col-sm-9 col-xs-12 form-control-static">
				<?php  if($pay['unionpay']['signcertexists']) { ?>
				证书已上传&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="unionpay[signcertpath]" id="amend" class="hidden"><input type="button" value="修改" onclick="amend.click()" class="btn btn-success btn-sm" style="padding: .2em .6em;">
				<?php  } else { ?>
				<input type="file" name="unionpay[signcertpath]" value="">
				<?php  } ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">商户私钥证书密码</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="unionpay[signcertpwd]" class="form-control" value="<?php  echo $pay['unionpay']['signcertpwd'];?>" autocomplete="off"/>
				<span class="help-block"></a></span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">商户号</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="unionpay[merid]" class="form-control" value="<?php  echo $pay['unionpay']['merid'];?>" autocomplete="off"/>
				<span class="help-block"></a></span>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		设置百度钱包支付开关
	</div>
	<div class="panel-body">
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">百度钱包支付</label>
			<div class="col-sm-8 col-xs-12">
				<label class="radio-inline">
					<input type="radio" name="baifubao[switch]" ng-model="baifubao.switch" value="true"/>
					开启
				</label>
				<label class="radio-inline">
					<input type="radio" name="baifubao[switch]" ng-model="baifubao.switch" value="false"/>
					关闭
				</label>
				<span class="help-block">是否使用百度钱包支付</span>
			</div>
		</div>
	</div>
	<div ng-show="baifubao.switch == 'true'">
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">商户号</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="baifubao[mchid]" class="form-control" value="<?php  echo $pay['baifubao']['mchid'];?>" autocomplete="off"/>
				<span class="help-block"></a></span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">商户支付密钥</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="baifubao[signkey]" class="form-control" value="<?php  echo $pay['baifubao']['signkey'];?>" autocomplete="off"/>
				<span class="help-block"></a></span>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		设置线下汇款支付开关
	</div>
	<div class="panel-body">
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">汇款支付</label>
			<div class="col-sm-8 col-xs-12">
				<label class="radio-inline">
					<input type="radio" name="line[switch]" ng-model="line.switch" value="true"/>
					开启
				</label>
				<label class="radio-inline">
					<input type="radio" name="line[switch]" ng-model="line.switch" value="false"/>
					关闭
				</label>
				<span class="help-block">是否支持线下汇款方式支付</span>
			</div>
		</div>
	</div>
	<div class="js-offline-info" ng-show="line.switch == 'true'">
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">账户信息</label>
			<div class="col-sm-9 col-xs-12">
				<?php  echo tpl_ueditor('line[message]',$pay['line']['message'])?>
				<span class="help-block"></a></span>
			</div>
		</div>
	</div>
</div>
<div class="form-group col-sm-12">
	<input name="do-submit" type="submit" value="提交" class="btn btn-primary col-lg-1" />
	<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
</div>
</form>
</div>
<script type="text/javascript">
	function tokenGen(id) {
		var letters = 'abcdefghijklmnopqrstuvwxyz0123456789';
		var token = '';
		for(var i = 0; i < 32; i++) {
			var j = parseInt(Math.random() * (31 + 1));
			token += letters[j];
		}
		$('#'+id).val(token);
	}
		angular.module('app', []).controller('paySetting', function($scope){
			$scope.delivery = {
				switch: <?php  if($pay['delivery']['switch']) { ?>'true'<?php  } else { ?>'false'<?php  } ?>
		};
		$scope.credit = {
			switch: <?php  if($pay['credit']['switch']) { ?>'true'<?php  } else { ?>'false'<?php  } ?>
	};
	$scope.alipay = {
		switch: <?php  if($pay['alipay']['switch']) { ?>'true'<?php  } else { ?>'false'<?php  } ?>
	};
	$scope.unionpay = {
		switch: <?php  if($pay['unionpay']['switch']) { ?>'true'<?php  } else { ?>'false'<?php  } ?>
	};
	$scope.baifubao = {
		switch: <?php  if($pay['baifubao']['switch']) { ?>'true'<?php  } else { ?>'false'<?php  } ?>
	};
	$scope.line = {
		switch: <?php  if($pay['line']['switch']) { ?>'true'<?php  } else { ?>'false'<?php  } ?>
	};
	$scope.wechat_facilitator = {
		switch: <?php  if($pay['wechat_facilitator']['switch']) { ?>'true'<?php  } else { ?>'false'<?php  } ?>
	};
	<?php  if(!empty($accounts)) { ?>
		$scope.wechat = {
			switch: '<?php  echo $pay['wechat']['switch'];?>',
			account: '<?php  echo $pay['wechat']['account'];?>'
		};
		<?php  } ?>
			$scope.$watch('wechat_facilitator.switch', function(newValue, oldValue, $scope){
				if ($scope.wechat.switch != 1 && newValue == 'true') {
					$scope.wechat.switch = 4;
				}
			});
			var level = <?php  echo $accounts[$_W['acid']]['level'];?>;
			$scope.$watch('wechat.switch', function(newValue,oldValue, $scope){
				if (newValue < 4 && level <= 2) {
					$scope.wechat.switch = '4';
				}
			});
		});
		angular.bootstrap(document, ['app']);

		//支付宝和微信支付开启验证
		$("#payform").submit(function(){
			var $scope = angular.element('#payform').scope();
			if($scope.alipay.switch == 'true') {
				if($.trim($(':text[name="alipay[account]"]').val()) == '') {
					util.message('必须输入收款支付宝账号.', '', 'error');
					return false;
				}
				if($.trim($(':text[name="alipay[partner]"]').val()) == '') {
					util.message('必须输入合作者身份.', '', 'error');
					return false;
				}
				if($.trim($(':text[name="alipay[secret]"]').val()) == '') {
					util.message('必须输入收款支付宝校验密钥.', '', 'error');
					return false;
				}
			}
			$(':hidden[name="alipay[t]"]').val('');
			if($(':radio[name="wechat_facilitator[switch]"]:checked').val() == 'true') {
				if ($('[name="wechat_facilitator[mchid]"]').val() == '') {
					util.message('必须输入微信服务商的商户号');
					return false;
				}
				if($.trim($('#facilitator_signkey').val()) == '') {
					util.message('必须输入服务商支付密钥.', '', 'error');
					return false;
				}
			}
			if($(':radio[name="wechat[switch]"]:checked').val() < 4) {
				if($scope.wechat.account.key == '') {
					util.message('必须输入身份标识.', '', 'error');
					return false;
				}
				if($scope.wechat.account.token == '') {
					util.message('必须输入身份密钥.', '', 'error');
					return false;
				}
				if($(':radio[name="wechat[version]"]:checked').val() == '1' && $.trim($(':text[name="wechat[signkey]"]').val()) == '' && $('[name="wechat[switch]"]:checked').val() == '1') {
					util.message('必须输入通信密钥.', '', 'error');
					return false;
				}
				if($(':radio[name="wechat[version]"]:checked').val() == '1' && $.trim($(':text[name="wechat[partner]"]').val()) == '' && $('[name="wechat[switch]"]:checked').val() == '1') {
					util.message('必须输入商户身份.', '', 'error');
					return false;
				}
				if($(':radio[name="wechat[version]"]:checked').val() == '1' && $.trim($(':text[name="wechat[key]"]').val()) == '' && $('[name="wechat[switch]"]:checked').val() == '1') {
					util.message('必须输入商户密钥.', '', 'error');
					return false;
				}
				if($(':radio[name="wechat[version]"]:checked').val() == '2' && $.trim($(':text[name="wechat[mchid]"]').val()) == '' && $('[name="wechat[switch]"]:checked').val() == '1') {
					util.message('必须输入微信支付商户号.', '', 'error');
					return false;
				}

				if($(':radio[name="wechat[switch]"]:checked').val() == '3' && $('[name="wechat[service]"]').val() == '0') {
					util.message('请选择服务商的公众号.', '', 'error');
					return false;
				}
				if($(':radio[name="wechat[switch]"]:checked').val() == '3' && $(':text[name="wechat[sub_mch_id]"]').val() == '') {
					util.message('必须输入子商户号.', '', 'error');
					return false;
				}
				if($(':radio[name="wechat[switch]"]:checked').val() == '2' && $('[name="wechat[borrow]"]').val() == '0') {
					util.message('请选择借用的公众号.', '', 'error');
					return false;
				}
				if(($(':radio[name="wechat[version]"]:checked').val() == '2' && $(':radio[name="wechat[switch]"]:checked').val() == '1')  && $.trim($('#wechat_apikey').val()) == '') {
					util.message('必须输入商户支付密钥.', '', 'error');
					return false;
				}
			}
		});

		//支付宝测试
		$("#tPost").click(function(){
			var $scope = angular.element('#payform').scope();
			if($scope.alipay.switch == 'true') {
				if($.trim($(':text[name="alipay[account]"]').val()) == '') {
					util.message('必须输入收款支付宝账号.', '', 'error');
					return false;
				}
				if($.trim($(':text[name="alipay[partner]"]').val()) == '') {
					util.message('必须输入合作者身份.', '', 'error');
					return false;
				}
				if($.trim($(':text[name="alipay[secret]"]').val()) == '') {
					util.message('必须输入收款支付宝账号.', '', 'error');
					return false;
				}
				if(confirm('你可能需要修改您的浏览器 User-Agent 来模拟手机浏览才能正常测试, 请确认已经修改好.')) {
					$(':hidden[name="alipay[t]"]').val('true');
					$('#payform')[0].submit();
				}
			}
		});
	$('[name="wechat[service]"]').change(function() {
		if ($(this).val() != 0) {
			$('[name="wechat[borrow]"]').val(0);
		}
	});
	$('[name="wechat[borrow]"]').change(function() {
		if ($(this).val() != 0) {
			$('[name="wechat[service]"]').val(0);
		}
	});
	<!--
	var editor = UE.getEditor("line[message]")
	editor.ready(function() {
		<?php  if(empty($pay['line']['switch'])) { ?>
			$('.js-offline-info').addClass('ng-hide');
			<?php  } ?>
			});
	//-->
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>

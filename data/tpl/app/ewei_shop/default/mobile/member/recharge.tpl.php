<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<title>账户充值</title>
<style type="text/css">
	body {margin:0px; background:#efefef; -moz-appearance:none;}
	.recharge {height:auto; border-bottom:1px solid #f0f0f0; border-top:1px solid #f0f0f0; background:#fff;margin-top:10px;}
	.recharge .line {height:44px; margin:0 5px; border-bottom:1px solid #f0f0f0; line-height:44px;}
	.recharge .line .label { float:left;width:60px; padding-left:5px; color:#333; font-size:14px;height:44px;line-height:44px;}
	.recharge .line .info { float:left; width:100%; margin-left:-65px;margin-right:-30px;text-align: left;overflow:hidden;height:44px;}
	.recharge .line .info .inner { color:#666;margin-left:70px;margin-right:30px;}
	.recharge .line input {
		width:100%; font-size:14px; color:#333; border:none;height:22px;line-height:18px;
	}
	.recharge .line .ico { float:right; width:30px; height:44px; line-height:42px;color:#ccc; font-size:14px; text-align: center;}
	.recharge .line2 {
		height: 35px;line-height:35px;
		padding:0 10px; color:#666; font-size:14px;
	}
	.recharge .line2 span { color:#ff6600; font-weight:bold; font-size:16px;}
	.recharge .line2 span:last-child { font-size:18px}
	#confirmdiv { position: fixed; top:0px; width:100%;background:#efefef; left:0;}
	#confirmdiv { position: fixed; top:0px; width:100%;background:#efefef; left:100%}
	.coupon_select {height:auto; border-bottom:1px solid #f0f0f0; border-top:1px solid #f0f0f0; background:#fff;margin:10px 0;}
	.coupon_select .line {height:44px; margin:0 5px; border-bottom:1px solid #f0f0f0; line-height:44px;}
	.coupon_select .line .label { float:left; width:100%;margin-right:-30px; font-size:14px; color:#333;}
	.coupon_select .line .label .inner { margin-right:30px;padding-left:5px;}
	.coupon_select .line .ico { float:right; width:30px; height:44px; line-height:50px;color:#666; font-size:12px; text-align: center;}

	.balance_sub0, .balance_sub1 {height:40px; margin:10px 5px; background:#31cd00; border-radius:3px; text-align:center; font-size:14px; line-height:40px; color:#fff;}
	.balance_sub2 {height:40px; margin:10px 5px; background:#f49c06; border-radius:3px; text-align:center; font-size:14px; line-height:40px; color:#fff;}
	.balance_sub3 {height:40px; margin:10px 5px;background:#e2cb04; border-radius:3px; text-align:center; font-size:14px; line-height:40px; color:#fff;}
</style>
<?php  if($hascoupon) { ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('coupon/chooser', TEMPLATE_INCLUDEPATH)) : (include template('coupon/chooser', TEMPLATE_INCLUDEPATH));?>
<?php  } ?>
<div id="container"></div>

<script id="tpl_main" type="text/html">
	<input type="hidden" id="logid" value="<%logid%>" />
	<input type="hidden" id="couponid" value="" />

	<div class="page_topbar">
        <a href="javascript:;" class="back" onclick="history.back()"><i class="fa fa-angle-left"></i></a>
        <div class="title">账户充值</div>
    </div>
	<div class="recharge">
		<div class="line">
			<div class="label">当前余额</div>
			<div class="info"><div class="inner"><%credit%></div></div>
		</div>
		<div class="line">
			<div class="label">充值金额</div>
			<div class="info"><div class="inner"><input type="tel" id="money" placeholder="请输入充值的金额"/></div></div>
			<div class="ico" id="refresh" style="display:none;"><i class="fa fa-remove"></i></div>
		</div>
	</div>
	
	<?php  if($hascoupon) { ?>
	
	<div class="coupon_select" id="coupondiv" style="display:none">
		<div class="line">
			<div class="label"><div class="inner" id="couponselect">我要使用优惠券</div></div>
			<div class="ico"><i class="fa fa-angle-right fa-2x"></i></div>
		</div>
	</div>	
	<div class="button balance_sub0" id="btnnext">下一步</div>
	<?php  } ?>
	<%if wechat.success%><div class="button balance_sub1" <?php  if($hascoupon) { ?>style="display:none"<?php  } ?>>微信支付</div><%/if%>
	<%if alipay.success%><div class="button balance_sub2"  <?php  if($hascoupon) { ?>style="display:none"<?php  } ?>>支付宝支付</div><%/if%>
	<div class="balance_sub3" onclick="location.href = '<?php  echo $this->createMobileUrl('member/log',array('type'=>0))?>'">充值记录</div>
	
	<%if acts%>
	<div class="recharge">
		<div class="line" style="color:#ff6600;padding:0 10px;">
			<b><i class='fa fa-gift'></i> 充值满就送</b>
			
		</div>
		<%each acts as act index%>
		<%if index<=2%>
		<div class="line line2" >
			充值满 <span><%act.enough%></span> 元立即送 <span><%act.give%></span>
		</div>
		<%/if%>
		<%/each%>
		 
		<%if acts.length>3%>
		 <div class="line line2" down='0' onclick='showMoreActivity()' id='morebtn' style='text-align:center'>
			<i class='fa fa-angle-down'></i> 显示更多</span>
		</div>
		<%/if%>
		
		<div id='moreactivity' style='display:none'>
		<%each acts as act index%>
		<%if index>2%>
		<div class="line line2" >
			充值满 <span><%act.enough%></span> 元立即送 <span><%act.give%></span>
		</div>
		<%/if%>
		<%/each%>
		</div>
	</div>
	<%/if%>
</script>


<script language="javascript">
 
 function showMoreActivity(){
	 $('#morebtn').hide();
	 $("#moreactivity").fadeIn();
 }
	require(['tpl', 'core'], function (tpl, core) {
		function rechargeok(type) {
			var logid = $('#logid').val();
			core.json('member/recharge', {
				op: 'complete',
				logid: logid, type: type
			}, function (pay_json) {
				if (pay_json.status == 1) {
					core.tip.show('充值成功!');
					location.href = core.getUrl('member');
					return;
				}
				core.tip.show(pay_json.result);
				$('.button').removeAttr('submitting');
			}, true, true);
		}
		core.json('member/recharge', {openid: "<?php  echo $openid;?>"}, function (json) {
			var result = json.result;
			if (json.status != 1) {
				core.message(result, "<?php  echo $this->createMobileUrl('member')?>", 'error');
				return;
			}
			$('#container').html(tpl('tpl_main', result));
			$('#logid').val(result.logid);
			<?php  if($hascoupon) { ?>
					$('#money').bind('input propertychange',function(){
						if($.trim($(this).val())!=''){
							$('#refresh').show().unbind('click').click(function(){
								$('#money').val('');
								$('#refresh').hide();
								$('#btnnext').show();
								$('.balance_sub1').hide();
								$('.balance_sub2').hide();
								$('#coupondiv').hide().unbind('click');
							})
						}else{
							$('#btnnext').show();
							$('.balance_sub1').hide();
							 $('.balance_sub2').hide();
							$('#refresh').hide();
							$('#coupondiv').hide().unbind('click');
						}
					})

				$('#btnnext').bind('click', function () {
					var money = $.trim($('#money').val());
					var showpay = false;

                                             if($(this).attr('submintting')=='1'){
												 return;
                                            }
					if (!$.isEmpty(money)) {
						if ($.isNumber(money)) {
							showpay = true;
						}
					}
					if (!showpay)
					{
						core.tip.show('请输入数字充值金额!');
						return;
					}

                                              $(this).attr('submintting','1');
					core.pjson('coupon/util', {op: 'query', money: money, type:1}, function (rjson) {
							if (rjson.status != 1) {
								$('#btnnext').removeAttr('submitting');
								core.tip.show(rjson.result);
								return;
							}
							if(rjson.result.coupons.length>0){
								$('#coupondiv').show().unbind('click').click(function(){
									CouponChooser.open( rjson.result );
								});
							}
							$('#btnnext').hide();
							if (window.result.wechat.success) {
								$('.balance_sub1').show();
							}
							if (window.result.alipay.success) {
								$('.balance_sub2').show();
							}
						}, true, true);

					
				});
	                  <?php  } ?>
			window.result = result;
			if (result.alipay.success) {
				$('.balance_sub2').click(function () {

					var money = $('#money').val();
					if (!$('#money').isNumber()) {
						core.tip.show('请输入数字金额!');
						return;
					}
					var logid = $('#logid').val();
					if (logid == '') {
						core.tip.show('请刷新重试!');
						return;
					}

					core.json('member/recharge', {op: 'recharge', openid: "<?php  echo $openid;?>", type: 'alipay', money: money, logid: logid,couponid:$('#couponid').val()}, function (rjson) {
						if (rjson.status != 1) {
							$('.button').removeAttr('submitting');
							core.tip.show(rjson.result);
							return;
						}
						//virtual
						location.href = core.getUrl('order/pay_alipay', {logid: logid});
						return;
					}, true, true);

				})
			}
			if (result.wechat.success) {
				$('.balance_sub1').click(function () {
					if ($(this).attr('submitting') == '1') {
						return;
					}
					var money = $('#money').val();
					if (!$('#money').isNumber()) {
						core.tip.show('请输入数字金额!');
						return;
					}
					var logid = $('#logid').val();
					if (logid == '') {
						core.tip.show('请刷新重试!');
						return;
					}

					$('.button').attr('submitting', 1);
					core.json('member/recharge', {op: 'recharge', openid: "<?php  echo $openid;?>", type: 'weixin', money: money, logid: logid,couponid:$('#couponid').val()}, function (rjson) {
						if (rjson.status != 1) {
							$('.button').removeAttr('submitting');
							core.tip.show(rjson.result);
							return;
						}

						var wechat = rjson.result.wechat;
						WeixinJSBridge.invoke('getBrandWCPayRequest', {
							'appId': wechat.appid ? wechat.appid : wechat.appId,
							'timeStamp': wechat.timeStamp,
							'nonceStr': wechat.nonceStr,
							'package': wechat.package,
							'signType': wechat.signType,
							'paySign': wechat.paySign,
						}, function (res) {
							if (res.err_msg == 'get_brand_wcpay_request:ok') {
								rechargeok('wechat');
							} else if (res.err_msg == 'get_brand_wcpay_request:cancel') {
								$('.button').removeAttr('submitting');
								core.tip.show('取消支付');
							} else {
								$('.button').removeAttr('submitting');
								alert(res.err_msg);
							}
						});
					}, true, true);

				});
			}
		}, true)
	});

</script>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>

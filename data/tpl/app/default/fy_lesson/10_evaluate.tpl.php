<?php defined('IN_IA') or exit('Access Denied');?><!--
 * ============================================================================

 * ============================================================================
-->
<?php  include $this->template('_header');?>
<link href="<?php echo MODULE_URL;?>template/mobile/style/evaluate.css" rel="stylesheet" />

<div class="contaniner fixed-cont">
	<section class="go-order" style="padding:1% 5%;">
		<div class="order-shop">
			<form id="submit_form" method="post" onsubmit="return checksubmit();return false();">
				<ul style="border:#EFEFEF solid 1px;">
					<li>
						<div class="oc-info">
							<div class="oc-info-l">
								<img src="<?php  echo $_W['attachurl'];?><?php  echo $order['images'];?>">
							</div>
							<div class="oc-info-r">
								<h2>课程:《<?php  echo $order['bookname'];?>》</h2>
								<div>价格:<strong style="color:red;"><?php  echo $order['price'];?></strong> 元</div>
							</div>
						</div>
						<div class="oc-comm">
							<ul class="oc-comm-ul">
								<li class="c-f-sku ocm-h" id="ocm-h" onclick="selectedgrade(1);">好评<span></span></li>
								<li class="c-f-sku ocm-z" id="ocm-z" onclick="selectedgrade(2);">中评<span></span></li>
								<li class="c-f-sku ocm-c" id="ocm-c" onclick="selectedgrade(3);">差评<span></span></li>
								<input type="hidden" name="grade" id="grade" value="">
							</ul>
						</div>
						<div class="oc-text">
							<span class="c-f-textarea"><textarea name="content" placeholder="请输入评论内容，最多300字" maxlength="300"></textarea></span>
						</div>
					</li>
					<li>						
						<input type="submit" name="submit" value="提交评价" class="allsubmit-btn">
						<input type="hidden" name="orderid" value="<?php  echo $orderid;?>">
						<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
					</li>
				</ul>
			</form>
		</div>
	</section>
</div>

<script type="text/javascript">
function checksubmit(){
	var grade = $("#grade").val();
	if(grade==''){
		alert("请对我们的服务评分");
		return false;
	}
   
	if(confirm('确定提交评价?')){
		return true;
	}else{
		return false;
	}

	document.getElementById("submit_form").submit();
}

function selectedgrade(obj){
    if(obj=='1'){
	    $("#ocm-h").addClass('selected');
		$("#ocm-z").removeClass('selected');
		$("#ocm-c").removeClass('selected');
	}else if(obj=='2'){
	    $("#ocm-h").removeClass('selected');
		$("#ocm-z").addClass('selected');
		$("#ocm-c").removeClass('selected');
	}else if(obj=='3'){
	    $("#ocm-h").removeClass('selected');
		$("#ocm-z").removeClass('selected');
		$("#ocm-c").addClass('selected');
	}
	document.getElementById("grade").value = obj;
}
</script>

<?php  echo register_jssdk(false);?>
<script type="text/javascript">
wx.ready(function(){
	var shareData = {
		title: "<?php  echo $sharelink['title'];?> - <?php  echo $setting['sitename'];?> - <?php  echo $_W['account']['name'];?>",
		desc: "<?php  echo $sharelink['desc'];?>",
		link: "<?php  echo $shareurl;?>",
		imgUrl: "<?php  echo $_W['attachurl'];?><?php  echo $sharelink['images'];?>",
		trigger: function (res) {},
		complete: function (res) {},
		success: function (res) {},
		cancel: function (res) {},
		fail: function (res) {}
	};
	wx.onMenuShareTimeline(shareData);
	wx.onMenuShareAppMessage(shareData);
	wx.onMenuShareQQ(shareData);
	wx.onMenuShareWeibo(shareData);
	wx.onMenuShareQZone(shareData);
	
});
</script>

<?php  include $this->template('_footer');?>

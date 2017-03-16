<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
<head>
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
    <?php  echo register_jssdk(false);?>
    
    
<link rel="stylesheet" href="<?php echo CURR_THEME_DIR;?>css/public.css"/>
<link rel="stylesheet" href="<?php echo CURR_THEME_DIR;?>css/user.css"/>

<style>
.dianpu_main{width:100%; overflow:hidden;background: #ff6a00}
.dianpu_main dl{width:100%; overflow:hidden; position:relative; padding-top:20px;}
.dianpu_main dl p{ position:absolute; width:50px; height:35px;background-color:rgba(27,27,27,0.5); font-size:12px; line-height:35px; text-align:center; color:#FFF; right:5px; top:10px; border-radius:4px; }
.dianpu_main dl dt{width:100%; overflow:hidden;}
.dianpu_main dl dt img{ display:block; margin:auto; width:20%; border-radius:50%; }
.dianpu_main dl dd{width:100%; overflow:hidden;}
.dianpu_main dl dd span{ display:block; width:100%; overflow:hidden; font-size:14px; color:#FFF; text-align:center; line-height:20px; margin-top:10px;}
.dianpu_main dl dd em{ display:block; width:100%; overflow:hidden; margin-top:10px;}
.dianpu_main dl dd em img{ display:block; margin:auto; height:20px;}
.dianpu_main ul{width:100%; overflow:hidden;background-color:rgba(27,27,27,0.3); margin-top:20px;}
.dianpu_main ul li{ width:25%; float:left; height:50px; border-right:1px solid #bcbbbb; margin-left:-1px;}
.dianpu_main ul li span{ display:block; width:100%; overflow:hidden; text-align:center; font-size:12px; line-height:120%; color:#eeeeee; padding-top:10px;}
.dianpu_main ul li strong{ display:block; width:100%; overflow:hidden; text-align:center; font-size:14px; line-height:150%; color:#fff}
.back {
    left: 10px;
    top: 10px;
}
.update {
    cursor: pointer;
    border-radius: 100%;
    background: rgba(255, 255, 255, 0.15);
    width: 18px;
    height: 18px;
    padding: 8px;
    position: absolute;
    right: 10px;
    top: 10px;
    text-align: center;
}

.update img {
	    display: block;
    width: 18px;
    height: 18px;
}
.shezhiback{
	position: absolute;
    right: 10px;
    top: 10px;
}
.shezhi {
    cursor: pointer;
    border-radius: 100%;
    background: rgba(255, 255, 255, 0.15);
    width: 18px;
    height: 18px;
    padding: 8px;
    text-align: center;
}

.shezhi img {
	display: block;
    width: 18px;
    height: 18px;
}

a:visited {
    color: #ffffff;
}
a:active {
    color: #ffffff;
}
a:link {
    color: #ffffff;
}
</style>
<div class="dianpu_main">
    <dl>
        <a href="<?php  echo $this->createMobileUrl('MyCompanyInfo');?>" class="shezhiback">
            <div class="shezhi" style="background:rgba(0,0,0,.5);"><img src="<?php echo CURR_THEME_DIR;?>images/shezhi.png"></div>
         </a>
        <dt><img src="<?php echo $headimgurl ? $headimgurl : CURR_THEME_DIR.'images/u_header.png';?>" alt="<?php echo $company['name']!=''?$company['name']:'无';?>"></dt>
        <dd><span><?php  echo $company['name'];?></span></dd>
    </dl>
    <ul>
        <li class="bian"><span>我的积分</span><strong><?php  echo $member_arr['credit1'];?></strong></li>
        <li class="bian"><span>我的余额</span><strong><?php  echo $credit2;?></strong></li>
        <li class="bian"><span>帐户余额</span><strong><?php  echo $my_money;?></strong></li>
        <li class="bian"><span>当前身份</span><strong>企业</strong></li>
    </ul>
</div>

<div class="Wallet">
    <?php  if($company['isauth'] == 0) { ?>
    <a href="javascript:;" id="company_auth" style="margin-left:5px;"><em class="company_auth_not_icon"></em><dl class="b" style="margin-left:40px;"><dt style="color:#F33">马上认证</dt><dd>&nbsp;</dd></dl></a>
    <?php  } else { ?>
    <a href="javascript:;" style="margin-left:5px;"><em class="company_auth_icon"></em><dl class="b" style="margin-left:40px;"><dt style="color:#3C0">已认证</dt></dl></a>
    <?php  } ?>
    <a href="<?php  echo $this->createMobileUrl('MyCompanyInfo');?>" style="margin-left:5px;"><em class="company_info_icon"></em><dl class="b" style="margin-left:38px;"><dt>企业信息</dt><dd>&nbsp;</dd></dl></a>
    <a href="<?php  echo $this->createMobileUrl('my_recharge');?>" style="margin-left:5px;"><em class="chongzhi_icon"></em><dl class="b" style="margin-left:38px;"><dt>我要充值</dt><dd>&nbsp;</dd></dl></a>


	<a href="<?php  echo $this->createMobileUrl('MyPublicJob', array('companyid' => $company['id']));?>" style="margin-left:5px;"><em class="yifabu_icon"></em><dl class="b" style="margin-left:38px;"><dt>已发布职位</dt><dd>&nbsp;</dd></dl></a>
	<a href="<?php  echo $this->createMobileUrl('PublicIndex', array('type' => 1));?>" style="margin-left:5px;"><em class="fabu_icon"></em><dl class="b" style="margin-left:38px;"><dt>发布新职位</dt><dd>&nbsp;</dd></dl></a>
	
	
    <a href="<?php  echo $this->createMobileUrl('ComeApply', array('companyid' => $company['id']));?>" style="margin-left:5px;"><em class="company_person_icon"></em><dl class="b" style="margin-left:38px;"><dt>来应聘的</dt><dd>&nbsp;</dd></dl></a>
	<a href="<?php  echo $this->createMobileUrl('LogoutIdentity');?>" onClick="if(confirm('注销身份表示重新选择“求职者”或“招聘者”，确定注销?')){return true;}else{return false;}" style="margin-left:5px;"><em class="reg_agent_icon"></em><dl class="b" style="margin-left:38px;"><dt>注销身份</dt><dd>&nbsp;</dd></dl></a>
</div>

<link rel="stylesheet" href="<?php echo CURR_UI_DIR;?>weui/style/weui.css"/>
<style>
.weui_dialog_bd {
    padding: 20px 20px;
    font-size: 15px;
    color: #888;
    word-wrap: break-word;
    word-break: break-all;
}
</style>          
<div class="weui_dialog_confirm" id="div_company_auth" style="display:none;">
    <div class="weui_mask">&nbsp;</div>
    <div class="weui_dialog">
        <div class="weui_dialog_bd">
           认证方式：拨打电话认证、上传企业营业执照认证           
        </div>        
        <div class="weui_dialog_ft">
            <a href="tel:<?php  echo $telephone;?>" class="weui_btn_dialog default">拨打电话</a>
            <a href="<?php  echo $this->createMobileUrl('MyCompanyInfo');?>" class="weui_btn_dialog primary">上传执照</a>
        </div>
    </div>
</div> 
<script src="../addons/q_3354988381_rencai/amaze/assets/js/jquery.min.js"></script>
<script>
	$("#company_auth").click(function(){ 
		$("#div_company_auth").show();
	});						   
	$("#company_authclose").click(function(){ 
		$("#div_company_auth").hide();
	});
</script>
	 
<style>
.am-navbar_frame {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 49px;
    line-height: 49px;
    z-index: 1010;
}
</style>
<script language='javascript'> 
	jssdkconfig = <?php  echo json_encode($_W['account']['jssdkconfig']);?> || {};
	// 是否启用调试todo
	jssdkconfig.debug = false;
	jssdkconfig.jsApiList = [
		'hideOptionMenu', 'hideMenuItems'
	];
	wx.config(jssdkconfig);
	wx.ready(function () {
		//wx.hideOptionMenu();
		wx.hideMenuItems({
			menuList: [
				'menuItem:copyUrl'
			] 
		});		
	});
</script>
<iframe class="am-navbar_frame" src="<?php  echo $this->createMobileUrl('home_footer', array('curr_action' => $curr_action));?>" style="border:0"></iframe>   

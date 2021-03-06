<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title><?php  echo $hd['hdname'];?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
  <link rel="stylesheet" type="text/css" href="../addons/jy_signup/css/header.css">
  <link rel="stylesheet" type="text/css" href="../addons/jy_signup/css/notice.css">
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template(style, TEMPLATE_INCLUDEPATH)) : (include template(style, TEMPLATE_INCLUDEPATH));?>
  <style>
    .M_page {
        width:100%;
        background-color:#f8f8f8;
        -webkit-transform:none;
        color:#939393;
    }
    .M_detail {
        margin:7px 0 0;
    }
    .M_module {
        margin:7px 0 0;
    }
    .M_detail .mod_tab {
        height:30px;
        line-height:30px;
        width:95%;
        padding-left: 2%;
        overflow:hidden;
        color:#A2A2A2;
        font-size:12px;
    }
    .M_module .item-box {
        border-top: 1px solid #EAEAEA;
    }
    .M_module .item {
        background:#FFF;
        line-height: 35px;
        font-size: 12px;
        display: table;
        width: 100%;
        color:#666666;
        border-bottom: 1px solid #EAEAEA;
    }
    .M_module .item .input {
        font-size:13px;
        padding:10px 2px;
        width:95%;
        border: 0 none;
        margin-left: 10px
    }
    @media screen and (min-width: 414px){
      .M_module .item .input {
          font-size:13px;
          padding:10px 0;
          width:95%;
          border: 0 none;
          margin-left: 10px
      }
    }
    .M_module .item select {
        font-size:13px;
        padding:10px 0;
        width:95%;
        border: none;
        color: #a9a9a9;
        margin-left: 10px
    }
    .M_module .item .textarea {
        font-size:13px;
        padding:10px 0;
        border: 0 none;
        width: 95%;
    }
    .M_button {
        padding:10px;
    }
    .M_button .btn1 {
        width:100%;
        height:40px;
        line-height:40px;
        font-size:16px;
        color:#FFF;
        /*background:#46CEC0;*/
        text-align:center;
        border-radius: 4px;
        display:inline-block;
    }
    .M_button .btn2 {
        width:100%;
        height:40px;
        line-height:40px;
        font-size:16px;
        color:#FFF;
        background:#b8b8b8;
        text-align:center;
        border-radius: 4px;
        display:inline-block;
        margin-top:10px;
    }
    .M_result .result-btn {
        padding:20px 50px 20px;
    }
    .M_result .result-btn .btn {
        width: 100%;
        height: 40px;
        line-height: 40px;
        font-size: 16px;
        color: #FFF;
        /*background: #46CEC0;*/
        text-align: center;
        border-radius: 4px;
        display: inline-block;
    }
    .M_title {
        padding:10px 10px 0;
        font-size:16px;
        /*color:#46CEC0;*/
    }
    .M_result .result-icon {
        width:90px;
        height:80px;
        background:url("../addons/jy_signup/images/icon-result.png") no-repeat center center;
        background-size:45px;
        margin:0 auto;
    }
    .M_result .result-text {
        color:#828282;
        font-size:16px;
        line-height:150%;
        text-align: center;
    }
    #share{
      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,.8);
      display: none;
    }
    #share>img{width: 100%}
    input,select{outline: none;border:none;background:none;-webkit-appearance:none}
    /*#sex,#education{padding: 0 10px}*/
  </style>
 </head>
 <body>
    <header>
      <a href="javascript:history.go(-1)"><div class="navbar-btn floL"><img class="icon-back" src="../addons/jy_signup/images/header-back.png"></div></a>
      <a href="<?php  echo $this->createMobileUrl('geren')?>"><div class="navbar-btn floR"><img class="icon-back" src="../addons/jy_signup/images/header-person.png"></div></a>
      <h1 class="latecolorbg"><?php  if(!empty($sitem['aname'])) { ?><?php  echo $sitem['aname'];?><?php  } else { ?>报名<?php  } ?></h1>
    </header>

   <div class="M_page" id="wannago" style="-webkit-transform-origin: 0px 0px; opacity: 1; -webkit-transform: scale(1, 1)">
    <!-- 活动标题 -->
    <div class="M_title latecolor">
     <?php  echo $hd['hdname'];?>
    </div>
    <!-- 联系方式 -->
     <div class="M_detail M_module">
      <div class="mod_tab">
       <span>报名信息</span>
      </div>
      <div class="item-box">
       <div class="item">
       <?php  if(!empty($cy)) { ?>
        <input id="phone" name="mobile" mobilerule="" value="<?php  echo $cy['mobile'];?>" type="tel" placeholder="请输入手机号码" class="input" />
       <?php  } else { ?>
        <input id="phone" name="mobile" mobilerule="" value="<?php  echo $member['mobile'];?>" type="tel" placeholder="请输入手机号码" class="input" />
       <?php  } ?>
       </div>
       <div class="item">
       <?php  if(!empty($cy)) { ?>
        <input id="realName" name="name" value="<?php  echo $cy['nicheng'];?>" placeholder="请输入真实姓名" type="text" class="input" />
       <?php  } else { ?>
        <input id="realName" name="name" value="<?php  echo $member['nicheng'];?>" placeholder="请输入真实姓名" type="text" class="input" />
       <?php  } ?>
       </div>

       <!--kaishi -->
       <?php  if(is_array($ziliao)) { foreach($ziliao as $z) { ?>
       <div class="item">
        <?php  if($z['ziliao']=='mail') { ?>
        <input id="mail" name="mail" value="<?php  echo $cy['mail'];?>" placeholder="请输入邮箱<?php  if($z['enabled']==1) { ?>(必填)<?php  } ?>" type="text" class="input" />
        <?php  } ?>
        <?php  if($z['ziliao']=='qq') { ?>
        <input id="qq" name="qq" value="<?php  echo $cy['qq'];?>" placeholder="请输入QQ<?php  if($z['enabled']==1) { ?>(必填)<?php  } ?>" type="text" class="input" />
        <?php  } ?>
        <?php  if($z['ziliao']=='wechat') { ?>
        <input id="wechat" name="wechat" value="<?php  echo $cy['wechat'];?>" placeholder="请输入微信号<?php  if($z['enabled']==1) { ?>(必填)<?php  } ?>" type="text" class="input" />
        <?php  } ?>
        <?php  if($z['ziliao']=='weibo') { ?>
        <input id="weibo" name="weibo" value="<?php  echo $cy['weibo'];?>" placeholder="请输入微博帐号<?php  if($z['enabled']==1) { ?>(必填)<?php  } ?>" type="text" class="input" />
        <?php  } ?>
        <?php  if($z['ziliao']=='age') { ?>
        <input id="age" name="age" value="<?php  echo $cy['age'];?>" placeholder="请输入年龄<?php  if($z['enabled']==1) { ?>(必填)<?php  } ?>" type="text" class="input" />
        <?php  } ?>
        <?php  if($z['ziliao']=='sex') { ?>
        <!-- <input id="sex" name="sex" value="<?php  echo $cy['sex'];?>" placeholder="请输入性别<?php  if($z['enabled']==1) { ?>(必填)<?php  } ?>" type="text" class="input" /> -->
        <select id="sex" name="sex">
          <option value="0">请选择性别<?php  if($z['enabled']==1) { ?>(必选)<?php  } ?></option>
          <option value="男" <?php  if($cy['sex']=='男') { ?> selected <?php  } ?>>男</option>
          <option value="女" <?php  if($cy['sex']=='女') { ?> selected <?php  } ?>>女</option>
        </select>
        <?php  } ?>
        <?php  if($z['ziliao']=='company') { ?>
        <input id="company" name="company" value="<?php  echo $cy['company'];?>" placeholder="请输入公司名称<?php  if($z['enabled']==1) { ?>(必填)<?php  } ?>" type="text" class="input" />
        <?php  } ?>
        <?php  if($z['ziliao']=='education') { ?>
        <!-- <input id="education" name="education" value="<?php  echo $cy['education'];?>" placeholder="请输入学历<?php  if($z['enabled']==1) { ?>(必填)<?php  } ?>" type="text" class="input" /> -->
        <select id="education" name="education">
          <option value="0">请选择学历<?php  if($z['enabled']==1) { ?>(必选)<?php  } ?></option>
          <option value="博士" <?php  if($cy['education']=='博士') { ?> selected <?php  } ?>>博士</option>
          <option value="硕士" <?php  if($cy['education']=='硕士') { ?> selected <?php  } ?>>硕士</option>
          <option value="本科" <?php  if($cy['education']=='本科') { ?> selected <?php  } ?>>本科</option>
          <option value="专科" <?php  if($cy['education']=='专科') { ?> selected <?php  } ?>>专科</option>
          <option value="中学" <?php  if($cy['education']=='中学') { ?> selected <?php  } ?>>中学</option>
          <option value="小学" <?php  if($cy['education']=='小学') { ?> selected <?php  } ?>>小学</option>
          <option value="其他" <?php  if($cy['education']=='其他') { ?> selected <?php  } ?>>其他</option>
        </select>
        <?php  } ?>
       </div>
       <?php  } } ?>
       <!-- -->
      </div>
     </div>
     <!-- 说点啥 -->
     <div class="M_detail M_module">
      <div class="mod_tab">
       <span>评论</span>
      </div>
      <div class="item-box" style="line-height:100%;">
       <div class="item" style="line-height:100%;">
        <textarea class="textarea" name="saywhat" id="saywhat" placeholder="评论还没写？不可以呦~写下您对本次活动的期许，让小看更好地为您准备惊喜。"></textarea>
       </div>
      </div>
     </div>
     <div class="M_button">
      <a class="btn1 btn-buy s_save latecolorbg" href="javascript:submitFunc()">提交报名</a>
      <?php  if(!empty($cy)) { ?>
      <a href="javascript:noFunc();" class="btn2">我不参加了</a>
      <?php  } ?>
      <a href="<?php  echo $this->createMobileUrl('detail',array('id'=>$id))?>" class="btn2">取&nbsp;&nbsp;&nbsp;&nbsp;消</a>
     </div>

  <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template(footer, TEMPLATE_INCLUDEPATH)) : (include template(footer, TEMPLATE_INCLUDEPATH));?>
   </div>

   <div class="M_page" id="resultPage" style="display:none">
    <div class="M_result">
        <div class="result-icon"></div>
        <div class="result-text">
          恭喜！您已成功报名
          <br/><?php  echo $hd['hdname'];?>
        </div>

        <div class="result-btn">
          <a href="<?php  echo $this->createMobileUrl('myplan')?>" class="btn latecolorbg">查看我的报名</a>
        </div>
    </div>

    <div class="M_button">
      <a href="javascript:void(0);" class="btn1" id="shareBtn" style="margin-bottom:10px;">分享给好友</a>
      <a href="<?php  echo $this->createMobileUrl('index')?>" class="btn1">查看更多活动</a>
    </div>
  </div>

  <div id="share"><img src="../addons/jy_signup/images/favor_weixin.png"></div>

  <script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
  <script src="../addons/jy_signup/js/notice.js"></script>
  <script>
  window.onload = function(){
    var sex = $("#sex").val();
    var education = $("#education").val();
    if(sex == "0"){
      $("#sex").css("color","#a9a9a9");
    }else{
      $("#sex").css("color","#000");
    }
    if(education == "0"){
      $("#education").css("color","#a9a9a9");
    }else{
      $("#education").css("color","#000");
    }

  }
  $("#sex").change(function() {
    if($(this).val() == "0"){
      $("#sex").css("color","#a9a9a9");
    }else{
      $("#sex").css("color","#000");
    }
  });
  $("#education").change(function() {
    if($(this).val() == "0"){
      $("#education").css("color","#a9a9a9");
    }else{
      $("#education").css("color","#000");
    }
  });
  </script>
  <script>
  function submitFunc(){
    var phone = $("#phone").val();
    var realName = $("#realName").val();
    var pl = $("#saywhat").val();
    if(validatemobile(phone)){
      if(!realName){
        showNoticeFunc("请输入真实姓名");
      }
      else{
        var ziliao='';
        <?php  if(is_array($ziliao)) { foreach($ziliao as $z) { ?>
          <?php  if($z['ziliao']=='mail') { ?>
            var mail = $("#mail").val();
            <?php  if($z['enabled']==1) { ?>
              if(!mail){
                showNoticeFunc("请输入邮箱");
                return false;
              }
              if(!IsEmail(mail)){
                showNoticeFunc("邮箱格式不正确");
                return false;
              }
            <?php  } ?>
            ziliao+='&mail='+mail;
          <?php  } ?>
          <?php  if($z['ziliao']=='qq') { ?>
            var qq = $("#qq").val();
            <?php  if($z['enabled']==1) { ?>
              if(!qq){
                showNoticeFunc("请输入QQ");
                return false;
              }
            <?php  } ?>
            ziliao+='&qq='+qq;
          <?php  } ?>
          <?php  if($z['ziliao']=='wechat') { ?>
            var wechat = $("#wechat").val();
            <?php  if($z['enabled']==1) { ?>
              if(!wechat){
                showNoticeFunc("请输入微信号");
                return false;
              }
            <?php  } ?>
            ziliao+='&wechat='+wechat;
          <?php  } ?>
          <?php  if($z['ziliao']=='weibo') { ?>
            var weibo = $("#weibo").val();
            <?php  if($z['enabled']==1) { ?>
              if(!weibo){
                showNoticeFunc("请输入微博");
                return false;
              }
            <?php  } ?>
            ziliao+='&weibo='+weibo;
          <?php  } ?>
          <?php  if($z['ziliao']=='age') { ?>
            var age = $("#age").val();
            <?php  if($z['enabled']==1) { ?>
              if(!age){
                showNoticeFunc("请输入年龄");
                return false;
              }
            <?php  } ?>
            ziliao+='&age='+age;
          <?php  } ?>
          <?php  if($z['ziliao']=='company') { ?>
            var company = $("#company").val();
            <?php  if($z['enabled']==1) { ?>
              if(!company){
                showNoticeFunc("请输入公司名称");
                return false;
              }
            <?php  } ?>
            ziliao+='&company='+company;
          <?php  } ?>
          <?php  if($z['ziliao']=='sex') { ?>
            var sex = $("#sex").val();
            <?php  if($z['enabled']==1) { ?>
              if(sex == 0){
                showNoticeFunc("请选择性别");
                return false;
              }
            <?php  } ?>
            ziliao+='&sex='+sex;
          <?php  } ?>
          <?php  if($z['ziliao']=='education') { ?>
            var education = $("#education").val();
            <?php  if($z['enabled']==1) { ?>
              if(education == 0){
                showNoticeFunc("请选择学历");
                return false;
              }
            <?php  } ?>
            ziliao+='&education='+education;
          <?php  } ?>
        <?php  } } ?>
        $.post("<?php  echo $_W['siteroot'].'app/'.substr($this->createMobileUrl('signup',array('op'=>'add','id'=>$id)),2)?>"+"&mobile="+phone+"&nicheng="+realName+"&pl="+pl+ziliao,function(data){
            if (data == 1) {
                $("#wannago").hide();
                $("#resultPage").show();
            }
            else{
                showNoticeFunc("报名失败！");
            }
        });
      }
    }
  }

  function noFunc(){
    $.post("<?php  echo $_W['siteroot'].'app/'.substr($this->createMobileUrl('signup',array('op'=>'no','id'=>$id)),2)?>",function(data){
          if (data == 1) {
              showNoticeFunc("取消报名成功！");
              setTimeout(function(){
                  window.location.href="<?php  echo $_W['siteroot'].'app/'.substr($this->createMobileUrl('detail',array('id'=>$id)),2)?>";
              }, 1500);
          }
          else{
              showNoticeFunc("操作失败！");
          }
      });
  }

  $("#shareBtn").bind("click",function(){
    $("#share").show();
  });
  $("#share").bind("click",function(){
    $(this).hide();
  });

  //
  function validatemobile(mobile) {
      var myreg = /^1[345789]\d{9}$/;
      if(mobile.length==0) {
         showNoticeFunc('请输入手机号码！');
         return false;
      }
      if(mobile.length!=11 || !myreg.test(mobile)) {
          showNoticeFunc('请输入有效的手机号码！');
          return false;
      }
      return true;
  }
  function IsEmail(email){
    var str = email.trim();
    if(str.length!=0){
      reg=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
      if(!reg.test(str)){
          return false;
      }
    }
    return true;
  }
  </script>
  <?php  if($weixin==1) { ?>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

    <?php  $signPackage=$_W['account']['jssdkconfig'];?>
    <script>

        var appid = '<?php  echo $_W['account']['jssdkconfig']['appId'];?>';
        var timestamp = '<?php  echo $_W['account']['jssdkconfig']['timestamp'];?>';
        var nonceStr = '<?php  echo $_W['account']['jssdkconfig']['nonceStr'];?>';
        var signature = '<?php  echo $_W['account']['jssdkconfig']['signature'];?>';

        wx.config({
            debug: false,
            appId: appid,
            timestamp: timestamp,
            nonceStr: nonceStr,
            signature: signature,
            jsApiList: ['checkJsApi','onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ','onMenuShareWeibo',]
        });
    </script>
    <script type="text/javascript">
        var params = {
            <?php  if(empty($sitem['sharetitle'])) { ?>
            title:"活动管理",
            <?php  } else { ?>
            title: "<?php  echo $sitem['sharetitle'];?>",
            <?php  } ?>
            <?php  if(empty($sitem['sharedesc'])) { ?>
            desc: "活动管理!",
            <?php  } else { ?>
            desc: "<?php  echo $sitem['sharedesc'];?>",
            <?php  } ?>
            link: "<?php  echo $_W['siteroot'].'app/'.substr($this->createMobileUrl('index'),2)?>",
            <?php  if(empty($sitem['sharelogo'])) { ?>
            imgUrl: "<?php  echo $_W['siteroot'];?>addons/jy_signup/icon.jpg",
            <?php  } else { ?>
            imgUrl: "<?php  echo $_W['attachurl'];?><?php  echo $sitem['sharelogo'];?>",
            <?php  } ?>
        };
        wx.ready(function () {
            wx.showOptionMenu();
            wx.onMenuShareAppMessage.call(this, params);
            wx.onMenuShareTimeline.call(this, params);
        });
    </script>
    <?php  } ?>

 </body>
</html>
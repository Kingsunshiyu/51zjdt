<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>共有<?php  echo count($cy)?>位用户</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
  <link rel="stylesheet" type="text/css" href="../addons/jy_signup/css/header.css">
  <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template(style, TEMPLATE_INCLUDEPATH)) : (include template(style, TEMPLATE_INCLUDEPATH));?>
  <style>
  .city_users { background:#FFF; }
  .city_users li { padding:8px 10px 8px 15px; border-bottom:1px solid #EFEFEF; font-size:16px;color: #646464}
  .city_users li span{display: inline-block;height: 35px}
  .city_users li img{ width:40px; height:40px; border-radius:50%; margin-right:10px;vertical-align: middle;}
</style>
 </head>
 <body>
  <header>
    <a href="javascript:history.go(-1)"><div class="navbar-btn floL"><img class="icon-back" src="../addons/jy_signup/images/header-back.png"></div></a>
    <a href="<?php  echo $this->createMobileUrl('geren')?>"><div class="navbar-btn floR"><img class="icon-back" src="../addons/jy_signup/images/header-person.png"></div></a>
    <h1 class="latecolorbg"><?php  if(!empty($sitem['aname'])) { ?><?php  echo $sitem['aname'];?><?php  } else { ?>用户详情<?php  } ?></h1>
  </header>

  <div id="wrapper">
   <ul class="city_users">
   <?php  if(is_array($cy)) { foreach($cy as $row) { ?>
      <li>
        <?php  if(!empty($row['avatar'])) { ?>
        <img src="<?php  echo $row['avatar'];?>" width="40" height="40" />
        <?php  } else { ?>
        <?php  if(!empty($sitem['thumb'])) { ?>
          <img class="bm-user" src="<?php  echo $_W['attachurl'];?><?php  echo $sitem['thumb'];?>" width="40" height="40" />
        <?php  } else { ?>
          <img class="bm-user" src="../addons/jy_signup/images/no-50.png" width="40" height="40" />
        <?php  } ?>
        <?php  } ?>
        <span><?php  echo $row['nicheng'];?></span>
      </li>
   <?php  } } ?>
   </ul>
   <div style="height:30px"></div>
   <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template(footer, TEMPLATE_INCLUDEPATH)) : (include template(footer, TEMPLATE_INCLUDEPATH));?>
  </div>
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
            title: "<?php  echo $hd['hdname'];?>",
            <?php  if(empty($sitem['sharedesc'])) { ?>
            desc: "活动管理!",
            <?php  } else { ?>
            desc: "<?php  echo $sitem['sharedesc'];?>",
            <?php  } ?>
            link: "<?php  echo $_W['siteroot'].'app/'.substr($this->createMobileUrl('detail',array('id'=>$id)),2)?>",
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
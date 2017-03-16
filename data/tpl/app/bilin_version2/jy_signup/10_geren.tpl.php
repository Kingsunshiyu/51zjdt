<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>我</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
<link rel="stylesheet" type="text/css" href="../addons/jy_signup/css/header.css">
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template(style, TEMPLATE_INCLUDEPATH)) : (include template(style, TEMPLATE_INCLUDEPATH));?>
<style>
    li{list-style: none;}
    .mypage {
        text-align:center;
        padding:25px 0 0;
        position: relative;
        max-width: 480px;
        margin: 0 auto
    }
    .mypage .face img {
        width:60px;
        height:60px;
        border-radius:50%;
    }
    .mypage .name {
        font-size:19px;
        color:#444444;
        margin:10px 0;
    }
    .mypage .coin {
        font-size:14px;
        color:#E3C213;
        margin:10px 0;
    }
    .mypage .nav-list {
        border-top:1px solid #DFDFDF;
    }
    .mypage .nav-list li a {
        text-align:left;
        padding-left:50px;
        height:45px;
        line-height:45px;
        border-bottom:1px solid #DFDFDF;
        background-color:#FFF;
        background-position:10px center;
        background-size:25px 25px;
        background-repeat:no-repeat;
        font-size:16px;
        display:block;
        color: #000;
    }
    .mypage .nav-list li .nav-1 {
        background-image:url(../addons/jy_signup/images/nav-1.png);
    }
    .mypage .nav-list li .nav-2 {
        background-image:url(../addons/jy_signup/images/nav-2.png);
    }
    .mypage .nav-list li .nav-3 {
        background-image:url(../addons/jy_signup/images/nav-3.png);
    }
    .mypage .nav-list li .nav-4 {
        background-image:url(../addons/jy_signup/images/nav-4.png);
    }
    .mypage .out a {
        width:100%;
        height:45px;
        line-height:45px;
        border-top:1px solid #DFDFDF;
        border-bottom:1px solid #DFDFDF;
        color:#E84647;
        font-size:14px;
        background-color:#FFF;
        display:inline-block;
        margin:20px 0;
    }
</style>
</head>
<body>
    <header>
      <a href="javascript:history.go(-1);"><div class="navbar-btn floL"><img class="icon-back" src="../addons/jy_signup/images/header-back.png"></div></a>
      <a href="<?php  echo $this->createMobileUrl('geren')?>"><div class="navbar-btn floR"><img class="icon-back" src="../addons/jy_signup/images/header-person.png"></div></a>
      <h1 class="latecolorbg"><?php  if(!empty($sitem['aname'])) { ?><?php  echo $sitem['aname'];?><?php  } else { ?>个人中心<?php  } ?></h1>
    </header>

    <div class="mypage">
        <div class="face">
            <?php  if(!empty($member['avatar'])) { ?>
                <?php  if($weixin==1 && !empty($member['wechatid'])) { ?>
                    <a href="<?php  echo $_W['siteroot'].substr($this->createMobileUrl('userinfo',array('op'=>'geren')),2)?>"><img src="<?php  echo $member['avatar'];?>"></a>
                <?php  } else { ?>
                    <img src="<?php  echo $member['avatar'];?>">
                <?php  } ?>
            <?php  } else { ?>
              <?php  if(!empty($sitem['thumb'])) { ?>
                <img class="bm-user" src="<?php  echo $_W['attachurl'];?><?php  echo $sitem['thumb'];?>" />
              <?php  } else { ?>
                <img class="bm-user" src="../addons/jy_signup/images/no-50.png" />
              <?php  } ?>
            <?php  } ?>
        </div>
        <div class="name"><?php  echo $member['nicheng'];?><span class="sex-icon"></span></div>
        <!-- <div class="coin">金币：10</div> -->
        <div class="nav-list">
            <ul>
                <li>
                    <a class="nav-2" href="<?php  echo $this->createMobileUrl('index')?>">更多活动</a>
                </li>
                <li>
                    <a class="nav-1" href="<?php  echo $this->createMobileUrl('mycard')?>">我的电子券</a>
                </li>
                <li>
                    <a class="nav-3" href="<?php  echo $this->createMobileUrl('myplan')?>">我的报名</a>
                </li>
                <li>
                    <a class="nav-4" href="<?php  echo $this->createMobileUrl('mylike')?>">我的喜欢</a>
                </li>
                <?php  if(is_array($url)) { foreach($url as $item) { ?>
                <li>
                    <a style="background-image:url(<?php  echo $_W['attachurl'];?><?php  echo $item['thumb'];?>);" href="<?php  echo $item['url'];?>"><?php  echo $item['name'];?></a>
                </li>
                <?php  } } ?>
            </ul>
        </div>
        <div class="out">
            <a href="<?php  echo $this->createMobileUrl('change')?>" style="margin-bottom:0;">修改密码</a>
            <a href="<?php  echo $this->createMobileUrl('logout')?>">退出登录</a>
        </div>

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
            <?php  if(empty($sitem['sharetitle'])) { ?>
            title: "活动管理!",
            <?php  } else { ?>
            title: "<?php  echo $sitem['sharetitle'];?>",
            <?php  } ?>
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
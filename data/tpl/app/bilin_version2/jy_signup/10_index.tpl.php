<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php  if(!empty($sitem['title'])) { ?><?php  echo $sitem['title'];?><?php  } else { ?>报名活动<?php  } ?></title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>
<link rel="stylesheet" type="text/css" href="../addons/jy_signup/css/header.css">
<link rel="stylesheet" type="text/css" href="../addons/jy_signup/css/first.css">
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template(style, TEMPLATE_INCLUDEPATH)) : (include template(style, TEMPLATE_INCLUDEPATH));?>
</head>
<body>
<header>
    <a href="javascript:history.go(-1)"><div class="navbar-btn floL"><img class="icon-back" src="../addons/jy_signup/images/header-back.png"></div></a>
    <a href="<?php  echo $this->createMobileUrl('geren')?>"><div class="navbar-btn floR"><img class="icon-back" src="../addons/jy_signup/images/header-person.png"></div></a>
    <h1 class="latecolorbg"><?php  if(!empty($sitem['aname'])) { ?><?php  echo $sitem['aname'];?><?php  } else { ?>报名活动<?php  } ?></h1>
</header>

<div id="wrapper">
    <?php  if(is_array($hd)) { foreach($hd as $row) { ?>
    <a href="<?php  echo $this->createMobileUrl('detail',array('id'=>$row['id']))?>"><div class="wrapper-con">
        <div class="posiRela">
        <?php  $thumb = unserialize($row['thumb']);?>
            <img class="img-responsive" <?php  if(!empty($thumb['0'])) { ?> src="<?php  echo $_W['attachurl'];?><?php  echo $thumb['0'];?>" <?php  } else { ?> src="../addons/jy_signup/images/pic.jpg"<?php  } ?>/>
            <span class="tag"><?php  echo $row['catename'];?></span>
        </div>
        <div class="caption">
            <div class="caption-c">
                <h3><?php  echo $row['hdname'];?></h3>
                <ul class="icon-info">
                    <li><i class="icon-img icon-time"></i><?php  echo $row['time'];?></li>
                    <li><i class="icon-img icon-address"></i><?php  echo $row['address'];?></li>
                </ul>
            </div>
            <div class="bot-info">
                <?php  if($row['deadline']<time()) { ?>
                <div class="bot-btn1">活动结束</div>
                <?php  } else { ?>
                <div class="bot-btn latecolor lateborder">正在报名</div>
                <?php  } ?>
                <div class="bot-left">报名<span class="latecolor"><?php  echo $row['num'];?></span>人气 <span class="latecolor"><?php  echo $row['sc'];?></span>浏览 <span class="latecolor"><?php  echo $row['pv'];?></span></div>
            </div>
        </div>
    </div></a>
    <?php  } } ?>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template(footer, TEMPLATE_INCLUDEPATH)) : (include template(footer, TEMPLATE_INCLUDEPATH));?>

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

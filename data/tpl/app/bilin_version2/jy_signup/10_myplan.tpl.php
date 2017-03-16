<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html><html>
<head>
<meta charset="utf-8">
<title>我的报名</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
<link rel="stylesheet" type="text/css" href="../addons/jy_signup/css/header.css">
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template(style, TEMPLATE_INCLUDEPATH)) : (include template(style, TEMPLATE_INCLUDEPATH));?>
<style>
.no-data {
    width:79px;
    height:99px;
    margin:70px auto;
    background:url(../addons/jy_signup/images/no_data.png) no-repeat;
    background-size:79px 99px;
}
#wrapper {
    width:100%;
}
.content{width: 94%;position: relative;margin-top: 10px;margin-left: 3%}
.content>img{width: 100%;height:250px;}
.titleDiv{
    position: absolute;
    bottom: 0;
    width: 100%;
    padding: 4px 0;
    background-color: rgba(0,0,0,.6);
}
.title{
    width: 95%;
    margin-left: 10px;
    max-width: 480px;
    font-size: 18px;
    margin-bottom: 3px;
    overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
    color: #fff
}
.subTitle{
    margin-left: 10px;
    overflow: hidden;
    width: 95%;
    max-width: 480px;
    font-size: 14px;
    color: #fff
}
.subTitle>div:first-child{float: left;width: 80%;overflow: hidden; text-overflow: ellipsis; white-space: nowrap;}
.subTitle>div:last-child{float: left;width: 18%;overflow: hidden; text-overflow: ellipsis; white-space: nowrap;text-align: right;font-weight: bold;}
@media screen and (max-width:320px) {
    .content>img{height: 170px}
}
@media screen and (min-width: 321px) and (max-width: 374px) {
    .content>img{height: 220px}
}
@media screen and (min-width:480px) {
    #wrapper {
        width:480px;
        margin:0 auto;
        border-left:1px solid #ccc;
        border-right:1px solid #ccc;
    }
}
</style>
</head>
<body>
    <header>
      <a href="javascript:history.go(-1)"><div class="navbar-btn floL"><img class="icon-back" src="../addons/jy_signup/images/header-back.png"></div></a>
      <a href="<?php  echo $this->createMobileUrl('geren')?>"><div class="navbar-btn floR"><img class="icon-back" src="../addons/jy_signup/images/header-person.png"></div></a>
      <h1 class="latecolorbg"><?php  if(!empty($sitem['aname'])) { ?><?php  echo $sitem['aname'];?><?php  } else { ?>我的报名<?php  } ?></h1>
    </header>

    <div id="wrapper">
        <div class="container" style="margin-top:15px;">
            <?php  if(empty($hd)) { ?>
            <div class="no-data"></div>
            <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template(footer, TEMPLATE_INCLUDEPATH)) : (include template(footer, TEMPLATE_INCLUDEPATH));?>
            <?php  } else { ?>
            <!-- begin -->
            <?php  if(is_array($hd)) { foreach($hd as $row) { ?>
            <a href="<?php  echo $this->createMobileUrl('detail',array('id'=>$row['id']))?>"><div class="content">
                <?php  $thumb = unserialize($row['thumb']);?>
                <img <?php  if(!empty($thumb['0'])) { ?> src="<?php  echo $_W['attachurl'];?><?php  echo $thumb['0'];?>" <?php  } else { ?> src="../addons/jy_signup/images/pic.jpg"<?php  } ?>/>
                <div class="titleDiv">
                    <div class="title"><?php  echo $row['hdname'];?></div>
                    <div class="subTitle">
                        <div><?php  echo $row['address'];?></div>
                        <div class="latecolor"><?php  if($row['price']>0) { ?><?php  echo $row['price'];?><?php  } else { ?>免费<?php  } ?></div>
                    </div>
                </div>
            </div></a>
            <?php  } } ?>
            <!-- end -->
            <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template(footer, TEMPLATE_INCLUDEPATH)) : (include template(footer, TEMPLATE_INCLUDEPATH));?>
            <?php  } ?>
        </div>
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


</body></html>
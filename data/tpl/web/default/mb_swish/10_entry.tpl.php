<?php defined('IN_IA') or exit('Access Denied');?>﻿<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li class="active"><a href="<?php  echo $this->createWebUrl('entry');?>">模块介绍及使用说明</a></li>
</ul>
<div class="clearfix">
    <div class="alert alert-danger" style="line-height:1.8em;">
        <h4>样式新颖的语音祝福模块</h4>
        <p>
           流畅, 好玩. 快速引爆春节爆点 
        </p>
        <br>
        <h4>**模块设置需要注意**</h4>
        <p>
            因为需要保存大量录音记录, 和进行音频格式转换. 所以必须使用七牛云存储
        </p>
    </div>
    <div class="alert alert-info">
        <h4>活动参与形式</h4>
        <p>
            配置分享参数及存储参数, 添加关键字回复(订阅号和普通服务号)或自定义菜单开始游戏(认证服务号)
        </p>
    </div>
    <?php  if($_W['isfounder']) { ?>
    <div class="alert alert-warning">
        <h4>宣传和推广(此段内容只有创始人可以, 请多支持)</h4>
        <p>
            易福源码网 <a target="_blank" href="http://www.efwww.com">易福源码网
</a> 获取更多接地气的营销模块(方案), 精准粉丝营销模块
        </p>
    </div>
    <?php  } ?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>

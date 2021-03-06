<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<script type="text/javascript">
    function validate() {
     
        if ($(':checkbox[name="user[upload]"]:checked').val() == '1') {
            if ($.trim($(':text[name="user[access_key]"]').val()) == '') {
            Tip.focus(':text[name="user[access_key]"]', '请输入七牛 ACCESS_KEY !', 'top');
                    return false;
            }
            if ($.trim($(':text[name="user[secret_key]"]').val()) == '') {
            Tip.focus(':text[name="user[secret_key]"]', '请输入七牛 SECRET_KEY !', 'top');
                    return false;
            }
            if ($.trim($(':text[name="user[bucket]"]').val()) == '') {
            Tip.focus(':text[name="user[bucket]"]', '请输入七牛 BUCKET !', 'top');
                    return false;
            }
            if ($.trim($(':text[name="user[url]"]').val()) == '') {
            Tip.focus(':text[name="user[url]"]', '请输入七牛 URL !', 'top');
                    return false;
            }
        }
        <?php  if($_W['isfounder']) { ?>
            if ($(':radio[name="admin[upload]"]:checked').val() == '1') {
                if ($.trim($(':text[name="admin[access_key]"]').val()) == '') {
                Tip.focus(':text[name="admin[access_key]"]', '请输入七牛 ACCESS_KEY !', 'top');
                        return false;
                }
                if ($.trim($(':text[name="admin[secret_key]"]').val()) == '') {
                Tip.focus(':text[name="admin[secret_key]"]', '请输入七牛 SECRET_KEY !', 'top');
                        return false;
                }
                if ($.trim($(':text[name="admin[bucket]"]').val()) == '') {
                Tip.focus(':text[name="admin[bucket]"]', '请输入七牛 BUCKET !', 'top');
                        return false;
                }
            }
        <?php  } ?>
                return true;
    }
    $(function () {
        $(':checkbox[name="user[upload]"]').click(function () {
            if (this.checked) {
                if ($(this).val() == '0') {
                    $('.qiniu-params').hide();
                } else {

                    $('.qiniu-params').show();
                }
            }
        });

        $(':radio[name="admin[upload]"]').click(function () {
            if (this.checked) {
                if ($(this).val() == '0') {
                    $('.qiniu-params-admin').hide();
                } else {

                    $('.qiniu-params-admin').show();
                }
            }
        });

    });
</script>
<ul class="nav nav-tabs">
    <li class="active"><a href="javascript:;">七牛存储设置</a></li>
</ul>

<form method="post" class="form-horizontal form"  onsubmit="return validate();">

    <div class="panel panel-default">
        <div class="panel-heading">
           
             <a class="btn btn-success" href="<?php  echo $this->createWebUrl('qiniu')?>"> 存储设置</a>
             <a class="btn btn-default" href="<?php  echo $this->createWebUrl('fast')?>">快捷操作</a>
        </div>
        <div class="panel-body">

            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">系统存储设置</label>
                <div class="col-sm-9">
                    <div class='form-control-static'>
                        <?php  if($set['admin']['allow']==1) { ?>
                            <?php  if($set['user']['upload']==1) { ?>七牛<?php  } else { ?>本地<?php  } ?>
                            <?php  } else { ?>
                            <?php  if($set['admin']['upload']==1) { ?>七牛<?php  } else { ?>本地<?php  } ?>
                        <?php  } ?>
                    </div>
                </div>
            </div>
            <?php  if($set['admin']['allow']==1) { ?>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">开启七牛存储</label>
                <div class="col-sm-9">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="user[upload]" value="1" <?php  if($set['user']['upload']==1) { ?> checked="checked"<?php  } ?>/>
                               开启
                    </label>
                    <span class="help-block">开启七牛存储，不使用系统默认的存储方式, <a href="http://www.qiniu.com/" target="_blank">七牛存储</a></span>
                </div>

            </div>
            <div class="form-group qiniu-params" <?php  if(empty($set['user']['upload'])) { ?>style="display:none"<?php  } ?> >
                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">ACCESS_KEY</label>
                <div class="col-sm-9">   <input type="text" name="user[access_key]" class="form-control" value="<?php  echo $set['user']['access_key'];?>" autocomplete="off">
                	<span class="help-block"><a href="https://portal.qiniu.com/setting/key" target="_black">点击进入改页面，对应标示为AK</a></span>
                </div>
            </div>
            <div class="form-group qiniu-params" <?php  if(empty($set['user']['upload'])) { ?>style="display:none"<?php  } ?> >
                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">SECRET_KEY</label>
                <div class="col-sm-9">  <input type="text" name="user[secret_key]" class="form-control" value="<?php  echo $set['user']['secret_key'];?>" autocomplete="off"/>
                <span class="help-block"><a href="https://portal.qiniu.com/setting/key"  target="_black">点击进入改页面，对应标示为SK</a></span>
                </div>
            </div>

            <div class="form-group qiniu-params" <?php  if(empty($set['user']['upload'])) { ?>style="display:none"<?php  } ?> >
                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">BUCKET</label>
                <div class="col-sm-9"> <input type="text" name="user[bucket]" class="form-control" value="<?php  echo $set['user']['bucket'];?>" autocomplete="off"/>
                <span class="help-block"><a href="https://portal.qiniu.com/" target="_black">对应七牛空间的名称</a></span>
                </div>
            </div>

            <div class="form-group qiniu-params" <?php  if(empty($set['user']['upload'])) { ?>style="display:none"<?php  } ?> >
                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">URL</label>
                <div class="col-sm-9"> <input type="text" name="user[url]" class="form-control" value="<?php  echo $set['user']['url'];?>" autocomplete="off"/>
                <span class="help-block"><a href="https://portal.qiniu.com/bucket/setting/domain?bucket=<?php  echo $set['user']['bucket'];?>"  target="_black">对应空间的七牛域名</a></span>
                </div>
            </div>
 
            <div class="form-group qiniu-params">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                <div class="col-sm-9"> 
                    <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
                    <a href="http://www.qiniu.com/" target="_blank" class="btn btn-default" >七牛存储</a>
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                </div>
            </div>
            
            
            <?php  } ?>
        </div>
    </div>


    <?php  if($_W['isfounder']) { ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            管理员存储设置
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">允许客户自定义七牛路径</label>
                <div class="col-sm-9">
                    <label class="radio-inline">
                        <input type="radio" name="admin[allow]" value="0" <?php  if(empty($set['admin']['allow'])) { ?> checked="checked"<?php  } ?>/>
                               不允许
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="admin[allow]" value="1" <?php  if($set['admin']['allow']) { ?> checked="checked"<?php  } ?>/>
                               允许
                    </label>
                    <span class="help-block">是否允许客户自定义七牛空间</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">默认存储设置</label>
                <div class="col-sm-9">
                    <label class="radio-inline">
                        <input type="radio" name="admin[upload]" value="0" <?php  if(empty($set['admin']['upload'])) { ?> checked="checked"<?php  } ?>/>
                               本地存储
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="admin[upload]" value="1" <?php  if($set['admin']['upload']) { ?> checked="checked"<?php  } ?>/>
                               七牛存储
                    </label>
                    <span class="help-block">默认宝贝图片存储方式</span>
                </div>
            </div>
            <div class="form-group qiniu-params-admin" <?php  if(empty($set['admin']['upload'])) { ?>style="display:none"<?php  } ?> >
                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">ACCESS_KEY</label>
                <div class="col-sm-9">   <input type="text" name="admin[access_key]" class="form-control" value="<?php  echo $set['admin']['access_key'];?>" autocomplete="off">
                <span class="help-block"><a href="https://portal.qiniu.com/setting/key">点击进入改页面，对应标示为AK</a></span>
                </div>
            </div>
            <div class="form-group qiniu-params-admin" <?php  if(empty($set['admin']['upload'])) { ?>style="display:none"<?php  } ?> >
                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">SECRET_KEY</label>
                <div class="col-sm-9">  <input type="text" name="admin[secret_key]" class="form-control" value="<?php  echo $set['admin']['secret_key'];?>" autocomplete="off"/>
                <span class="help-block"><a href="https://portal.qiniu.com/setting/key">点击进入改页面，对应标示为SK</a></span>
                </div>
            </div>

            <div class="form-group qiniu-params-admin" <?php  if(empty($set['admin']['upload'])) { ?>style="display:none"<?php  } ?> >
                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">BUCKET</label>
                <div class="col-sm-9"> <input type="text" name="admin[bucket]" class="form-control" value="<?php  echo $set['admin']['bucket'];?>" autocomplete="off"/>
                <span class="help-block"><a href="https://portal.qiniu.com/">对应七牛空间的名称</a></span>
                </div>
            </div>
            <div class="form-group qiniu-params-admin" <?php  if(empty($set['admin']['upload'])) { ?>style="display:none"<?php  } ?> >
                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">URL</label>
                <div class="col-sm-9"> <input type="text" name="admin[url]" class="form-control" value="<?php  echo $set['admin']['url'];?>" autocomplete="off"/>
                <span class="help-block"><a href="https://portal.qiniu.com/bucket/setting/domain?bucket=<?php  echo $set['user']['bucket'];?>">对应空间的七牛域名</a></span>
                </div>
            </div>
 
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
            <div class="col-sm-9">
                <input type="submit" name="submit_admin" value="提交" class="btn btn-primary col-lg-1" />
                &nbsp;&nbsp;
                <a href="http://www.qiniu.com/" target="_blank" class="btn btn-default">去七牛存储</a>
                <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
            </div>
        </div>
    </div>
 
    <?php  } ?>
    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
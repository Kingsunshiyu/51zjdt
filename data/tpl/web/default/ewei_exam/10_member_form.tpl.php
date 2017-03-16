<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">		
        <li><a href="<?php  echo $this->createWebUrl('member');?>">用户列表</a></li>
        <li<?php  if($op=='edit' && empty($id)) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('member',array('op'=>'edit'));?>">添加用户</a></li>
        <?php  if($op=='edit' && !empty($id)) { ?><li class="active"><a href="<?php  echo $this->createWebUrl('member',array('op'=>'edit','id'=>$id));?>">编辑用户</a></li><?php  } ?>
    </ul>
    <form action="" class="form-horizontal form" method="post" onsubmit="return formcheck()">
        <input type="hidden" name="id" value="<?php  echo $item['id'];?>">
        <div class="panel panel-default">
            <div class="panel-heading">
                用户基本信息
            </div>
            <div class="panel-body">
                 <?php  if(!empty($item)) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">上级分类</label>
                    <div class="col-sm-9 col-xs-12 control-label" style="text-align:left;"><?php  echo $item['from_user'];?></div>
                </div>
                <?php  } ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">姓名</label>
                    <div class="col-sm-9 col-xs-12 control-label">
                        <input type="text" name="username" id="username" value="<?php  echo $item['username'];?>" class="form-control">
                    </div>
                </div>
                <?php  if($this->_set_info['login_flag'] == 1) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">用户名</label>
                    <div class="col-sm-9 col-xs-12 control-label">
                        <input type="text" name="userid" id="userid" value="<?php  echo $item['userid'];?>" class="form-control">
                    </div>
                </div>
                <?php  } ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">手机</label>
                    <div class="col-sm-9 col-xs-12 control-label">
                        <input type="text" name="mobile" id="mobile" value="<?php  echo $item['mobile'];?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">邮箱</label>
                    <div class="col-sm-9 col-xs-12 control-label">
                        <input type="text" name="email" id="email" value="<?php  echo $item['email'];?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">状态</label>
                    <div class="col-sm-9 col-xs-12">
                         <label class="radio-inline">
                    		<input type="radio" name="status" value="1" <?php  if($item['status'] == 1) { ?>checked<?php  } ?>/>启用
                    	</label>
                    	<label class="radio-inline">
                    		<input type="radio" name="status" value="0" <?php  if($item['status'] == 0) { ?>checked<?php  } ?>/>禁用
                    	</label>
                    	<span class='help-block'>禁用以后用户无法登录</span>
                    </div>
                </div>
            </div>
        </div>
 		<div class="form-group col-sm-12">
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
    </form>

    <script type="text/javascript">
        //kindeditor($('.richtext-clone'));
        function formcheck() {

            if ($("#username").isEmpty()) {
                Tip.select("username", "请填写姓名!", "right");
                return false;
            }

            <?php  if($this->_set_info['login_flag'] == 1) { ?>
            if ($("#userid").isEmpty()) {
                Tip.select("userid", "请填写用户名!", "right");
                return false;
            }
            <?php  } ?>

            if (!$("#mobile").isMobile()) {
                Tip.select("mobile", "请填写正确的手机!", "right");
                return false;
            }
            return true;
        }
    </script>


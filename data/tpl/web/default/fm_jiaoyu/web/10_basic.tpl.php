<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li class="active"><a href="#">基本设置</a></li>
    <!--li <?php  if(($_GPC['do'] == 'upgrade')) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('upgrade')?>">在线升级</a></li-->
</ul>
<style>
     .item_box img{
         width: 100%;
         height: 100%;
     }
</style>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">
                模版消息通知
            </div>
			 <?php  if($_W['isfounder']) { ?>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否开启模版消息</label>
                    <div class="col-sm-9">
                        <label for="isshow1" class="radio-inline"><input type="radio" name="istplnotice" value="1" id="isshow1" <?php  if($setting['istplnotice'] == 1) { ?>checked="true"<?php  } ?> /> 是</label>
                        &nbsp;&nbsp;&nbsp;
                        <label for="isshow2" class="radio-inline"><input type="radio" name="istplnotice" value="0" id="isshow2"  <?php  if(empty($setting) || $setting['istplnotice'] == 0) { ?>checked="true"<?php  } ?> /> 否</label>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">平台管理方式</label>
                    <div class="col-sm-9">
                        <label for="isshow3" class="radio-inline"><input type="radio" name="guanli" value="1" id="isshow3" <?php  if($setting['guanli'] == 1) { ?>checked="true"<?php  } ?> />管理员统一方式</label>
                        &nbsp;&nbsp;&nbsp;
                        <label for="isshow4" class="radio-inline"><input type="radio" name="guanli" value="0" id="isshow4"  <?php  if(empty($setting) || $setting['guanli'] == 0) { ?>checked="true"<?php  } ?> />自由管理</label>
                        <span class="help-block">自由管理：所有账户自由管理平台功能,自由添加学校</br>管理员管理：非管理员账户无法查看平台功能，只允许管理员添加学校</span>
                    </div>
                </div>				
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">学生请假申请ID</label>
                    <div class="col-sm-9">
                        <input type="text" name="xsqingjia" value="<?php  echo $setting['xsqingjia'];?>" class="form-control"/>
                        <div class="help-block">
                            在模板库选择<span style="color:red;">教育－院校</span>，搜索“<span style="color:red;">学生请假申请</span>”编号为TM00190的模板
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">学生请假审核通知ID</label>
                    <div class="col-sm-9">
                        <input type="text" name="xsqjsh" value="<?php  echo $setting['xsqjsh'];?>" class="form-control"/>
                        <div class="help-block">
                            在模板库选择<span style="color:red;">教育－院校</span>，搜索“<span style="color:red;">请假审核通知</span>”编号为OPENTM200864357的模板
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">教员请假申请体提醒ID</label>
                    <div class="col-sm-9">
                        <input type="text" name="jsqingjia" value="<?php  echo $setting['jsqingjia'];?>" class="form-control"/>
                        <div class="help-block">
                            在模板库选择<span style="color:red;">教育－院校</span>，搜索“<span style="color:red;">请假审核提醒</span>”编号为OPENTM203328559的模板
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">教员请假审核通知ID</label>
                    <div class="col-sm-9">
                        <input type="text" name="jsqjsh" value="<?php  echo $setting['jsqjsh'];?>" class="form-control"/>
                        <div class="help-block">
                            在模板库选择<span style="color:red;">教育－院校</span>，搜索“<span style="color:red;">请假审批结果通知</span>”编号为OPENTM207256255的模板
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">学校通知ID</label>
                    <div class="col-sm-9">
                        <input type="text" name="xxtongzhi" value="<?php  echo $setting['xxtongzhi'];?>" class="form-control"/>
                        <div class="help-block">
                            在模板库选择<span style="color:red;">教育－院校</span>，搜索“<span style="color:red;">学校通知</span>”编号为OPENTM204845041的模板
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">放学和班级通知ID</label>
                    <div class="col-sm-9">
                        <input type="text" name="bjtz" value="<?php  echo $setting['bjtz'];?>" class="form-control"/>
                        <div class="help-block">
                            在模板库选择<span style="color:red;">教育－院校</span>，搜索“<span style="color:red;">班级通知</span>”编号为OPENTM204533457的模板
                        </div>
                    </div>
                </div>				
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">家长留言ID</label>
                    <div class="col-sm-9">
                        <input type="text" name="liuyan" value="<?php  echo $setting['liuyan'];?>" class="form-control"/>
                        <div class="help-block">
                            在模板库选择<span style="color:red;">教育－院校</span>，搜索“<span style="color:red;">留言提醒</span>”编号为OPENTM202309749的模板
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">教师回复家长留言ID</label>
                    <div class="col-sm-9">
                        <input type="text" name="liuyanhf" value="<?php  echo $setting['liuyanhf'];?>" class="form-control"/>
                        <div class="help-block">
                            在模板库选择<span style="color:red;">教育－院校</span>，搜索“<span style="color:red;">家长意见回复通知</span>”编号为OPENTM205211081的模板
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">作业提醒ID</label>
                    <div class="col-sm-9">
                        <input type="text" name="zuoye" value="<?php  echo $setting['zuoye'];?>" class="form-control"/>
                        <div class="help-block">
                            在模板库选择<span style="color:red;">教育－院校</span>，搜索“<span style="color:red;">作业消息提醒</span>”编号为OPENTM207873178的模板
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">班级圈审核结果通知ID</label>
                    <div class="col-sm-9">
                        <input type="text" name="bjqshjg" value="<?php  echo $setting['bjqshjg'];?>" class="form-control"/>
                        <div class="help-block">
                            在模板库选择<span style="color:red;">教育－院校</span>，搜索“<span style="color:red;">审核结果通知</span>”编号为OPENTM400501478的模板
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">班级圈审核提醒ID</label>
                    <div class="col-sm-9">
                        <input type="text" name="bjqshtz" value="<?php  echo $setting['bjqshtz'];?>" class="form-control"/>
                        <div class="help-block">
                            在模板库选择<span style="color:red;">教育－院校</span>，搜索“<span style="color:red;">审核提醒</span>”编号为OPENTM400047769的模板
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">到校离校提醒</label>
                    <div class="col-sm-9">
                        <input type="text" name="jxlxtx" value="<?php  echo $setting['jxlxtx'];?>" class="form-control"/>
                        <div class="help-block">
                            在模板库选择<span style="color:red;">教育－院校</span>，搜索“<span style="color:red;">到校离校提醒</span>”编号为TM00188的模板
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">缴费结果通知</label>
                    <div class="col-sm-9">
                        <input type="text" name="jfjgtz" value="<?php  echo $setting['jfjgtz'];?>" class="form-control"/>
                        <div class="help-block">
                            在模板库选择<span style="color:red;">教育－院校</span>，搜索“<span style="color:red;">校园缴费结果通知</span>”编号为OPENTM401619319的模板
                        </div>
                    </div>
                </div>				
            </div>
        </div>
		<div class="panel panel-default">
			<div class="panel-heading">
				给开发者建议或留言
			</div>
			<div class="panel-body">
			<div class="row-fluid">
				<div class="span8 control-group">
					【本部分仅创始人可见，不必担心客户或其他管理员能看到】有何建议或BUG请直接提交  联系开发者QQ:<a href="tencent://message/?uin=332035136&Site=qq&Menu=yes">332035136</a> 工作日时间（周一 - 周日 12：00 - 24：00）请直接Q我!其他时间勿扰。
				</div>
			</div>
			</div>
		</div>	
		<?php  } else { ?>
		<div class="panel panel-default">
			<div class="panel-heading">
			     抱歉：
			</div>
			<div class="panel-body">
			<div class="row-fluid">
				<div class="span8 control-group">
					【你没有权限查看本页面，请联系管理员进行操作】
				</div>
			</div>
			</div>
		</div>
        <?php  } ?>
        <?php  if($_W['isfounder']) { ?>		
        <div class="form-group col-sm-12">
            <input type="hidden" name="id" value="<?php  echo $setting['id'];?>" />
            <input type="submit" name="submit" value="提交保存" class="btn btn-primary col-lg-1" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
	    <input type="hidden" name="id" value="<?php  echo $setting['id'];?>" />
		<?php  } ?>
	</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
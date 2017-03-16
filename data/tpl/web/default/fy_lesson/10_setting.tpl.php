<?php defined('IN_IA') or exit('Access Denied');?><!-- 
 * 参数设置
 * ============================================================================
 * ============================================================================
-->

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li <?php  if($op=='display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('setting');?>">基本设置</a></li>
	<li <?php  if($op=='templatemsg') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('setting', array('op'=>'templatemsg'));?>">模版消息</a></li>
	<li <?php  if($op=='vipservice') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('setting', array('op'=>'vipservice'));?>">会员服务</a></li>
	<li <?php  if($op=='banner') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('setting', array('op'=>'banner'));?>">首页幻灯片</a></li>
	<li <?php  if($op=='savetype') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('setting', array('op'=>'savetype'));?>">存储方式</a></li>
</ul>
<style>
.item_box img{
	width: 100%;
	height: 100%;
}
.focus-setting{
	border-bottom:1px #428BCA dashed;
	padding-bottom:20px;
}
</style>
<?php  if($op=='display') { ?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">基本设置</div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">网站名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="sitename" value="<?php  echo $setting['sitename'];?>" class="form-control"/>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">网站版权</label>
                    <div class="col-sm-9">
                        <input type="text" name="copyright" value="<?php  echo $setting['copyright'];?>" class="form-control"/>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">网站logo</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('logo', $setting['logo']);?>
						<span class="help-block">建议尺寸150px * 70px，建议格式PNG</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">首页课程显示</label>
                    <div class="col-sm-9">
                        <label class="radio-inline"><input type="radio" name="lessonshow" value="1" <?php  if($setting['lessonshow']==1) { ?>checked<?php  } ?> /> 一行显示一个课程</label>
                        &nbsp;
                        <label class="radio-inline"><input type="radio" name="lessonshow" value="2" <?php  if($setting['lessonshow']==2) { ?>checked<?php  } ?> /> 一行显示两个课程</label>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">菜单显示方式</label>
                    <div class="col-sm-9">
                        <label class="radio-inline"><input type="radio" name="footnav" value="0" <?php  if($setting['footnav']==0) { ?>checked<?php  } ?> /> 底部菜单</label>
                        &nbsp;
                        <label class="radio-inline"><input type="radio" name="footnav" value="1" <?php  if($setting['footnav']==1) { ?>checked<?php  } ?> /> 悬浮菜单</label>
                        <span class="help-block">该菜单显示在前台手机端，默认为底部菜单</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">购买课程需完善信息</label>
                    <div class="col-sm-9">
                        <label class="radio-inline"><input type="radio" name="mustinfo" value="0" <?php  if($setting['mustinfo']==0) { ?>checked<?php  } ?> /> 无须</label>
                        &nbsp;
                        <label class="radio-inline"><input type="radio" name="mustinfo" value="1" <?php  if($setting['mustinfo']==1) { ?>checked<?php  } ?> /> 必须</label>
                        <span class="help-block">该选项指用户在购买课程前是否需要完善手机号码和姓名信息</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">引导关注</label>
                    <div class="col-sm-9">
						<label class="radio-inline"><input type="radio" name="isfollow" value="1" <?php  if($setting['isfollow']==1) { ?>checked<?php  } ?> /> 开启</label>
						&nbsp;
                        <label class="radio-inline"><input type="radio" name="isfollow" value="0" <?php  if($setting['isfollow']==0) { ?>checked<?php  } ?> /> 关闭</label>
                        <span class="help-block"><strong></strong>开启引导关注公众号，未关注公众号的用户访问首页和课程页面时，顶部将出现引导关注公众号信息</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">公众号二维码</label>
                    <div class="col-sm-9">
						<?php  echo tpl_form_field_image('qrcode', $setting['qrcode']);?>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">会员推广海报</label>
                    <div class="col-sm-9">
						<?php  echo tpl_form_field_image('posterbg', $setting['posterbg']);?>
						<span class="help-block">宽度:640 px，高度:940 px，处理技巧：从PS导出图片时，要导出为WEB所用格式(快捷键是：ctrl+shift+alt+s)，将会大大减少图片所占内存大小，提高用户打开速度！&nbsp;&nbsp;&nbsp;模版海报下载:链接: https://pan.baidu.com/s/1eS5L7PK 密码: p52c</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">管理员openid</label>
					<div class="col-sm-9">
						<input type="text" name="manageopenid" value="<?php  echo $setting['manageopenid'];?>" class="form-control">
						<div class="help-block">
							新订单提醒管理员，多个管理员openid之间用英文状态逗号“,”隔开
						</div>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">未付款订单关闭间隔</label>
					<div class="col-sm-9">
						<div class="input-group">
                            <input type="text" name="closespace" value="<?php  echo $setting['closespace'];?>" class="form-control">
                            <span class="input-group-addon">分钟</span>
                        </div>
						<div class="help-block">
							默认为60分钟，0表示不自动关闭未付款订单
						</div>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">讲师分成</label>
                    <div class="col-sm-9">
						<div class="input-group">
                            <input type="text" name="teacher_income" value="<?php  echo $setting['teacher_income'];?>" class="form-control">
                            <span class="input-group-addon">%</span>
                        </div>
						<div class="help-block">
							留空或0表示关闭用户申请讲师，例如设为40%，即表示用户申请讲师后，该用户的课程每次出售都以出售价格的40%作为讲师的收入。<br/> 为了确保课程的质量，请讲师把课程给网站进行发布。
						</div>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">VIP会员购买课程折扣</label>
                    <div class="col-sm-9">
						<div class="input-group">
                            <input type="text" name="vipdiscount" value="<?php  echo $setting['vipdiscount'];?>" class="form-control">
                            <span class="input-group-addon">%</span>
                        </div>
						<div class="help-block">
							留空或0表示关闭所有课程对VIP会员折扣价
						</div>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">超时自动好评</label>
                    <div class="col-sm-9">
						<div class="input-group">
                            <input type="text" name="autogood" value="<?php  echo $setting['autogood'];?>" class="form-control">
                            <span class="input-group-addon">天</span>
                        </div>
						<div class="help-block">
							0或留空表示关闭自动好评(自购买课程日起，超过该期限未评价课程将自动好评)
						</div>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">打印视频错误信息</label>
                    <div class="col-sm-9">
                        <label class="radio-inline"><input type="radio" name="print_error" value="1" <?php  if($setting['print_error']==1) { ?>checked<?php  } ?> /> 开启</label>
                        &nbsp;
                        <label class="radio-inline"><input type="radio" name="print_error" value="0" <?php  if($setting['print_error']==0) { ?>checked<?php  } ?> /> 关闭</label>
                        <span class="help-block">前台无法播放视频时，可开启该选项输出错误信息，平时请关闭。</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group col-sm-12">
            <input type="hidden" name="id" value="<?php  echo $setting['id'];?>" />
            <input type="submit" name="submit" value="保存设置" class="btn btn-primary col-lg-1" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
	</form>
</div>

<?php  } else if($op=='templatemsg') { ?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">
                模版消息通知 (所在行业：IT科技/互联网|电子商务，IT科技/IT软件与服务)
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否开启</label>
                    <div class="col-sm-9">
                        <label class="radio-inline"><input type="radio" name="istplnotice" value="1" id="isshow1" <?php  if($setting['istplnotice'] == 1) { ?>checked="true"<?php  } ?> /> 是</label>
                        &nbsp;
                        <label class="radio-inline"><input type="radio" name="istplnotice" value="0" id="isshow2"  <?php  if(empty($setting) || $setting['istplnotice'] == 0) { ?>checked="true"<?php  } ?> /> 否</label>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">用户购买成功通知</label>
                    <div class="col-sm-9">
                        <input type="text" name="buysucc" value="<?php  echo $setting['buysucc'];?>" class="form-control"/>
                        <div class="help-block">
                            【留空为关闭该通知】用户购买VIP服务或课程成功后模版消息通知，选择编号TM00001(购买成功通知)
                        </div>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">用户会员服务过期</label>
                    <div class="col-sm-9">
                        <input type="text" name="pastvip" value="<?php  echo $setting['pastvip'];?>" class="form-control"/>
                        <div class="help-block">
                            【留空为关闭该通知】用户VIP服务过期提醒，选择编号OPENTM207718900(会员过期提醒)
                        </div>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">佣金提醒</label>
                    <div class="col-sm-9">
                        <input type="text" name="cnotice" value="<?php  echo $setting['cnotice'];?>" class="form-control"/>
                        <div class="help-block">
                            【留空为关闭该通知】下级购买课程时，上级获得佣金提醒，选择编号OPENTM201812627(佣金提醒)
                        </div>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">下级代理商加入提醒</label>
                    <div class="col-sm-9">
                        <input type="text" name="newjoin" value="<?php  echo $setting['newjoin'];?>" class="form-control"/>
                        <div class="help-block">
                            【留空为关闭该通知】成功推荐下级加入时，给推荐上级提醒，选择编号OPENTM405761879(下级代理商加入提醒)
                        </div>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">课程通知</label>
                    <div class="col-sm-9">
                        <input type="text" name="newlesson" value="<?php  echo $setting['newlesson'];?>" class="form-control"/>
                        <div class="help-block">
                            【留空为关闭该通知】讲师新开课程后，给关注该讲师的学员发送消息，选择编号OPENTM400221044(课程通知)
                        </div>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">订单通知(管理员)</label>
                    <div class="col-sm-9">
                        <input type="text" name="neworder" value="<?php  echo $setting['neworder'];?>" class="form-control"/>
                        <div class="help-block">
                            【留空为关闭该通知】用户下新订单后通知管理员，选择编号OPENTM206930158(订单通知)
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group col-sm-12">
            <input type="hidden" name="id" value="<?php  echo $setting['id'];?>" />
            <input type="submit" name="submit" value="保存设置" class="btn btn-primary col-lg-1" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
	</form>
</div>

<?php  } else if($op=='vipservice') { ?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">购买会员服务</div>
            <div class="panel-body">
				<?php  if(is_array($vip)) { foreach($vip as $k=>$v) { ?>
				<div class="form-group item">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">套餐<?php  echo $k+1;?></label>
					<div class="col-sm-4">
						<div class="input-group">
							<span class="input-group-addon">充</span><input type="text" name="viptime[]" value="<?php  echo $v['viptime'];?>" class="form-control"><span class="input-group-addon">月</span><span class="input-group-addon">需</span><input type="text" name="vipmoney[]" value="<?php  echo $v['vipmoney'];?>" class="form-control"><span class="input-group-addon">元</span>
						</div>
					</div>
				</div>
				<?php  } } ?>
				<div id="vipdiv">
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<a href="javascript:;" id="vip-add"><i class="fa fa-plus-circle"></i> 添加套餐列表</a>
					</div>
				</div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">会员服务描述</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_ueditor('vipdesc', $setting['vipdesc']);?>
                        <div class="help-block">
                            该描述不为空时，会显示在前台手机端“VIP服务”页面，尽量仅填写文字而不包含图品、音视频等其他多媒体元素。
                        </div>
                    </div>
                </div>
			</div>
        </div>

        <div class="form-group col-sm-12">
            <input type="hidden" name="id" value="<?php  echo $setting['id'];?>" />
            <input type="submit" name="submit" value="保存设置" class="btn btn-primary col-lg-1" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
	</form>
</div>
<script type="text/javascript">
$("#vip-add").click(function(){
	var chtml = '';
	chtml += '<div class="form-group item">';
	chtml += '	<label class="col-xs-12 col-sm-3 col-md-2 control-label">新套餐</label>';
	chtml += '	<div class="col-sm-4">';
	chtml += '		<div class="input-group">';
	chtml += '			<span class="input-group-addon">充</span><input type="text" name="viptime[]" class="form-control"><span class="input-group-addon">月</span><span class="input-group-addon">需</span><input type="text" name="vipmoney[]" class="form-control"><span class="input-group-addon">元</span>';
	chtml += '		</div>';
	chtml += '	</div>';
	chtml += '</div>';

	$("#vipdiv").append(chtml);
});
</script>

<?php  } else if($op=='banner') { ?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">
                首页幻灯片
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">幻灯片1</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image("banner[0][img]", $banner[0]['img']);?>
						<span>建议尺寸580px * 228px</span>
                    </div>
                </div>
				<div class="form-group focus-setting">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">幻灯片链接1</label>
                    <div class="col-sm-9">
                        <input type="text" name="banner[0][link]" value="<?php  echo $banner[0]['link'];?>" class="form-control"/>
						<span>请填写完整URL地址，包括http://</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">幻灯片2</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image("banner[1][img]", $banner[1]['img']);?>
						<span>建议尺寸580px * 228px</span>
                    </div>
                </div>
				<div class="form-group focus-setting">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">幻灯片链接2</label>
                    <div class="col-sm-9">
                        <input type="text" name="banner[1][link]" value="<?php  echo $banner[1]['link'];?>" class="form-control"/>
						<span>请填写完整URL地址，包括http://</span>
					</div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">幻灯片3</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image("banner[2][img]", $banner[2]['img']);?>
						<span>建议尺寸580px * 228px</span>
                    </div>
                </div>
				<div class="form-group focus-setting">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">幻灯片链接3</label>
                    <div class="col-sm-9">
                        <input type="text" name="banner[2][link]" value="<?php  echo $banner[2]['link'];?>" class="form-control"/>
						<span>请填写完整URL地址，包括http://</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">幻灯片4</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image("banner[3][img]", $banner[3]['img']);?>
						<span>建议尺寸580px * 228px</span>
                    </div>
                </div>
				<div class="form-group focus-setting">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">幻灯片链接4</label>
                    <div class="col-sm-9">
                        <input type="text" name="banner[3][link]" value="<?php  echo $banner[3]['link'];?>" class="form-control"/>
						<span>请填写完整URL地址，包括http://</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">幻灯片5</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image("banner[4][img]", $banner[4]['img']);?>
						<span>建议尺寸580px * 228px</span>
                    </div>
                </div>
				<div class="form-group focus-setting">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">幻灯片链接5</label>
                    <div class="col-sm-9">
                        <input type="text" name="banner[4][link]" value="<?php  echo $banner[4]['link'];?>" class="form-control"/>
						<span>请填写完整URL地址，包括http://</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group col-sm-12">
            <input type="hidden" name="id" value="<?php  echo $setting['id'];?>" />
            <input type="submit" name="submit" value="保存设置" class="btn btn-primary col-lg-1" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
	</form>
</div>

<?php  } else if($op=='savetype') { ?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">存储方式</div>
            <div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">存储方式设置</label>
					<div class="col-sm-9">
						<label class="radio-inline">
							<input type="radio" name="savetype" value="0" <?php  if($setting['savetype']==0) { ?>checked<?php  } ?>>其他存储方式
						</label>
						<label class="radio-inline">
							<input type="radio" name="savetype" value="1" <?php  if($setting['savetype']==1) { ?>checked<?php  } ?>>七牛云存储
						</label>
						<label class="radio-inline">
							<input type="radio" name="savetype" value="2" <?php  if($setting['savetype']==2) { ?>checked<?php  } ?>>腾讯云存储
						</label>
						<span class="help-block">默认课程视频存储方式，设置后也可以在课程章节里修改</span>
					</div>
				</div>
				<!-- 七牛 Start -->
				<div class="form-group qiniu-params-admin" <?php  if($setting['savetype']!=1) { ?>style="display: none;"<?php  } ?>>
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">七牛ACCESS_KEY</label>
					<div class="col-sm-9">
						<input type="text" name="qiniu[access_key]" class="form-control" value="<?php  echo $qiniu['access_key'];?>" autocomplete="off">
					</div>
				</div>
				<div class="form-group qiniu-params-admin" <?php  if($setting['savetype']!=1) { ?>style="display: none;"<?php  } ?>>
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">七牛SECRET_KEY</label>
					<div class="col-sm-9">
						<input type="text" name="qiniu[secret_key]" class="form-control" value="<?php  echo $qiniu['secret_key'];?>" autocomplete="off">
					</div>
				</div>
				<div class="form-group qiniu-params-admin" <?php  if($setting['savetype']!=1) { ?>style="display: none;"<?php  } ?>>
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">七牛URL(空间链接)</label>
					<div class="col-sm-9">
						<input type="text" name="qiniu[url]" class="form-control" value="<?php  echo $qiniu['url'];?>" autocomplete="off">
						<span class="help-block">请填写空间链接，不明白请查看<a href="http://help.012wz.com/index.php?doc-view-23" target="_blank">微课堂帮助手册七牛云存储配置</a></span>
					</div>
				</div>
				<!-- 七牛 End -->

				<!-- 腾讯云 Start -->
				<div class="form-group qcloud-params-admin" <?php  if($setting['savetype']!=2) { ?>style="display: none;"<?php  } ?>>
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">腾讯云APPID</label>
					<div class="col-sm-9">
						<input type="text" name="qcloud[appid]" class="form-control" value="<?php  echo $qcloud['appid'];?>" autocomplete="off">
					</div>
				</div>
				<div class="form-group qcloud-params-admin" <?php  if($setting['savetype']!=2) { ?>style="display: none;"<?php  } ?>>
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">Bucket</label>
					<div class="col-sm-9">
						<input type="text" name="qcloud[bucket]" class="form-control" value="<?php  echo $qcloud['bucket'];?>" autocomplete="off">
					</div>
				</div>
				<div class="form-group qcloud-params-admin" <?php  if($setting['savetype']!=2) { ?>style="display: none;"<?php  } ?>>
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">腾讯云SecretID</label>
					<div class="col-sm-9">
						<input type="text" name="qcloud[secretid]" class="form-control" value="<?php  echo $qcloud['secretid'];?>" autocomplete="off">
					</div>
				</div>
				<div class="form-group qcloud-params-admin" <?php  if($setting['savetype']!=2) { ?>style="display: none;"<?php  } ?>>
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">腾讯云SecretKey</label>
					<div class="col-sm-9">
						<input type="text" name="qcloud[secretkey]" class="form-control" value="<?php  echo $qcloud['secretkey'];?>" autocomplete="off">
						<span class="help-block">不明白请查看<a href="http://help.012wz.com/index.php?doc-view-23" target="_blank">微课堂帮助手册腾讯云存储配置</a></span>
					</div>
				</div>
				<!-- 腾讯云 End -->
			</div>
        </div>

        <div class="form-group col-sm-12">
            <input type="hidden" name="id" value="<?php  echo $setting['id'];?>" />
            <input type="submit" name="submit" value="保存设置" class="btn btn-primary col-lg-1" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
	</form>
</div>
<script type="text/javascript">
$(function () {
	$(':radio[name="savetype"]').click(function (){
		if($(this).val()=='0'){
			$('.qiniu-params-admin').hide();
			$('.qcloud-params-admin').hide();
		}else if($(this).val()=='1'){
			$('.qiniu-params-admin').show();
			$('.qcloud-params-admin').hide();
		}else if($(this).val()=='2'){
			$('.qiniu-params-admin').hide();
			$('.qcloud-params-admin').show();
		}
	});
});
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
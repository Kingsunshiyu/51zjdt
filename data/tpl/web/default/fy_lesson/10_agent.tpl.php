<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li class="active"><a href="<?php  echo $this->createWebUrl('agent');?>">分销商管理</a></li>
    <li><a href="<?php  echo $this->createWebUrl('commission', array('status'=>0));?>">待打款提现申请</a></li>
	<li><a href="<?php  echo $this->createWebUrl('commission', array('status'=>1));?>">已打款提现申请</a></li>
	<li><a href="<?php  echo $this->createWebUrl('commission', array('status'=>-1));?>">无效提现申请</a></li>
	<li><a href="<?php  echo $this->createWebUrl('commission', array('op'=>'commissionlog'));?>">分销佣金明细</a></li>
	<li><a href="<?php  echo $this->createWebUrl('commission', array('op'=>'statis'));?>">分销佣金统计</a></li>
	<li><a href="<?php  echo $this->createWebUrl('comsetting');?>">分销设置</a></li>
</ul>
<?php  if($op=='display') { ?>
<style type="text/css">
.dropdown-menu{min-width:130px;}
</style>
<div class="panel panel-info">
    <div class="panel-heading">筛选</div>
    <div class="panel-body">
        <form action="./index.php" method="get" class="form-horizontal" role="form" id="form1">
            <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="fy_lesson" />
            <input type="hidden" name="do" value="agent" />
            <input type="hidden" name="op" value="display" />
            <div class="form-group">
				<div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">会员昵称</label>
                    <div class="col-sm-8 col-lg-9 col-xs-12">
                        <input type="text" class="form-control" name="nickname" value="<?php  echo $_GPC['nickname'];?>" placeholder="会员昵称/真实名字/手机号码"/>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">会员ID</label>
                    <div class="col-sm-8 col-lg-9 col-xs-12">
                        <input type="text" class="form-control"  name="uid" value="<?php  echo $_GPC['uid'];?>" placeholder='会员ID'/>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">会员身份</label>
                    <div class="col-sm-8 col-lg-9 col-xs-12">
                        <select name='vipstatus' class='form-control'>
                            <option value=''>不限</option>
                            <option value='0' <?php  if($_GPC['vipstatus']=='0') { ?>selected<?php  } ?>>普通用户</option>
                            <option value='1' <?php  if($_GPC['vipstatus']=='1') { ?>selected<?php  } ?>>VIP用户</option>
                        </select>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">推荐人</label>
                    <div class="col-sm-8 col-lg-9 col-xs-12">
                        <input type="text" class="form-control" name="pnickname" value="<?php  echo $_GPC['pnickname'];?>" placeholder='推荐人昵称'/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">是否关注</label>
                    <div class="col-sm-8 col-lg-9 col-xs-12">
                        <select name='followed' class='form-control'>
                            <option value=''>不限</option>
                            <option value='0' <?php  if($_GPC['followed']=='0') { ?>selected<?php  } ?>>未关注</option>
                            <option value='1' <?php  if($_GPC['followed']=='1') { ?>selected<?php  } ?>>已关注</option>
                            <option value='2' <?php  if($_GPC['followed']=='2') { ?>selected<?php  } ?>>取消关注</option>
                        </select>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">分销状态</label>
                    <div class="col-sm-8 col-lg-9 col-xs-12">
                        <select name='status' class='form-control'>
                            <option value=''>不限</option>
							<option value='1' <?php  if($_GPC['status']=='1') { ?>selected<?php  } ?>>正常</option>
                            <option value='0' <?php  if($_GPC['status']=='0') { ?>selected<?php  } ?>>冻结</option>
                        </select>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">代理时间</label>
                    <div class="col-sm-7 col-lg-9 col-xs-12">
                        <div class="col-sm-3" style="width:20%;">
                            <label class='radio-inline'>
                                <input type='radio' value='0' name='searchtime' <?php  if($_GPC['searchtime']=='0') { ?>checked<?php  } ?>>不搜索
                            </label>
                            <label class='radio-inline'>
                                <input type='radio' value='1' name='searchtime' <?php  if($_GPC['searchtime']=='1') { ?>checked<?php  } ?>>搜索
                            </label>
                        </div>
                        <?php  echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d H:i', $starttime),'endtime'=>date('Y-m-d  H:i', $endtime)),true);?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label"></label>
                    <div class="col-sm-8 col-lg-9 col-xs-12">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>&nbsp;&nbsp;&nbsp;
						<button class="btn btn-success" name="upfans" value="1"><i class="fa fa-refresh"></i> 更新粉丝</button>
                        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                    </div>
                </div>
        </form>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">总数：<?php  echo $total;?></div>
    <div class="panel-body">
        <table class="table table-hover table-responsive">
            <thead class="navbar-inner" >
            <tr>
                <th style='width:8%;'>会员ID</th>
                <th style='width:12%;'>推荐人</th>
                <th style='width:12%;'>粉丝</th>
                <th style='width:12%;'>真实名字<br/>手机号码</th>
				<th style='width:10%;'>会员身份</th>
                <th style='width:10%;'>已结佣金<br/>累计佣金</th>
                <th style='width:11%;'>分销状态</th>
                <th style='width:13%;'>代理时间</th>
                <th style='width:10%'>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  if(is_array($list)) { foreach($list as $row) { ?>
            <tr>
                <td><?php  echo $row['uid'];?></td>
                <td>
                <?php  if($row['parentid']==0) { ?>
                <label class='label label-primary'>总店</label>
                <?php  } else { ?>
					<?php  if($row['avatar']=='132' || empty($row['avatar'])) { ?>
					<img src='<?php  echo MODULE_URL?>template/mobile/images/default_avatar.gif' style='width:30px;height:30px;padding1px;border:1px solid #ccc' />
					<?php  } else { ?>
					<img src="<?php  echo $row['parent']['avatar'];?>" style='width:30px;height:30px;padding1px;border:1px solid #ccc' />
					<?php  } ?>
					<?php  echo $row['parent']['nickname'];?>
				<?php  } ?>
                </td>
                <td>
                    <?php  if($row['avatar']=='132' || empty($row['avatar'])) { ?>
					<img src='<?php  echo MODULE_URL?>template/mobile/images/default_avatar.gif' style='width:30px;height:30px;padding1px;border:1px solid #ccc' />
					<?php  } else { ?>
                    <img src='<?php  echo $row['avatar'];?>' style='width:30px;height:30px;padding1px;border:1px solid #ccc' />
                    <?php  } ?>
                    <?php  if(empty($row['nickname'])) { ?>未更新<?php  } else { ?><?php  echo $row['nickname'];?><?php  } ?>

                </td>
                <td><?php  echo $row['realname'];?> <br/><?php  echo $row['mobile'];?></td>
				<td><?php  if($row['vip']==1) { ?><span class="label" style="background-color:#e47605;">VIP</span><?php  } else { ?><span class="label label-default">普通</span><?php  } ?></td>
                <td><?php  echo $row['pay_commission'];?> 元<br/><?php  echo $row['pay_commission']+$row['nopay_commission'];?> 元</td>
                <td><?php  if($row['status']==1) { ?><span class="label label-success">正常</span><?php  } else { ?><span class="label label-default">冻结</span><?php  } ?></td>
                <td><?php  echo date('Y-m-d H:i',$row['addtime']);?></td>
                <td style="overflow:visible;">
					<div class="btn-group btn-group-sm">
						<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="javascript:;">操作 <span class="caret"></span></a>
						<ul class="dropdown-menu dropdown-menu-left" role="menu" style='z-index: 99999'>
							<li><a href="<?php  echo $this->createWebUrl('agent', array('op'=>'detail', 'uid'=>$row['uid']));?>" title="编辑"><i class="fa fa-pencil"></i> 编辑</a></li>
							<li><a href="<?php  echo $this->createWebUrl('team', array('uid'=>$row['uid']));?>" title="查看下级成员"><i class="fa fa-list"></i> 查看下级成员</a></li>
						</ul>
                    </div>
                </td>
            </tr>
            <?php  } } ?>
            </tbody>
        </table>
        <?php  echo $pager;?>
    </div>
</div>

<?php  } else if($operation=='detail') { ?>

<form action="" method='post' class='form-horizontal'>
<input type="hidden" name="uid" value="<?php  echo $member['uid'];?>">
<input type="hidden" name="c" value="site" />
<input type="hidden" name="a" value="entry" />
<input type="hidden" name="m" value="fy_lesson" />
<input type="hidden" name="do" value="agent" />
<input type="hidden" name="op" value="detail" />
<div class='panel panel-default'>
    <div class='panel-heading'>
        分销商详细信息
    </div>
    <div class='panel-body'>

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">粉丝</label>
            <div class="col-sm-9 col-xs-12">
                <img src='<?php  echo $member['avatar'];?>' style='width:100px;height:100px;padding:1px;border:1px solid #ccc' />
                <?php  echo $member['nickname'];?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">OPENID</label>
            <div class="col-sm-9 col-xs-12">
                <div class="form-control-static"><?php  echo $member['openid'];?></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">真实姓名</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" name="realname" class="form-control" value="<?php  echo $member['realname'];?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">手机号码</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" name="mobile" class="form-control" value="<?php  echo $member['mobile'];?>" />
            </div>
        </div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">VIP会员</label>
			<div class="col-sm-9">
				<label class="radio-inline"><input type="radio" name="vip" value="1" <?php  if($member['vip']==1) { ?>checked="true"<?php  } ?>> VIP</label>
				&nbsp;
				<label class="radio-inline"><input type="radio" name="vip" value="0" <?php  if($member['vip']==0) { ?>checked="true"<?php  } ?>> 非VIP</label>
				<span class="help-block"></span>
			</div>
		</div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">VIP有效期</label>
            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_date('validity', $member['validity'], true);?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">上级会员ID</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" name="parentid" id="parentid" class="form-control" value="<?php  echo $member['parentid'];?>" style="display:inline-block;width:88%;" readonly />&nbsp;&nbsp;<a id="removeread" href="javascript:;">显示修改</a>
				<span class="help-block">上级会员ID为0时表示为总店推荐</span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">累计佣金</label>
            <div class="col-sm-9 col-xs-12">
                <div class='form-control-static'> <?php  echo $member['pay_commission']+$member['nopay_commission'];?> 元</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">已结算佣金</label>
            <div class="col-sm-9 col-xs-12">
                <div class='form-control-static'> <?php  echo $member['pay_commission'];?> 元</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">代理时间</label>
            <div class="col-sm-9 col-xs-12">
                <div class='form-control-static'><?php  echo date('Y-m-d H:i:s', $member['addtime']);?></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">分销状态</label>
            <div class="col-sm-9 col-xs-12">
                <label class="radio-inline"><input type="radio" name="status" value="1" <?php  if($member['status']==1) { ?>checked<?php  } ?>>正常</label>
                <label class="radio-inline" ><input type="radio" name="status" value="0" <?php  if($member['status']==0) { ?>checked<?php  } ?>>冻结</label>
				<div class="help-block">以订单付款时间戳为准，冻结的会员将不能获得佣金。例如A在下级会员下单课程时状态为冻结，如果A在下级会员购买课程付款时状态为正常，则可获得佣金，否则将不能获得佣金。</div>
            </div>
        </div>
    </div>

    <div class='panel-body'>
        <div class="form-group"></div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
            <div class="col-sm-9 col-xs-12">
                <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1"  />
                <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                <input type="button" name="back" onclick='history.back()' style='margin-left:10px;' value="返回列表" class="btn btn-default" />
            </div>
        </div>
    </div>
</div>
</form><!---易 福 源 码 网 www.efwww.com-->
<script type="text/javascript">
$("#removeread").click(function(){
	document.getElementById("parentid").readOnly = false;
});
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
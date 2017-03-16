<?php defined('IN_IA') or exit('Access Denied');?><!-- 
 * 课程订单管理
 * ============================================================================
 * ============================================================================
-->
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li <?php  if($op=='display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('order');?>">课程订单管理</a></li>
	<?php  if($op=='detail') { ?>
	<li <?php  if($op=='detail') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('order', array('op'=>'detail','id'=>$_GPC['id']));?>">课程订单详情</a></li>
	<?php  } ?>
</ul>
<?php  if($operation == 'display') { ?>
<style>
.page-nav {
	margin: 0;
	width: 100%;
	min-width: 800px;
}

.page-nav > li > a {
	display: block;
}

.page-nav-tabs {
	background: #EEE;
}

.page-nav-tabs > li {
	line-height: 40px;
	float: left;
	list-style: none;
	display: block;
	text-align: -webkit-match-parent;
}

.page-nav-tabs > li > a {
	font-size: 14px;
	color: #666;
	height: 40px;
	line-height: 40px;
	padding: 0 10px;
	margin: 0;
	border: 1px solid transparent;
	border-bottom-width: 0px;
	-webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-radius: 0;
}

.page-nav-tabs > li > a, .page-nav-tabs > li > a:focus {
	border-radius: 0 !important;
	background-color: #f9f9f9;
	color: #999;
	margin-right: -1px;
	position: relative;
	z-index: 11;
	border-color: #c5d0dc;
	text-decoration: none;
}

.page-nav-tabs >li >a:hover {
	background-color: #FFF;
}

.page-nav-tabs > li.active > a, .page-nav-tabs > li.active > a:hover, .page-nav-tabs > li.active > a:focus {
	color: #576373;
	border-color: #c5d0dc;
	border-top: 2px solid #4c8fbd;
	border-bottom-color: transparent;
	background-color: #FFF;
	z-index: 12;
	margin-top: -1px;
	box-shadow: 0 -2px 3px 0 rgba(0, 0, 0, 0.15);
}
</style>
<div class="main">
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="fy_lesson" />
                <input type="hidden" name="do" value="order" />
                <input type="hidden" name="op" value="display" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">订单遍号</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="ordersn" type="text" value="<?php  echo $_GPC['ordersn'];?>">
                    </div>
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">课程名称</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="bookname" type="text" value="<?php  echo $_GPC['bookname'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">订单状态</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="status" class="form-control">
                            <option value="">不限</option>
							<option value="0" <?php  if(in_array($_GPC['status'],array('0'))) { ?> selected="selected" <?php  } ?>>待付款</option>
							<option value="1" <?php  if($_GPC['status'] == 1) { ?> selected="selected" <?php  } ?>>已付款</option>
                            <option value="2" <?php  if($_GPC['status'] == 2) { ?> selected="selected" <?php  } ?>>已评价</option>
                            <option value="-1" <?php  if($_GPC['status'] == -1) { ?> selected="selected" <?php  } ?>>已取消</option>
                        </select>
                    </div>
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">用户信息</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="nickname" id="" type="text" value="<?php  echo $_GPC['nickname'];?>" placeholder="昵称/姓名/手机号码">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width: 100px;">下单时间</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <?php  echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d', $starttime),'endtime'=>date('Y-m-d', $endtime)));?>
                    </div>
                    <div class="col-sm-3 col-lg-3" style="width: 18%;">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
						<button type="submit" name="export" value="1" class="btn btn-success">导出 Excel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <ul class="page-nav page-nav-tabs" style="background:none;float: left;margin-left: 0px;padding-left: 0px;border-bottom:1px #c5d0dc solid;">
        <li<?php  if($_GPC['status']=='') { ?> class="active"<?php  } ?>>
        <a href="<?php  echo $this->createWebUrl('order', array('op' => 'display'))?>">全部订单</a>
        </li>
		<li<?php  if(in_array($_GPC['status'], array('0'))) { ?> class="active"<?php  } ?>>
        <a href="<?php  echo $this->createWebUrl('order', array('op' => 'display', 'status' => 0))?>">待付款订单</a>
        </li>
        <li<?php  if($_GPC['status']==1) { ?> class="active"<?php  } ?>>
        <a href="<?php  echo $this->createWebUrl('order', array('op' => 'display', 'status' => 1))?>">已付款订单</a>
        </li>
        <li<?php  if($_GPC['status']==2) { ?> class="active"<?php  } ?>>
        <a href="<?php  echo $this->createWebUrl('order', array('op' => 'display', 'status' => 2))?>">已评价订单</a>
        </li>
        <li<?php  if($_GPC['status']==-1) { ?> class="active"<?php  } ?>>
        <a href="<?php  echo $this->createWebUrl('order', array('op' => 'display', 'status' => -1))?>">已取消订单</a>
        </li>
    </ul>
    <div class="panel panel-default">
        <form action="" method="post" class="form-horizontal form" >
        <div class="table-responsive panel-body">
            <table class="table table-hover">
                <thead class="navbar-inner">
                <tr>
                    <th style="width:15%;">订单遍号</th>
                    <th style="width:20%;">昵称/姓名/手机号码</th>
					<th style="width:7%;">用户身份</th>
                    <th style="width:18%;">课程名称</th>
                    <th style="width:8%;">价格</th>
                    <th style="width:8%;">订单状态</th>
                    <th style="width:13%;">下单时间</th>
                    <th style="width:10%; text-align:right;">查看/拉黑/删除</th>
                </tr>
                </thead>
                <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
                    <td><?php  echo $item['ordersn'];?></td>
                    <td><?php  echo $item['nickname'];?><br/><?php  echo $item['realname'];?>，<?php  echo $item['mobile'];?></td>
					<td>
						<a href="<?php  echo $this->createWebUrl('agent', array('op'=>'detail','uid'=>$item['uid']));?>" target="_blank">
							<?php  if($item['memberinfo']['vip']==1) { ?>
							<span class="label" style="background-color:#e47605;">VIP</span>
							<?php  } else { ?>
							<span class="label label-default">普通</span>
							<?php  } ?>
						</a>
					</td>
                    <td><?php  echo $item['bookname'];?></td>
                    <td><?php  echo $item['price'];?> 元</td>
                    <td>
                        <?php  if($item['status'] == 0) { ?><span class="label label-danger">未付款</span><?php  } ?>
						<?php  if($item['status'] == 1) { ?><span class="label label-success">
													<?php  if($item['paytype'] == 'credit') { ?>余额支付
													<?php  } else if($item['paytype'] == 'wechat') { ?>微信支付
													<?php  } else if($item['paytype'] == 'alipay') { ?>支付宝支付
													<?php  } else if($item['paytype'] == 'offline') { ?>线下支付
													<?php  } else { ?>无<?php  } ?>
												</span>
						<?php  } ?>
                        <?php  if($item['status'] == 2) { ?><span class="label label-warning">已评价</span><?php  } ?>
                        <?php  if($item['status'] == -1) { ?><span class="label label-default">已取消</span><?php  } ?>
                    </td>
                    <td><?php  echo date('Y-m-d H:i', $item['addtime'])?></td>
                    <td style="text-align:right;">
                        <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('order', array('op' => 'detail', 'id' => $item['id']))?>" title="查看订单"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-default btn-sm" <?php  if(!empty($blacklist[$item['openid']])) { ?>style="color:red;"<?php  } ?> href="<?php  echo $this->createWebUrl('order', array('op' => 'black', 'id' => $item['id'],'refurl'=>$_W['siteurl']))?>" title="拉黑名单"><i class="fa fa-trash"></i></a>
						<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('order', array('op' => 'delete', 'id' => $item['id'],'refurl'=>$_W['siteurl']))?>" title="删除订单" onclick="return confirm('此操作不可恢复，确认删除？');return false;"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                <?php  } } ?>
                </tbody>
            </table>
            <?php  echo $pager;?>
        </div>
    </div>
    </form>
</div>
<?php  } else if($operation == 'detail') { ?>
<div class="main">
	<form class="form-horizontal form">
		<div class="panel panel-default">
			<div class="panel-heading">
				订单信息
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">订单遍号</label>
					<div class="col-sm-9">
						<p class="form-control-static"><?php  echo $order['ordersn'];?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">课程名称</label>
					<div class="col-sm-9">
						<p class="form-control-static">
						<?php  echo $order['bookname'];?>
						</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">课程价格</label>
					<div class="col-sm-9">
						<p class="form-control-static"><?php  echo $order['price'];?> 元</p>
					</div>
				</div>
				<?php  if($order['integral']>0) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">获赠积分</label>
					<div class="col-sm-9">
						<p class="form-control-static"><?php  echo $order['integral'];?> 积分</p>
					</div>
				</div>
				<?php  } ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">付款方式</label>
					<div class="col-sm-9">
						<p class="form-control-static">
						<?php  if($order['paytype'] == 'credit') { ?>余额支付
						<?php  } else if($order['paytype'] == 'wechat') { ?>微信支付
						<?php  } else if($order['paytype'] == 'alipay') { ?>支付宝支付
						<?php  } else if($order['paytype'] == 'offline') { ?>线下支付
						<?php  } else { ?>无<?php  } ?>
						</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">订单状态</label>
					<div class="col-sm-9">
						<p class="form-control-static">
						<?php  if($order['status'] == 0) { ?><span class="label label-danger">待付款</span>&nbsp;&nbsp;&nbsp;<a class="btn btn-success btn-sm" style="padding:4px 10px;" onclick="return confirm('该操作不可恢复，确定已付款?');return false;" href="<?php  echo $this->createWebUrl('order',array('op'=>'confirmpay','orderid'=>$order['id'],'refurl'=>$_W['siteurl']));?>">确认付款?</a><?php  } ?>
						<?php  if($order['status'] == 1) { ?><span class="label label-success">已付款</span><?php  } ?>
						<?php  if($order['status'] == 2) { ?><span class="label label-warning">已评价</span><?php  } ?>
						<?php  if($order['status'] == -1) { ?><span class="label label-default">已取消</span><?php  } ?>
						</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">下单时间</label>
					<div class="col-sm-9">
						<p class="form-control-static">
						<?php  echo date('Y-m-d H:i:s', $order['addtime'])?>
						</p>
					</div>
				</div>
				<?php  if($order['paytime']>0) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">付款时间</label>
					<div class="col-sm-9">
						<p class="form-control-static">
						<?php  echo date('Y-m-d H:i:s', $order['paytime'])?>
						</p>
					</div>
				</div>
				<?php  } ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">昵称/姓名/手机号码</label>
					<div class="col-sm-9">
						<p class="form-control-static">
						<img src="<?php  echo $order['avatar'];?>" width="35" height="35">&nbsp;&nbsp;<?php  echo $order['nickname'];?>&nbsp;/&nbsp;<?php  echo $order['realname'];?>&nbsp;/&nbsp;<?php  echo $order['mobile'];?>
						</p>
					</div>
				</div>
				<?php  if(!empty($evaluate['content'])) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">评价内容</label>
					<div class="col-sm-9">
						<p class="form-control-static">
						<?php  echo $evaluate['content'];?>
						</p>
					</div>
				</div>
				<?php  } ?>
			</div>
		</div>
		<?php  if($member1>0 && $order['commission1']>0) { ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				佣金信息
			</div>
			<div class="panel-body">
				<?php  if($member1>0) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">一级佣金</label>
					<div class="col-sm-9">
						<p class="form-control-static"><?php  echo $order['commission1'];?> 元</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">一级推荐人</label>
					<div class="col-sm-9">
						<p class="form-control-static">
							<img src="<?php  echo $member1['avatar'];?>" style="width:30px;height:30px;padding1px;border:1px solid #ccc">&nbsp;&nbsp;<?php  echo $member1['nickname'];?>
						</p>
					</div>
				</div>
				<?php  } ?>
				<?php  if($member2>0 && $order['commission2']>0) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">二级佣金</label>
					<div class="col-sm-9">
						<p class="form-control-static"><?php  echo $order['commission2'];?> 元</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">二级推荐人</label>
					<div class="col-sm-9">
						<p class="form-control-static">
							<img src="<?php  echo $member2['avatar'];?>" style="width:30px;height:30px;padding1px;border:1px solid #ccc">&nbsp;&nbsp;<?php  echo $member2['nickname'];?>
						</p>
					</div>
				</div>
				<?php  } ?>
				<?php  if($member3>0 && $order['commission3']>0) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">三级佣金</label>
					<div class="col-sm-9">
						<p class="form-control-static"><?php  echo $order['commission3'];?> 元</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">三级推荐人</label>
					<div class="col-sm-9">
						<p class="form-control-static">
							<img src="<?php  echo $member3['avatar'];?>" style="width:30px;height:30px;padding1px;border:1px solid #ccc">&nbsp;&nbsp;<?php  echo $member3['nickname'];?>
						</p>
					</div>
				</div>
				<?php  } ?>
			</div>
		</div>
		<?php  } ?>
		<div class="form-group col-sm-12">
			<input type="button" onclick="location.href='<?php  echo $this->createWebUrl('order');?>'" value="返回列表" class="btn btn-default col-lg-1">
		</div>
	</form>
</div>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
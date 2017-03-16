<?php defined('IN_IA') or exit('Access Denied');?><!-- 
 * 评价管理
 * ============================================================================
 * ============================================================================
-->
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li <?php  if($op=='display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('evaluate');?>">评价列表</a></li>
	<?php  if($op=='detail') { ?>
	<li <?php  if($op=='detail') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('evaluate', array('op'=>'detail','id'=>$_GPC['id']));?>">评价详情</a></li>
	<?php  } ?>
</ul>
<?php  if($operation == 'display') { ?>
<style type="text/css">
.col-lg-3{width:22%;}
.table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{white-space:normal;}
</style>
<div class="main">
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="fy_lesson" />
                <input type="hidden" name="do" value="evaluate" />
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
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">用户昵称</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="nickname" id="" type="text" value="<?php  echo $_GPC['nickname'];?>">
                    </div>
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width: 100px;">下单时间</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <?php  echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d', $starttime),'endtime'=>date('Y-m-d', $endtime)));?>
                    </div>
                    <div class="col-sm-3 col-lg-3" style="width: 18%;">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="panel panel-default">
        <form action="" method="post" class="form-horizontal form" >
        <div class="table-responsive panel-body">
            <table class="table table-hover">
                <thead class="navbar-inner">
                <tr>
                    <th style="width:10%;">订单遍号</th>
                    <th style="width:10%;">用户昵称</th>
                    <th style="width:20%;">课程名称</th>
                    <th style="width:8%;text-align:center;">评价等级</th>
                    <th style="width:38%;text-align:center;">评价内容</th>
                    <th style="width:8%;">评价日期</th>
                    <th style="width:5%; text-align:right;">删除</th>
                </tr>
                </thead>
                <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
                    <td><?php echo $item['ordersn']?$item['ordersn']:'免费课程';?></td>
                    <td><?php  echo $item['nickname'];?></td>
                    <td><?php  echo $item['bookname'];?></td>
                    <td align="center">
						<?php  if($item['grade']==1) { ?><span class="label" style="background-color:#FB5B5B;">好评</span>
						<?php  } else if($item['grade']==2) { ?><span class="label" style="background-color:#D99810;">中评</span>
						<?php  } else if($item['grade']==3) { ?><span class="label" style="background-color:#555555;">差评</span><?php  } ?>
                    </td>
                    <td><?php  echo $item['content'];?></td>
                    <td><?php  echo date('Y-m-d', $item['addtime'])?></td>
                    <td style="text-align:right;">
                        <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('evaluate', array('op' => 'delete', 'id' => $item['id'], 'refurl'=>$_W['siteurl']))?>" title="删除评价" onclick="return confirm('此操作不可恢复，确认删除？');return false;"><i class="fa fa-times"></i></a>
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
						<?php  } else { ?>无<?php  } ?>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">订单状态</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">
                        <?php  if($order['status'] == 0) { ?><span class="label label-danger">待付款</span><?php  } ?>
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
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">用户昵称</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">
                        <?php  echo $order['nickname'];?>
                        </p>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">评价内容</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">
                        
                        </p>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-default span2" onclick="javascript:history.go(-1);">返回上一页</button>
                    </div>
                </div>
            </div>
        </div>
	</form>
</div>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
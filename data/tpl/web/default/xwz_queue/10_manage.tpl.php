<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">
        <li<?php  if($_GPC['do'] == 'manage' || $_GPC['do'] == '' ) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('manage');?>">活动管理</a></li>
     <li<?php  if($_GPC['do'] == 'post') { ?> class="active"<?php  } ?>><a href="<?php  echo url('platform/reply/post',array('m'=>'xwz_queue'));?>">添加活动规则</a></li>

    </ul>
    
 
    <div class="panel panel-info">
	<div class="panel-heading">筛选</div>
	<div class="panel-body">
		<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="site" />
			<input type="hidden" name="a" value="entry" />
        	<input type="hidden" name="m" value="xwz_queue" />
        	<input type="hidden" name="do" value="manage" />
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>
				<div class="col-sm-8 col-lg-9">
					<input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>">
				</div>
                                <div class=" col-xs-12 col-sm-2 col-lg-2">
					<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
				</div>
			</div>
 			<div class="form-group">
			</div>
		</form>
	</div>
 
    </div>
 
    <div style="padding:15px;">
        <table class="table table-hover">
            <thead class="navbar-inner">
                <tr><th class='with-checkbox'  style='width:30px;'>
                        <input type="checkbox" class="check_all" /></th>
                    <th style="width:150px;">名称</th>
                    <th style="width:200px;">类型</th>
                    <th style="width:200px;">管理二位码</th>
                    <th  style="width:100px;">状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                 <tr>

                    <td class="with-checkbox">
                     <input type="checkbox" name="check" value="<?php  echo $row['id'];?>"></td>	 
                    <td><?php  echo $row['title'];?> </td>
                    <td>
                        <?php  if(is_array($row['types'])) { foreach($row['types'] as $type) { ?>
                        <p><?php  echo $type['title'];?> 等待: <?php  echo $type['num'];?></p>
                        <?php  } } ?>
                    </td>
                    <td><img src='../addons/xwz_queue/mqrcode/qrcode_<?php  echo $row['uniacid'];?>_<?php  echo $row['rid'];?>.png?t=<?php echo TIMESTAMP;?>' /></td>
                    <td><?php  echo $row['statusstr'];?></td>
                    <td>
                        <a class="btn btn-primary" target="_blank" rel="tooltip" href="<?php  echo $this->createWebUrl('screen',array('rid'=>$row['rid'],'wid'=>$_W['uniacid']))?>" title="大屏幕"><i class="fa fa-cog"></i> 大屏幕</a>
                        <a class="btn btn-default" rel="tooltip" href="<?php  echo $this->createWebUrl('manager',array('rid'=>$row['rid']))?>" title="管理员"><i class="fa fa-users"></i> 管理员</a>
                        <a class="btn btn-default" rel="tooltip" href="<?php  echo $this->createWebUrl('queue',array('rid'=>$row['rid']))?>" title="队列管理"><i class="fa fa-cog"></i> 队列管理</a>
                        <a class="btn btn-default" rel="tooltip" href="<?php  echo $this->createWebUrl('fans',array('rid'=>$row['rid']))?>" title="排队统计"><i class="fa fa-user"></i> 排队统计</a>
                        <a class="btn btn-default" rel="tooltip" href="<?php  echo url('platform/reply/post',array('m'=>'xwz_queue','rid'=>$row['rid']));?>" title="编辑"><i class="fa fa-edit"></i> 编辑</a>
                        <?php  if($row['status']==0) { ?>
                        <a class="btn   btn-default" title="开始活动" href="#" onclick="drop_confirm('您确定要开始吗?', '<?php  echo $this->createWebUrl('status',array('rid'=>$row['rid'],'status'=>1))?>');">
                            <i class="fa fa-play"></i> 开始</a>
                        <?php  } else { ?>
                        <a class="btn   btn-default" title="结束活动" href="#" onclick="drop_confirm('您确定要暂停吗?', '<?php  echo $this->createWebUrl('status',array('rid'=>$row['rid'],'status'=>0))?>');"><i class="fa fa-stop"></i> 暂停</a>
                        <?php  } ?>
                        <a class="btn  btn-default" rel="tooltip" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('delete',array('rid'=>$row['rid']))?>');" title="删除"><i class="fa fa-remove"></i></a>
                    </td>
                </tr>
                <?php  } } ?>
            </tbody>
        </table>
        <?php  echo $pager;?>
    </div>

</div>
<script language='javascript'>
            function drop_confirm(msg, url){
                    if (confirm(msg)){
                    window.location = url;
                    }
            }

</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
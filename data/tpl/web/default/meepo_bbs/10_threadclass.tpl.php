<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li class="active"><a href="<?php  echo $this->createWebUrl('threadclass');?>">主题列表</a></li>
</ul>
<div class="main">
	<div class="clearfix">
		<div class="panel panel-default">
			<div class="panel-heading">
				<a class="btn btn-success" href="<?php  echo $this->createWebUrl('threadclass')?>">板块列表</a>
				<a class="btn btn-default" href="<?php  echo $this->createWebUrl('threadclass', array('foo'=>'create'))?>">新增版块</a>
				<a class="btn btn-default" href="<?php  echo $this->createWebUrl('threadclass',array('th'=>'clearall'))?>">清理异常版块</a>
			</div>
			<div class="table-responsive panel-body" style="overflow:visible;width:auto;" >
				<table class="table table-hover">
					<tr>
						<th style="width:30px;"></th>
						<th style="width:200px;">主题名称</th>
						<th style="width:100px;">显示顺序</th>
						<th style="width:120px;">分类图标</th>
						<th></th>
					</tr>
					<?php  if(is_array($list)) { foreach($list as $row) { ?>
					<tr>
						<td></td>
						<td>
							<p class="form-control-static" style="font-weight:bold;color:red;">
								|<?php  echo $row['name'];?>
							</p>
						</td>
						

						<td>
							<p class="form-control-static">
								<?php  echo $row['displayorder'];?>
							</p>
						</td>
						
						<td>
							<p class="form-control-static">
								<img src="<?php  echo tomedia($row['icon'])?>" style="width:4em;border-radius:2em;height:4em;"/>
							</p>
						</td>
						
						<td style="overflow:visible;">
							<div class="btn-group btn-group-sm">
								<a class="btn btn-default" href="<?php  echo $this->createWebUrl('threadclass',array('foo'=>'create','id'=>$row['typeid']))?>"><i class="fa fa-edit"></i> 编辑</a>
								<a class="btn btn-default" href="<?php  echo $this->createWebUrl('threadclass', array('foo'=>'delete','id'=>$row['typeid']))?>" onclick=""><i class="fa fa-remove"></i> 删除</a>
								<a class="btn btn-default" href="<?php  echo $this->createWebUrl('threadclass', array('foo'=>'create','fid'=>$row['typeid']))?>"><i class="fa fa-plus-square-o"></i> 添加子主题</a>
								
		                        <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="javascript:;">版块管理<span class="caret"></span></a>
		                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
		                            <li role="presentation">
		                                <a href="<?php  echo $this->createWebUrl('share',array('id'=>$row['typeid']))?>">营销功能设置</a>
		                            </li>
		                            <li role="presentation">
		                                <a href="<?php  echo $this->createWebUrl('manage', array('typeid'=>$row['typeid']))?>"><i class="fa fa-list"></i> 主题帖子管理</a>
		                            </li>
		                            <li role="presentation">
		                                <a href="<?php  echo $this->createWebUrl('class_randadv', array('typeid'=>$row['typeid']))?>"><i class="fa fa-list"></i> 随机广告</a>
		                             </li>
		                             <li role="presentation">
		                                <?php  if(empty($row['isgood'])) { ?>
										<a href="<?php  echo $this->createWebUrl('threadclass', array('foo'=>'isgood','id'=>$row['typeid']))?>"><i class="fa fa-thumbs-up"></i> 设为推荐</a>
										<?php  } else { ?>
										<a href="<?php  echo $this->createWebUrl('threadclass', array('foo'=>'nogood','id'=>$row['typeid']))?>"><i class="fa fa-thumbs-up"></i> 取消推荐</a>
										<?php  } ?>
		                             </li>
		                             <li role="presentation">
		                                <a href="<?php  echo $row['url'];?>" target="_blank"><i class="fa fa-external-link fa-fw"></i> 直接访问</a>
		                            </li>
		                            <li role="presentation">
		                                <a href="javascript:;" onclick="displayUrl('<?php  echo $row['url'];?>', '<?php  echo $row['surl'];?>');"><i class="fa fa-link fa-fw"></i> 查看链接</a>
		                            </li>
		                            <li role="presentation">
		                                <a href="javascript:;" onclick="displayQr('<?php  echo $this->createWebUrl('qr', array('raw' => base64_encode($row['url'])))?>');"><i class="fa fa-qrcode fa-fw"></i> 查看二维码</a>
		                             </li>
		                        </ul>
							</div>
						</td>
					</tr>
					<?php  if(!empty($row['ch'])) { ?>
						<?php  if(is_array($row['ch'])) { foreach($row['ch'] as $ch) { ?>
						<tr>
							<td></td>
							<td>
								<p class="form-control-static">
									--|<?php  echo $ch['name'];?>
								</p>
							</td>
							<td>
								<p class="form-control-static">
									<?php  echo $ch['displayorder'];?>
								</p>
							</td>
							
							<td>
								<p class="form-control-static">
									<img src="<?php  echo tomedia($ch['icon'])?>" style="width:4em;border-radius:2em;height:4em;"/>
								</p>
							</td>
							<td style="overflow:visible;">
								<div class="btn-group btn-group-sm">
									<a class="btn btn-default" href="<?php  echo $this->createWebUrl('threadclass',array('foo'=>'create','id'=>$ch['typeid']))?>"><i class="fa fa-edit"></i> 编辑</a>
									<a class="btn btn-default" href="<?php  echo $this->createWebUrl('threadclass', array('foo'=>'delete','id'=>$ch['typeid']))?>" onclick=""><i class="fa fa-remove"></i> 删除</a>
									
									<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="javascript:;">帖子地址 <span class="caret"></span></a>
			                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
			                            <li role="presentation">
			                            <a href="<?php  echo $this->createWebUrl('share',array('id'=>$ch['typeid']))?>">营销功能设置</a>
										</li>
										<li role="presentation">
										<a href="<?php  echo $this->createWebUrl('manage', array('typeid'=>$ch['typeid']))?>"><i class="fa fa-list"></i> 主题帖子管理</a>
										</li>
										<li role="presentation">
										<a href="<?php  echo $this->createWebUrl('class_randadv', array('typeid'=>$ch['typeid']))?>"><i class="fa fa-list"></i> 随机广告</a>
										</li>
										<li role="presentation">
										<?php  if(empty($ch['isgood'])) { ?>
										<a href="<?php  echo $this->createWebUrl('threadclass', array('foo'=>'isgood','id'=>$ch['typeid']))?>"><i class="fa fa-thumbs-up"></i> 设为推荐</a>
										<?php  } else { ?>
										<a href="<?php  echo $this->createWebUrl('threadclass', array('foo'=>'nogood','id'=>$ch['typeid']))?>"><i class="fa fa-thumbs-up"></i> 取消推荐</a>
										<?php  } ?>
										</li>
			                            <li role="presentation">
			                                <a href="<?php  echo $ch['url'];?>" target="_blank"><i class="fa fa-external-link fa-fw"></i> 直接访问</a>
			                            </li>
			                            <li role="presentation">
			                                <a href="javascript:;" onclick="displayUrl('<?php  echo $ch['url'];?>', '<?php  echo $ch['surl'];?>');"><i class="fa fa-link fa-fw"></i> 查看链接</a>
			                            </li>
			                            <li role="presentation">
			                                <a href="javascript:;" onclick="displayQr('<?php  echo $this->createWebUrl('qr', array('raw' => base64_encode($ch['url'])))?>');"><i class="fa fa-qrcode fa-fw"></i> 查看二维码</a>
			                             </li>
			                        </ul>
			                 	</div>
							</td>
						</tr>
						<?php  } } ?>
						<?php  } ?>
					<?php  } } ?>
				</table>
			</div>
			<div class="panel-body text-right">
				<?php  echo $pager;?>
			</div>
			<div class="panel-footer">
				<a class="btn btn-default" href="<?php  echo $this->createWebUrl('threadclass', array('foo'=>'create'))?>">新增版块</a>
			</div>
		</div>
	</div>
</div>
<script>
	require(['angular', 'jquery', 'util'], function(angular, $, util){

		var app = angular.module('app', []);
		angular.bootstrap(document, ['app']);
	});

</script>

<script>
            function displayUrl(lurl, surl) {
                require(['jquery', 'util'], function($, u) {
                    var content = '<p class="form-control-static" style="word-break:break-all">菜单使用链接(需要oAuth): <br>' + lurl + '</p>';
                    content += '<p class="form-control-static" style="word-break:break-all">自动回复使用链接: <br>' + surl + '</p>';
                    var footer =
                            '<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>' +
                            '<button type="button" class="btn btn-primary">复制菜单链接</button>' +
                            '<button type="button" class="btn btn-success">复制自动回复链接</button>';
                    var diaobj = u.dialog('查看URL', content, footer);
                    diaobj.find('.btn-default').click(function() {
                        diaobj.modal('hide');
                    });
                    diaobj.on('shown.bs.modal', function(){
                        u.clip(diaobj.find('.btn-primary')[0], lurl);
                        u.clip(diaobj.find('.btn-success')[0], surl);
                    });
                    diaobj.modal('show');
                });
            }
            function displayQr(url) {
                require(['jquery', 'util'], function($, u) {
                    var content = '<div class="panel panel-default text-center"><img src="' + url + '" alt="活动地址二维码" class="img-rounded"></div>';
                    var footer =
                            '<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>';
                    var diaobj = u.dialog('查看URL二维码', content, footer);
                    diaobj.find('.btn-default').click(function() {
                        diaobj.modal('hide');
                    });
                    diaobj.modal('show');
                });
            }
        </script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
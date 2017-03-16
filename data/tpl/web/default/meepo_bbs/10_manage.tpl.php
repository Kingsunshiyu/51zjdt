<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs" id="myTab">
    <li>
		<a href="?c=home&a=welcome&do=ext&m=<?php  echo $_GPC['m']?>">返回</a>
	</li>
		<li><a href="<?php  echo $this->createWebUrl('threadclass');?>">主题列表</a></li>
    	<li class="active"><a href="<?php  echo $this->createWebUrl('manage')?>">帖子管理</a></li>
    	<li><a href="<?php  echo $this->createWebUrl('forum_post',array('id'=>$_GPC['typeid']))?>">添加帖子</a></li>
</ul>
<div class="main">
<div class="panel panel-info">
	<div class="panel-heading">筛选</div>
	<div class="panel-body">
		<form action="./index.php" method="get" class="form-horizontal" role="form" id="form1">
			<input type="hidden" name="c" value="site" />
			<input type="hidden" name="a" value="entry" />
			<input type="hidden" name="m" value="meepo_bbs" />
			<input type="hidden" name="do" value="manage" />
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">昵称</label>
				<div class="col-sm-8 col-lg-9 col-xs-12">
					<input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>" placeholder="可查发帖会员">
				</div>
			</div> 
			
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label"></label>
				<div class="col-sm-8 col-lg-9 col-xs-12">
					<input class="btn btn-primary" id="" type="submit" value="搜索">
				</div>
			</div> 
		</form>
	</div>
</div>
<form action="" method="post" class="form-horizontal" role="form" ng-controller="formCtrl" id="form2">
	<div class="panel panel-default">
		<div class="panel-heading">
			<a class="btn btn-default btn-lg" href="<?php  echo $this->createWebUrl('manage')?>">所有帖子</a>
			<?php  if(!empty($_GPC['typeid'])) { ?>
				<a class="btn btn-default btn-lg " href="<?php  echo $this->createWebUrl('manage',array('typeid'=>$_GPC['typeid']))?>">本版块帖子</a>
				<a class="btn btn-default btn-lg" href="<?php  echo $this->createWebUrl('manage',array('typeid'=>$_GPC['typeid'],'tab'=>'wait'))?>">待审核帖子</a>
				<a class="btn btn-default btn-lg" href="<?php  echo $this->createWebUrl('manage',array('typeid'=>$_GPC['typeid'],'tab'=>'new'))?>">最新帖子</a>
				<a class="btn btn-default btn-lg" href="<?php  echo $this->createWebUrl('manage',array('typeid'=>$_GPC['typeid'],'tab'=>'hot'))?>">最热帖子</a>
				<a class="btn btn-default btn-lg" href="<?php  echo $this->createWebUrl('manage',array('typeid'=>$_GPC['typeid'],'tab'=>'top'))?>">置顶帖子</a>
				<a class="btn btn-default btn-lg" href="<?php  echo $this->createWebUrl('manage',array('typeid'=>$_GPC['typeid'],'tab'=>'jing'))?>">加精帖子</a>
				<a class="btn btn-default btn-lg" href="<?php  echo $this->createWebUrl('manage',array('typeid'=>$_GPC['typeid'],'tab'=>'lock'))?>">锁定帖子</a>
			<?php  } else { ?>
				<a class="btn btn-default btn-lg" href="<?php  echo $this->createWebUrl('manage',array('tab'=>'wait'))?>">待审核帖子</a>
				<a class="btn btn-default btn-lg" href="<?php  echo $this->createWebUrl('manage',array('tab'=>'new'))?>">最新帖子</a>
				<a class="btn btn-default btn-lg" href="<?php  echo $this->createWebUrl('manage',array('tab'=>'hot'))?>">最热帖子</a>
				<a class="btn btn-default btn-lg" href="<?php  echo $this->createWebUrl('manage',array('tab'=>'top'))?>">置顶帖子</a>
				<a class="btn btn-default btn-lg" href="<?php  echo $this->createWebUrl('manage',array('tab'=>'jing'))?>">加精帖子</a>
				<a class="btn btn-default btn-lg" href="<?php  echo $this->createWebUrl('manage',array('tab'=>'lock'))?>">锁定帖子</a>
			<?php  } ?>
			<a class="btn btn-default btn-lg" href="<?php  echo $this->createWebUrl('manage',array('tab'=>'system'))?>">系统公告帖子</a>
		</div>
		<div class="panel-body table-responsive">
			<table class="table table-hover" style="display:auto;">
				<thead class="navbar-inner">
					<tr>
					   <th style="width:25px;">选？</th>
						<th style="width:120px;">昵称</th>
						<th style="width:80px;">头像</th>
						<th style="width:120px;">标题</th>
						<th style="width:80px;">发表时间</th>
						<th style="width:80px;">标签</th>
						<th style="width:80px;">分类</th>
						<th style="width:80px;">状态</th>
						<th style="width:480px;">操作</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="item in list">
					   <td><input type="checkbox" name="select[]" value="{{item.id}}"></td>
						<td>{{item.nickname}}</td>
						<td><img src="{{item.avatar}}" style="width: 50px;border-radius: 25px;height: 50px;"></td>
						<td>{{item.title}}</td>
						<td>{{item.createtime}}</td>
						<td><label class="label label-default">{{item.tab}}</label></td>
						<td><label class="label label-success">{{item.ctitle}}</label></td>
						<td><label class="label label-{{item.status_label}}" >{{item.status}}</label></td>
						<td >
							<a class="btn btn-default" href="{{item.detail}}" title="查看"><i class="fa fa-search"></i></a>
							<a class="btn btn-default" href="{{item.status_button}}" title="审核"><i class="fa fa-legal"></i></a>
							<a class="btn btn-success" href="{{item.jing}}">{{item.jingtitle}}</a>
							<a class="btn btn-info" href="{{item.top}}">{{item.toptitle}}</a>
							<a class="btn btn-warning" href="{{item.lock}}">{{item.locktitle}}</a>
							<a class="btn btn-danger" href="{{item.delete}}" title="删除"><i class="fa fa-trash-o"></i></a>
							<a class="btn btn-primary" href="{{item.deleteall}}">拉黑</a>
							<a class="btn btn-primary" href="{{item.commont}}">评论</a>
						</td>
					</tr>
				</tbody>
				<tr>
					<td><input type="checkbox" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck});"></td>
                    <td colspan="12">
                        <input type="submit" class="btn btn-danger" name="delete" value="删除" />
                        <input type="submit" class="btn btn-pramary" name="upload" value="导出选定数据" />
                        <input type="submit" class="btn btn-pramary" name="uploadall" value="导出所有数据" />
                    </td>
				</tr>
			</table>
			
		</div>
	</div>
</form>
</div>
<?php  echo $pager;?>

<script>
	require(['angular', 'jquery', 'util'], function(angular, $, util){

		var app = angular.module('app', []);
		app.controller('formCtrl', function($scope,$http){
			$scope.list = <?php  echo json_encode($list)?>;
			$scope.delete = function (){
				var select = $scope.select;
				alert(select);
			}
			$scope.submit = function() {
	            $('#form2')[0].submit();
	        };
		});

		
		angular.bootstrap(document, ['app']);
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
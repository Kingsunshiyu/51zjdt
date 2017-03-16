<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
<div class="panel panel-info">
	<div class="panel-heading">筛选</div>
	<div class="panel-body">
		<form action="<?php  echo $_W['siteurl'];?>" method="get" class="form-horizontal" role="form" id="form1">
			<input type="hidden" name="c" value="site" />
			<input type="hidden" name="a" value="entry" />
			<input type="hidden" name="m" value="meepo_bbs" />
			<input type="hidden" name="do" value="oto_user" />
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">姓名</label>
				<div class="col-sm-8 col-lg-9 col-xs-12">
					<input class="form-control" name="realname" id="" type="text" value="<?php  echo $_GPC['realname'];?>" placeholder="姓名">
				</div>
			</div> 
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">公司</label>
				<div class="col-sm-8 col-lg-9 col-xs-12">
					<input class="form-control" name="company" id="" type="text" value="<?php  echo $_GPC['"company"'];?>" placeholder="公司">
				</div>
			</div> 
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">地址</label>
				<div class="col-sm-8 col-lg-9 col-xs-12">
					<input class="form-control" name="address" id="" type="text" value="<?php  echo $_GPC['address'];?>" placeholder="地址">
				</div>
			</div> 
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">电话</label>
				<div class="col-sm-8 col-lg-9 col-xs-12">
					<input class="form-control" name="mobile" id="" type="text" value="<?php  echo $_GPC['mobile'];?>" placeholder="电话">
				</div>
			</div> 
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label"></label>
				<div class="col-sm-8 col-lg-9 col-xs-12">
					<input class="btn btn-primary" id="" type="submit" value="搜索">
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
				</div>
			</div> 
		</form>
	</div>
	</div>
<form action="" method="post" class="form-horizontal" role="form" ng-controller="formCtrl" id="form2">
	<div class="panel panel-default">
		<div class="panel-heading">
			<a class="btn btn-default btn-lg" href="<?php  echo $this->createWebUrl('oto_user')?>">所有数据</a>
			<a class="btn btn-default btn-lg" href="<?php  echo $this->createWebUrl('oto_user',array('status'=>0))?>">待审核数据</a>
			<a class="btn btn-default btn-lg" href="<?php  echo $this->createWebUrl('oto_user',array('status'=>1))?>">已审核数据</a>
			<a class="btn btn-default btn-lg" href="<?php  echo $this->createWebUrl('oto_user',array('status'=>2))?>">审核失败数据</a>
			
		</div>
		<div class="panel-body table-responsive">
			<table class="table table-hover" style="display:auto;">
				<thead class="navbar-inner">
					<tr>
					   <th style="width:25px;">选？</th>
						<th style="width:160px;">姓名</th>
						<th style="width:180px;">公司</th>
						<th style="width:220px;">地址</th>
						<th style="width:180px;">电话</th>
						<th style="width:90px;">状态</th>
						<th style="width:380px;">操作</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="item in list">
					   <td><input type="checkbox" name="select[]" value="{{item.id}}"></td>
						<td>{{item.realname}}</td>
						<td>{{item.company}}</td>
						<td>{{item.address}}</td>
						<td>{{item.mobile}}</td>
						<td>{{item.status}}</td>
						<td >
							<a class="btn btn-default" href="{{item.shenhe}}">{{item.shenhetitle}}</a>
							<a class="btn btn-default" href="{{item.reply}}">重新发送密码</a>
							<a class="btn btn-default" href="{{item.log}}">核销记录</a>
							<a class="btn btn-default" href="{{item.false}}">审核失败</a>
							<a class="btn btn-default" href="{{item.delete}}">删除</a>
						</td>
					</tr>
				</tbody>
				<tr>
					<td><input type="checkbox" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck});"></td>
                    <td colspan="12">
                        <input type="submit" class="btn btn-danger" name="delete" value="删除" />
                        <input type="submit" class="btn btn-pramary" name="upload" value="导出选定数据" />
                        <input type="submit" class="btn btn-pramary" name="uploadall" value="导出所有数据" />
                        <input type="submit" class="btn btn-pramary" name="shenheall" value="批量审核通过" />
                        <input type="submit" class="btn btn-pramary" name="noshenheall" value="批量审核失败" />
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
<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  if($act == 'rss') { ?>
<div class="main">
<form action="" method="post" class="form-horizontal" role="form" ng-controller="formCtrl" id="form2">
	<div class="panel panel-default">
		<div class="panel-heading">
			帖子管理
		</div>
		<div class="panel-body table-responsive">
			<table class="table table-hover" style="display:auto;">
				<thead class="navbar-inner">
					<tr>
					   <th style="width:25px;">选？</th>
						<th style="width:460px;">标题</th>
						<th style="width:460px;">链接</th>
						<th style="width:80px;">操作</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="item in list">
					   <td><input type="checkbox" name="select[]" value="{{item.url}}"></td>
						<td>{{item.title}}</td>
						<td >
							<a class="btn btn-default" href="{{item.url}}">查看</a>
							<a class="btn btn-default" href="{{item.post}}">摘取</a>
						</td>
					</tr>
				</tbody>
				<tr>
					<td><input type="checkbox" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck});"></td>
                    <td colspan="12">
                        <input type="submit" class="btn btn-danger" name="getall" value="一键摘取" />
                    </td>
				</tr>
			</table>
			
		</div>
	</div>
</form>
</div>

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
<?php  } ?>

<?php  if(empty($act)) { ?>
<ul class="nav nav-tabs" id="myTab">
	<li class="active"><a href="<?php  echo $this->createWebUrl('index',array('doo'=>'index','op'=>'rss'));?>">RSS列表</a></li>
	<li><a href="<?php  echo $this->createWebUrl('index',array('doo'=>'index','op'=>'rss','act'=>'post'));?>">添加RSS</a></li>
</ul>
<div class="main">
<form action="" method="post" class="form-horizontal" role="form" ng-controller="formCtrl" id="form2">
	<div class="panel panel-default">
		<div class="panel-heading">
			帖子管理
		</div>
		<div class="panel-body table-responsive">
			<table class="table table-hover" style="display:auto;">
				<thead class="navbar-inner">
					<tr>
					   <th style="width:25px;">选？</th>
						<th style="width:160px;">标题</th>
						<th style="width:260px;">RSS地址</th>
						<th style="width:120px;">所属版块</th>
						<th style="width:100px;">状态</th>
						<th style="width:480px;">操作</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="item in list">
					   <td><input type="checkbox" name="select[]" value="{{item.id}}"></td>
						<td>{{item.title}}</td>
						<td>{{item.url}}</td>
						<td>{{item.threadclass}}</td>
						<td>{{item.status}}</td>
						<td >
							<a class="btn btn-default" href="{{item.post}}">编辑</a>
							<a class="btn btn-default" href="{{item.rss}}">手工更新</a>
							<a class="btn btn-default" href="{{item.auto}}">{{item.autotitle}}</a>
							<a class="btn btn-default" href="{{item.delete}}">删除</a>
						</td>
					</tr>
				</tbody>
				<tr>
					<td><input type="checkbox" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck});"></td>
                    <td colspan="12">
                        <input type="submit" class="btn btn-danger" name="delete" value="删除" />
                        <input type="submit" class="btn btn-pramary" name="rss" value="更新所选" />
                        <input type="submit" class="btn btn-pramary" name="rssall" value="更新全部" />
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
<?php  } ?>

<?php  if($act == 'post') { ?>
<ul class="nav nav-tabs" id="myTab">
	<li><a href="<?php  echo $this->createWebUrl('index',array('doo'=>'index','op'=>'rss'));?>">RSS列表</a></li>
	<li class="active"><a href="<?php  echo $this->createWebUrl('index',array('doo'=>'index','op'=>'rss','act'=>'post'));?>">添加RSS</a></li>
</ul>
<script type="text/javascript" src="resource/js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="resource/js/lib/jquery-ui-1.10.3.min.js"></script>
<script>
    require(['jquery', 'angular', 'util', 'underscore'], function($, angular, u, _){

        $(function(){
            angular.module('app', []).controller('custom', function($scope, $http) {
                $scope.submit = function() {
                    var message = '';
                    
                    if(message) {
                        u.message(message);
                    } else {
                        $('#theform')[0].submit();
                    }
                };
            });
            angular.bootstrap(document, ['app']);
        });
    });

</script>
<style>

</style>
<div class="clearfix">
    <form id="theform" class="form form-horizontal ng-cloak" action="" method="post" ng-controller="custom">
        <div class="panel panel-default">
            <div class="panel-body">
            	
                <div class="form-group">
                    <label class="col-sm-2 control-label">所属主题</label>
                    <div class="col-sm-5">
                    
                    	<select name="fid" class="form-control" style="border: none;">
		                   <?php  if(is_array($cats)) { foreach($cats as $cat) { ?>
		            		<option value="<?php  echo $cat['typeid'];?>" <?php  if($cat['typeid']==$setting['fid']) { ?>selected<?php  } ?> <?php  if(!empty($cat['ch'])) { ?>disabled<?php  } ?>>|<?php  echo $cat['name'];?></option>
		            			<?php  if(is_array($cat['ch'])) { foreach($cat['ch'] as $ca) { ?>
		            				<option value="<?php  echo $ca['typeid'];?>" <?php  if($ca['typeid']==$setting['fid']) { ?>selected<?php  } ?>>--|<?php  echo $ca['name'];?></option>
		            			<?php  } } ?>
		            		<?php  } } ?>
		            	</select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">RSS标题</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="text" name="title" value="<?php  echo $setting['title'];?>"/>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-sm-2 control-label">RSS地址</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="text" name="url" value="<?php  echo $setting['url'];?>"/>
                        
                    </div>
                    <label onclick="window.location.href='http://rss.qq.com/tech.htm'" class="btn btn-default">去找RSS</label>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">状态</label>
                    <div class="col-sm-5">
					  <label class="btn btn-default">
					    <input type="radio" name="status" value="1"  <?php  if($setting['status'] == 1) { ?>checked<?php  } ?>>自动执行
					  </label>
					  
					  <label class="btn btn-default">
					    <input type="radio" name="status" value="0"  <?php  if($setting['status'] == 0) { ?>checked<?php  } ?>>手动执行
					  </label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-md-2 col-lg-1">
                        <input type="button" value="保存" class="btn btn-primary btn-block" ng-click="submit();" />
                        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                    </div>
                </div>
            </div>
        </div>
        
    </form>
</div>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
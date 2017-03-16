<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li><a href="<?php  echo $this->createWebUrl('threadclass');?>">主题列表</a></li>
    <?php  if(empty($setting['typeid'])) { ?>
    <li class="active"><a href="<?php  echo $this->createWebUrl('threadclass', array('foo'=>'create'));?>">新增主题</a></li>
    <?php  } else { ?>
    <li class="active"><a href="<?php  echo $this->createWebUrl('threadclass', array('foo'=>'create', 'id'=>$setting['typeid']));?>">编辑主题</a></li>
    <?php  } ?>
</ul>
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
<div class="clearfix">
    <form id="theform" class="form form-horizontal ng-cloak" action="" method="post" ng-controller="custom">
        <div class="panel panel-default">
            <div class="panel-heading">
              <a class="btn btn-default" href="<?php  echo $this->createWebUrl('threadclass')?>">板块列表</a>
				<a class="btn btn-success" href="<?php  echo $this->createWebUrl('threadclass', array('foo'=>'create'))?>">新增版块</a>
				<a class="btn btn-default" href="<?php  echo $this->createWebUrl('credit')?>">快捷操作</a>
            </div>
            <div class="panel-body">
            	
                <div class="form-group">
                    <label class="col-sm-2 control-label">所属主题</label>
                    <div class="col-sm-5">
                    	<select name="fid" class="form-control" style="border: none;">
                    	<option value="0" <?php  if(empty($setting['fid'])) { ?>selected<?php  } ?>>顶级主题</option>
		                   <?php  if(is_array($cats)) { foreach($cats as $cat) { ?>
		                   
		            		<option value="<?php  echo $cat['typeid'];?>" <?php  if($cat['typeid']==$setting['fid']) { ?>selected<?php  } ?>>|<?php  echo $cat['name'];?></option>
		            			<?php  if(is_array($cat['ch'])) { foreach($cat['ch'] as $ca) { ?>
		            				<option value="<?php  echo $ca['typeid'];?>" <?php  if($ca['typeid']==$setting['fid']) { ?>selected<?php  } ?>>--|<?php  echo $ca['name'];?></option>
		            			<?php  } } ?>
		            		<?php  } } ?>
		            	</select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">主题名字</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="text" name="name" value="<?php  echo $setting['name'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">显示顺序</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="text" name="displayorder" value="<?php  echo $setting['displayorder'];?>"/>
                    </div>
                </div>
                
                <div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger">*</span>可查看的会员组</label>
					<div class="col-sm-9 col-xs-12">
					
					<div class="btn-group" data-toggle="buttons">
					  
					  <label class="btn btn-default <?php  if(in_array(-1, (array)$setting['look_group'])) { ?>active<?php  } ?>">
					    <input type="checkbox" name="look_group[]" value="-1"  <?php  if(in_array(-1, (array)$setting['look_group'])) { ?>checked<?php  } ?>>游客(或未关注)
					  </label>
					  <?php  if($group) { ?>
					  <?php  if(is_array($group)) { foreach($group as $li) { ?>
					  <label class="btn btn-default <?php  if(in_array($li['groupid'], (array)$setting['look_group'])) { ?>active<?php  } ?>">
					    <input type="checkbox" name="look_group[]" value="<?php  echo $li['groupid']?>"  <?php  if(in_array($li['groupid'], (array)$setting['look_group'])) { ?>checked<?php  } ?>><?php  echo $li['title'];?>
					  </label>
					  <?php  } } ?>
					  <?php  } ?>
					</div>
					
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger">*</span>可发帖的会员组</label>
					<div class="col-sm-9 col-xs-12">
					<div class="btn-group" data-toggle="buttons">
					  
					  <label class="btn btn-default <?php  if(in_array(-1, (array)$setting['post_group'])) { ?>active<?php  } ?>">
					    <input type="checkbox" name="post_group[]" value="-1"  <?php  if(in_array(-1, (array)$setting['post_group'])) { ?>checked<?php  } ?>>游客(或未关注)
					  </label>
					  <?php  if($group) { ?>
					  <?php  if(is_array($group)) { foreach($group as $li) { ?>
					  <label class="btn btn-default <?php  if(in_array($li['groupid'], (array)$setting['post_group'])) { ?>active<?php  } ?>">
					    <input type="checkbox" name="post_group[]" value="<?php  echo $li['groupid']?>" <?php  if(in_array($li['groupid'], (array)$setting['post_group'])) { ?>checked<?php  } ?>><?php  echo $li['title'];?>
					  </label>
					  <?php  } } ?>
					  <?php  } ?>
					</div>
					</div>
				</div>
				
                <div class="form-group">
                    <label class="col-sm-2 control-label">主题图标</label>
                    <div class="col-sm-5">
                        <?php  echo tpl_form_field_image('icon',$setting['icon'])?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">主题简介</label>
                    <div class="col-sm-5">
                    <textarea name="content" class="form-control"><?php  echo $setting['content'];?></textarea>
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
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>

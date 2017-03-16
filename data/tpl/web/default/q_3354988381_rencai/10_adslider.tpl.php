<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<ul class="nav nav-tabs">
	    <li class="active"><a href="<?php  echo $this->createWebUrl('ADSlider');?>">幻灯、图片广告投放管理</a></li>
	    <li><a href="<?php  echo $this->createWebUrl('ADSlider', array('op' => 'edit'));?>">添加广告</a></li>
	</ul>
	
	<?php  if($op == 'display') { ?>
    <div style="padding:15px;">
        <table class="table table-hover">
            <thead class="navbar-inner">
                <tr>
                    <th>ID</th>
                    <th>名称</th>
                    <th>位置</th>
                    <th>链接</th>
                    <th>显示</th>
                    <th>排序</th>
                    <th>添加日期</th>
                    <th>过期时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($lists)) { foreach($lists as $row) { ?>
                <tr>
                    <td><?php  echo $row['id'];?></td>
                    <td><?php  echo $row['name'];?></td>
                    <td><?php  echo $row['position'];?></td>
                    <td><a href="<?php  echo $row['link'];?>" target="_blank"><?php  echo $row['link'];?></a></td>
                    <td><?php  if($row['isshow'] == 1) { ?><span class="label label-success">是</span><?php  } else { ?><span class="label label-default">否</span><?php  } ?></td>
                    <td><?php  echo $row['display'];?></td>
                    <td><?php  echo date('Y-m-d',$row['dateline'])?></td>
                    <td><?php  echo date('Y-m-d',$row['exprtime'])?></td>
                    <td>
                        <a href="<?php  echo $this->createWebUrl('ADSlider', array('op' => 'edit', 'id' => $row['id']));?>" class="btn btn-primary btn-sm">编辑</a>
                        <a href="javascript:void(0);" onclick="delete_adslider(<?php  echo $row['id'];?>)" title="删除" class="btn btn-danger btn-sm">删除</a>
                    
                    </td>
                </tr>
                <?php  } } ?>
            </tbody>
        </table>
        <?php  echo $pager;?>
    </div>		
	
	<?php  } else { ?>

    <div class="col-sm-8">
    
    <form class="form-horizontal form" id="form2" action="" method="post">
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">广告名称</label>
			<div class="col-sm-8">
			  <input type="text" name="data[name]" value="<?php  echo $row['name'];?>" class="form-control" placeHolder="请输入广告名称">
			</div>
		</div>
		
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">投放位置</label>
			<div class="col-sm-8">
				<select class="form-control" name="data[position]">
					<option value="1" <?php  if($row['position'] == 1) { ?> selected <?php  } ?>>位置一</option>
					<option value="2" <?php  if($row['position'] == 2) { ?> selected <?php  } ?>>位置二</option>
				</select>
			</div>
		</div>
		<div class="alert alert-info" role="alert" style="margin-top:5px">
		    <em>位置一：按照4:3比例。请事先设计好。</em><br />
            <em>位置二：宽160px高55px，请事先设计好。</em>
		</div>				
		<div class="form-group">
			<label class="col-sm-2 control-label">图片</label>
			<div class="col-sm-8">
			<?php  echo tpl_form_field_image('data[url]', $row['url']);?>
			</div>
		</div>

        <div class="form-group">
            <label class="col-sm-2 control-label">过期时间</label>
            <div class="col-sm-8">
                <?php  echo tpl_form_field_date('data[exprtime]', $value = $row['exprtime'], $withtime = false)?>
            </div>
        </div>

		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">链接</label>
			<div class="col-sm-8">
			  <input type="text" name="data[link]" value="<?php  echo $row['link'];?>" class="form-control" placeHolder="请输入链接">
			</div>
		</div>
		
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">是否显示</label>
			<div class="col-sm-8">
				<select class="form-control" name="data[isshow]">
					<option <?php  if($row['isshow'] == 1) { ?>selected<?php  } ?> value="1">是</option>
					<option <?php  if($row['isshow'] == 0) { ?>selected<?php  } ?>value="0">否</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">排序</label>
			<div class="col-sm-8">
			  <input type="text" name="data[display]" value="<?php  echo $row['display'];?>" class="form-control" placeHolder="请输入排序">
			</div>
			
		</div>
		<div class="alert alert-info" role="alert" style="margin-top:5px">
		<p><em>越小越靠前</em></p>
		</div>				
        <div class="form-group col-sm-12">
                <input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
                <input name="adid" type="hidden" value="<?php  echo $row['id'];?>" />
                <input type="submit" class="btn btn-primary col-lg-1" name="submit" value="提交" />
            </div>
    </form>
    
    </div>
    
    <div class="col-sm-4">
        <img src="../addons/q_3354988381_rencai/template/static/images/ad_show.jpg" width="360px" alt="..." class="img-thumbnail">
    
    </div>
    <?php  } ?>
</div>

<script>
    function delete_adslider(adid){

        $.get(
            '<?php  echo $this->createWebUrl("ADSliderDeleteAjax");?>',
            {'id':adid},
            function(data){
                alert(data);
                location.reload();
            }
        );
    }

</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
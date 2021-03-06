<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<ul class="nav nav-tabs">
	<li class="active"><a href="">人才字段管理</a></li>
</ul>

<?php  if($do == 'display') { ?>
<form action="" method="post">
<input type="hidden" name="fields_type" value="sys" />
<div class="panel panel-default">
	<div class="panel-heading panel-title">
		系统字段管理
	</div>
	<div class="panel-body table-responsive" id="sys">
		<table class="table table-hover">
		<thead class="navbar-inner">
			<tr>
				<th>排序</th>
				<th>字段</th>
				<th>默认标题</th>
                <th style="width:250px">自定义标题</th>
				<th>是否启用</th>
			</tr>
		</thead>
		<tbody>
			<?php  if(is_array($fields_arr['sys'])) { foreach($fields_arr['sys'] as $field => $field_item) { ?>
            <?php  list($title, $label_info) = explode('|', $field_item);?>
			<tr>
				<td>
					<input type="text" class="form-control" style="width: 50%;" name="sort_<?php  echo $field;?>" value="<?php  echo $fields_list[$field]['sort'];?>" />
				</td>
				<td><?php  echo $field;?></td>
                <td title="<?php  echo $label_info;?>"><?php  echo $title;?></td>
				<td>
                	<input style="width:230px" type="text" class="form-control" style="width: 150%;" name="user_label_<?php  echo $field;?>" value="<?php  echo $fields_list[$field]['user_label'];?>" />
                </td>
				<td>
					<input type="checkbox" name="show_<?php  echo $field;?>" value="1" <?php  if($fields_list[$field]['show']) { ?> checked <?php  } ?> />
				</td>
			</tr>
			<?php  } } ?>
			<tr>
				<td></td>
				<td></td>
				<td></td>
                <td></td>
				<td>
					<input type="checkbox" id="selectAll_sys" onclick="var ck = this.checked;$('#sys :checkbox').each(function(){this.checked = ck});">
					<a class="btn btn-success btn-sm" style="margin-left: -25px;" onclick="$('#selectAll_sys').click();">全选</a>
				</td>
				
			</tr>
		</tbody>
	</table>
	</div>
	<div>
		<button type="submit" class="btn btn-primary col-lg-1" name="submit" value="提交">提交</button>
		<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
	</div>
</div>
</form>


<br /><br />
<form action="" method="post">
<input type="hidden" name="fields_type" value="person" />
<div class="panel panel-default">
	<div class="panel-heading">
		求职者字段管理
	</div>
	<div class="panel-body table-responsive" id="person">
		<table class="table table-hover">
		<thead class="navbar-inner">
			<tr>
				<th>排序</th>
				<th>字段</th>
				<th>默认标题</th>
                <th style="width:250px">自定义标题</th>
				<th>是否启用</th>
			</tr>
		</thead>
		<tbody>
        <?php  if($fields_list) { ?>
        	<?php  if(is_array($fields_list)) { foreach($fields_list as $field => $field_item) { ?>
            	<?php  if ('sys_' == substr($field, 0, 4)) continue;?>
			<tr>
				<td>
					<input type="text" class="form-control" style="width: 50%;" name="sort_<?php  echo $field;?>" value="<?php  echo $field_item['sort'];?>" />
				</td>
				<td><?php  echo $field;?></td>
                <td><?php  echo $field_item['label'];?></td>
				<td>
                	<input style="width:230px" type="text" class="form-control" style="width: 150%;" name="user_label_<?php  echo $field;?>" value="<?php  echo $field_item['user_label'];?>" />
                </td>
				<td>
					<input type="checkbox" name="show_<?php  echo $field;?>" value="1" <?php  if($fields_list[$field]['show']) { ?> checked <?php  } ?> />
				</td>
			</tr> 
            <?php  } } ?> 
        <?php  } else { ?>      
			<?php  if(is_array($fields_arr['person'])) { foreach($fields_arr['person'] as $field => $field_item) { ?>
            <?php  list($title, $label_info) = explode('|', $field_item);?>
			<tr>
				<td>
					<input type="text" class="form-control" style="width: 50%;" name="sort_<?php  echo $field;?>" value="<?php  echo $fields_list[$field]['sort'];?>" />
				</td>
				<td><?php  echo $field;?></td>
                <td title="<?php  echo $label_info;?>"><?php  echo $title;?></td>
				<td>
                	<input style="width:230px" type="text" class="form-control" style="width: 150%;" name="user_label_<?php  echo $field;?>" value="<?php  echo $fields_list[$field]['user_label'];?>" />
                </td>
				<td>
					<input type="checkbox" name="show_<?php  echo $field;?>" value="1" <?php  if($fields_list[$field]['show']) { ?> checked <?php  } ?> />
				</td>
			</tr>
			<?php  } } ?>
        <?php  } ?>
			<tr>
				<td></td>
				<td></td>
				<td></td>
                <td></td>
				<td>
					<input type="checkbox" id="selectAll_person" onclick="var ck = this.checked;$('#person :checkbox').each(function(){this.checked = ck});">
					<a class="btn btn-success btn-sm" style="margin-left: -25px;" onclick="$('#selectAll_person').click();">全选</a>
				</td>
				
			</tr>
		</tbody>
	</table>
	</div>
	<div>
		<button type="submit" class="btn btn-primary col-lg-1" name="submit" value="提交">提交</button>
		<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
	</div>
</div>
</form>    

<?php  } else if($do == 'post') { ?>
<?php  } ?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
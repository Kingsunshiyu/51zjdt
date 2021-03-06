<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<script src="../addons/q_3354988381_rencai/amaze/js/jquery-1.9.1.js" type="text/javascript"></script>

<script>
$(document).ready(function() {
    $('input[type=radio]').on('click', function() { 
		var selectedVal = $("input:radio:checked").val();
		if (selectedVal == 'D') {
			$('#div_positiontype').hide();
		} else {
			$('#div_positiontype').show();
		}
	});
});
</script>
<div class="main">
    <ul class="nav nav-tabs">
        <li class="active"><a href="<?php  echo $this->createWebUrl('index_theme');?>">首页主题设置</a></li>
    </ul>
<form action="<?php  echo $this->createWebUrl('index_theme');?>" class="form-horizontal form" method="post">            
    <div class="panel panel-default">
        <div class="panel-body table-responsive">
            <div style="width:50%; float:left; text-align:center">
                <img src="../addons/q_3354988381_rencai/template/static/images/theme_d.jpg" />
                <p><input type="radio" <?php  if($theme_flag=='D') { ?>checked="checked"<?php  } ?> name="theme_type" value="D" />默认主题
                <p><span class="label label-success">职位类型采用“参数配置”模式</span>
            </div>
            <div style="width:50%; float:left; text-align:center">
                <img src="../addons/q_3354988381_rencai/template/static/images/theme_z.jpg" />
                <p><input type="radio" <?php  if($theme_flag=='Z') { ?>checked="checked"<?php  } ?> name="theme_type" value="Z" />职位分类主题
                <p><span class="label label-success">职位类型采用“图文方式”模式，配置如下</span>
            </div>        
        </div>
    </div>
    
  <div class="panel panel-default" id="div_positiontype" style="display:<?php  if($theme_flag=='D') { ?>none<?php  } ?>">
    <div class="panel-body table-responsive">
        <table class="table table-hover">
            <thead class="navbar-inner">
                <tr>
                    <th style="width:80px;">序号</th>
                    <th class="row-hover" style="">职位类型名称</th>
                    <th class="row-hover" style="">首页缩略图</th>
                    <th style="">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list_data)) { foreach($list_data as $row) { ?>
                <tr> 
                    <td><input type="text" name="sort_<?php  echo $row['id'];?>" value="<?php  echo $row['sort'];?>" /></td>
                    <td><input type="text" name="name_<?php  echo $row['id'];?>" value="<?php  echo $row['name'];?>" /></td>
                    <td>
                    <?php  echo tpl_form_field_image('logo_'.$row['id'], $row['logo'])?>
                    <br />建议图片比例：160*80                                        
                    </td>
                    <td>
                      <a class="btn btn-danger btn-sm btn-xs" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('index_theme',array('op'=>'delete', 'id'=>$row['id']))?>');" title="删除">删除</a>
                    </td>
                </tr>
                <?php  } } ?>
                <tr> 
                    <td><input type="text" name="sort" /></td>
                    <td><input type="text" name="name" /></td>
                    <td>
                    <?php  echo tpl_form_field_image('logo', '')?>
                    <br />建议图片比例：160*80                    
                    </td>
                    <td>-</td>
                </tr>                
            </tbody>           
        </table>
    </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <input name="submit" type="submit" value="提交" class="btn btn-primary col-lg-1">
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
    </div>
</form> 

    <ul class="nav nav-tabs">
        <li class="active"><a href="<?php  echo $this->createWebUrl('index_theme');?>">发布页设置</a></li>
    </ul>
<form action="<?php  echo $this->createWebUrl('index_theme');?>" class="form-horizontal form" method="post">            
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">企业Logo</label>
            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_image('public_index_logo', $public_index_logo)?>
                <br />要求图片尺寸：169*89，格式：png透明背景
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">宣传语</label>
            <div class="col-sm-8">
                <input type="text" name="public_index_admsg" value="<?php  echo $public_index_admsg;?>" class="form-control">
            </div>
        </div>        
        
    <div class="form-group">
        <div class="col-sm-12">
            <input name="submit2" type="submit" value="提交" class="btn btn-primary col-lg-1">
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
    </div>    
</form>        
</div>
<script type="text/javascript">
    function drop_confirm(msg, url){
        if(confirm(msg)){
            window.location = url;
        }
    }
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
    <ul class="nav nav-tabs">
    	<li class=""><a href="<?php  echo $this->createWebUrl("Zhaounit", array("id" => 0));?>">入驻企业管理</a></li> 
        <li class="active"><a href=""><?php echo $row['id']>0 ? '企业编辑' : '企业添加';?></a></li>           
    </ul>
    <div class="main">
    
        <form class="form-horizontal" action="" role="form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        <input type="hidden" name="cid" value="<?php  echo $row['id'];?>" />

      

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">企业名称</label>
            <div class="col-sm-4">
                <input type="text" name="data[name]" value="<?php  echo $row['name'];?>" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">绑定微信Openid</label>
            <div class="col-sm-4">
                <input type="text" name="data[from_user]" value="<?php  echo $row['from_user'];?>" class="form-control"  placeholder="如o4dYfsy2cx6xyq1rfQ4OzfGHM6u4" >如o4dYfsy2cx6xyq1rfQ4OzfGHM6u4
            </div>
        </div>  

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">所在城市</label>
            <div class="col-sm-4">
            <select id="p"  name="data[province]" class="form-control" style=" width:30%;display:inline; float:left"></select>
            <select id="c"  name="data[city]" class="form-control" style=" width:30%;display:inline; margin-left:10px"></select>  
            <select id="d"  name="data[district]" class="form-control" style=" width:30%;display:inline; margin-left:10px"></select>           
            </div>
        </div>
                
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">企业Logo</label>
            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_image('data[logo]', $row['logo'])?>
                <br />建议图片比例：160*120
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">企业封面</label>
            <div class="col-sm-9 col-xs-12">
            	<?php  echo tpl_form_field_image('data[avatar]', $row['avatar'])?>
                <br />建议图片比例：160*120
            </div>
        </div>  
         
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">营业执照</label>
            <div class="col-sm-9 col-xs-12">
            	<?php  echo tpl_form_field_image('data[license]', $row['license'])?>
                <br />建议图片比例：160*120
            </div>
        </div>         
             
        
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">行业分类</label>
            <div class="col-sm-4">
                <select name="data[industry]" class="form-control">
                    <?php  if(is_array($parents)) { foreach($parents as $key => $industry) { ?>
                        <option value="<?php  echo $industry['id'];?>" <?php  if(!empty($industry['sub'])) { ?> disabled="disabled" <?php  } ?> <?php  if($row['industry'] == $industry['id'] ) { ?>selected<?php  } ?>  ><?php  echo $industry['name'];?></option>
                        <?php  if(is_array($industry['sub'])) { foreach($industry['sub'] as $k => $subs) { ?>
                        <option value="<?php  echo $subs['id'];?>" <?php  if(intval($subs['id']) == intval($row['industry'])) { ?> selected <?php  } ?> <?php  if($row['industry'] == $subs['id'] ) { ?>selected<?php  } ?> >&nbsp;|— <?php  echo $subs['name'];?></option>
                        <?php  } } ?>
                    <?php  } } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">地址</label>
            <div class="col-sm-4">
                <input type="text" name="data[address]" value="<?php  echo $row['address'];?>" class="form-control">
            </div>
        </div>


        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">联系人</label>
            <div class="col-sm-4">
                <input type="text" name="data[contact]" value="<?php  echo $row['contact'];?>" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">电话</label>
            <div class="col-sm-4">
                <input type="text" name="data[mobile]" value="<?php  echo $row['mobile'];?>" class="form-control">
            </div>
        </div>


        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">规模</label>
            <div class="col-sm-4">
                <select class="form-control" name="data[scale]">
                    <?php  if(is_array($config['scale'])) { foreach($config['scale'] as $key => $welfare) { ?>
                    <option value="<?php  echo $key;?>" <?php  if(intval($row['scale']) == intval($key)) { ?> selected <?php  } ?>><?php  echo $welfare;?></option>
                    <?php  } } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">公司性质</label>
            <div class="col-sm-4">
                <select class="form-control" name="data[type]">
                    <?php  if(is_array($config['companytype'])) { foreach($config['companytype'] as $key => $type) { ?>
                    <option value="<?php  echo $key;?>" <?php  if(intval($row['type']) == intval($key)) { ?> selected <?php  } ?>><?php  echo $type;?></option>
                    <?php  } } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">公司简介</label>
           
            <div class="col-sm-8">
                <textarea name="data[description]" class="form-control richtext" rows="10"><?php  echo $row['description'];?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">认证</label>
            <div class="col-sm-4">
                <select class="form-control" name="data[isauth]">
                    <option value="0" <?php  if($row['isauth'] == 0) { ?> selected <?php  } ?>>未认证</option>
                    <option value="1" <?php  if($row['isauth'] == 1) { ?> selected <?php  } ?>>电话认证</option>
                    <option value="2" <?php  if($row['isauth'] == 2) { ?> selected <?php  } ?>>执照认证</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">已查看简历数</label>
            <div class="col-sm-4">
                <input type="text" name="data[view_resume_nums]" value="<?php  echo $row['view_resume_nums'];?>" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">可查看简历数</label>
            <div class="col-sm-4">
                <input type="text" name="data[view_resume_total]" value="<?php  echo $row['view_resume_total'];?>" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">状态</label>
            <div class="col-sm-4">
                <select class="form-control" name="data[status]">
                	<option value="0" <?php  if(isset($row['status']) && $row['status'] == 0) { ?> selected <?php  } ?>>待审</option>
                    <option value="1" <?php  if($row['status'] == 1) { ?> selected <?php  } ?>>通过</option>
                    <option value="-1" <?php  if(isset($row['status']) && $row['status'] == -1) { ?> selected <?php  } ?>>拒绝</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label"><?php  echo $this->getFieldsArr('sys', 'sys_position');?></label>
            <div class="col-sm-4">
                <select style="width:100px; display:inline" class="form-control" name="data[position]">
                    <option value="1" <?php  if($row['position'] == 1) { ?> selected <?php  } ?>>是</option>
                    <option value="0" <?php  if(isset($row['position']) && $row['position'] == 0) { ?> selected <?php  } ?>>否</option>
                </select>&nbsp;&nbsp;&nbsp;&nbsp;
                排序：
                <input title="越大越靠前" type="text" style="width:100px; display:inline" name="data[position_sort]" value="<?php  echo $row['position_sort'];?>" class="form-control" />
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">地图</label>
            <div class="col-sm-4">
                <?php  echo tpl_form_field_coordinate('data[coordinate]', $value = array('lng'=>$coordinate['lng'], 'lat'=>$coordinate['lat']));?>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">可查看简历</label>
            <div class="col-sm-4">
            	<input type="checkbox" value="0" name="data[cant_resume]" <?php  if($row['cant_resume'] == 0) { ?>checked="checked"<?php  } ?> />允许
            </div>
        </div>
        
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">排序</label>
            <div class="col-sm-4">
                <input style="width:100px" type="text" class="form-control" placeholder="" name="data[sort]" value="<?php  echo $row['sort'];?>">
            	<br />越小越靠前
            </div>
        </div>
        

                
        <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="hidden" name="companyid" value="<?php  echo $row['id'];?>">
            <input type="submit" class="btn btn-primary" name="save_info" value="保存">
        </div>
    </div>
    </form>
</div>
<script type="text/javascript">
require(['jquery', 'util'], function($, u){
		$(function(){
			u.editor($('.richtext')[0]);
		});
});
</script>
<script type="text/javascript">
require(['jquery', 'district'], function($, d){
	$(function(){
		d.render(
			{province: $('#p')[0], city: $('#c')[0], district: $('#d')[0]},
			{province: '<?php  echo $row['province'];?>', city: '<?php  echo $row['city'];?>', district: '<?php  echo $row['district'];?>'},
			{withTitle: true}
		);
	});
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<?php  load()->func('tpl')?>
<div class="main">
    <ul class="nav nav-tabs">
        <li <?php  if($op=='list' || empty($op)) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('course');?>">课程管理</a></li>
        <?php  if($op=='edit' && empty($item['id'])) { ?>
        <li class="active"><a href="<?php  echo $this->createWebUrl('course',array('op'=>'edit'));?>">添加课程</a></li>
        <!--<li class="active"><a href="<?php  echo $this->createWebUrl('paper',array('op'=>'edit'));?>">添加试卷</a></li>-->
        <?php  } ?>
        <?php  if($op=='edit' && !empty($item['id'])) { ?>
        <li class="active"><a href="<?php  echo $this->createWebUrl('course', array('op'=>'edit','id'=>$id));?>">编辑课程</a></li>
        <?php  } ?>
    </ul>
    <form action="" class="form-horizontal form" method="post" enctype="multipart/form-data" onsubmit="return formcheck()">
        <input type="hidden" name="id" value="<?php  echo $item['id'];?>">
        <input type="hidden" name="tid" value="<?php  echo $tid;?>">
    	<div class="panel panel-default">
        	<div class="panel-heading">
               课程编辑
            </div>
            <div class="panel-body">
              	<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
                    <div class="col-sm-9 col-xs-12">   
                        <input type='text' id='displayorder' name='displayorder' value="<?php  echo $item['displayorder'];?>" class='form-control' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">课程分类</label>
                    <div class="col-sm-9 col-xs-12">   
                        <input type='hidden' id='ccate' name='ccate' value="<?php  echo $paper_category['id'];?>" />
                        <div class='input-group'>
                           	<input type="text" name="paper_category" maxlength="30" value="<?php  echo $paper_category['title'];?>" id="paper_category" class="form-control" readonly />
                   			<div class='input-group-btn'>
                    			<button class="btn btn-default" type="button" onclick="popwin = $('#modal-module-menus1').modal();">选择</button>
                    			<button class="btn btn-default" type="button" onclick="clear_paper_category()">清除</button>
                    		</div>
                        </div>
                       	<div id="modal-module-menus1" class="modal fade ">
                       		<div class='modal-dialog' style='width:920px;'>
                       			<div class="modal-content">
                       				<div class="modal-header">
										<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
										<h3>选择分类</h3>
									</div>
                       				<div class="modal-body">
                         				<div class='input-group'>
                             				<input type="text" class="form-control" name="keyword" value="" id="search-kwd1" placeholder="搜索关键词" />
                                       		<div class='input-group-btn'>
                                       			<button type="button" class="btn btn-default" onclick="search_paper_categorys();">搜索</button>
                                       		</div>
                                       </div>
                           				<div id="module-menus1" style='padding-top:5px;'></div>
                       				</div>
                       				<div class="modal-footer">
										<a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a>
									</div>
                   				</div>
                    		</div>
                       </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">课程标题</label>
                    <div class="col-sm-9 col-xs-12">   
                        <input type='text' id='title' name='title' value="<?php  echo $item['title'];?>" class='form-control' />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">缩略图</label>
                    <div class="col-sm-9 col-xs-12">   
                        <?php  echo tpl_form_field_image('thumb',$item['thumb'])?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">报名限制</label>
					<div class="col-sm-3 col-xs-12">
						<label class="radio-inline">
							<input type="radio" name="ctype" class="ctype" value="0" <?php  if($item['ctype'] == 0) { ?> checked="checked"<?php  } ?>/>
							时间限制
						</label>
					</div>
					<div class="col-sm-5 col-xs-12">
						<?php  echo tpl_form_field_daterange('datelimit', array('starttime'=>date('Y-m-d H:i',$item['starttime']),'endtime'=>date('Y-m-d H:i',$item['endtime'])),array('time'=>true))?>
					</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-3 col-xs-12">
                    	<label class="radio-inline">
                    		<input type="radio" name="ctype" class="ctype" value="1"  <?php  if($item['ctype'] == 1) { ?> checked="checked"<?php  } ?>/>
                        	人数限制
                    	</label>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                    	<div class="input-group">
                        	<span class="input-group-addon">共</span>
                        	<input type="text" class="form-control" name="ctotal" id="ctotal" value="<?php  echo $item['ctotal'];?>" />
                        	<span class="input-group-addon">人</span>
                    	</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">授课讲师</label>
                    <div class="col-sm-9 col-xs-12">   
                         <input type='text' id='teachers' name='teachers' value="<?php  echo $item['teachers'];?>" class='form-control'/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">授课开始时间</label>
                    <div class="col-sm-9 col-xs-12">   
                        <?php echo tpl_form_field_date('coursetime', !empty($item['coursetime']) ? date('Y-m-d H:i',$item['coursetime']) : date('Y-m-d H:i'), 1)?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">授课时长</label>
                    <div class="col-sm-3 col-xs-12">   
                        <div class="input-group">
                        	<input type="text" class="form-control" name="times" id="times" value="<?php  echo $item['times'];?>"/>
                        	<span class="input-group-addon">分钟</span>
                    	</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">第几期</label>
                    <div class="col-sm-9 col-xs-12">   
                       <input type='text' id='week' name='week' value="<?php  echo $item['week'];?>" class='form-control'/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">课程简介</label>
                    <div class="col-sm-9 col-xs-12">   
                     	<textarea style="height:100px;" id="description" name="description" class="form-control" cols="60"><?php  echo $item['description'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">课程内容</label>
                    <div class="col-sm-9 col-xs-12">   
                   		<textarea style="height:100px;" id="content" name="content" class="form-control" cols="60"><?php  echo $item['content'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">地址</label>
                    <div class="col-sm-9 col-xs-12">   
                  		<input type='text' id='address' name='address' value="<?php  echo $item['address'];?>" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">所在地区</label>
                    <div class="col-sm-9 col-xs-12">   
                         <?php  echo tpl_form_field_district('district', array('province'=>$item['location_p'],'city'=>$item['location_c'],'district'=>$item['location_a']))?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">坐标</label>
                    <div class="col-sm-9 col-xs-12" style='margin-left:-15px;'>
                        <?php  echo tpl_form_field_coordinate('baidumap', $item)?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">状态</label>
                    <div class="col-sm-9 col-xs-12">
                    <label class="radio-inline">
                    	<input type="radio" name="status" value="1" <?php  if($item['status'] == 1) { ?>checked<?php  } ?>/>显示
                	</label>
                	<label class="radio-inline">
                        <input type="radio" name="status" value="0" <?php  if($item['status'] == 0) { ?>checked<?php  } ?>/>隐藏
                    </label>
                    <span class='help-block'>手机前台是否显示</span>
                    </div>
                </div>
            </div>
        </div>
         <div class="form-group col-sm-12">
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
 		</div>
    </form>
</div>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.4"></script>
<script type="text/javascript" src="http://api.map.baidu.com/getscript?v=1.4&ak=&services=&t=20140102035142"></script>
<script type="text/javascript">
function clear_paper_category(){
    $("#ccate").val("");
    $("#paper_category").val("");
}

function search_paper_categorys() {
    $("#module-menus1").html("正在搜索....")
    $.post('<?php  echo $this->createWebUrl('course_category',array('op'=>'query'));?>', {
        keyword: $.trim($('#search-kwd1').val())
    }, function(dat){
        $('#module-menus1').html(dat);
    });
}

function select_paper_category(o) {
	$("#ccate").val(o.id);
	$("#paper_category").val(o.title);
	$(".close").click();
}

function fill(type, num) {

}
function formcheck() {

	if ($("#title").isEmpty()) {
		Tip.focus("title", "请填写课程标题!", "right");
		return false;
	}

	var has = false;
	$(".ctype").each(function () {

		if ($(this).get(0).checked) {
			has = true;
			return false;
		}
	});
	if (!has) {
		Tip.focus(".ctype:eq(0)", "至少选择一种报名限制类型!", "top");
		return false;
	}

	if ($("#teachers").isEmpty()) {
		Tip.focus("title", "请填写授课讲师!", "right");
		return false;
	}

	if ($("#times").isEmpty()) {
		Tip.focus("times", "请填写授课时长!", "right");
		return false;
	}

	if ($("#week").isEmpty()) {
		Tip.focus("week", "请填写第几期!", "right");
		return false;
	}

	if ($("#address").isEmpty()) {
		Tip.focus("address", "请填写地址!", "right");
		return false;
	}

	return  true;
}
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>

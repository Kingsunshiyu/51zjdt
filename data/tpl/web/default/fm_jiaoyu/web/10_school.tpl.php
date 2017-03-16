<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<?php  if($operation == 'display') { ?>
<style>
    .form-control-excel {
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    }
</style>
<div class="main">
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="fm_jiaoyu" />
                <input type="hidden" name="do" value="school" />
                <div class="form-group">
                    <div class="col-sm-2 col-lg-2">  
					    <?php  if($set['guanli'] == 1 && $_W['isfounder']) { ?>
						<a class="btn btn-primary" href="<?php  echo $this->createWebUrl('school', array('op' => 'post'))?>"><i class="fa fa-plus"></i> 添加学校</a>
						<?php  } else if($set['guanli'] == 0 || $_W['isfounder']) { ?>
						<a class="btn btn-primary" href="<?php  echo $this->createWebUrl('school', array('op' => 'post'))?>"><i class="fa fa-plus"></i> 添加学校</a>
						<?php  } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="table-responsive panel-body">
            <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
                <table class="table table-hover">
                    <thead class="navbar-inner">
                    <tr>
                        <th style="width:3%;">顺序</th>
                        <th style="width:10%;">名称</th>
                        <th style="width:10%;">电话</th>
						<th style="width:5%;">区域</th>
                        <th style="width:7%;">地址</th>
						<th style="width:7%;">固定链接</th>
						<th style="width:7%;">学校数据</th>
                        <th style="width:7%;">学校类型</th>
                        <th style="width:5%;">状态</th>
						<th style="width:5%;"></th>
						<th style="width:12%;text-align: right;">管理/编辑/删除</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  if(is_array($schoollist)) { foreach($schoollist as $item) { ?>
                    <tr>
                        <td><input type="text" class="form-control" name="ssort[<?php  echo $item['id'];?>]" value="<?php  echo $item['ssort'];?>"></td>
                        <td><a href="<?php  echo $this->createWebUrl('start', array('id' => $item['id'], 'schoolid' =>  $item['id']))?>" title="管理">
                            <img src="<?php  echo tomedia($item['logo'])?>" onerror="this.src='./resource/images/nopic.jpg';" width="60px;" style="border-radius: 3px;">
                            <br/><?php  echo $item['title'];?></a>
                        </td>
                        <td><?php  echo $item['tel'];?></td>
                        <td><?php  if(!empty($quyu[$item['areaid']])) { ?><?php  echo $quyu[$item['areaid']]['name'];?><?php  } ?></td>
                        <td>
                           <?php  echo $item['address'];?>
                        </td>
						<td class="row-first row-hover" style="  word-wrap: break-word;"><a class="btn btn-default" href="javascript::;"  data-toggle="tooltip" data-placement="top" title="固定链接" onclick="hdurl('<?php  echo $item['id'];?>');">固定链接</a></td>
					    <td class="row-first row-hover" style="  word-wrap: break-word;"><a class="btn btn-default" href="javascript::;"  data-toggle="tooltip" data-placement="top" title="学校数据" onclick="sj('<?php  echo $item['id'];?>', '<?php  echo pdo_fetchcolumn("select count(*) FROM ".tablename('wx_school_students')." WHERE schoolid = '".$item['id']."'")?>人', '<?php  echo pdo_fetchcolumn("select count(*) FROM ".tablename('wx_school_teachers')." WHERE schoolid = '".$item['id']."'")?>人','<?php  echo pdo_fetchcolumn("select count(*) FROM ".tablename('wx_school_tcourse')." WHERE schoolid = '".$item['id']."'")?>个','<?php  echo pdo_fetchcolumn("select count(*) FROM ".tablename('wx_school_user')." WHERE schoolid = '".$item['id']."'")?>人');">学校数据</a></td>					
                        <td>
                           <?php  if(!empty($leixing[$item['typeid']])) { ?><?php  echo $leixing[$item['typeid']]['name'];?><?php  } ?>
                        </td>						
                        <td style="width:60px;">
                            <?php  if($item['is_show']==1) { ?>
                            <span class="label" style="background:#56af45;">显示</span>
                            <?php  } else { ?>
                            <span class="label" style="background:#f00;">隐藏</span>
                            <?php  } ?>
							</br>
							</br>
                            <?php  if($item['is_rest']==1) { ?>
                            <span class="label" style="background:red;">食谱</span>
                            <?php  } else { ?> 
                            <?php  } ?>							
                        </td>
						<td>
                            <?php  if($item['is_cost']==1) { ?>
                            <span class="label" style="background:#56af45;">收费</span>
                            <?php  } else { ?>
                            <span class="label" style="background:#f00;">未启用收费</span>
                            <?php  } ?>						
						</td>
						<td style="max-width:60px;text-align: right;">
							<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('school', array('id' => $item['id'], 'schoolid' =>  $item['id'], 'op' => 'post'))?>" title="编辑"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-default btn-sm" onclick="return confirm('确认删除吗？');return false;" href="<?php  echo $this->createWebUrl('school', array('id' => $item['id'], 'schoolid' =>  $item['id'], 'op' => 'delete'))?>" title="删除"><i class="fa fa-times"></i></a>
							<a href="<?php  echo $this->createWebUrl('start', array('id' => $item['id'], 'schoolid' =>  $item['id']))?>" class="btn btn-default btn-sm" title="管理学校" data-toggle="tooltip" data-placement="top"><i class="fa fa-cog fa-spin"> </i> 管理</a>							
                        </td>
						
						<!--td style="max-width:60px;text-align: right;"><a class="btn btn-default" href="javascript::;"  data-toggle="tooltip" data-placement="top" title="管理学校" onclick="tankuang('<?php  echo $item['id'];?>');">管理学校</a>
						<a class="btn btn-default" href="javascript::;"  data-toggle="tooltip" data-placement="top" title="管理学校" onclick="tankuang1('<?php  echo $item['id'];?>');">编辑学校</a></td-->						
						
                    </tr>
                    <?php  } } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="7">
                            <input name="submit" type="submit" class="btn btn-primary" value="批量修改排序">
                            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                        </td>
                    </tr>
                    </tfoot>
                </table>
				<?php  echo $pager;?>
            </form>
        </div>
    </div>
	<?php  if($_W['isfounder']) { ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				给开发者建议或留言
			</div>
			<div class="panel-body">
			<div class="row-fluid">
				<div class="span8 control-group">
					【本部分仅创始人可见，不必担心客户或其他管理员能看到】有何建议或BUG请直接提交  联系开发者QQ:<a href="tencent://message/?uin=332035136&Site=qq&Menu=yes">332035136</a> 工作日时间（周一 - 周日 12：00 - 24：00）请直接Q我!其他时间勿扰。
				</div>
			</div>
			</div>
		</div>
	<?php  } ?>	
    <?php  echo $pager;?>
</div>
<input type="hidden" name="rid" id="stylerid" value="" />

<style>
	.template .item{position:relative;display:block;float:left;border:1px #ddd solid;border-radius:5px;background-color:#fff;padding:5px;width:190px;margin:0 20px 20px 0; overflow:hidden;}
	.template .title{margin:5px auto;line-height:2em;}
	.template .title a{text-decoration:none;}
	.template .item img{width:178px;height:270px; cursor:pointer;}
	.template .active.item-style img, .template .item-style:hover img{width:178px;height:270px;border:3px #009cd6 solid;padding:1px; }
	.template .title .fa{display:none}
	.template .active .fa.fa-check{display:inline-block;position:absolute;bottom:33px;right:6px;color:#FFF;background:#009CD6;padding:5px;font-size:14px;border-radius:0 0 6px 0;}
	.template .fa.fa-times{cursor:pointer;display:inline-block;position:absolute;top:10px;right:6px;color:#D9534F;background:#ffffff;padding:5px;font-size:14px;text-decoration:none;}
	.template .fa.fa-times:hover{color:red;}
	.template .item-bg{width:100%; height:342px; background:#000; position:absolute; z-index:1; opacity:0.5; margin:-5px 0 0 -5px;}
	.template .item-build-div1{position:absolute; z-index:2; margin:-5px 10px 0 5px; width:168px;}
	.template .item-build-div2{text-align:center; line-height:30px; padding-top:150px;}
	@media screen and (min-width:992px){#ListStyle{width:890px; margin:100px auto;}}
</style>
<div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="  margin-top: 60px;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">学校数据</h4>
			</div>
			<style>.modal-body {width: 50%;float: left;  border-bottom: 1px solid #F1F3F5;border-right: 1px solid #F1F3F5;}</style>
			<div class="modal-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-5 control-label">学生人数</label>
					<div class="col-sm-3 col-xs-5">
						<a  href="javascript::;"  target="_blank" class="label label-success user_ysh"></a>	
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-5 control-label">教师人数</label>
					<div class="col-sm-3 col-xs-5">
						<a  href="javascript::;"  target="_blank" class="label label-success user_wsh"></a>	
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-5 control-label">课程总数</label>
					<div class="col-sm-3 col-xs-5">
						<a href="javascript::;" target="_blank" class="label label-success user_tprc"></a>	
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-5 control-label">绑定人数</label>
					<div class="col-sm-3 col-xs-5">
						<span class="label label-success user_cyrs"></span>	
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<!--<input type="submit" name="tijiao" id="tijiao" class="btn btn-success" value="开始上传">-->
				<button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>
			</div>
			
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->			

<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="  margin-top: 60px;">
	<div class="modal-dialog" style="  width: 800px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">固定链接</h4>
			</div>
			<style>.modal-body { border-bottom: 1px solid #F1F3F5;}</style>
			<div class="modal-body" style="width: 100%;float: none;">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">本校首页</label>
					<div class="col-sm-3 col-xs-5">
						<span id="tpindex" class="label label-success " style="  word-wrap: break-word;"></span>	

					</div>
				</div>
			</div>
			<div class="modal-body" style="width: 100%;float: none;">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">家长入口</label>
					<div class="col-sm-3 col-xs-5">
						<span  id="tppaihang" class="label label-success "></span>	
					</div>
				</div>
			</div>
			<div class="modal-body" style="width: 100%;float: none;">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">教师入口</label>
					<div class="col-sm-3 col-xs-5">
						<span  id="tpbaoming" class="label label-success "></span>	
					</div>
				</div>
			</div>
			<div class="modal-body" style="width: 100%;float: none;">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">微信绑定</label>
					<div class="col-sm-3 col-xs-5">
						<span  id="bangding" class="label label-success "></span>	
					</div>
				</div>
			</div>
			<div class="modal-body" style="width: 100%;float: none;">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">学生请假</label>
					<div class="col-sm-3 col-xs-5">
						<span  id="xsqj" class="label label-success "></span>	
					</div>
				</div>
			</div>
			<div class="modal-body" style="width: 100%;float: none;">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">对话老师</label>
					<div class="col-sm-3 col-xs-5">
						<span  id="duihua" class="label label-success "></span>	
					</div>
				</div>
			</div>
			<div class="modal-body" style="width: 100%;float: none;">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">班级圈（教师入口）</label>
					<div class="col-sm-3 col-xs-5">
						<span  id="bjq" class="label label-success "></span>	
					</div>
				</div>
			</div>
			<div class="modal-body" style="width: 100%;float: none;">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">班级圈（学生入口）</label>
					<div class="col-sm-3 col-xs-5">
						<span  id="sbjq" class="label label-success "></span>	
					</div>
				</div>
			</div>
			<div class="modal-body" style="width: 100%;float: none;">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">公共报名入口</label>
					<div class="col-sm-3 col-xs-5">
						<span  id="bm" class="label label-success "></span>	
					</div>
				</div>
			</div>			
			<div class="modal-footer">
				<!--<input type="submit" name="tijiao" id="tijiao" class="btn btn-success" value="开始上传">-->
				<button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>
			</div>
			
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="Modal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="  margin-top: 200px;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">请输入管理密码</h4>
			</div>
			<style>.modal-body {width: 100%;float: center;  border-bottom: 1px solid #F1F3F5;border-right: 1px solid #F1F3F5;}</style>
			<div class="modal-body">
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">管理密码</label>
                    <div class="col-sm-9">
                        <input type="text" name="pass" value="" id="pass" class="form-control" />
                    </div>
				</div>
            </div>
            <input type="hidden" name="schooidvalue" id="schooidvalue" value="" />			
			<div class="modal-footer">
				<button type="button" onclick="tijiao();" class="btn btn-success">提交</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>
			</div>
			
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="Modal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="  margin-top: 200px;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">请输入管理密码</h4>
			</div>
			<style>.modal-body {width: 100%;float: center;  border-bottom: 1px solid #F1F3F5;border-right: 1px solid #F1F3F5;}</style>
			<div class="modal-body">
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">管理密码</label>
                    <div class="col-sm-9">
                        <input type="text" name="pass1" value="" id="pass1" class="form-control" />
                    </div>
				</div>
            </div>
            <input type="hidden" name="schooidvalue1" id="schooidvalue1" value="" />			
			<div class="modal-footer">
				<button type="button" onclick="tijiao1();" class="btn btn-success">提交</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>
			</div>
			
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<script type="text/javascript">				
function sj(schoolid,user_ysh,user_wsh,user_tprc,user_cyrs){
	 $('#Modal1').modal('toggle');
	 $('.user_ysh').text(user_ysh);
	 $('.user_wsh').text(user_wsh);
	 $('.user_tprc').text(user_tprc);
	 $('.user_cyrs').text(user_cyrs);
}
function hdurl(schoolid){
	 $('#Modal2').modal('toggle');

	 $('#tpindex').html('<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&j=<?php  echo $_W['uniacid'];?>&c=entry&schoolid=' + schoolid + '&do=detail&m=fm_jiaoyu');
	 $('#tppaihang').html('<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&j=<?php  echo $_W['uniacid'];?>&c=entry&schoolid=' + schoolid + '&do=user&m=fm_jiaoyu');
	 $('#tpbaoming').html('<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&j=<?php  echo $_W['uniacid'];?>&c=entry&schoolid=' + schoolid + '&do=myschool&m=fm_jiaoyu');
	 $('#bangding').html('<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&j=<?php  echo $_W['uniacid'];?>&c=entry&schoolid=' + schoolid + '&do=bangding&m=fm_jiaoyu');
	 $('#xsqj').html('<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&j=<?php  echo $_W['uniacid'];?>&c=entry&schoolid=' + schoolid + '&do=xsqj&m=fm_jiaoyu');
	 $('#duihua').html('<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&j=<?php  echo $_W['uniacid'];?>&c=entry&schoolid=' + schoolid + '&do=jiaoliu&m=fm_jiaoyu');
	 $('#bjq').html('<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&j=<?php  echo $_W['uniacid'];?>&c=entry&schoolid=' + schoolid + '&do=bjq&m=fm_jiaoyu');
	 $('#sbjq').html('<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&j=<?php  echo $_W['uniacid'];?>&c=entry&schoolid=' + schoolid + '&do=sbjq&m=fm_jiaoyu');	
     $('#bm').html('<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&j=<?php  echo $_W['uniacid'];?>&c=entry&schoolid=' + schoolid + '&do=signup&m=fm_jiaoyu');	 
}

function tankuang(schooid){
    $('#Modal3').modal('toggle');
	$('#schooidvalue').val(schooid);	
}

function tankuang1(schooid){
    $('#Modal4').modal('toggle');
	$('#schooidvalue1').val(schooid);	
}

function tijiao(){
	var password = $("#pass").val();
	var schooid = $("#schooidvalue").val();
		var submitData = {
			weid:"<?php  echo $_W['uniacid'];?>",
			schooid : schooid,
			password : password,
		};
	    $.post("<?php  echo $this->createWebUrl('indexajax',array('op'=>'checkpass'))?>",submitData,function(data){

            if(data.result){
				location.href = data.url;
            }else{
				alert(data.msg);
            }
		},'json'); 		
}

function tijiao1(){
	var password1 = $("#pass1").val();
	var schooid1 = $("#schooidvalue1").val();
		var submitData = {
			weid:"<?php  echo $_W['uniacid'];?>",
			schooid1 : schooid1,
			password1 : password1,
		};
	    $.post("<?php  echo $this->createWebUrl('indexajax',array('op'=>'guanli'))?>",submitData,function(data){

            if(data.result){
				location.href = data.url;
            }else{
				alert(data.msg);
            }
		},'json'); 		
}

require(['bootstrap'],function($){
		$('.btn').hover(function(){
			$(this).tooltip('show');
		},function(){
			$(this).tooltip('hide');
		});
	});
	
function drop_confirm(msg, url){
	if(confirm(msg)){
		window.location = url;
	}
}
</script>
<?php  } else if($operation == 'post') { ?>
<link rel="stylesheet" type="text/css" href="../addons/fm_jiaoyu/public/web/css/clockpicker.css" media="all">
<script type="text/javascript" src="../addons/fm_jiaoyu/public/web/js/clockpicker.js"></script>
<link rel="stylesheet" type="text/css" href="../addons/fm_jiaoyu/public/web/css/standalone.css" media="all">
<link rel="stylesheet" type="text/css" href="../addons/fm_jiaoyu/public/web/css/uploadify_t.css?v=4" media="all" />
<style>
    .item_box img{
        width: 100%;
        height: 100%;
    }
</style>
<script>
    $(function(){
        $('.clockpicker').clockpicker();
    })
</script>

<div class="panel panel-info">
     <div class="panel-heading"><a class="btn btn-primary" href="<?php  echo $this->createWebUrl('school', array('op' => 'display'))?>"><i class="fa fa-tasks"></i> 返回学校列表</a></div>
</div>	
<div class="main">
    <form action="" method="post" onsubmit="return check();" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">
                基本信息
            </div>

            <div class="panel-body">
                <?php  if(!empty($reply)) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">链接网址</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">
                            <font color="#428bca"><?php echo $_W['siteroot'] . 'app/index.php?i=' . $reply['weid'] . '&c=entry&schoolid=' . $reply['id'] . '&do=detail&m=fm_jiaoyu'?></font>
                        </p>
                    </div>
                </div>
                <?php  } ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">学校名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" value="<?php  echo $reply['title'];?>" id="title" class="form-control" />
                    </div>
                </div>
				<?php  if($_W['isfounder']) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">管理员帐号</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="uid" id="uid">
                            <option value="0">请选择</option>
                            <?php  if(is_array($user)) { foreach($user as $row) { ?>
                            <option value="<?php  echo $row['uid'];?>" <?php  if($reply['uid']==$row['uid']) { ?>selected<?php  } ?>><?php  echo $row['username'];?></option>
                            <?php  } } ?>
                        </select>
						<div class="help-block">选择要绑定的管理员帐号</div>
                    </div>	
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">启用收费功能</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="is_cost" value="1" <?php  if($reply['is_cost']==1) { ?>checked<?php  } ?>>是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_cost" value="2" <?php  if($reply['is_cost'] ==2 || empty($reply['is_cost'])) { ?>checked<?php  } ?>>否
                        </label>
                    </div>
                </div>                
				<?php  } else { ?>
				<input type="hidden" name="uid" value="<?php  echo $_W['user']['uid'];?>" />				
				<?php  } ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">启用教室监控</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="is_video" value="1" <?php  if($reply['is_video']==1) { ?>checked<?php  } ?>>是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_video" value="2" <?php  if($reply['is_video'] ==2 || empty($reply['is_video'])) { ?>checked<?php  } ?>>否
                        </label>
                    </div>
                </div>				
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">Logo</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('logo', $reply['logo'])?>
						<div class="help-block">如果使用优米考勤机必须为PNG格式图片否则设备上无法显示</div>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">图文消息缩略图</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('thumb', $reply['thumb'])?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">公告</label>
                    <div class="col-sm-9">
                        <input type="text" name="gonggao" value="<?php  echo $reply['gonggao'];?>" id="gonggao" class="form-control" />
                        <div class="help-block">在学校详细页显示</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">校园二维码</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('qroce', $reply['qroce'])?>
						<div class="help-block">显示在手机端文章、教师中心、通知、公告/不设置直接显示本公众号二维码</div>
                    </div>					
                </div>				
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">学校简介</label>
                    <div class="col-sm-9">
                        <input type="text" name="info" value="<?php  echo $reply['info'];?>" id="info" class="form-control" />
                        <div class="help-block">在学校详细页及图文消息里显示显示</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">学校类型</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="type" id="type">
                            <option value="0">请选择</option>
                            <?php  if(is_array($schooltype)) { foreach($schooltype as $item) { ?>
                            <option value="<?php  echo $item['id'];?>" <?php  if($reply['typeid']==$item['id']) { ?>selected<?php  } ?>><?php  echo $item['name'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">所属区域</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="area" id="area">
                            <option value="0">请选择</option>
                            <?php  if(is_array($area)) { foreach($area as $item) { ?>
                            <option value="<?php  echo $item['id'];?>" <?php  if($reply['areaid']==$item['id']) { ?>selected<?php  } ?>><?php  echo $item['name'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">学校介绍</label>
                    <div class="col-sm-9">
                       <?php  echo tpl_ueditor('content', $reply['content']);?>
                    </div>
                </div>	
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">招生简章</label>
                    <div class="col-sm-9">
                       <?php  echo tpl_ueditor('zhaosheng', $reply['zhaosheng']);?>
                    </div>
                </div>				
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">电话</label>
                    <div class="col-sm-9">
                        <input type="text" name="tel" id="tel" value="<?php  echo $reply['tel'];?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">地址</label>
                    <div class="col-sm-9">
                        <input type="text" name="address" id="address" value="<?php  echo $reply['address'];?>" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">坐标</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_coordinate('baidumap', $reply)?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">启用学校</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="is_show" value="1" <?php  if($reply['is_show']==1 || empty($reply)) { ?>checked<?php  } ?>>是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_show" value="0" <?php  if(isset($reply['is_show']) && empty($reply['is_show'])) { ?>checked<?php  } ?>>否
                        </label>
                    </div>
                </div>
                <div class="form-group">	
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">公共模版</label>
                    <div class="col-sm-2 col-lg-2">
                         <div class="input-group">					
                            <input type="text" class="form-control" name="style1" value="<?php  if(!empty($reply['style1'])) { ?><?php  echo $reply['style1'];?><?php  } else { ?>common<?php  } ?>" />
							<div class="help-block">无需登录可以查看的页面目</br>录在addons/fm_jiaoyu/template/mobile/common</br><span style="color:red;font-weight:bold;font-size:15px;">自定义模版，无特殊开发需求不要更改此项目</span></div>
                         </div>
				    </div>
					</div>
				<div class="form-group">	
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">学生中心</label>
                    <div class="col-sm-2 col-lg-2">
                         <div class="input-group">					
                            <input type="text" class="form-control" name="style2" value="<?php  if(!empty($reply['style1'])) { ?><?php  echo $reply['style2'];?><?php  } else { ?>students<?php  } ?>" />
							<div class="help-block">学生或家长登录才能查看的页面</br>目录在addons/fm_jiaoyu/template/mobile/students</br><span style="color:red;font-weight:bold;font-size:15px;">自定义模版，无特殊开发需求不要更改此项目</span></div>
                         </div>
				    </div>
					</div>
				<div class="form-group">	
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">教师中心</label>
                    <div class="col-sm-2 col-lg-2">
                         <div class="input-group">					
                            <input type="text" class="form-control" name="style3" value="<?php  if(!empty($reply['style1'])) { ?><?php  echo $reply['style3'];?><?php  } else { ?>teacher<?php  } ?>" />
							<div class="help-block">需要教师登录后才能查看的页面</br>目录在addons/fm_jiaoyu/template/mobile/teacher</br><span style="color:red;font-weight:bold;font-size:15px;">自定义模版，无特殊开发需求不要更改此项目</span></div>
                         </div>
				    </div>					
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否满员</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="is_hot" value="1" <?php  if($reply['is_hot']==1 || empty($reply)) { ?>checked<?php  } ?>>是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_hot" value="0" <?php  if(isset($reply['is_hot']) && empty($reply['is_hot'])) { ?>checked<?php  } ?>>否
                        </label>
                        <div class="help-block">
                            本校招生是否满员
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否显示食谱</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="is_rest" value="1" <?php  if($reply['is_rest']==1 || empty($reply)) { ?>checked<?php  } ?>>是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_rest" value="0" <?php  if(isset($reply['is_rest']) && empty($reply['is_rest'])) { ?>checked<?php  } ?>>否
                        </label>
                        <div class="help-block">
                            是否在前端显示食谱-默认不显示
                        </div>
                    </div>
                </div>			
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否审核班级圈</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="isopen" value="1" <?php  if($reply['isopen']==1 && !empty($reply)) { ?>checked="true"<?php  } ?>>是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="isopen" value="0" <?php  if(empty($reply['isopen']) || $reply['isopen'] == 0) { ?>checked="true"<?php  } ?>>否
                        </label>
                        <div class="help-block">
                            发布班级圈是否需要班主任审核(各班级必须有班主任或管理员)
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">选课方式</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="issale" value="1" <?php  if($reply['issale']==1 && !empty($reply)) { ?>checked="true"<?php  } ?>>购买方式
                        </label>
                        <!--label class="radio-inline">
                            <input type="radio" name="issale" value="2" <?php  if($reply['issale']==2 && !empty($reply)) { ?>checked="true"<?php  } ?>>购买方式2
                        </label-->
                        <label class="radio-inline">
                            <input type="radio" name="issale" value="3" <?php  if($reply['issale']==3 && !empty($reply)) { ?>checked="true"<?php  } ?>>自由选课
                        </label>
                        <!--label class="radio-inline">
                            <input type="radio" name="issale" value="4" <?php  if($reply['issale']==4 && !empty($reply)) { ?>checked="true"<?php  } ?>>自由选课2
                        </label-->
                        <label class="radio-inline">
                            <input type="radio" name="issale" value="5" <?php  if(empty($reply['issale']) || $reply['issale'] == 5) { ?>checked="true"<?php  } ?>>关闭
                        </label>						
                        <div class="help-block">
                            购买方式：前端购买课程显示在订单列表以及我的在读课程<span style="color:red;font-weight:blod;">（必须认证服务号）</span>
					   </br>自由选课：不显示在订单中学,只显示在我的在读课程里<span style="color:red;font-weight:blod;">（自由报名课程）</span>
					   </br>说明：
					   </br>必须认证服务号使用在线购买
                        </div>
                    </div>
                </div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">启用前端报名</label>
                        <label class="radio-inline">
                            <input type="radio" name="is_sign" value="1" <?php  if($reply['is_sign']== 1) { ?>checked<?php  } ?> id="credit1">是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_sign" value="2" <?php  if($reply['is_sign'] == 2 || empty($reply['is_sign'])) { ?>checked<?php  } ?> id="credit0">否
                        </label>
                        <div class="help-block"></div>
                </div>			
				<div id="credit-status1" <?php  if($reply['is_sign'] == 1) { ?>style="display:block"<?php  } else { ?>style="display:none"<?php  } ?>>
<!-- 					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">报名无需审核</label>
						<div class="col-sm-9">
							<label class="radio-inline">
								<input type="radio" name="is_signpass" value="1" <?php  if($reply['is_signpass'] == 1) { ?>checked<?php  } ?>>是
							</label>
							<label class="radio-inline">
								<input type="radio" name="is_signpass" value="2" <?php  if($reply['is_signpass'] == 2 || empty($reply)) { ?>checked<?php  } ?>>否
							</label>
							<div class="help-block">直接通过无需审核</div>
						</div>
					</div> -->				
<!-- 					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">需要选择年级</label>
						<div class="col-sm-9">
							<label class="radio-inline">
								<input type="radio" name="is_nj" value="1" <?php  if($sign['is_nj'] == 1 || empty($sign)) { ?>checked<?php  } ?> id="credit2">是
							</label>
							<label class="radio-inline">
								<input type="radio" name="is_nj" value="2" <?php  if($sign['is_nj'] == 2) { ?>checked<?php  } ?> id="credit3">否
							</label>
							<div class="help-block">报名时让家长选择学生年级</div>
						</div>
					</div>
					<div id="credit-status2" <?php  if($sign['is_nj'] == 2) { ?>style="display:block"<?php  } else { ?>style="display:none"<?php  } ?>>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label">填写信息审核员OPENID</label>
							<div class="col-sm-9">
								<input type="text" name="manger" value="<?php  echo $reply['manger'];?>" id="manger" class="form-control" />
							</div>
							<div class="help-block">不填写年级时发送至信息审核员，信息审核员必须为已绑定的教师</div>
						</div>						
					</div> -->
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">需要选择班级</label>
						<div class="col-sm-9">
							<label class="radio-inline">
								<input type="radio" name="is_bj" value="1" <?php  if($sign['is_bj']==1) { ?>checked<?php  } ?>>是
							</label>
							<label class="radio-inline">
								<input type="radio" name="is_bj" value="2" <?php  if($sign['is_bj']==2 || empty($sign['is_bj'])) { ?>checked<?php  } ?>>否
							</label>
							<div class="help-block">报名时让家长选择学生班级,一般情况由管理审核时填写班级信息</div>
						</div>
					</div>					
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">需要输入身份证</label>
						<div class="col-sm-9">
							<label class="radio-inline">
								<input type="radio" name="is_idcard" value="1" <?php  if($sign['is_idcard']==1) { ?>checked<?php  } ?>>是
							</label>
							<label class="radio-inline">
								<input type="radio" name="is_idcard" value="2" <?php  if($sign['is_idcard']==2 || empty($sign['is_idcard'])) { ?>checked<?php  } ?>>否
							</label>
							<div class="help-block">报名时身份证是否必填</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">需要输入生日</label>
						<div class="col-sm-9">
							<label class="radio-inline">
								<input type="radio" name="is_bir" value="1" <?php  if($sign['is_bir']==1) { ?>checked<?php  } ?>>是
							</label>
							<label class="radio-inline">
								<input type="radio" name="is_bir" value="2" <?php  if($sign['is_bir']==2 || empty($sign['is_bir'])) { ?>checked<?php  } ?>>否
							</label>
							<div class="help-block">报名时生日是否必填</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">报名启用绑定</label>
						<div class="col-sm-9">
							<label class="radio-inline">
								<input type="radio" name="is_bd" value="1" <?php  if($sign['is_bd']==1) { ?>checked<?php  } ?>>是
							</label>
							<label class="radio-inline">
								<input type="radio" name="is_bd" value="2" <?php  if($sign['is_bd']==2 || empty($sign['is_bd'])) { ?>checked<?php  } ?>>否
							</label>
							<div class="help-block">报名时是否启用报名成功后直接绑定微信功能</div>
						</div>
					</div>					
				</div>				
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
                    <div class="col-sm-9">
                        <input type="text" name="ssort" value="<?php  echo $reply['ssort'];?>" id="ssort" class="form-control" />
                    </div>
                </div>
				</div>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <input type="submit" name="submit" value="保存设置" class="btn btn-primary col-lg-1" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
    </form>
</div>
<script type="text/javascript">
	var category = <?php  echo json_encode($children)?>;
	$('#credit1').click(function(){
		$('#credit-status1').show();
	});
	$('#credit0').click(function(){
		$('#credit-status1').hide();
	});
	$('#credit3').click(function(){
		$('#credit-status2').show();
	});
	$('#credit2').click(function(){
		$('#credit-status2').hide();
	});	
</script>
<script language='javascript'>
    require(['jquery', 'util'], function ($, u) {
        $(function () {
            u.editor($('.richtext')[0]);
        });
    });
</script>
<script type="text/javascript">
    function check() {
        if($.trim($('#title').val()) == '') {
            message('没有输入学校名称.', '', 'error');
            return false;
        }
        return true;
    }
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>

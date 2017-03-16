<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
 <style>
.cLine {
    overflow: hidden;
    padding: 5px 0;
  color:#000000;
}
.alert {
padding: 8px 35px 0 10px;
text-shadow: none;
-webkit-box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
-moz-box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
background-color: #f9edbe;
border: 1px solid #f0c36d;
-webkit-border-radius: 2px;
-moz-border-radius: 2px;
border-radius: 2px;
color: #333333;
margin-top: 5px;
}
.alert p {
margin: 0 0 10px;
display: block;
}
.alert .bold{
font-weight:bold;
}
 </style>
<div class="cLine">
    <div class="alert">
    <p><span class="bold">使用方法：</span>
   填写名称，上传图片，建议图片尺寸为宽400高300（所有图片必须统一尺寸）<br/>
   <strong><font color='red'>特别提醒: 如果不想在前端显示某个星期，如：不想显示星期六，那么不设置星期六的任何食谱信息即可!</font></strong>
    </p>
    </div>
</div>
<?php  if($operation == 'display') { ?>
<script>
require(['bootstrap'],function($){
    $('.btn,.tips').hover(function(){
        $(this).tooltip('show');
    },function(){
        $(this).tooltip('hide');
    });
});
</script>
<div class="main">
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
    <div class="panel panel-info">
        <div class="panel-heading">食谱管理</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="fm_jiaoyu" />
                <input type="hidden" name="do" value="cook" />
                <input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width: 100px;">按名称</label>
                    <div class="col-sm-2 col-lg-2">
                        <input class="form-control" name="name" id="" type="text" value="<?php  echo $_GPC['name'];?>">
                    </div>
                    <div class="col-sm-2 col-lg-2">                      
                        <a class="btn btn-primary" href="<?php  echo $this->createWebUrl('cook', array('op' => 'post', 'schoolid' => $schoolid))?>"><i class="fa fa-plus"></i> 添加食谱</a>
                        <a class="btn btn-primary" href="javascript:location.reload()"><i class="fa fa-refresh"></i>刷新</a>
                    </div>
                </div>    
            </form>
        </div>
    </div>    
    <div class="panel panel-default">
        <div class="table-responsive panel-body">
        <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />
        <table class="table table-hover">
            <thead class="navbar-inner">
                <tr>
                    <th class='with-checkbox' style="width: 20px;"><input type="checkbox" class="check_all" /></th>
                    <th style="width:5%">排序</th>
                    <th style="width:6%">名称</th>
                    <th style="width:15%;">时间</th>
                    <th style="width:8%;">状态</th>                       
                    <th style="text-align:right; width:8%;">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
                    <td class="with-checkbox"><input type="checkbox" name="check" value="<?php  echo $item['id'];?>"></td>
                    <td><input type="text" class="form-control" name="sort[<?php  echo $item['id'];?>]" value="<?php  echo $item['sort'];?>"></td>
                    <td style="overflow:visible; word-break:break-all; text-overflow:auto;white-space:normal"><?php  echo $item['title'];?></td>
                    <td style="overflow:visible; word-break:break-all; text-overflow:auto;white-space:normal">
                      <div><span class="label label-info"><?php  echo date('Y-m-d',$item['begintime'])." 至 ".date('Y-m-d',$item['endtime'])?></span></div>                   
                    </td>
                    <td style="width:60px;">
                            <?php  if($item['ishow']==1) { ?>
                            <span class="label" style="background:#56af45;">显示</span>
                            <?php  } else { ?>
                            <span class="label" style="background:#f00;">隐藏</span>
                            <?php  } ?>
                        </td>                    
                    <td style="text-align:right;">
                        <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('cook', array('op' => 'post','schoolid' => $schoolid,'id' => $item['id']))?>" title="编辑"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('cook', array('op' => 'delete', 'schoolid' => $schoolid,'id' => $item['id']))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;" title="删除"><i class="fa fa-times"></i></a>


                    </td>
                </tr>
                <?php  } } ?>
            </tbody>
            <tr>
                <td colspan="10">
                    <input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
                    <input type="button" class="btn btn-primary" name="btndeleteall" value="批量删除" />
                </td>
            </tr>
        </table>
    </form>
        </div>
    </div>
</div>
<script type="text/javascript">
<!--
    var category = <?php  echo json_encode($children)?>;
//-->
$(function(){
    $(".check_all").click(function(){
        var checked = $(this).get(0).checked;
        $("input[type=checkbox]").attr("checked",checked);
    });

    $("input[name=btndeleteall]").click(function(){
        var check = $("input[type=checkbox][class!=check_all]:checked");
        if(check.length < 1){
            alert('请选择要删除的食谱!');
            return false;
        }
        if(confirm("确认要删除选择的食谱?")){
            var id = new Array();
            check.each(function(i){
                id[i] = $(this).val();
            });
            var url = "<?php  echo $this->createWebUrl('cook', array('op' => 'deleteall', 'schoolid' => $schoolid))?>";
            $.post(
                url,
                {idArr:id},
                function(data){
                    alert(data.error);
                    location.reload();
                },'json'
            );
        }
    });

});
</script>
<!--添加&编辑-->
<?php  } else if($operation == 'post') { ?>
  <style>
    .template .item{position:relative;display:block;float:left;border:1px #ddd solid;border-radius:5px;background-color:#fff;padding:5px;width:190px;margin:0 20px 20px 0; overflow:hidden;}
    .template .title{margin:5px auto;line-height:2em;}
    .template .title a{text-decoration:none;}
    .template .item img{width:160px;height:125px; cursor:pointer;}
    .template .active.item-style img, .template .item-style:hover img{width:160px;height:125px;border:3px #009cd6 solid;padding:1px; }
    .template .title .fa{display:none}
    .template .active .fa.fa-check{display:inline-block;position:absolute;bottom:33px;right:6px;color:#FFF;background:#009CD6;padding:5px;font-size:14px;border-radius:0 0 6px 0;}
    .template .fa.fa-times{cursor:pointer;display:inline-block;position:absolute;top:10px;right:6px;color:#D9534F;background:#ffffff;padding:5px;font-size:14px;text-decoration:none;}
    .template .fa.fa-times:hover{color:red;}
    .template .item-bg{width:100%; height:342px; background:#000; position:absolute; z-index:1; opacity:0.5; margin:-5px 0 0 -5px;}
    .template .item-build-div1{position:absolute; z-index:2; margin:-5px 10px 0 5px; width:168px;}
    .template .item-build-div2{text-align:center; line-height:30px; padding-top:150px;}
  </style>
<div class="panel panel-info">
   <div class="panel-heading"><a class="btn btn-primary" onclick="javascript :history.back(-1);"><i class="fa fa-tasks"></i> 返回食谱列表</a></div>
</div>
<div class="main">
<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
        <input type="hidden" name="schoolid" value="<?php  echo $schoolid;?>" />
        <div class="panel panel-default">
            <div class="panel-heading">
                基础设置
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">食谱名称：</label>
                    <div class="col-sm-2 col-lg-2">                     
                         <div class="input-group">                    
                            <input type="text" class="form-control" name="title" value="<?php  echo $item['title'];?>" />
                         </div>
                    </div>                
                    <div class="col-sm-2 col-lg-2">
                        <label class="radio-inline">
                            <input type="radio" name="ishow" value="1" <?php  if($item['ishow']==1 || empty($item)) { ?>checked<?php  } ?>>是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="ishow" value="0" <?php  if(isset($item['ishow']) && empty($item['ishow'])) { ?>checked<?php  } ?>>否
                        </label>
                        <div class="help-block">是否显示食谱</div>
                    </div>    
                    </div>                        
                    <div class="form-group">                    
                   <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">开始时间:</label>
                     <div class="col-sm-2 col-lg-2">
                        <div class="input-group">
                     <?php  echo tpl_form_field_date('begintime', date('Y-m-d', $item['begintime']))?>    
                        </div>
                     </div>
                   <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">结束时间:</label>
                     <div class="col-sm-2 col-lg-2">
                        <div class="input-group">
                     <?php  echo tpl_form_field_date('endtime', date('Y-m-d', $item['endtime']))?>    
                        </div>
                     </div>    
                     </div>
                    <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">排序</label>
                    <div class="col-sm-2 col-lg-2">
                        <input type="text" name="sort" value="<?php  echo $item['sort'];?>" id="sort" class="form-control" />
                    </div>        
                    </div>                    
                                    
             </div>                                               
        </div>




        <div class="clearfix template">        
            <div class="panel panel-default">    
                <div class="panel-body">




                      <div class="item item-style">
                          <div class="title">
                                <img src="../addons/fm_jiaoyu/public/web/recipe/1.jpg" class="img-rounded" />   
                          </div>
                      </div>
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">早餐</div>
                                         <?php  echo tpl_form_field_image('mon_zc_pic', $monarr['mon_zc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="mon_zc" placeholder="请输入早餐食材"><?php  if(!empty($monarr['mon_zc'])) { ?><?php  echo $monarr['mon_zc'];?><?php  } ?></textarea></div>
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>    
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">早加餐</div>
                                         <?php  echo tpl_form_field_image('mon_zjc_pic', $monarr['mon_zjc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="mon_zjc" placeholder="请输入早加餐食材"><?php  if(!empty($monarr['mon_zjc'])) { ?><?php  echo $monarr['mon_zjc'];?><?php  } ?></textarea></div>
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">午餐</div>
                                         <?php  echo tpl_form_field_image('mon_wc_pic', $monarr['mon_wc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="mon_wc" placeholder="请输入午餐食材"><?php  if(!empty($monarr['mon_wc'])) { ?><?php  echo $monarr['mon_wc'];?><?php  } ?></textarea></div>
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>    
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">午加餐</div>
                                         <?php  echo tpl_form_field_image('mon_wjc_pic', $monarr['mon_wjc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="mon_wjc" placeholder="请输入午加餐食材"><?php  if(!empty($monarr['mon_wjc'])) { ?><?php  echo $monarr['mon_wjc'];?><?php  } ?></textarea></div>
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">晚餐</div>
                                         <?php  echo tpl_form_field_image('mon_wwc_pic', $monarr['mon_wwc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="mon_wwc" placeholder="请输入晚餐食材"><?php  if(!empty($monarr['mon_wwc'])) { ?><?php  echo $monarr['mon_wwc'];?><?php  } ?></textarea></div>
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>


               </div>
            </div>
            <div class="panel panel-default">    
                <div class="panel-body">
                      <div class="item item-style">
                          <div class="title">
                                <img src="../addons/fm_jiaoyu/public/web/recipe/2.jpg" class="img-rounded" />   
                          </div>
                      </div>                
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">早餐</div>
                                         <?php  echo tpl_form_field_image('tus_zc_pic', $tusarr['tus_zc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="tus_zc" placeholder="请输入早餐食材"><?php  if(!empty($tusarr['tus_zc'])) { ?><?php  echo $tusarr['tus_zc'];?><?php  } ?></textarea></div>
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>    
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">早加餐</div>
                                         <?php  echo tpl_form_field_image('tus_zjc_pic', $tusarr['tus_zjc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="tus_zjc" placeholder="请输入早加餐食材"><?php  if(!empty($tusarr['tus_zjc'])) { ?><?php  echo $tusarr['tus_zjc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">午餐</div>
                                         <?php  echo tpl_form_field_image('tus_wc_pic', $tusarr['tus_wc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="tus_wc" placeholder="请输入午餐食材"><?php  if(!empty($tusarr['tus_wc'])) { ?><?php  echo $tusarr['tus_wc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>    
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">午加餐</div>
                                         <?php  echo tpl_form_field_image('tus_wjc_pic', $tusarr['tus_wjc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="tus_wjc" placeholder="请输入午加餐食材"><?php  if(!empty($tusarr['tus_wjc'])) { ?><?php  echo $tusarr['tus_wjc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">晚餐</div>
                                         <?php  echo tpl_form_field_image('tus_wwc_pic', $tusarr['tus_wwc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="tus_wwc" placeholder="请输入晚餐食材"><?php  if(!empty($tusarr['tus_wwc'])) { ?><?php  echo $tusarr['tus_wwc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>                      
               </div>
            </div>
            <div class="panel panel-default">    
                <div class="panel-body">
                      <div class="item item-style">
                          <div class="title">
                                <img src="../addons/fm_jiaoyu/public/web/recipe/3.jpg" class="img-rounded" />   
                          </div>
                      </div>                
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">早餐</div>
                                         <?php  echo tpl_form_field_image('wed_zc_pic', $wedarr['wed_zc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="wed_zc" placeholder="请输入早餐食材"><?php  if(!empty($wedarr['wed_zc'])) { ?><?php  echo $wedarr['wed_zc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>    
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">早加餐</div>
                                         <?php  echo tpl_form_field_image('wed_zjc_pic', $wedarr['wed_zjc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="wed_zjc" placeholder="请输入早加餐食材"><?php  if(!empty($wedarr['wed_zjc'])) { ?><?php  echo $wedarr['wed_zjc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">午餐</div>
                                         <?php  echo tpl_form_field_image('wed_wc_pic', $wedarr['wed_wc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="wed_wc" placeholder="请输入午餐食材"><?php  if(!empty($wedarr['wed_wc'])) { ?><?php  echo $wedarr['wed_wc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>    
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">午加餐</div>
                                         <?php  echo tpl_form_field_image('wed_wjc_pic', $wedarr['wed_wjc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="wed_wjc" placeholder="请输入午加餐食材"><?php  if(!empty($wedarr['wed_wjc'])) { ?><?php  echo $wedarr['wed_wjc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">晚餐</div>
                                         <?php  echo tpl_form_field_image('wed_wwc_pic', $wedarr['wed_wwc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="wed_wwc" placeholder="请输入晚餐食材"><?php  if(!empty($wedarr['wed_wwc'])) { ?><?php  echo $wedarr['wed_wwc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>                      
               </div>
            </div>
            <div class="panel panel-default">    
                <div class="panel-body">
                      <div class="item item-style">
                          <div class="title">
                                <img src="../addons/fm_jiaoyu/public/web/recipe/4.jpg" class="img-rounded" />   
                          </div>
                      </div>
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">早餐</div>
                                         <?php  echo tpl_form_field_image('thu_zc_pic', $thuarr['thu_zc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="thu_zc" placeholder="请输入早餐食材"><?php  if(!empty($thuarr['thu_zc'])) { ?><?php  echo $thuarr['thu_zc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>    
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">早加餐</div>
                                         <?php  echo tpl_form_field_image('thu_zjc_pic', $thuarr['thu_zjc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="thu_zjc" placeholder="请输入早加餐食材"><?php  if(!empty($thuarr['thu_zjc'])) { ?><?php  echo $thuarr['thu_zjc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">午餐</div>
                                         <?php  echo tpl_form_field_image('thu_wc_pic', $thuarr['thu_wc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="thu_wc" placeholder="请输入午餐食材"><?php  if(!empty($thuarr['thu_wc'])) { ?><?php  echo $thuarr['thu_wc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>    
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">午加餐</div>
                                         <?php  echo tpl_form_field_image('thu_wjc_pic', $thuarr['thu_wjc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="thu_wjc" placeholder="请输入午加餐食材"><?php  if(!empty($thuarr['thu_wjc'])) { ?><?php  echo $thuarr['thu_wjc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">晚餐</div>
                                         <?php  echo tpl_form_field_image('thu_wwc_pic', $thuarr['thu_wwc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="thu_wwc" placeholder="请输入晚餐食材"><?php  if(!empty($thuarr['thu_wwc'])) { ?><?php  echo $thuarr['thu_wwc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>                      
               </div>
            </div>
            <div class="panel panel-default">    
                <div class="panel-body">
                      <div class="item item-style">
                          <div class="title">
                                <img src="../addons/fm_jiaoyu/public/web/recipe/5.jpg" class="img-rounded" />   
                          </div>
                      </div>                
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">早餐</div>
                                         <?php  echo tpl_form_field_image('fri_zc_pic', $friarr['fri_zc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="fri_zc" placeholder="请输入早餐食材"><?php  if(!empty($friarr['fri_zc'])) { ?><?php  echo $friarr['fri_zc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>    
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">早加餐</div>
                                         <?php  echo tpl_form_field_image('fri_zjc_pic', $friarr['fri_zjc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="fri_zjc" placeholder="请输入早加餐食材"><?php  if(!empty($friarr['fri_zjc'])) { ?><?php  echo $friarr['fri_zjc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">午餐</div>
                                         <?php  echo tpl_form_field_image('fri_wc_pic', $friarr['fri_wc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="fri_wc" placeholder="请输入午餐食材"><?php  if(!empty($friarr['fri_wc'])) { ?><?php  echo $friarr['fri_wc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>    
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">午加餐</div>
                                         <?php  echo tpl_form_field_image('fri_wjc_pic', $friarr['fri_wjc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="fri_wjc" placeholder="请输入午加餐食材"><?php  if(!empty($friarr['fri_wjc'])) { ?><?php  echo $friarr['fri_wjc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">晚餐</div>
                                         <?php  echo tpl_form_field_image('fri_wwc_pic', $friarr['fri_wwc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="fri_wwc" placeholder="请输入晚餐食材"><?php  if(!empty($friarr['fri_wwc'])) { ?><?php  echo $friarr['fri_wwc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>                      
               </div>
            </div>    
            <div class="panel panel-default">    
                <div class="panel-body">
                      <div class="item item-style">
                          <div class="title">
                                <img src="../addons/fm_jiaoyu/public/web/recipe/6.jpg" class="img-rounded" />   
                          </div>
                      </div>                
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">早餐</div>
                                         <?php  echo tpl_form_field_image('sat_zc_pic', $satarr['sat_zc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="sat_zc" placeholder="请输入早餐食材"><?php  if(!empty($satarr['sat_zc'])) { ?><?php  echo $satarr['sat_zc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>    
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">早加餐</div>
                                         <?php  echo tpl_form_field_image('sat_zjc_pic', $satarr['sat_zjc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="sat_zjc" placeholder="请输入早加餐食材"><?php  if(!empty($satarr['sat_zjc'])) { ?><?php  echo $satarr['sat_zjc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">午餐</div>
                                         <?php  echo tpl_form_field_image('sat_wc_pic', $satarr['sat_wc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="sat_wc" placeholder="请输入午餐食材"><?php  if(!empty($satarr['sat_wc'])) { ?><?php  echo $satarr['sat_wc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>    
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">午加餐</div>
                                         <?php  echo tpl_form_field_image('sat_wjc_pic', $satarr['sat_wjc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="sat_wjc" placeholder="请输入午加餐食材"><?php  if(!empty($satarr['sat_wjc'])) { ?><?php  echo $satarr['sat_wjc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">晚餐</div>
                                         <?php  echo tpl_form_field_image('sat_wwc_pic', $satarr['sat_wwc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="sat_wwc" placeholder="请输入晚餐食材"><?php  if(!empty($satarr['sat_wwc'])) { ?><?php  echo $satarr['sat_wwc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>                      
               </div>
            </div>        
            <div class="panel panel-default">    
                <div class="panel-body">
                      <div class="item item-style">
                          <div class="title">
                                <img src="../addons/fm_jiaoyu/public/web/recipe/7.jpg" class="img-rounded" />   
                          </div>
                      </div>                
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">早餐</div>
                                         <?php  echo tpl_form_field_image('sun_zc_pic', $sunarr['sun_zc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="sun_zc" placeholder="请输入早餐食材"><?php  if(!empty($sunarr['sun_zc'])) { ?><?php  echo $sunarr['sun_zc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>    
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">早加餐</div>
                                         <?php  echo tpl_form_field_image('sun_zjc_pic', $sunarr['sun_zjc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="sun_zjc" placeholder="请输入早加餐食材"><?php  if(!empty($sunarr['sun_zjc'])) { ?><?php  echo $sunarr['sun_zjc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">午餐</div>
                                         <?php  echo tpl_form_field_image('sun_wc_pic', $sunarr['sun_wc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="sun_wc" placeholder="请输入午餐食材"><?php  if(!empty($sunarr['sun_wc'])) { ?><?php  echo $sunarr['sun_wc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>    
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">午加餐</div>
                                         <?php  echo tpl_form_field_image('sun_wjc_pic', $sunarr['sun_wjc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="sun_wjc" placeholder="请输入午加餐食材"><?php  if(!empty($sunarr['sun_wjc'])) { ?><?php  echo $sunarr['sun_wjc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
                      </div>
                      <div class="item item-style">
                          <div class="title">
                                 <div style="overflow:hidden; height:28px;text-align:center;color:red;font-size:20px;">晚餐</div>
                                         <?php  echo tpl_form_field_image('sun_wwc_pic', $sunarr['sun_wwc_pic'])?>
                                 <div style="overflow:hidden; height:48px;margin-top:2px;">
                                   <textarea style="width:178px;" name="sun_wwc" placeholder="请输入晚餐食材"><?php  if(!empty($sunarr['sun_wwc'])) { ?><?php  echo $sunarr['sun_wwc'];?><?php  } ?></textarea></div>       
                                <span class="fa fa-check"></span>  
                          </div>
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
 <script type="text/javascript">
    require(['bootstrap'],function($){
      $('.item .item-build-btn').popover();
    });
    //预览风格时,预览的是默认微站的导航链接和快捷操作
    function preview(stylename, rid) {
      require(['jquery', 'util'], function($, u){
        var content = '<iframe width="320" scrolling="yes" height="480" frameborder="0" src="about:blank"></iframe>';
        var footer =
            '     <a href="<?php  echo $this->createWebUrl('templates', array('op' => 'default'))?>templatesname=' + stylename + 'rid' + rid + '" class="btn btn-primary">设为默认模板</a>' +
            '     <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>';
        var dialog = u.dialog('预览模板', content, footer);
        dialog.find('iframe').on('load', function(){
          $('a', this.contentWindow.document.body).each(function(){
            var href = $(this).attr('href');
            if(href && href[0] != '#') {
              var arr = href.split(/#/g);
              var url = arr[0];
              if(url.slice(-1) != '&') {
                url += '&';
              }
              if(url.indexOf('?') != -1) {
                url += ('s=' + styleid);
              }
              if(arr[1]) {
                url += ('#' + arr[1]);
              }
              if (url.substr(0, 10) == 'javascript' || url.indexOf('?') == -1) {
                url = url.substr(0, url.lastIndexOf('&'));
              }
              $(this).attr('href', url);
            }
          });
        });
        var url = '../app/<?php  echo murl('home')?>&s=' + styleid;
        dialog.find('iframe').attr('src', url);
        dialog.find('.modal-dialog').css({'width': '322px'});
        dialog.find('.modal-body').css({'padding': '0', 'height': '480px'});
        dialog.modal('show');
      });
    }
  </script>
<script type="text/javascript">
    <!--
    var category = <?php  echo json_encode($children)?>;
    //-->
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
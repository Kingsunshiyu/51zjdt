<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('paper_type', array('op' => 'display'))?>">管理试卷类型</a></li>
    <li <?php  if($operation == 'post' && empty($item['id'])) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('paper_type', array('op' => 'post'))?>">添加试卷类型</a></li>
    <?php  if($operation == 'post' && !empty($item['id'])) { ?>
    <li class="active"><a href="<?php  echo $this->createWebUrl('paper_type', array('op' => 'post', 'id' => $item['id']))?>">编辑试卷类型</a></li>
    <?php  } ?>
</ul>
<?php  if($operation == 'post') { ?>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" onsubmit="return formcheck()">
        <input type="hidden" name="parentid" value="<?php  echo $parent['id'];?>" />
        <div class="panel panel-default">
            <div class="panel-heading">
                试卷类型设置
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">类型名称</label>
                    <div class="col-sm-9 col-xs-12">
						<input type="text" id="title" name="title" class="form-control" value="<?php  echo $item['title'];?>" />
                    </div>
                </div>
  				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">考试时间</label>
                    <div class="col-sm-3 col-xs-12">
                       	<div class="input-group">
                    		<input type="text" class="form-control" name="times" value="<?php  echo $item['times'];?>" />
                    		<span class="input-group-addon">分钟</span>
                    	</div>
                  		<span class='help-block'>如果设置成空或0则不限制时间</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">题型设置</label>
                    <div class="col-sm-9 col-xs-12">
						<div id="item_div" tabindex="-1" class="panel panel-default">
						<div class="panel-body table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width:30px;">选择</th>
                                    <th style="width:100px;">题型</th>
                                    <th style="width:100px;">题数</th>
                                    <th style="width:120px;">单题分数</th>
                                </tr>
                            </thead>
                            <tbody id="re-items">
                                <?php  if(is_array($types_config)) { foreach($types_config as $k => $t) { ?>
                                    <?php  if($k != 4) { ?>
                                    <tr>
                                        <td><input type="checkbox" title="是否选择" key="<?php  echo $k;?>" class='has has_<?php  echo $k;?>' name="has[<?php  echo $k;?>]" <?php  if($arr[$k]['has'] == 1) { ?> checked="checked"  <?php  } ?> value="true"/></td>
                                        <td><?php  echo $t;?></td>
                                        <td><select name="num[<?php  echo $k;?>]" class="form-control num num_<?php  echo $k;?>">
                                                <option></option>
                                                <?php  for($i=0;$i<=500;$i++) { ?>
                                                <option value="<?php  echo $i;?>"  <?php  if($arr[$k]['num']==$i) { ?>selected<?php  } ?>><?php  echo $i;?></option>
                                                <?php  } ?>
                                            </select></td>
                                        <td><select name="one_score[<?php  echo $k;?>]" class="form-control score  score_<?php  echo $k;?>">
                                                <option></option>
                                                <?php  for($i=0;$i<=50;$i+=0.5) { ?>
                                                <option value="<?php  echo $i;?>" <?php  if($arr[$k]['one_score']==$i) { ?>selected<?php  } ?>><?php  echo $i;?></option>
                                                <?php  } ?>
                                            </select>
										</td>
                                    </tr>
                                    <?php  } ?>
                                <?php  } } ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">考试分制</label>
                    <div class="col-sm-3 col-xs-12">  
                      	<div class="input-group">
                    		<input type="text" class="form-control" id='score' name="score" value="<?php  echo $item['score'];?>" readonly />
                    		<span class="input-group-addon">分</span>
                    	</div>
                  		<span class='help-block'>考试分制是根据题型、题数及单题得分计算出的</span>
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
  $(function(){
      $(".has").change(calc);
      $(".num").change(calc);
      $(".score").change(calc);
      
      
  })
  
  function calc(){
       var score = 0;
       $(".has").each(function(){
            if($(this).get(0).checked){
               var key = $(this).attr("key");
           
               score+= parseInt($(".num_" + key).val()) * parseFloat($(".score_"+key).val());
            }
        })
        $("#score").val(score);
      
  }
    function formcheck(){
        if($("#title").isEmpty()){
            Tip.focus("title","请输入类型名称!","right");
            return false;
        }
      
        
        var checked = false;
        $(".has").each(function(){
            if($(this).get(0).checked){
                checked = true;
                return false;
            }
        })
        if(!checked){
            Tip.focus(".has:eq(0)","至少选择一种题型!","top");
            return false;
        }
          var ok = true;
           $(".has").each(function(){
            if($(this).get(0).checked){
               
               var key = $(this).attr("key");
               if(!$(".num_" + key).isNumber() || parseFloat($(".num_" + key))<=0 ){
                   Tip.select(".num_" + key,"请输入大于0的数字!","top");
                   ok = false;
                   return false;
               }
                if(!$(".score_" + key).isNumber() || parseFloat($(".score_" + key))<=0 ){
                   Tip.select(".score_" + key,"请输入大于0的数字!","top");
                   ok = false;
                   return false;
               }
               
            }
        })
      
        return ok;
    }
</script>
<?php  } else if($operation == 'display') { ?>
<div class="main panel panel-default">
    <div class="category panel-body table-responsive">
        <form action="" method="post" onsubmit="return formcheck(this)">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width:120px;">类型名称</th>
                        <th style="width:120px;">考试时间</th>
                        <th style="width:120px;">考试分制</th>
                        <th style="width:150px">题型设置</th>
                        <th style="width:200px;">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  if(is_array($types)) { foreach($types as $row) { ?>
                    <tr>
                        <td><div class="type-parent"><?php  echo $row['title'];?></div></td>
                        <td><div class="type-parent"><?php  echo $row['times'];?>分钟</div></td>
                        <td><div class="type-parent"><?php  echo $row['score'];?></div></td>
                        <td><div class="type-parent">
                            <?php  if(is_array($row['types'])) { foreach($row['types'] as $key => $value) { ?>
                            <?php  if($value['has'] == 1) { ?>
                            <?php  echo $types_config[$key];?>(<?php  echo $value['num'];?>道 共<?php  echo $value['sum_score'];?>分)<br />
                            <?php  } ?>
                            <?php  } } ?>
                        </div></td>
                        <td>
                            <a href="<?php  echo $this->createWebUrl('paper', array('op' => 'edit', 'tid' => $row['id']))?>" title="添加试卷" data-toggle="tooltip" data-placement="bottom" class="btn btn-default btn-sm" ><i class="fa fa-plus"></i></a>
                            <a href="<?php  echo $this->createWebUrl('paper_type', array('op' => 'post', 'id' => $row['id']))?>" title="编辑" data-toggle="tooltip" data-placement="bottom" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="<?php  echo $this->createWebUrl('paper_type', array('op' => 'delete', 'id' => $row['id']))?>" onclick="return confirm('确认删除此类型吗？');return false;" title="删除" data-toggle="tooltip" data-placement="bottom" class="btn btn-default btn-sm"><i class="fa fa-times"></i></a>
						</td>
                    </tr>
                    <?php  } } ?>
                    <tr>
                        <td colspan="5">
							<input name="submit" type="submit" class="btn btn-primary col-lg-1" value="提交">
							<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />&nbsp;&nbsp;
                            <a class="btn btn-default" href="<?php  echo $this->createWebUrl('paper_type', array('op' => 'post'))?>"><i class="fa fa-plus"></i> 添加新类型</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<?php  } ?>
<script>
	require(['bootstrap'],function($){
		$('.btn').tooltip();
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>

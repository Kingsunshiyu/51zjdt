<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">	 	
      <li <?php  if($op=='list' || empty($op)) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('pool',array('op'=>'list'));?>">题目管理</a></li>    
      <li <?php  if($op=='edit' && empty($item['id'])) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('pool',array('op'=>'edit'));?>">添加题目</a></li>	
       <?php  if($op=='edit' && !empty($item['id'])) { ?><li class="active"><a href="<?php  echo $this->createWebUrl('pool', array('op'=>'edit','id'=>$id));?>">编辑题目</a></li><?php  } ?>
    </ul>
    <form action="" class="form-horizontal form" method="post" enctype="multipart/form-data" onsubmit="return formcheck()">
        <input type="hidden" name="id" value="<?php  echo $item['id'];?>">
        <div class="panel panel-default">
            <div class="panel-heading">
                试题编辑
            </div>
            <div class="panel-body">   
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">题库标题</label>
                    <div class="col-sm-9 col-xs-12">  
                     	<input type='text' id='title' name='title' value="<?php  echo $item['title'];?>"  class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">题库描述</label>
                    <div class="col-sm-9 col-xs-12">  
                         <textarea style="height:100px;" id="description" name="description" class="form-control" cols="60"><?php  echo $item['description'];?></textarea>
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
   function formcheck(){
  
   if($("#title").isEmpty()){
        Tip.focus("title","请填写题库标题!","right");
        return false;
    }
    return  true;
}
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>

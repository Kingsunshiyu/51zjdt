<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li class="active"><a href="#">评论管理</a></li>
</ul>
<div class="panel panel-info">
    <div class="panel-heading">筛选</div>
    <div class="panel-body">
        <form action="./index.php" method="get" class="form-horizontal" role="form">
            <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="q_3354988381_rencai" />
            <input type="hidden" name="do" value="comments" />
            <?php  if($_GET['id'] != '') { ?>
            <input type="hidden" name="id" value="<?php  echo $_GET['id'];?>" />
            <?php  } else { ?>
            <input type="hidden" name="id" value="<?php  echo $_GET['rid'];?>" />
            <?php  } ?>
              
            <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" >职位名称</label>
                <div class="col-sm-8 col-lg-9">
                    <input class="form-control" name="job_name" id="" type="text" value="<?php  echo $_GPC['job_name'];?>">
                </div>
                <div class=" col-xs-12 col-sm-2 col-lg-2">
                    <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                </div>
            </div>
            <div class="form-group">
            </div>
        </form>
    </div>
  </div>
  
    <div style="padding:15px;">
        <table class="table table-hover">
            <thead class="navbar-inner">
                <tr>
                    <th>ID/企业名称</th>
                    <th>职位名称</th>
                    <th>评论人</th>
                    <th>评论内容</th>
                    
                    <th>评论时间</th>
                    <th>审核状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($lists)) { foreach($lists as $row) { ?>
                <tr>
                    <td><small><?php  echo $row['id'];?> / <?php  echo $row['company_name'];?></small></small></td>
                    <td><?php  echo $row['job_name'];?></td>
                    <td><?php  echo $row['nickname'];?><br /><img src="<?php  if(!empty($row['avatar'])) { ?><?php  echo $row['avatar'];?><?php  } else { ?>resource/images/noavatar_middle.gif<?php  } ?>" width="48"></td>
                    <td title="<?php  echo $row['content'];?>"><?php  echo $row['content'];?></td>
                                        
                    <td><small><?php  echo date('Y-m-d',$row['dateline'])?></small></td>
                    <td><small>
                        <?php  if($row['status'] == 0) { ?>
                        <a class="btn btn-warning btn-sm" href="javascript:void(0);" onclick="audit_change_comment_status(<?php  echo $row['id'];?>, 1)">通过</a>
                        <a class="btn btn-warning btn-sm" href="javascript:void(0);" onclick="audit_change_comment_status(<?php  echo $row['id'];?>, -1)">拒绝</a>
                        <?php  } else if($row['status'] == 1) { ?>
                        <a class="btn btn-success btn-sm" href="javascript:void(0);" onclick="audit_change_comment_status(<?php  echo $row['id'];?>, -1)">通过</a>
                        <?php  } else if($row['status'] == -1) { ?>
                        <a class="btn btn-danger btn-sm" href="javascript:void(0);" onclick="audit_change_comment_status(<?php  echo $row['id'];?>, 1)">失败</a>
                        <?php  } ?>
                    </small></td>
                    <td>
                        <a href="javascript:void(0);" onclick="delete_comment(<?php  echo $row['id'];?>)" title="删除" class="btn btn-danger btn-sm">删除</a>
                    </td>
                </tr>
                <?php  } } ?>
            </tbody>
        </table>
        <?php  echo $pager;?>
    </div>
    
	<script>
		//审核
	    function audit_change_comment_status(comment_id, change_to){
	    	$.post(
	    			'<?php  echo $this->createWebUrl("commentsEdit")?>',
	    	        {"comment_id":comment_id, "change_to":change_to, 'op':'chg_status'},
	    	        function (data){
	    	        	location.reload();
	    	        }
	    	);
	    }
	    //删除企业
	    function delete_comment(comment_id){
	    	if(confirm('确定删除')){
		    	$.post(
		    			'<?php  echo $this->createWebUrl("commentsEdit")?>',
		    	        {"comment_id":comment_id, 'op':'del_comment'},
		    	        function (data){
		    	        	location.reload();
		    	        }
		    	);
	    	}	
	    }
	</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
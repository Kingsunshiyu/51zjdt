<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li class="active"><a href="<?php  echo $this->createWebUrl("ZhaoinfoEdit", array("id" => 0));?>">新增招聘信息</a></li>
    <li class="active"><a href="<?php  echo $this->createWebUrl('Zhaoinfo');?>">招聘信息管理</a></li>
</ul>
    <div id="show_msg" style="display:none">操作成功</div>
    <div style="padding:15px;">
        <table class="table table-hover">
            <thead class="navbar-inner">
                <tr>
                    <th>职位名称</th>
                    <th>职位分类</th>
                    <th>薪资</th>
                    <th>人数</th>
                    <th>热门</th>
                    <th>发布时间</th>
                    <th>截止日期</th>
                    <th>置顶</th>
                    <th>有效期</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($lists)) { foreach($lists as $row) { ?>
                <tr>
                    <td><small><?php  echo $row['title'];?></small></td>
                    <td><small><?php  echo $row['cname'];?></small></td>
                    <td><small><?php  echo $config['payroll'][$row['payroll']];?></small></td>
                    <td><small><?php  echo $row['nums'];?></small></td>
                    <td><small>
                        <?php  if($row['ishot'] == 0) { ?>
                        <a class="btn btn-warning btn-xs" href="javascript:void(0);" onclick="change_hot_status(<?php  echo $row['id'];?>, 1)">否</a>
                        <?php  } else { ?>
                        <a class="btn btn-success btn-xs" href="javascript:void(0);" onclick="change_hot_status(<?php  echo $row['id'];?>, 0)">是</a>
                        <?php  } ?>
                    </small></td>
                    <td><small><?php  echo date('Y-m-d',$row['dateline'])?></small></td>
                    <td><small><?php  echo $row['end_time'];?></small></td>
                    <td><small>
                        <?php  if($row['istop'] == 0) { ?>
                        <!-- <a class="btn btn-warning btn-sm" href="javascript:void(0);" onclick="change_top_status(<?php  echo $row['id'];?>, 1)">否</a> -->
                        <a class="btn btn-warning btn-xs" href='<?php  echo $this->createWebUrl("AuditTopInfo", array("info_id" => $row['id']));?>'>否</a>
                        <?php  } else { ?>
                        <a class="btn btn-success btn-xs " href="javascript:void(0);" onclick="change_top_status(<?php  echo $row['id'];?>, 0)">是</a>
                        <?php  } ?>
                    </small></td>
                    <td><small><?php  if($row['expiration']) { ?> <?php  echo date('Y-m-d',$row['expiration'])?> <?php  } else { ?> —— <?php  } ?></small></td>
                    <td><small>
                        <a href='<?php  echo $this->createWebUrl("ZhaoinfoEdit", array("jobid" => $row['id']));?>' title="编辑" class="btn btn-primary btn-sm btn-xs">编辑</a>
                        <a href="javascript:void(0);" onclick="delete_company_job_info(<?php  echo $row['id'];?>)" title="删除" class="btn btn-danger btn-sm btn-xs">删除</a>
                    </small></td>
                </tr>
                <?php  } } ?>
            </tbody>
        </table>
    </div>
    
<script>
    /**
    *删除职位信息
    */
    function delete_company_job_info(id){
    	if(confirm('确定删除')){
	    	$.post(
	    			'<?php  echo $this->createWebUrl("ZhaoinfoDeleteAjax");?>',
	    	        {"info_id":id},
	    	        function (data){
	    	        	location.reload();
	    	        }
	    	);
    	}
    }
    
    /**
    * 置顶
    */
    function change_top_status(info_id, change_to){
    	$.post(
    			'<?php  echo $this->createWebUrl("AuditTopInfoStatusAjax")?>',
    	        {"info_id":info_id, "change_to":change_to},
    	        function (data){
    	        	location.reload();
    	        }
    	);
    }

    /**
     * 热门
     */
    function change_hot_status(info_id, change_to){
        $.post(
                '<?php  echo $this->createWebUrl("AuditHotInfoStatusAjax")?>',
                {"info_id":info_id, "change_to":change_to},
                function (data){
                    location.reload();
                }
        );
    }
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">
        <li class="active"><a href="<?php  echo $this->createWebUrl('adtj');?>">浏览统计</a></li>
    </ul>
 <div class="panel panel-info">
    <div class="panel-heading">筛选</div>
    <div class="panel-body">
        <form action="./index.php" method="get" class="form-horizontal" role="form">
            <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="q_3354988381_rencai" />
            <input type="hidden" name="do" value="adtj" />
            <?php  if($_GET['id'] != '') { ?>
            <input type="hidden" name="id" value="<?php  echo $_GET['id'];?>" />
            <?php  } else { ?>
            <input type="hidden" name="id" value="<?php  echo $_GET['rid'];?>" />
            <?php  } ?>
              
            <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" >广告名称</label>
                <div class="col-sm-8 col-lg-9">
                    <input class="form-control" name="ad_name" id="" type="text" value="<?php  echo $_GPC['ad_name'];?>">
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
  <div class="panel panel-default">
    <div class="panel-body table-responsive">
        <table class="table table-hover">
            <thead class="navbar-inner">
                <tr>
                    <th style="width:80px;">编号</th>
                    <th class="row-hover">user_from</th>
                    <th class="row-hover">广告名称</th>
                    <th class="row-hover">创建时间</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                <tr> 
                    <td><?php  echo $row['id'];?></td>
                    <td><?php  echo $row['user_from'];?></td>
                    <td><a href="<?php  echo $row['link_url'];?>" target="_blank"><?php  echo $row['ad_name'];?></a></td>
                    <td><?php  echo $row['createtime'];?></td>

                </tr>
                <?php  } } ?>
            </tbody>
        </table>
        <?php  echo $pager;?>
    </div>
</div>
<script type="text/javascript">
    function drop_confirm(msg, url){
        if(confirm(msg)){
            window.location = url;
        }
    }
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('headers', TEMPLATE_INCLUDEPATH)) : (include template('headers', TEMPLATE_INCLUDEPATH));?>
<style>
body{background-color:#f0f0f0;font-weight:300;}
.am-text-ir {color:#333;float:left;margin:0.8rem 0.5rem 0 0;height:30px;width:30px;background: url(<?php  if(!empty($fans['tag']['avatar'])) { ?><?php  echo $fans['tag']['avatar'];?><?php  } else { ?>resource/images/noavatar_middle.gif<?php  } ?>) no-repeat left center;-webkit-background-size: 30px auto;background-size: 30px auto;}
hr{padding:0;line-height:0.5rem;margin:1rem 0;}
.am-panel {margin-bottom: 0.5rem;}
.am-panel-bd p{padding:0;line-height:1.5rem;margin:0.5rem 0;}
.am-btn-group .am-btn{font-size:1.3rem}
.am-panel-hd{height:3.5rem;line-height:3.2rem;padding:0 1rem;}
.am-panel-footer{height:3.5rem;line-height:3.2rem;padding:0 1rem;}

.am-g .am-form-group, .am-g .am-form-group label{padding:0.5rem 0 0.5rem 1rem;margin:0;line-height:1rem;}
.am-g .primary, .am-g .primary label{padding:0.5rem 0 0.5rem 0.5rem;margin:0;line-height:2.8rem;}
.am-g .am-form-group label.am-u-sm-2 {line-height:3rem;}

.am-u-sm-6 img {width:100%;}
.am-u-sm-4{text-align:right;}
.am-g .primary .am-u-sm-4{font-size:2rem;}
#header i.iconfont{font-size:2.5rem;}
</style>
		<header data-am-widget="header" id="header" class="am-header am-topbar-inverse am-header-fixed">
            <div class="am-header-left am-header-nav">
              <a href="javascript:history.go(-1);"><i class="am-icon iconfont">&#xe60c;</i></a>
            </div>
            <div class="am-header-right am-header-nav">
              <a href="#" class="am-text-ir am-circle"></a><?php  echo $fans['nickname'];?>
            </div>
		</header>
<?php  if($operation == 'display') { ?>
	<div class="content">
			<div class="am-g">
				<div class="am-u-sm-12 lte9">
	<div class="am-btn-group am-btn-group-justify" style="margin:0.5rem 0 1rem 0;">
		<a href="<?php  echo $this->createMobileUrl('Mydayu_form',array('weid' => $weid, 'id' => $reid))?>" class="am-btn am-btn-default <?php  if($_GPC['status'] == '') { ?> am-btn-primary<?php  } ?>">全部</a>
		<a href="<?php  echo $this->createMobileUrl('Mydayu_form',array('weid' => $weid, 'id' => $reid, 'status'=>0))?>" class="am-btn am-btn-default <?php  if($_GPC['status'] == '0') { ?> am-btn-primary<?php  } ?>">待受理</a>
		<a href="<?php  echo $this->createMobileUrl('Mydayu_form',array('weid' => $weid, 'id' => $reid, 'status'=>1))?>" class="am-btn am-btn-default <?php  if($_GPC['status'] == '1') { ?> am-btn-primary<?php  } ?>">受理中</a>
		<a href="<?php  echo $this->createMobileUrl('Mydayu_form',array('weid' => $weid, 'id' => $reid, 'status'=>2))?>" class="am-btn am-btn-default <?php  if($_GPC['status'] == '2') { ?> am-btn-primary<?php  } ?>">已取消</a>
		<a href="<?php  echo $this->createMobileUrl('Mydayu_form',array('weid' => $weid, 'id' => $reid, 'status'=>3))?>" class="am-btn am-btn-default <?php  if($_GPC['status'] == '3') { ?> am-btn-primary<?php  } ?>">已完成</a>
	</div>
	<?php  if(is_array($rows)) { foreach($rows as $item) { ?>
			<div class="am-panel am-panel-default am-text-xs" onclick="location.href='<?php  echo $this->createMobileUrl('Mydayu_form', array('op' => 'detail', 'id' => $item['rerid'], 'reid' => $reid))?>'">
				<div class="am-panel-hd">提交时间：<?php  echo date('Y/m/d H:i', $item['createtime'])?>
						<span class="am-fr">
						<?php  if($item['status'] == 0) { ?> <button class="am-btn am-btn-success am-btn-xs">待受理</button></span>
						<?php  } else if($item['status'] == 1) { ?> <button class="am-btn am-btn-warning am-btn-xs">已受理</button></span>
						<?php  } else if($item['status'] == 2) { ?> <button class="am-btn am-btn-primary am-btn-xs">被拒绝</button></span>
						<?php  } else if($item['status'] == 3) { ?> <button class="am-btn am-btn-primary am-btn-xs">已完成</button></span>
						<?php  } else if($item['status'] == -1) { ?> <button class="am-btn am-btn-default am-btn-xs">已取消</button></span>
						<?php  } ?></div>
					<div class="am-panel-bd c-goods-list" style="padding:0.5rem 1.2rem">
						<p>姓名：<?php  echo $item['member'];?></p>
						<p>手机：<?php  echo $item['mobile'];?></p>
						<?php  if(!empty($item['yuyuetime'])) { ?><hr><p>受理时间：<?php  echo date('Y/m/d H:i', $item['yuyuetime'])?></p><?php  } ?>
					</div>
			</div>
		<?php  } } ?>
				</div>
			</div>
		<div class="am-u-sm-12"><ul data-am-widget="pagination" class="am-pagination am-pagination-centered" id="orders"><?php  echo $pager;?></ul></div>
		</div>
<?php  } else if($operation == 'detail') { ?>
<style>
.am-u-sm-7 img {width:100%;}
.am-u-sm-4{text-align:right;}
.am-g .am-form-group .am-u-sm-5:first-child, .am-g .am-form-group:first-child .am-u-sm-7{line-height:500%;padding:0;}
.am-g .primary .am-u-sm-4{font-size:1.6rem;}
.am-g .primary .am-u-sm-4{font-size:1.6rem;}

.am-g .am-u-sm-12 p{padding:0;margin:0;line-height:2.2rem}
.am-table td{font-size:1.5rem}
#qrcodeCanvas {padding:2rem 0;}
</style>

<div class="am-g">
	<div class="am-u-sm-12 am-text-xs">
		<p>提交时间：<?php  echo $row['createtime'];?></p>
		<p>受理时间：<?php  echo $row['yuyuetime'];?></p>
	</div>
</div>
<?php  if(!empty($row['kfinfo'])) { ?><div class="am-alert am-alert-warning am-text-sm" style="margin:0.5rem">客服答复：<?php  echo $row['kfinfo'];?></div><?php  } ?>
<?php  if($dayu_form['isdel']==1 && $row['status'] != 2) { ?>
<div class="am-g">
	<div class="am-u-sm-12">
<a href="<?php  echo $this->createMobileUrl('dayu_formDelete', array('id' => $row['rerid'],'openid' => $openid, 'reid' => $dayu_form['reid']))?>" class="am-btn am-btn-danger am-btn-block" onclick="return confirm('删除本记录，此操作不可恢复，确认删除？');return false;" data-toggle="tooltip" data-placement="bottom" title="删除"><i class="fa fa-times"></i> 删除此记录</a>
	</div>
</div>
<?php  } ?>
<div class="am-g am-text-xs">
<table class="am-table am-table-striped am-table-bordered am-text-sm" <?php  if($row['status'] == -1 || $row['status'] == 2) { ?>style="opacity:0.5; filter: alpha(opacity=90); background-color:#eee;"<?php  } ?>>
    <thead>
        <tr class="am-text-danger">
            <th style="width:30%;">姓名</th>
            <th><?php  echo $row['member'];?></th>
        </tr>
    </thead>
    <tbody class="am-text-xs">
        <tr>
            <td>手机</td>
            <td><?php  echo $row['mobile'];?></td>
        </tr>
        <tr>
            <td style="border-bottom: 5px solid #ddd;">状态</td>
            <td style="border-bottom: 5px solid #ddd;">				
            <?php  if($row['status'] == 0) { ?><span class="am-badge am-badge-success am-radius am-text-default">等待客服受理</span>
                <?php  } else if($row['status'] == 1) { ?><span class="am-badge am-badge-warning am-radius am-text-default">已受理</span>
                <?php  } else if($row['status'] == 2) { ?><span class="am-badge am-radius am-text-default">订单被拒绝</span>
                <?php  } else if($row['status'] == 3) { ?><span class="am-badge am-badge-success am-radius am-text-default">已完成</span>
                <?php  } else if($row['status'] == -1) { ?><span class="am-badge am-radius am-text-default">已取消</span>
            <?php  } ?>
			</td>
        </tr>
              	<?php  if(is_array($ds)) { foreach($ds as $fid => $ftitle) { ?>
        <tr>
            <td><?php  echo $ftitle['fid'];?></td>
            <td>
                <?php  if($ftitle['type'] == 'image') { ?>
					<?php  if($row['fields'][$fid]) { ?><a target="_blank" href="<?php  echo tomedia($row['fields'][$fid]);?>">点击查看<?php  echo $ftitle['fid'];?><img src="<?php  echo tomedia($row['fields'][$fid]);?>" height="50"></a><?php  } else { ?>未上传<?php  } ?>
				<?php  } else { ?>
					<?php  if(!empty($row['fields'][$fid])) { ?><?php  echo $row['fields'][$fid];?><?php  } else { ?>用户未填<?php  } ?>
                <?php  } ?>
			</td>
        </tr>
                <?php  } } ?>
    </tbody>
</table>
<article data-am-widget="paragraph" class="am-paragraph am-paragraph-default" data-am-paragraph="{ tableScrollable: true, pureview: true }">
	<div class="mobile-hds"><?php  echo $dayu_form['title'];?></div>
	<div class="mobile-content"><?php  echo $dayu_form['content'];?></div>
</article>
</div>

<?php  } ?>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footers', TEMPLATE_INCLUDEPATH)) : (include template('footers', TEMPLATE_INCLUDEPATH));?>
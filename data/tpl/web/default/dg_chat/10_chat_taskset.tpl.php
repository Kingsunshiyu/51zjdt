<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
<div class="panel panel-info">
		<div class="panel-heading">计划任务设置</div>
		<div class="panel-body">
			<a target="_blank" href="/web/index.php?c=cron&a=display&do=post& ">点击开始设置计划任务</a>
		 <div style="margin-top:10px">请依照下面的图片设置计划任务：任务URL：<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&do=cron&m=dg_chat</div>
		 <div>
		   <img width="100%" src="<?php echo TEMPLATE_PATH;?>/img/task_set.png">
		 </div>
		</div>
	</div>
	
</div>


	
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
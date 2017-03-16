<?php defined('IN_IA') or exit('Access Denied');?>
		<?php  if((($_GPC['a'] != 'card' || $_GPC['c'] != 'mc') && ($_GPC['a'] != 'token' || $_GPC['c'] != 'activity') && ($_GPC['a'] != 'goods' || $_GPC['c'] != 'activity') && ($_GPC['a'] != 'coupon' || $_GPC['c'] != 'activity') && $_GPC['m'] != 'paycenter')) { ?>
			<?php  $site_quickmenu = modulefunc('site', 'site_quickmenu', array (
  'func' => 'site_quickmenu',
  'limit' => 10,
  'index' => 'iteration',
  'multiid' => 0,
  'uniacid' => 10,
  'acid' => 0,
)); if(is_array($site_quickmenu)) { $i=0; foreach($site_quickmenu as $i => $row) { $i++; $row['iteration'] = $i; ?><?php  } } ?>
		<?php  } ?>
		<script>require(['bootstrap']);</script>
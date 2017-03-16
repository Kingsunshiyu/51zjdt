<?php defined('IN_IA') or exit('Access Denied');?><ul class="list-group collapse in">
<?php  if(is_array($lists)) { foreach($lists as $li) { ?>
<li class="list-group-item">
	<img src="<?php  echo tomedia($li['avatar'])?>" style="width:3em;height:3em;border-radius:1.5em; margin-top: 1em;"/>
	<span><?php  echo $li['nickname'];?></span>
	<div class="hidden"></div>
</li>
<?php  } } ?>
</ul>
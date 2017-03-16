<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<div class="clearfix welcome-container">
<?php  if(is_array($urls)) { foreach($urls as $url) { ?>
	<h4><i class="<?php  echo $url['icon']?>"></i> <?php  echo $url['head'];?></h4>
	
	<div class="shortcut clearfix">
		<?php  if(is_array($url['url'])) { foreach($url['url'] as $li) { ?>
			<?php  if($_W['isfounder']) { ?>
				<a href="<?php  echo $li['url'];?>" title="<?php  echo $li['title'];?>">
					<i class="<?php  echo $li['icon'];?>"></i>
					<span><?php  echo $li['title'];?></span>
				</a>
			<?php  } else { ?>
				<?php  if(empty($li['issys'])) { ?>
					<a href="<?php  echo $li['url'];?>" title="<?php  echo $li['title'];?>">
						<i class="<?php  echo $li['icon'];?>"></i>
						<span><?php  echo $li['title'];?></span>
					</a>
				<?php  } ?>
			<?php  } ?>
		<?php  } } ?>	
	</div>
<?php  } } ?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
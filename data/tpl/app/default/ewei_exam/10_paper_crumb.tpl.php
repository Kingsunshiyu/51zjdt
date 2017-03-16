<?php defined('IN_IA') or exit('Access Denied');?><?php  if($list) { ?>
<ul>
    <?php  if(is_array($list)) { foreach($list as $row) { ?>
    <li>
        <a href="<?php  echo $this->createMobileUrl('ready', array('id' => $row['id']))?>">
        	<span class="<?php  if($row['did']) { ?>finish<?php  } ?>"></span>
            <div class="title"><?php  echo $row['title'];?></div>
		</a>
    </li>
    <div class="border"></div>
    <?php  } } ?>
</ul>
<?php  } ?>
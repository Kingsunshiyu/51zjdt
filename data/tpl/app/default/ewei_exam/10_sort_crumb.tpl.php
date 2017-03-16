<?php defined('IN_IA') or exit('Access Denied');?><?php  if(is_array($list)) { foreach($list as $key => $row) { ?>
<tr class="shandow">
    <td class="<?php  if($key < 3) { ?>first<?php  } else { ?>four<?php  } ?>"><?php  echo ++$sort_num?></td>
    <?php  if($this->_set_info['login_flag'] == 1) { ?>
    <td><?php  echo $row['userid'];?></td>
    <?php  } ?>
    <td><?php  echo $row['username'];?></td>
    <td><?php  echo $row['total'];?></td>
    <td><?php  echo $row['right'];?></td>
    <td><?php  echo $row['rate'];?>%</td>
</tr>
<?php  } } ?>
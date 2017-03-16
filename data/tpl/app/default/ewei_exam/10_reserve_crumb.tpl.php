<?php defined('IN_IA') or exit('Access Denied');?><?php  if($list) { ?>
<ul>
    <?php  if(is_array($list)) { foreach($list as $row) { ?>
    <li>
        <a href="<?php  echo $this->createMobileUrl('reserve', array('id' => $row['id']))?>"><span></span> <div class="title">课程名称：<?php  echo $row['title'];?><br/>
            开始时间：<?php  echo date('Y年m月d日 H:i',$row['coursetime'])?><br/>
            预约状态：
            <?php  if($row['status'] == 0) { ?>
            确认中
            <?php  } else if($row['status'] == -1) { ?>
            已取消
            <?php  } else if($row['status'] == 1) { ?>
            已通过
            <?php  } else if($row['status'] == 2) { ?>
            已拒绝
            <?php  } ?>
        </div></a>
    </li>
    <div class="border"></div>
    <?php  } } ?>
</ul>
<?php  } ?>
<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_header', TEMPLATE_INCLUDEPATH)) : (include template('common_header', TEMPLATE_INCLUDEPATH));?>
	<table class="am-table">
    <thead>
        <tr>
            <th>应聘者</th>
            <th>应聘时间</th>
            <th>申请职位</th>
        </tr>
    </thead>
    <tbody>
    	<?php  if(is_array($applys)) { foreach($applys as $apply) { ?>
        <tr>
            <td><a href="<?php  echo $this->createMobileUrl('ShowResumeInfo', array('person_id' => $apply['person_id']))?>"><?php  echo $person[$apply['person_id']]['username'];?></a></td>
            <td><?php  echo $apply['dateline'];?></td>
            <td><?php  echo $jobs[$apply['job_id']]['title'];?></td>
        </tr>
        <?php  } } ?>
    </tbody>
    </table>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common_footer', TEMPLATE_INCLUDEPATH)) : (include template('common_footer', TEMPLATE_INCLUDEPATH));?>
    
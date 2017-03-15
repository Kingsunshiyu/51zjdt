<?php
/**
 * 微教育模块
 *
 * @author 冰锋微云
 */
global $_W, $_GPC;
$weid = $this->weid;
$from_user = $this->_fromuser;
$schoolid = intval($_GPC['schoolid']);
load()->func('tpl');

// school infos
$school = pdo_fetch("SELECT * FROM " . tablename($this->table_index) . " where weid = :weid AND id=:id ORDER BY ssort DESC", array(':weid' => $_W['uniacid'], ':id' => $schoolid));
// all
$items = pdo_fetchall("SELECT * FROM " . tablename($this->table_courseTable));
$item = pdo_fetch("SELECT * FROM " . tablename($this->table_cook));

$weeks = array(
    'monday' => iunserializer($item['monday']),
    'tuesday' => iunserializer($item['tuesday']),
    'wednesday' => iunserializer($item['wednesday']),
    'thursday' => iunserializer($item['thursday']),
    'friday' => iunserializer($item['friday']),
    'saturday' => iunserializer($item['saturday']),
    'sunday' => iunserializer($item['sunday'])
);
// dump($weeks['monday']['mon_zc_pic']);
/*foreach ($weeks as $k => $v) {
    dump($k);
    dump($v);
}*/
if (empty($items)) {
    message('抱歉，本条信息不存在在或是已经删除！', '', 'error');
}

include $this->template('students/timetable');


?>




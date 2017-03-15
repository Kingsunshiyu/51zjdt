<?php
/**
 * 微教育模块
 *
 * @author 冰锋微云
 */
        global $_W, $_GPC;
        $weid = $_W ['uniacid']; 
		$openid = $_W['openid'];
		$schoolid = intval($_GPC['schoolid']);
		$obid = 1;

		$it = pdo_fetch("SELECT * FROM " . tablename($this->table_user) . " where id = :id ", array(':id' => $_SESSION['user']));
		if(!empty($it)){
			$students = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " where weid = :weid AND id=:id ORDER BY id DESC", array(':weid' => $weid, ':id' => $it['sid']));
			$school = pdo_fetch("SELECT * FROM " . tablename($this->table_index) . " where weid = :weid AND id=:id ORDER BY ssort DESC", array(':weid' => $weid, ':id' => $schoolid));
			$leave = pdo_fetch("SELECT * FROM " . tablename($this->table_leave) . " where :schoolid = schoolid And :weid = weid And :sid = sid And :uid = uid And :bj_id = bj_id And :isliuyan = isliuyan ORDER BY createtime ASC LIMIT 1", array(
					 ':weid' => $weid,
					 ':schoolid' => $schoolid,
					 ':bj_id' => $students['bj_id'],
					 ':uid' => $it['uid'],
					 ':isliuyan' => 1,
					 ':sid' => $it['sid']
					 )); 
			
			$category = pdo_fetchall("SELECT * FROM " . tablename($this->table_classify) . " WHERE weid =  '{$_W['uniacid']}' AND schoolid ={$schoolid} ORDER BY sid ASC, ssort DESC", array(':weid' => $_W['uniacid'], ':schoolid' => $schoolid), 'sid');
			
			$tid = $category[$students['bj_id']]['tid'];
			
			$techers = pdo_fetchall("SELECT * FROM " . tablename($this->table_teachers) . " WHERE weid =  '{$_W['uniacid']}' AND schoolid ={$schoolid} ORDER BY id ASC, id DESC", array(':weid' => $_W['uniacid'], ':schoolid' => $schoolid), 'id');
			
			$list = pdo_fetchall("SELECT * FROM " . tablename($this->table_leave) . " WHERE weid = :weid AND schoolid =:schoolid AND bj_id = :bj_id AND leaveid = :leaveid And :isliuyan = isliuyan ORDER BY createtime DESC", array(':isliuyan' => 1, ':weid' => $_W['uniacid'], ':schoolid' => $schoolid, ':bj_id' => $students['bj_id'], ':leaveid' => $leave['id']));
			foreach ($list as $index => $row) {
				$member = pdo_fetch("SELECT * FROM " . tablename ( 'mc_members' ) . " where uniacid = :uniacid And uid = :uid ORDER BY uid ASC", array(':uniacid' => $_W ['uniacid'], ':uid' => $row['uid']));
				$members = pdo_fetch("SELECT * FROM " . tablename ( 'mc_members' ) . " where uniacid = :uniacid And uid = :uid ORDER BY uid ASC", array(':uniacid' => $_W ['uniacid'], ':uid' => $row['tuid']));
				$teacher = pdo_fetch("SELECT * FROM " . tablename($this->table_teachers) . " where weid = :weid AND id = :id", array(':weid' => $_W ['uniacid'], ':id' => $row['tid']));
				$list[$index]['tlogo'] = $teacher['thumb'];
				$list[$index]['tname'] = $teacher['tname'];
				$list[$index]['avatar'] = $member['avatar'];
				$list[$index]['nickname'] = $member['nickname'];
				$list[$index]['tavatar'] = $members['avatar'];
				$list[$index]['tnickname'] = $members['nickname'];
			}
			$item = pdo_fetch("SELECT * FROM " . tablename($this->table_leave) . " WHERE id = :id ", array(':id' => $id));
						
        
			$this->checkobjiect($schoolid, $students['id'], $obid);
			include $this->template(''.$school['style2'].'/jiaoliu');
		}else{
			session_destroy();
			include $this->template('bangding');	
		}
?>
<?php
/**
 * 微教育模块
 *
 * @author 冰锋微云
 */
        global $_W, $_GPC;
        $weid = $_W['uniacid'];
        $openid = $_W['openid'];
        $schoolid = intval($_GPC['schoolid']);
		$userss = intval($_GPC['userid']);
		$user = pdo_fetchall("SELECT * FROM " . tablename($this->table_user) . " where :weid = weid And :openid = openid And :tid = tid", array(
				':weid' => $weid,
				':openid' => $openid,
				':tid' => 0
				));
		$num = count($user);
		$flag = 1;
		if ($num > 1){
			$flag = 2;
		}
		foreach($user as $key => $row){
			$student = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " where id=:id ", array(':id' => $row['sid']));
			$bajinam = pdo_fetch("SELECT * FROM " . tablename($this->table_classify) . " where sid=:sid ", array(':sid' => $student['bj_id']));
			$user[$key]['s_name'] = $student['s_name'];
			$user[$key]['bjname'] = $bajinam['sname'];
			$user[$key]['sid'] = $student['id'];
			$user[$key]['schoolid'] = $student['schoolid'];
		}
		if(!empty($userss)){
			$ite = pdo_fetch("SELECT * FROM " . tablename($this->table_user) . " where :schoolid = schoolid And weid = :weid AND id=:id ", array(':schoolid' => $schoolid,':weid' => $weid, ':id' => $userss));
			if(!empty($ite)){
				$_SESSION['user'] = $ite['id'];
			}			
		}else{
			if(empty($_SESSION['user'])){
				$userid = pdo_fetch("SELECT * FROM " . tablename($this->table_user) . " where :schoolid = schoolid And :weid = weid And :openid = openid And :tid = tid LIMIT 0,1 ", array(':weid' => $weid, ':schoolid' => $schoolid, ':openid' => $openid, ':tid' => 0), 'id');
				if(!empty($userid)){
					$_SESSION['user'] = $userid['id'];
				}							
			}
		}		
		$leixing = pdo_fetchall("SELECT * FROM " . tablename($this->table_type) . " WHERE weid = :weid ORDER BY id ASC, ssort DESC", array(':weid' => $weid), 'id');
		$school = pdo_fetch("SELECT * FROM " . tablename($this->table_index) . " where weid = :weid AND id=:id", array(':weid' => $weid, ':id' => $schoolid));
        $list = pdo_fetchall("SELECT * FROM " . tablename($this->table_tcourse) . " WHERE weid = :weid AND schoolid =:schoolid AND is_show = :is_show  ORDER BY ssort DESC", array(':weid' => $_W['uniacid'], ':schoolid' => $schoolid, ':is_show' => 1));
        $item = pdo_fetch("SELECT * FROM " . tablename($this->table_tcourse) . " WHERE id = :id ", array(':id' => $id));
        $title = $item['title'];
        $category = pdo_fetchall("SELECT * FROM " . tablename($this->table_classify) . " WHERE weid = :weid AND schoolid = :schoolid ORDER BY sid ASC, ssort DESC", array(':weid' => $weid, ':schoolid' => $schoolid), 'sid');
		$km = pdo_fetchall("SELECT * FROM " . tablename($this->table_classify) . " where weid = :weid AND schoolid = :schoolid And type = :type ORDER BY ssort DESC", array(':weid' => $weid, ':type' => 'subject', ':schoolid' => $schoolid));
		$it = pdo_fetch("SELECT * FROM " . tablename($this->table_classify) . " WHERE sid = :sid", array(':sid' => $sid));
        if (empty($schoolid)) {
            message('没有找到该学校，请联系管理员！');
        }
		
        include $this->template(''.$school['style1'].'/kc');
?>
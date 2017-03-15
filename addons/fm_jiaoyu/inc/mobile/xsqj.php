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
		$openid = $_W['openid'];
		$obid = 1;

        //查询是否用户登录
		$it = pdo_fetch("SELECT * FROM " . tablename($this->table_user) . " where id = :id ", array(':id' => $_SESSION['user']));
		
		$school = pdo_fetch("SELECT * FROM " . tablename($this->table_index) . " where weid = :weid AND id=:id ", array(':weid' => $weid, ':id' => $schoolid));
		$student = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " where weid = :weid AND id=:id AND schoolid=:schoolid ", array(':weid' => $weid, ':id' => $it['sid'], ':schoolid' => $schoolid));
		$category = pdo_fetch("SELECT * FROM " . tablename($this->table_classify) . " WHERE sid =  :sid AND type = :type ", array(':sid' => $student['bj_id'], ':type' => 'theclass'));
		
        $tid = $category['tid'];
		$techers = pdo_fetchall("SELECT * FROM " . tablename($this->table_teachers) . " WHERE weid = :weid AND schoolid = :schoolid ", array(':weid' => $_W['uniacid'], ':schoolid' => $schoolid), 'id');
        if(!empty($it)){
            
			
			$item = pdo_fetch("SELECT * FROM " . tablename ( 'mc_members' ) . " where uniacid = :uniacid AND uid=:uid ", array(':uid' => $it['uid'], ':uniacid' => $_W ['uniacid'])); 

            
		    $userinfo = iunserializer($it['userinfo']);
		    $this->checkobjiect($schoolid, $student['id'], $obid);
		 include $this->template(''.$school['style2'].'/xsqj');
          }else{
         include $this->template('bangding');
          }        
?>
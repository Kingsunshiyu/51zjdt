<?php
/**
 * 微教育模块
 *
 * @author 冰锋微云
 */
        global $_W, $_GPC;
		//处理选择借用支付返回丢失缓存和weid的情况
		$weid = $_W['uniacid'];
		$openid = $_W['openid'];	
		$schoolid = intval($_GPC['schoolid']);
		$userss = intval($_GPC['userid']);
        //查询是否用户登录

		if(!empty($userss)){
			$ite = pdo_fetch("SELECT * FROM " . tablename($this->table_user) . " where :schoolid = schoolid And weid = :weid AND id=:id ", array(':schoolid' => $schoolid,':weid' => $weid, ':id' => $userss));
			if(!empty($ite)){
				$_SESSION['user'] = $ite['id'];
			}else{
				$stopurl = $_W['siteroot'] .'app/'.$this->createMobileUrl('myschool', array('schoolid' => $schoolid));
				header("location:$stopurl");
				exit;
			}			
		}else{
			if(empty($_SESSION['user'])){
				$userid = pdo_fetch("SELECT * FROM " . tablename($this->table_user) . " where :schoolid = schoolid And :weid = weid And :openid = openid And :tid = tid LIMIT 0,1 ", array(':weid' => $weid, ':schoolid' => $schoolid, ':openid' => $openid, ':tid' => 0), 'id');
				$_SESSION['user'] = $userid['id'];
			}
		}
		$user = pdo_fetchall("SELECT * FROM " . tablename($this->table_user) . " where :weid = weid And :openid = openid And :tid = tid", array(
				':weid' => $weid,
				':openid' => $openid,
				':tid' => 0));
		foreach($user as $key => $row){
			$student = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " where id=:id ", array(':id' => $row['sid']));
			$bajinam = pdo_fetch("SELECT * FROM " . tablename($this->table_classify) . " where sid=:sid ", array(':sid' => $student['bj_id']));
			$user[$key]['s_name'] = $student['s_name'];
			$user[$key]['bjname'] = $bajinam['sname'];
			$user[$key]['sid'] = $student['id'];  
			$user[$key]['schoolid'] = $student['schoolid'];
		}

		$it = pdo_fetch("SELECT * FROM " . tablename($this->table_user) . " where :schoolid = schoolid And weid = :weid AND id=:id ", array(':schoolid' => $schoolid,':weid' => $weid, ':id' => $_SESSION['user']));
        $rest = pdo_fetchcolumn("SELECT count(*) FROM ".tablename($this->table_order)." WHERE sid = '{$it['sid']}' And status = '1' ");
		$school = pdo_fetch("SELECT * FROM " . tablename($this->table_index) . " where weid = :weid AND id=:id ", array(':weid' => $weid, ':id' => $schoolid));
		
		$category = pdo_fetchall("SELECT * FROM " . tablename($this->table_classify) . " WHERE :schoolid = schoolid And :weid = weid ", array(':weid' => $weid, ':schoolid' => $schoolid), 'sid');
		
        if(!empty($it)){
            
			$students = pdo_fetch("SELECT * FROM " . tablename($this->table_students) . " where weid = :weid AND id=:id AND schoolid=:schoolid ", array(':weid' => $weid, ':id' => $it['sid'], ':schoolid' => $schoolid));
			$item = pdo_fetch("SELECT * FROM " . tablename ( 'mc_members' ) . " where uniacid = :uniacid AND uid=:uid ", array(':uid' => $it['uid'], ':uniacid' => $weid)); 

		    $userinfo = iunserializer($it['userinfo']);
		    $this->checkpay($schoolid, $students['id'], $it['id'], $it['uid']);
			include $this->template(''.$school['style2'].'/user');
        }else{
			session_destroy();
		    $stopurl = $_W['siteroot'] .'app/'.$this->createMobileUrl('myschool', array('schoolid' => $schoolid));
			header("location:$stopurl");
			exit;
        }

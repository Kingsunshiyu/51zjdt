<?php
/**
 * 微教育模块
 *
 * @author 冰锋微云
 */
        global $_W, $_GPC;
        $weid = $_W['uniacid'];
		$schoolid = intval($_GPC['schoolid']);
		$bj_id = intval($_GPC['bj_id']);
		$xq_id = intval($_GPC['xq_id']);
        
		//教师列表按教师入职时间先后顺序排列，先入职再前

        $list = pdo_fetchall("SELECT * FROM " . tablename($this->table_teachers) . " WHERE weid = :weid AND schoolid =:schoolid AND ( bj_id1 = :bj_id1 or bj_id2 = :bj_id2 or bj_id3 = :bj_id3 ) ORDER BY id ASC", array(
				':weid' => $_W['uniacid'],
				':schoolid' => $schoolid,
				':bj_id1' =>$bj_id,
				':bj_id2' =>$bj_id,
				':bj_id3' =>$bj_id,
				));
		$bjname = pdo_fetch("SELECT * FROM " . tablename($this->table_classify) . " where sid = :sid ", array(':sid' => $bj_id));
		$xqname = pdo_fetch("SELECT * FROM " . tablename($this->table_classify) . " where sid = :sid ", array(':sid' => $xq_id));		
		foreach($list as $key => $row){
			 
			 //$list[$key]['sname'] = $category['sname'];
			 if ($bj_id = $row['bj_id1']){
				$category = pdo_fetch("SELECT * FROM " . tablename($this->table_classify) . " where sid = :sid ", array(':sid' => $row['km_id1']));
			 }else if($bj_id = $row['bj_id2']){
				$category = pdo_fetch("SELECT * FROM " . tablename($this->table_classify) . " where sid = :sid ", array(':sid' => $row['km_id2'])); 
			 }else if($bj_id = $row['bj_id3']){
				$category = pdo_fetch("SELECT * FROM " . tablename($this->table_classify) . " where sid = :sid ", array(':sid' => $row['km_id3'])); 
			 }
			 $list[$key]['sname'] = $category['sname'];
		}		
        
        $school = pdo_fetch("SELECT * FROM " . tablename($this->table_index) . " where weid = :weid AND id=:id", array(':weid' => $weid, ':id' => $schoolid));
	
        include $this->template(''.$school['style2'].'/mytecher');
?>
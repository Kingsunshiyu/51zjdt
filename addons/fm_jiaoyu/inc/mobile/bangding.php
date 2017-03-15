<?php
/**
 * 微教育模块
 *
 * @author 冰锋微云
 */
        global $_W, $_GPC;
        $weid = $_W ['uniacid'];
        $from_user = $_W['openid'];
		$openid = $_W['openid'];
		$schoolid = intval($_GPC['schoolid']); 

        include $this->template('bangding');
		
		

		
		
?>
<?php
/**
 */
defined('IN_IA') or exit('Access Denied');
        global $_W, $_GPC;
        $config = $this->get_config();
        //所有职位
        $lists = pdo_fetchall("SELECT * FROM " . tablename($this->job_table) . " WHERE weid = :weid", array(":weid" => $this->weid));
        //所有职位分类
        $categorys = pdo_fetchall("SELECT * FROM " . tablename($this->category_table) . " WHERE weid = :weid AND isshow = 1", array(":weid" => $this->weid));
        $tmp = array();
        foreach ($categorys AS $key => $cate) {
            $tmp[$cate['id']] = $cate;
        }
        foreach ($lists AS $key => $val) {
            $lists[$key]['cname'] = $tmp[$val['cid']]['name'];
        }

        include $this->template('zhao_info');









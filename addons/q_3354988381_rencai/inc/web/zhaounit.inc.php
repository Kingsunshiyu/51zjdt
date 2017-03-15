<?php
/**
 */
defined('IN_IA') or exit('Access Denied');
global $_W, $_GPC;
        $config = $this->get_config();

        $condition = '';
        if ($_GPC['name']) {
            $condition .= " and name like '%".$_GPC['name']."%'";
        }  
        
        $lists = pdo_fetchall("SELECT * FROM " . tablename($this->company_table) . " WHERE 1 $condition and weid = :weid order by sort asc, id desc", array(":weid" => $this->weid));
        foreach ($lists AS $key => $val) {
            $lists[$key]['type'] = $config['companytype'][$val['type']];
            $company_money_rom = $this->get_table_row('q_3354988381_rencai_company_money', $val['id'], 'company_id');
            $lists[$key]['curr_money'] = $company_money_rom['money']+0;
        }

        //所有行业分类
        $categorys = pdo_fetchall("SELECT * FROM " . tablename($this->industry_table) . " WHERE 1 $condition and weid = :weid", array(":weid" => $this->weid));
        $tmp = array();
        foreach ($categorys AS $key => $cate) {
            $tmp[$cate['id']] = $cate;
        }
        foreach ($lists AS $key => $val) {
            $lists[$key]['cname'] = $tmp[$val['industry']]['name'];
        }
        include $this->template('zhao_unit');









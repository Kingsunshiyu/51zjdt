<?php
/**
 */
defined('IN_IA') or exit('Access Denied');
global $_W, $_GPC;
        load()->func('tpl');
        if (checksubmit('save_info')) {
            $id = intval($_GPC['companyid']);
            $_GPC['data']['coordinate'] = json_encode($_GPC['data']['coordinate']);

            if (!isset($_GPC['data']['cant_resume']) || $_GPC['data']['cant_resume'] == '') {
                $_GPC['data']['cant_resume'] = 1;
            }
            if ($id > 0) {           
                if (pdo_update($this->company_table, $_GPC['data'], array('id' => $id))) {    
                    $this->check_exist_member($_GPC['data'], 1);
                    message("保存成功", $this->createWebUrl('Zhaounit'), 'success');
                } else {
                    message("保存失败", $this->createWebUrl('Zhaounit'), 'error');
                }                
            } else {
                $_GPC['data']['weid'] = $this->weid;
                $_GPC['data']['dateline'] = time();
                if (pdo_insert($this->company_table, $_GPC['data'])) {
                    $this->check_exist_member($_GPC['data'], 1);
                    message('添加成功', $this->createWebUrl('Zhaounit'), 'success');
                } else {
                    message('操作失败或无改动', $this->createWebUrl('Zhaounit'), 'error');
                }                 
            }

        } else {
            $config = $this->get_config();
            $id = intval($_GPC['id']);
            $row = pdo_fetch("SELECT * FROM " . tablename($this->company_table) . " WHERE  id = :id AND weid = :weid LIMIT 1", array(":id" => $id, ":weid" => $this->weid));
            $coordinate = json_decode($row['coordinate'], 1);

            //$company_logo = $_SERVER['DOCUMENT_ROOT'] . $this->_upload_prefix . "/attachment/q_3354988381_rencai/" . $row['logo'];
            $company_logo = $this->get_rencai_pic($row['logo']);
            $company_avatar = $this->get_rencai_pic($row['avatar']);
            $company_license = $this->get_rencai_pic($row['license']);
            if (!$row) {
                $row['province'] = $this->getConfigArr('cfg_dft_p');
                $row['city'] = $this->getConfigArr('cfg_dft_c');
                $row['district'] = $this->getConfigArr('cfg_dft_d');
            }

            //行业分类=取父类
            $parents = pdo_fetchall("SELECT * FROM " . tablename($this->industry_table) . " WHERE weid = :weid AND parent_id = 0 ORDER BY display ASC", array(":weid" => $this->weid));
            $tmp = array();
            foreach ($parents AS $parent) {
                array_push($tmp, $parent['id']);
            }
            $pids = implode(",", $tmp);
            unset($tmp);
            if (!empty($pids)) {
                //取子类
                $subs = pdo_fetchall("SELECT * FROM " . tablename($this->industry_table) . " WHERE weid = :weid AND parent_id IN ({$pids}) ORDER BY display ASC", array(":weid" => $this->weid));
                foreach ($parents AS $key => $parent) {
                    foreach ($subs AS $k => $sub) {
                        if ($sub['parent_id'] == $parent['id']) {
                            $parents[$key]['sub'][$k] = $sub;
                        }
                    }
                }
            }
            include $this->template('zhao_unit_edit');
        }









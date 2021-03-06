<?php
/**
 * 广告
 */
defined('IN_IA') or exit('Access Denied');
global $_W, $_GPC;
        $config = $this->get_config();
        /**
         * 是否是企业用户
         * 是：更新查看简历数
         * 否：pass
         */
        $person_id = $_GPC['person_id'];
        
        if (!$this->_debug_flag) {
            $company = pdo_fetch("SELECT `id`,`isauth`,`view_resume_nums`,`view_resume_total`, cant_resume FROM " . tablename($this->company_table) . " WHERE weid = :weid AND from_user = :from_user LIMIT 1", array(":weid" => $this->weid, ":from_user" => $this->from_user));
            if (!empty($company)) {
                if($company['isauth'] == 0){
                    message('企业未认证，不可查看简历', $this->createMobileUrl("Resume"), 'error');
                }
                if ($company['view_resume_nums'] >= $company['view_resume_total']) {
                    $can_look = $this->company_paid_money('look_resume', $company['id'], $person_id);
                    if (!$can_look) {
                        message("查看简历数已用完，请购买", referer(), 'error');
                    }
                }
                if ($company['cant_resume'] == 1) {
                    message("您暂时没有查看简历的权限", referer(), 'error');
                }
                pdo_update($this->company_table, array('view_resume_nums' => intval($company['view_resume_nums'] + 1)), array('id' => $company['id']));
            } else {
                $ui_info_arr = array('icon' => 'weui_icon_msg weui_icon_warn',
                                     'msg_title' => '警告',
                                     'msg_desc' => '只有发布招聘信息的企业才有查看简历权限',
                                     'go_url' => $this->createMobileUrl('PublicJob'),
                );                
                $this->showInfoMsg($ui_info_arr);
                //message('只有认证企业才有查看简历权限', $this->createMobileUrl("Resume"), 'error');
            }            
        }

        

        //基本信息
        $person = pdo_fetch("SELECT * FROM " . tablename($this->person_table) . " WHERE id = :id LIMIT 1", array(":id" => $person_id));
        $person['updatetime'] = date("Y-m-d", $person['updatetime']);
        //申请的职位
        $category = pdo_fetch("SELECT name FROM " . tablename($this->category_table) . " WHERE id = :id AND weid = :weid LIMIT 1", array(":id" => $person['cid'], ":weid" => $this->weid));
        
        //默认头像地址
        $avatar_default_path = $_W['siteroot'] . 'addons/q_3354988381_rencai/template/static/images/';
        //头像判断
        $val = $person;
        if (!$val['headimgurl']) {
            $person['headimgurl'] = $this->get_user_header_pic($person['from_user'], $person['sex']);
        } else {
            if (strstr($val['headimgurl'], 'http')) {
                $person['headimgurl'] = $val['headimgurl'];
            } else {
                $person['headimgurl'] = $this->get_rencai_pic($val['headimgurl']);
            }

        }        
        //简历列表
        $resumes = pdo_fetchall("SELECT * FROM " . tablename($this->resume_table) . " WHERE person_id = :person_id ORDER BY id DESC", array(":person_id" => $person_id));
        if ($resumes) {
            foreach ($resumes AS $key => $resume) {
                $resumes[$key]['dateline'] = date("Y-m-d", $resume['dateline']);
            }
        }
        //更新查看简历数
        pdo_update($this->person_table, array('views' => intval($person['views']) + 1), array('id' => $person['id']));
        
        //是否已经邀请
        $isinvite = 0;
        $invite = pdo_fetch("SELECT * FROM " . tablename('q_3354988381_rencai_invite_person') . " WHERE weid = :weid AND company_id = :company_id AND person_id = :person_id  LIMIT 1", 
                array(":weid" => $this->weid, ":company_id" => $company['id'], ":person_id" => $person_id));
        if ($invite) {
            $isinvite_msg = '发出面试邀请';
            if ($this->getConfigArr('invites_per_member') <= $invite['invite_count']) {
                $isinvite = 1; 
                $isinvite_msg = '邀请次数已用完';
            }
        } 
        
        $fields_list = $this->getFieldsSaveValArr('person_', 1, 1);
        $title = '查看简历';
        include $this->template('show_resume');

        

















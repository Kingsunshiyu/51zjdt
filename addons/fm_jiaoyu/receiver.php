<?php
/**
 * 微教育模块订阅器
 *
 * @author 冰锋微云
 * @url http://bbs.we7.cc
 */
defined('IN_IA') or exit('Access Denied');

class Fm_jiaoyuModuleReceiver extends WeModuleReceiver {

	public $table_qrinfo = 'wx_school_qrcode_info';
	public $table_qrstat = 'wx_school_qrcode_statinfo';

	public function receive() {
		global $_W;
		 load()->func('logging');
		 WeUtility::logging('fm_jiaoyu_messagelog', $this->message);
		if ($this->message['event'] == 'subscribe' && !empty($this->message['ticket'])) {
			$sceneid = $this->message['scene'];
			$row = pdo_fetch("SELECT * FROM " . tablename($this->table_qrinfo) . " WHERE qrcid = '{$sceneid}' and weid = '{$_W['uniacid']}'");
			if (empty($row)) return;
			   $insert = array(
					'weid' => $_W['uniacid'],
					'qid' => $row['id'],
					'openid' => $this->message['from'],
					'type' => 1,
					'qrcid' => $sceneid,
					'name' => $row['name'],
					'group_id' => $row['group_id'],
					'createtime' => TIMESTAMP
				);
			$url = "https://api.weixin.qq.com/cgi-bin/groups/members/update?access_token=%s";
			$weixindata = "{\"openid\":\"{$this->message['from']}\",\"to_groupid\":{$row['group_id']}}";
			$this->weixin_fans_group($url, $weixindata);
			$opendi = $this->message['from'];
			if($row['rid']){
				$this->toSendCustomNotice($opendi,$row['rid']);	
			}
			pdo_insert($this->table_qrstat, $insert);
			$scannum = $row['subnum'] + 1;
			    $temp = array(
				    'subnum' => $scannum
				);
			pdo_update($this->table_qrinfo, $temp, array('id' => $row['id']));

		} else if($this->message['event'] == 'SCAN') {
			$sceneid = $this->message['scene'];
			$row = pdo_fetch("SELECT * FROM " . tablename($this->table_qrinfo) . " WHERE qrcid = '{$sceneid}' and weid = '{$_W['uniacid']}'");
			$statinfo = pdo_fetch("SELECT * FROM " . tablename($this->table_qrstat) . " WHERE openid = '{$this->message['from']}' and weid={$_W['uniacid']}");
				$insert = array(
					'weid' => $_W['uniacid'],
					'qid' => $row['id'],
					'qrcid' => $sceneid,
					'group_id' => $row['group_id'],
					'name' => $row['name'],
					'createtime' => TIMESTAMP
				);
			$url = "https://api.weixin.qq.com/cgi-bin/groups/members/update?access_token=%s";
			$weixindata = "{\"openid\":\"{$this->message['from']}\",\"to_groupid\":{$row['group_id']}}";
			$this->weixin_fans_group($url, $weixindata);
			$scannum = $row['subnum'] + 1;
			    $temp = array(
				    'subnum' => $scannum
				);
			$opendi = $this->message['from'];
			if($row['rid']){
				$this->toSendCustomNotice($opendi,$row['rid']);	
			}
			pdo_update($this->table_qrinfo, $temp, array('id' => $row['id']));
			pdo_update($this->table_qrstat, $insert, array('id' => $statinfo['id']));

		}
	}

	public function weixin_fans_group($url, $weixindata)
	{
		global $_W, $_GPC;
		load()->func('logging');
		$weid = $_W['uniacid'];
		load()->classs('weixin.account');
		$accObj = WeixinAccount::create($weid);
		$access_token = WeAccount::token();
		$url = sprintf($url, $access_token);
		logging_run("$url===$weixindata");
		load()->func('communication');
		$response = ihttp_request($url, $weixindata);
		if (is_error($response)) {
			logging_run("访问公众平台接口失败, 错误: {$response['message']},$weixindata");
		}
		$result = @json_decode($response['content'], true);
		if (empty($result)) {
			logging_run("服务器没有返回");
		} elseif (!empty($result['errcode'])) {
			logging_run("访问微信接口错误, 错误代码: {$result['errcode']}, 错误信息: {$result['errmsg']},$weixindata");
			exit();
		} else {
			logging_run('weixin_fans_group接口调用成功');
		}
		return $result;
	}

    public function toSendCustomNotice($openid,$srid){
		global $_W, $_GPC;
		$acc = WeAccount::create($acid);
		$send['touser'] = trim($openid);
		$send['msgtype'] = 'news';
		$rid = intval($srid);
		$rule = pdo_fetch('SELECT module,name FROM ' . tablename('rule') . ' WHERE id = :rid', array(':rid' => $rid));
		if(empty($rule)) {
			exit(json_encode(array('status' => 'error', 'message' => '没有找到指定关键字的回复内容，请检查关键字的对应规则')));
		}
		$idata = array('rid' => $rid, 'name' => $rule['name'], 'module' => $rule['module']);
		$module = $rule['module'];
		$reply = pdo_fetchall('SELECT * FROM ' . tablename($module . '_reply') . ' WHERE rid = :rid', array(':rid' => $rid));
		if($module == 'cover') {
			$idata['do'] = $reply[0]['do'];
			$idata['cmodule'] = $reply[0]['module'];
		}
		if(!empty($reply)) {
			foreach($reply as $c) {
				$row = array();
				$row['title'] = urlencode($c['title']);
				$row['description'] = urlencode($c['description']);
				!empty($c['thumb']) && ($row['picurl'] = tomedia($c['thumb']));

				if(strexists($c['url'], 'http://') || strexists($c['url'], 'https://')) {
					$row['url'] = $c['url'];
				} else {
					$fans = pdo_fetch('SELECT salt,acid,openid FROM ' . tablename('mc_mapping_fans') . ' WHERE acid = :acid AND openid = :openid', array(':acid' => $_W['acid'], ':openid' => $send['touser']));
					$pass['time'] = TIMESTAMP;
					$pass['acid'] = $fans['acid'];
					$pass['openid'] = $fans['openid'];
					$pass['hash'] = md5("{$fans['openid']}{$pass['time']}{$fans['salt']}{$_W['config']['setting']['authkey']}");
					$auth = base64_encode(json_encode($pass));
					$vars = array();
					$vars['__auth'] = $auth;
					$vars['forward'] = base64_encode($c['url']);
					$row['url'] =  $_W['siteroot'] . 'app/' . murl('auth/forward', $vars);
				}
				$news[] = $row;
			}
			$send['news']['articles'] = $news;
		} else {
			$idata = array();
			$send['news'] = '';
		}
        $acc->sendCustomNotice($send);
    }

	public function sendCustomNotice($data) {
		if(empty($data)) {
			return error(-1, '参数错误');
		}
		$token = $this->getAccessToken();
		if(is_error($token)){
			return $token;
		}
		$url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token={$token}";
		$response = ihttp_request($url, urldecode(json_encode($data)));
		if(is_error($response)) {
			return error(-1, "访问公众平台接口失败, 错误: {$response['message']}");
		}
		$result = @json_decode($response['content'], true);
		if(empty($result)) {
			return error(-1, "接口调用失败, 元数据: {$response['meta']}");
		} elseif(!empty($result['errcode'])) {
			return error(-1, "访问微信接口错误, 错误代码: {$result['errcode']}, 错误信息: {$result['errmsg']},错误详情：{$this->error_code($result['errcode'])}");
		}
		return $result;
	}	
}
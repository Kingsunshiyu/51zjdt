<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('default/templates/common/header-base', TEMPLATE_INCLUDEPATH)) : (include template('default/templates/common/header-base', TEMPLATE_INCLUDEPATH));?>
<link id="barindexCss" rel="stylesheet" href="../addons/meepo_bbs/template/mobile/default/css/detail.min.182f9e58.css" />
<link rel="stylesheet" href="../addons/meepo_bbs/template/mobile/default/lib/qqface/css/reset.css">

<body id="detail_body">

	<div class="detail-main" id="js_detail_main">
		<div class="top-content" id="js_detail_scroll_top">
			<div id="top_post_wrapper">
				<div class="post-title-wrapper" id="detail_top_info_header">
					<div class="post-title js-detail-title allow-copy"><?php  echo $item['title'];?> </div>
					<div class="post-title-bottom row section-1px">
						<div class="user-avatar" data-profile-uin="2775125008">
							<img src="<?php  if(strlen($user['avatar'])>5) { ?><?php  echo tomedia($user['avatar'])?><?php  } else { ?><?php  echo tomedia($forum['logo'])?><?php  } ?>">
							<span class="g-level level-3"></span>
						</div>
						<div class="col title-bottom-wrapper">
							<div class="name-wrap">
								<span class="author user-nick " style="max-width:80px;"><?php  echo $user['nickname'];?></span>
								<span class="time"><?php  echo $item['createtime'];?></span>
							</div>
							<a class="detail-from" style="max-width: 150px;" href="<?php  echo $this->createMobileUrl('forum')?>"> 返回主页 </a>
						</div>
					</div>
				</div>
				<div class="post-wrapper" id="detail_top_info">
					<div class="actions">
						<?php  if(!empty($ismanager)) { ?>
						<a class="ui-button" href="<?php  echo $this->createMobileUrl('forum_topic_manager',array('op'=>'delete','id'=>$item['id']))?>" style="color:gray;">删帖</a> <?php  if($item['tab'] == 'jing') { ?>
						<a class="ui-button" href="<?php  echo $this->createMobileUrl('forum_topic_manager',array('op'=>'tab','id'=>$item['id'],'tab'=>''))?>" style="color:orange;">去精</a> <?php  } else { ?>
						<a class="ui-button" href="<?php  echo $this->createMobileUrl('forum_topic_manager',array('op'=>'tab','id'=>$item['id'],'tab'=>'jing'))?>" style="color:orange;">精华</a> <?php  } ?> <?php  if($item['tab'] == 'top') { ?>
						<a class="ui-button" href="<?php  echo $this->createMobileUrl('forum_topic_manager',array('op'=>'tab','id'=>$item['id'],'tab'=>''))?>" style="color:red;">去顶</a> <?php  } else { ?>
						<a class="ui-button" href="<?php  echo $this->createMobileUrl('forum_topic_manager',array('op'=>'tab','id'=>$item['id'],'tab'=>'top'))?>" style="color:red;">置顶</a> <?php  } ?>
						<a class="ui-button" href="<?php  echo $this->createMobileUrl('forum_post',array('id'=>$item['id']))?>" style="">编辑</a> <?php  } else if($is_mine) { ?>
						<a class="ui-button" href="<?php  echo $this->createMobileUrl('forum_post',array('id'=>$item['id']))?>" style="">编辑</a>
						<a class="ui-button" href="<?php  echo $this->createMobileUrl('forum_topic_manager',array('op'=>'delete','id'=>$item['id']))?>" style="color:gray;">删帖</a> <?php  } ?>
						<span class="read-num">
						        <i class="read-num-icon">
						        </i>
						        <?php  echo $item['lnum'];?>
						    </span>
					</div>
					<div class="content-wrapper allow-copy" id="d_1437677992716">
						<div>
							<div class="img-box pre-size" style="width:100%;height:atuo;">
								<?php  if(is_array($item['thumb'])) { foreach($item['thumb'] as $pic) { ?>
								<img src="<?php  echo tomedia($pic)?>" style="widht:100%;" /> <?php  } } ?>
							</div>
							<style>
								#meepo_share_content img {
									width: 100% !important;
									height: auto !important;
								}
							</style>
							<div class="content" id="meepo_share_content">
								<?php  echo $item['content']?>
							</div>

							<div class="video-preview">
								<div class="icon-play">
									<div class="triangle">

									</div>
								</div>
								<div class="preview-box">

								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="nav-wrapper" id="bar_nav_wrapper">

				</div>
				<div class="detail-game" id="detail_game">
					<div>
						<a id="detail_game_btn" class="detail-game-btn">
                                启动游戏
                            </a>
					</div>
					<div class="detail-game-text">
						马上开启游戏之旅!
					</div>
				</div>
				<div class="btn-comment-operate show-inturn reverse section-1px" style="display: block;">
					<div class="leftside-all-icon all">
					</div>
					<?php  if($item['tab'] == 'begging') { ?>
					<span> 全部打赏</span> <?php  } else { ?>
					<span> 全部评论</span> <?php  } ?>
					<a id="btnShowInturn" href="javascript:;">
                            倒序查看
                        </a>
				</div>
				<div class="btn-comment-operate show-more-before">
					<a id="show-more-before" href="javascript:;">
                            点击显示更多
                        </a>
				</div>
			</div>
			<div class="top-content">
				<div class="detail-comment-list" id="js_detail_list">
					<div id="top_comment_wrapper">
						<ul class="lists">
							<ul class="lists">
								<?php  if(is_array($reply)) { foreach($reply as $key => $rep) { ?>
								<li soda-repeat="comment in comments" class="list  section-1px">
									<div class="comment-wrapper">
										<div class="user-avatar" data-profile-uin="2462403908">
											<img src="<?php echo !empty($rep['author']['avatar'])?tomedia($rep['author']['avatar']):tomedia($forum['logo'])?>" />
											<span class="g-level level-5">
								            </span>
										</div>
										<div class="name-wrap">
											<span class="author user-nick ">
								                <?php  echo $rep['author']['nickname'];?>
								            </span> <?php  if($rep['author']['gender'] == 1) { ?>
											<label class="author-male"></label><?php  } else if($rep['author']['gender'] == 2) { ?>
											<label class="author-female"></label><?php  } else { ?><?php  } ?>
											<span>
								            	<?php  if($item['tab'] == 'begging') { ?>
								                <span class="honour border-1px">
								                  +<?php  echo $rep['begging'];?>元
								                </span> <?php  } else { ?>
											<span class="honour border-1px">
								                  <?php echo !empty($rep['author']['group'])?$rep['author']['group']:'游客'?>
								                </span> <?php  } ?>
											</span>
											<span>
								            </span>
											<span class="floor">
								            <?php  if(!empty($ismanager)) { ?>
								            	<a class="ui-button" href="<?php  echo $this->createMobileUrl('forum_topic_manager',array('op'=>'delete_reply','id'=>$rep['id']))?>" style="color:gray;">删</a>
								            <?php  } ?>
								                	<?php  echo ($key+1)?>楼
								                	
								            </span>
										</div>
										<div class="content-wrapper">

											<div class="content allow-copy">
												<?php  if(!empty($rep['content'])) { ?> <?php  echo $rep['content'];?> <?php  } ?>
												<div class="img-box pre-size" style="width:100%;height:atuo;">
													<?php  if(is_array($rep['thumb'])) { foreach($rep['thumb'] as $pic) { ?>
													<img src="<?php  echo tomedia($pic)?>" style="widht:100%;" /> <?php  } } ?>
												</div>
											</div>
											<?php  if(!empty($rep['mreply'])) { ?> <?php  if(is_array($rep['mreply'])) { foreach($rep['mreply'] as $mre) { ?>
											<div class="ref-comment">
												<span><span><?php  echo $mre['nickname'];?></span>: </span>
												<span></span>
												<span><?php  echo $mre['content'];?></span>
											</div>
											<?php  } } ?> <?php  } ?>
											<div class="ref-comment" id="<?php  echo 'reply_reply_'.$rep['id']?>" style="display:none;">
												<form action="<?php  echo $this->createMobileUrl('forum_topic_reply',array('fid'=>$rep['id'],'tid'=>$item['id']))?>" method="post">
													<span><span><?php  echo $member['nickname'];?></span>: </span>
													<span></span>
													<span><input type="text" name="content" class="meepo_input"><input type="submit" name="submit" value="提交" style="border-radius: 0.5em;background-color: white;width: 3em;height: 2em;"></span>
												</form>
											</div>
										</div>
										<div class="actions">
											<span class="btn-action time">
								                <!-- 1小时前 -->
								                <?php  echo $rep['create_at'];?>
								            </span>
											<span class="btn-action reply" onclick="$('#reply_reply_<?php  echo $rep['id'];?>').show();">
								            	<?php  echo $rep['reply_num'];?>
								            </span>
											<span class="btn-action like " onclick="window.location.href='<?php  echo $this->createMobileUrl('forum_topic_like',array('tid'=>$item['id'],'fid'=>$rep['id']))?>'">
								                <!-- 3-->
								                <?php  echo $rep['like_num'];?>
								            </span>
										</div>
									</div>
								</li>
								<?php  } } ?>
							</ul>
						</ul>
					</div>
				</div>
				<div id="bottom_comment_wrapper">
				</div>
			</div>
			<div class="empty-comment">
				暂无评论，快来抢沙发
			</div>
			<ul id="recommend-list">
				<?php  if(!empty($recommend_list)) { ?>
				<div id="recommend-title" soda-if="postlist &amp;&amp; postlist.length" class="recommend-title section-1px">
					<div class="recommend-icon"></div>
					<span>推荐话题</span>
				</div>
				<ul class="recommend-post-list section-1px" id="d_1441953206744">
					<?php  if(is_array($recommend_list)) { foreach($recommend_list as $recommend) { ?>
					<li soda-repeat="item in postlist" data-bid="13276" data-pid="1226104-1441176568" data-type="302" openactid="" id="d_1441953206744">
						<div class="list-content" id="d_1441953206744">
							<p class="grouptitle"><?php  echo $recommend['title'];?></p>
							<div class="groupbody">
								<div class="frombarcontent">
									来自<a class="from-bar-link"><?php  echo $recommend['username'];?></a>
								</div>

								<div class="rightgroup">
									<i class="read-icon"></i>
									<span class="readnum"><?php  echo $recommend['lnum'];?></span>
									<i class="reply-icon"></i>
									<span class="groupreply"><?php  echo $recommend['replynum'];?></span>
								</div>
							</div>
						</div>
					</li>
					<?php  } } ?>
				</ul>
				<?php  } ?>
			</ul>
			<?php  if(!empty($advss)) { ?>
			<div class="gdt-ad-banner gdt-ad ui-hide" style="display: block;">
				<!--   -->
				<a href="<?php  echo $advss['link']?>">
					<div class="ad-banner-img-wrapper" style="height: auto;">
						<img src="<?php  echo tomedia($advss['thumb'])?>" class="ad-banner-img" style="width:100%;-webkit-tap-highlight-color: rgba(0,0,0,.35);">
					</div>
				</a>
			</div>
			<?php  } ?>
		</div>
	</div>
	<div></div>
	<div class="bottom-bar section-1px" style="visibility: visible;">
		<a class="item icon-forward" id="to_forward"><?php  echo $sharenum;?></a> <?php  if($item['tab'] == 'begging') { ?>
		<a href="javascript:;" class="item icon-begging <?php  if(!empty($replied)) { ?>active<?php  } ?>" id="to_reply">已赏<?php  echo $replynum;?></a> <?php  } else { ?>
		<a href="javascript:;" class="item icon-reply <?php  if(!empty($replied)) { ?>active<?php  } ?>" id="to_reply">回帖<?php  echo $replynum;?></a> <?php  } ?>
		<a href="javascript:;" class="item icon-like <?php  if(!empty($liked)) { ?>liked<?php  } ?>" id="to_like"><?php  echo $likenum;?></a>
		<a href="tel:<?php  if($forum['usermobile']) { ?><?php echo !empty($user['mobile'])?$user['mobile']:$forum['tel']?><?php  } else { ?><?php  echo $forum['tel'];?><?php  } ?>" class="item icon-phone" id="to_wechat">咨询</a>
	</div>
	<div class="mask-win" id="join_activity_win">
		<div class="mask-win-wrap">
			<div id="join_activity_content">
				<p id="join_activity_win_title">
					<span class="join_wording">
                            报名
                        </span> 成功！
				</p>
				<p id="join_activity_win_post">
					<img>
				</p>
				<p id="join_activity_win_name">
				</p>
				<p id="join_activity_win_time">
				</p>
				<p id="join_activity_win_share">
					<a href="javascript:;" id="shareActivity" class="share-link">
                            分享给好友
                        </a>
				</p>
				<p id="join_activity_win_group_hint">
					加入活动关联群组，了解更多活动信息！
				</p>
			</div>
			<div class="mask-win-btns">
				<a href="javascript:;" id="joinActivityReply">
                        参与讨论
                    </a>
				<a href="javascript:;" id="joinActivityGroup">
                        加入群组
                    </a>
				<a href="javascript:;" id="joinActivityFinish">
                        完成
                    </a>
			</div>
		</div>
	</div>
	<div class="post-error">
		<div class="emo">
		</div>
		<br>
		<span>
            </span>
	</div>
	<div id="comment_dialog" class="comment-dialog-mask">
		<div class="comment-dialog">
			<img src="<?php  echo tomedia($forum['share_guid'])?>" style="width:100%;">
		</div>
		<div class="comment-dialog-close">
		</div>
	</div>
	<div id="back_to_top" class="btn-back border-1px">
	</div>

	<form method="post" action="<?php  echo $this->createMobileUrl('forum_topic_reply',array('tid'=>$item['id']))?>" enctype="multipart/form-data" id="replyForm">
		<div id="publish-panel" class="pub-float reply" style="display:none;height: 736px;">
			<div class="pub-con">
				<div class="pub-wrap section-1px edit-mode show">
					<?php  if($item['tab'] == 'begging') { ?>
					<div class="pub-theme section-1px ">
						<input maxlength="200" name="begging_money" spellcheck="false" class="ipt-theme" type="text" placeholder="请输入打赏金额" value="<?php  echo $setting['begging_money']?>">
						<input name="tab" value="begging" type="hidden">
					</div>
					<div class="editor-outer">
						<textarea name="content" id="reply_content" class="editor" placeholder="打赏留言，3-700个字"></textarea>
						<textarea class="cp-editor"></textarea>
					</div>
					<?php  } else { ?>
					<div class="editor-outer">
						<textarea name="content" id="reply_content" class="editor" placeholder="内容，3-700个字"></textarea>
						<textarea class="cp-editor"></textarea>
					</div>
					<?php  } ?>
					<div class="pub-line border-1px">
					</div>
					<ul class="pub-type">
						<li id="selectPic" class="pic-type" title="添加图片">
						</li>
						<li id="selectFace" class="pub-face" title="添加表情">
						</li>
						<li class="pub-flex">
						</li>
						<li class="pub-btn ">
							<button class="pub-cancel" type="button">
								取消
							</button>
						</li>
						<li class="pub-btn ">
							<?php  if($item['tab'] == 'begging') { ?>
							<button class="pub-publish" type="submit" name="submit" value="submit">立即打赏</button>
							<?php  } else { ?>
							<button class="pub-publish" type="submit" name="submit" value="submit">发表</button>
							<?php  } ?>
						</li>
						<li class="loading ">
						</li>
						<li class="pub-remain ">
							<p class="pub-remain-wording" style="display:none">
							</p>
						</li>
					</ul>
					<style>
						div[id^=rt_rt] {
							position: absolute !important;
							top: 0px !important;
							left: 0px !important;
							width: 100% !important;
							height: 100% !important;
							overflow: hidden !important;
							opacity: 0;
						}
						
						#pub-pics .up-entry input {
							position: absolute;
							right: 0;
							top: 0;
							opacity: 0;
							left: 0px;
							width: 100%;
							height: 100%;
							cursor: pointer;
						}
						
						#pub-pics .up-entry img {
							float: left;
							position: relative;
							margin: 6px 6px 0 0;
							width: 65px;
							height: 65px;
						}
					</style>
					<ul class="pub-pics" id="pub-pics">

						<li class="up-entry">
							<div id="chooseImage" style="width: 100%;height: 100%;"></div>
							<input type="file" name="file" id="file" onchange="ajaxFileUpload()" />
						</li>

						<?php  if(is_array($setting['thumb'])) { foreach($setting['thumb'] as $key => $pic) { ?>
						<li class="up-pic up-error" id="upPic<?php  echo $key;?>">
							<div class="up-mask"></div>
							<div class="up-progress">
								<div class="pos" style="-webkit-transition: all 1s ease-out; transition: all 1s ease-out; width: 38px;"></div>
							</div> <a class="btn-del" href="javascript:void(0)" title="关闭">&nbsp;</a>
							<div class="clip"><img src="<?php  echo tomedia($pic)?>" style="width: 65px; height: 65px; display: block; margin-left: 0px;"></div>
							<input type="hidden" name="thumb[]" value="<?php  echo $pic?>">
						</li>
						<?php  } } ?>
					</ul>

					<div class="pub-faces" id="pub-faces"></div>
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				</div>
			</div>
		</div>
	</form>

	<script src="../addons/meepo_bbs/template/mobile/default/lib/qqface/js/jquery.qqFace.js"></script>
	<script src="../addons/meepo_bbs/template/mobile/default/lib/ajaxfileupload.js"></script>
	<script type="text/javascript">
		$(function() {
			$('.pub-face').qqFace({
				id: 'pub-faces',
				assign: 'reply_content',
				path: '../addons/meepo_bbs/template/mobile/default/lib/qqface/arclist/' //表情存放的路径
			});
		});
	</script>

	<script type="text/javascript">
		<?php  if(!empty($item)) { ?>
		var url = "<?php  echo $this->createMobileUrl('forum_credit',array('op'=>'read','tid'=>$item['tid']))?>";
		$.post(url, function(data) {});
		<?php  } ?>
		$('#to_wechat').click(function() {
			$('.floating_ck').toggle();
		});
		$('#selectPic').click(function() {
			$('.pub-pics').show();
			$('#selectPic').addClass("active");
		});
		$('#to_like').click(function() {
			var url = "<?php  echo $this->createMobileUrl('forum_topic_like',array('tid'=>$item['id']))?>";

			$.post(url, function(date) {
				$("#to_like").addClass("liked");
				window.location.href = "<?php  echo $this->createMobileUrl('forum_topic',array('id'=>$item['id']))?>";
			});
		});
		$('#to_reply').click(function() {
			<?php  if($item['tab'] == 'lock') { ?>
			alert('帖子违规被封锁，禁止评论！');
			<?php  } else { ?>
			$('#publish-panel').show();
			<?php  } ?>
		});
		$('.pub-cancel').click(function() {
			$('#publish-panel').hide();
		});
		$('.pub-publish').click(function() {
			$('#publish-panel').hide();
		});
		<?php  if($forum['isshare']) { ?>
		$('#to_forward').click(function() {
			$('#comment_dialog').show();
		});
		<?php  } ?>
		$('#comment_dialog').click(function() {
			$('#comment_dialog').hide();
		});

		function checkReplySubmit() {
			//reply_content
			var reply_content = document.getElementById("reply_content").value;
			reply_content = reply_content.replace('<br />', '/n');
			document.getElementById("reply_content").value = reply_content;
			$('#publish-panel').hide();
			return true;
		}
	</script>
	<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('default/templates/common/footer-base', TEMPLATE_INCLUDEPATH)) : (include template('default/templates/common/footer-base', TEMPLATE_INCLUDEPATH));?>
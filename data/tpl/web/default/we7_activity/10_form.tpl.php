<?php defined('IN_IA') or exit('Access Denied');?>
<div class="panel panel-default">

<p/>
	<div class="form-group">
		<label class="col-sm-1 control-label"></label>
		<div class="col-sm-11">
			<button type="button" class="btn btn-primary btn-lg"
				data-toggle="modal" data-target="#myModal">选择活动</button>
		</div>


	</div>



	<div class="form-group">
		<label class="col-sm-1 control-label">活动</label>
		<div class="col-sm-11">
			<input class="form-control" id="ac_title" type="text"
				placeholder="请选择要推广的活动" disabled value="<?php  echo $activity['name'];?>">


			<input type="hidden" name="activity" value="<?php  echo $activity['id'];?>" />
		</div>


	</div>

	<div class="form-group">
		<label class="col-sm-1 control-label">图文预览图片</label>
		<div class="col-sm-11"><?php  echo tpl_form_field_image('new_pic',$reply['new_pic']);?></div>


	</div>

	<div class="form-group">
		<label class="col-sm-1 control-label">图文说明</label>
		<div class="col-sm-11">



			<textarea style="height: 200px; width: 500px;" class="richtext-clone"
				name="news_content" id="news_content"><?php  echo $reply['news_content'];?></textarea>
		</div>


	</div>




</div>




<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">选择场景活动</h4>
			</div>
			<div class="modal-body">
				<table class="tb">
					<tr>
						<th><label for="">搜索关键字</label></th>
						<td>
							<div class="input-append" style="display: block;">
								<input type="text" class="span3" name="keyword" value=""
									id="search-kwd" />
								<button type="button" class="btn" onclick="search_entries();">搜索</button>
							</div>
						</td>
					</tr>
				</table>

				<div id="module-menus"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
				
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	function search_entries() {
		var kwd = $.trim($('#search-kwd').val());
		$.post('<?php  echo $this->createWebUrl('query');?>', {keyword: kwd}, function(dat){
			
			$('#module-menus').html(dat);
		});
	}
	function select_entry(o) {
		
		$(':hidden[name="activity"]').val(o.id);
		
		$("#ac_title").val(o.name);
		
		
		$('#myModal').modal('hide');
		
		
		
		
		
		
	}
</script>

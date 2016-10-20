<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span >&times;</span></button>
				<h4 class="modal-title" id="task-title">创建标签</h4>
			</div>
			<div class="modal-body">
				<form id="task">
					<div class="form-group">
						<label for="tname" class="control-label">Name:</label>
						<input id="tname" class="form-control" type="text"placeholder="Tagname">
					</div>
					{!! csrf_field() !!}
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="tsave" class="btn btn-primary" value="add">确认</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
			</div>
		</div>
	</div>
</div>
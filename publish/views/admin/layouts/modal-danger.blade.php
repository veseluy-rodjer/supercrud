{{-- Modal for delete model --}}
<div class="modal fade" id="modal-danger" tabindex="-1">
	<div class="modal-dialog">
	  <div class="modal-content bg-danger">
		<div class="modal-header">
		  <h4 style="text-align: center;" class="modal-title">{{ $user->name ?? 'Stranger'}}!</h4>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		  <p style="text-align: center">Confirm delete</p>
		</div>
		<div class="modal-footer justify-content-between">
		  <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
		  <button form="" type="submit" class="btn btn-outline-light">Save changes</button>
		</div>
	  </div>
	  <!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

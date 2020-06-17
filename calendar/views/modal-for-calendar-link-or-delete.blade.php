{{-- Modal for calendar link or delete --}}
<div class="modal fade" id="modal-link-or-delete" tabindex="-1">
	<div class="modal-dialog">
	  <div class="modal-content bg-secondary">
		<div class="modal-header">
		  <h4 style="text-align: center;" class="modal-title">{{ $user->name ?? 'Stranger'}}!</h4>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		  <p style="text-align: center">@lang('Make a choice')</p>
		</div>
		<div class="modal-footer justify-content-between">
		  {{-- <button type="button" class="btn btn-outline-light" data-button="link" data-event-id="" data-dismiss="modal">@lang('follow a link')</button> --}}
		  <button type="button" class="btn btn-outline-light" data-dismiss="modal">@lang('cancel')</button>
		  <button type="button" class="btn btn-outline-light" data-button="delete" data-event-id="" data-dismiss="modal">@lang('delete')</button>
		</div>
	  </div>
	  <!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

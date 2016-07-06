@if(session()->has('flash_message'))

	<div class="alert alert-{{ session('flash_status') }} alert-important">
		{{ session('flash_message') }}
	</div>
	
@endif
{{-- In /resources/views/layouts/app.blade.php
	include
	    <!-- Styles flag-icon-->
	    <link href="{{ asset('flag-icon-css-master/css/flag-icon.css') }}" rel="stylesheet">
--}}

<div class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		<span class="flag-icon flag-icon-{{ \App::getLocale() }}"></span>
    </a>
    <div class="dropdown-menu">
		@foreach (config('languages.languages') as $lang)
			<a class="dropdown-item" href="#" onclick="selectLanguage(this); event.preventDefault()" data-lang="{{ $lang }}"><span class="flag-icon flag-icon-{{ $lang }}"></span></a>
		@endforeach
    </div>
</div>

<script>
// change language
function selectLanguage(e) {
	let lang = e.dataset.lang;
	let route = "{{ route('setlocale') }}";
	document.location.href = route + '/' + lang + '/';
}
</script>

{{-- Change language by select tag --}}
@php
	/*
<p>
	<select id="select-language" name="language">
		@foreach (config('languages.languages') as $lang)
			<option {{ \App::getLocale() == $lang ? 'selected' : null }}>{{ $lang }}</option>
		@endforeach
	</select>
</p>

<script>
// change language
let selectLanguage = document.querySelector('#select-language');
selectLanguage.onchange = function(e) {
	let lang = this.value;
	let route = "{{ route('setlocale') }}";
	document.location.href = route + '/' + lang + '/';
} 
</script>
	*/
@endphp

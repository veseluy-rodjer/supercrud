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

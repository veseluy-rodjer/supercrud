<p>
	<select name="language">
		@foreach (config('languages.languages') as $lang)
			<option {{ \App::getLocale() == $lang ? 'selected' : null }}>{{ $lang }}</option>
		@endforeach
	</select>
</p>

<script>
// change language
$(document).ready(function() {
    $('select[name="language"]').change(function() {
		var lang = $(this).val();
		var route = "{{ route('setlocale') }}";
		console.log(route);
		$(location).attr('href', route + '/' + lang + '/');
    });
});
</script>

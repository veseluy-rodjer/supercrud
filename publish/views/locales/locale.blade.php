<br>
@foreach (config('languages.languages') as $lang)
	<a href="{{ route('setlocale', ['lang' => $lang]) }}">{{ $lang }}</a>
	<br>
@endforeach


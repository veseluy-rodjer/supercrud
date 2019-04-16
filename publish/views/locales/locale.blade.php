<br>
@foreach (config('languages.languages') as $lang)
	<a href="{{ route('setlocale', ['lang' => $lang]) }}">@lang('common.language', [], $lang)</a>
	<br>
@endforeach


{{-- In /resources/views/layouts/app.blade.php
	include
  <!-- flag-icon-css -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/flag-icon-css/css/flag-icon.min.css') }}">
--}}

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="flag-icon flag-icon-{{ \App::getLocale() }}"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right p-0">
			@foreach (config('languages.languages') as $lang)
				<a class="dropdown-item {{ $lang === \App::getLocale() ? 'active' : ''}}" href="#" onclick="event.preventDefault(); selectLanguage(this)" data-lang="{{ $lang }}">
					<i class="flag-icon flag-icon-{{ $lang }} mr-2"></i> {{ $lang }}
				</a>
			@endforeach
        </div>
      </li>

<script>
// change language
function selectLanguage(t) {
	let lang = t.dataset.lang;
	let route = "{{ route('setlocale') }}";
	document.location.href = route + '/' + lang + '/';
}
</script>


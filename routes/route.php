<?php

//Переключение языков
Route::get('setlocale/{lang?}', function ($lang) {

	$referer = url()->previous();
	$uri = parse_url($referer, PHP_URL_PATH);

	//разбиваем на массив по разделителю
	$segments = explode('/', $uri);

	if (in_array($segments[1], config('languages.languages'))) {
		unset($segments[1]); //удаляем метку			
	} 

	if ($lang != config('languages.mainLanguage')){ 
		array_splice($segments, 1, 0, $lang); 			
	}

	$url = url(implode("/", $segments));
	
	//если были еще GET-параметры - добавляем их
	if (parse_url($referer, PHP_URL_QUERY)) {
		$url = $url . '?' . parse_url($referer, PHP_URL_QUERY);
	}
	return redirect($url);

})->name('setlocale');

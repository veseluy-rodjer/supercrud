<?php

namespace VeseluyRodjer\CrudGenerator;

use Closure;

class LocaleMiddleware
{
    /**
     * Проверяет наличие корректной метки языка в текущем URL
     *
     * @return string|null
     */
	public static function getLocale()
	{
		$uri = \Request::path(); //получаем URI 
	    $segmentsURI = explode('/',$uri); //делим на части по разделителю "/"
	    //Проверяем метку языка  - есть ли она среди доступных языков
		if (!empty($segmentsURI[0]) && in_array($segmentsURI[0], config('languages.languages'))) {
			if ($segmentsURI[0] != config('languages.mainLanguage')) {
				return $segmentsURI[0];
			}
		}
		return null; 
	}

	/**
	 * Устанавливает язык приложения в зависимости от метки языка из URL
	 *
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
	{
	    $locale = self::getLocale();
        if($locale) \App::setLocale($locale);
        //если метки нет - устанавливаем основной язык $mainLanguage
        else \App::setLocale(config('languages.mainLanguage'));
        return $next($request);
    }
}


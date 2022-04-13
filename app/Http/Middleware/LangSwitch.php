<?php

namespace App\Http\Middleware;

use App\Services\Language\LanguageService;
use Closure;
use Illuminate\Http\Request;

class LangSwitch
{
    protected LanguageService $languageService;

    public function __construct(LanguageService $languageService)
    {
        $this->languageService = $languageService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $languages= $this->languageService->get()->get();

        $path =$request->server('PATH_INFO');
        $arr = explode('/',$path);
        dd(app()->getLocale());

        foreach ($languages as $language){
            if ($language->code != $arr[1] ){


                return redirect(app()->getLocale().$path);

            }
            else{
                return $next($request);

            }
        }
        return $next($request);
    }
}

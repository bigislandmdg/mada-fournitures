<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $supportedLocales = ['fr', 'mg'];

        $locale = $request->session()->get(
            'locale',
            config('app.locale', 'fr')
        );

        if (! in_array($locale, $supportedLocales, true)) {
            $locale = 'fr';
        }

        app()->setLocale($locale);

        return $next($request);
    }
}

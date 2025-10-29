<?php

namespace LaravelDay2025\SharedPackage\Http\Middleware;

use Aacotroneo\Saml2\Saml2Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSAMLPassive
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user()  && $request->header('Referer') != route('saml2_acs', 'test')) {
            $saml2Auth = new Saml2Auth(Saml2Auth::loadOneLoginAuthFromIpdConfig('test'));

            return redirect($saml2Auth->login($request->fullUrl(), [], false, true, true)); // isPassive = true
        }

        return $next($request);
    }
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VerifyInternalRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $tokenMappings = [
            'users.updatePassword' => 'editPWToken',
            'users.updateUsername' => 'editUNToken',
            'users.deactivate' => 'deactivation_token',
        ];

        $currentRouteName = $request->route()->getName();
        $currentToken = $tokenMappings[$currentRouteName] ?? null;

        if ($currentToken && (!$request->session()->has($currentToken) || $request->route('token') !== $request->session()->get($currentToken))) {
            return response()->view('forbidden', ['type' => 'admin'], 403);
        }
        else if(!$currentToken){
            Session::forget($currentToken);
            return response()->view('forbidden', ['type' => 'admin'], 403);
        }

        return $next($request);
    }
}

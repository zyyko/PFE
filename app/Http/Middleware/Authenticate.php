<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {   

        $pathInfo = $request->path();
        if ($pathInfo == 'admin/dashboard') {
            return $request->expectsJson() ? null : route('loginadmin.show');
        } 
    
        return $request->expectsJson() ? null : route('login.show');
            
    }
}

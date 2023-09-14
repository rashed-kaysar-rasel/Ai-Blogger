<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class PageMetadataMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Get the current route name
        $routeName = Route::currentRouteName();
    
        // Set page name and breadcrumbs based on the route name
        switch ($routeName) {
            case 'admin.dashboard':
                $pageName = 'Dashboard';
                $breadcrumbs = ['Dashboard' => route('admin.dashboard')];
                break;
            case 'article.writer':
                $pageName = 'Article Writer';
                $breadcrumbs = ['Dashboard' => route('admin.dashboard')];
                break;
            case 'post.title.generator':
                $pageName = 'Post Title Generator';
                $breadcrumbs =  ['Dashboard' => route('admin.dashboard')];
                break;
            case 'email.generator':
                $pageName = 'Email Generator';
                $breadcrumbs =  ['Dashboard' => route('admin.dashboard')];
                break;
    
            // Add more cases for other routes as needed
    
            default:
                $pageName = 'Unknown';
                $breadcrumbs = [];
                break;
        }
    
        // Share page metadata with views
        View::share('pageName', $pageName);
        View::share('breadcrumbs', $breadcrumbs);
    
        return $next($request);
    }
}

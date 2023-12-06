<?php

namespace App\Http\Middleware;

use App\Models\Policy;
use App\Models\Resource;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class EnsureHasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if($user->is_super_admin == 1) {
            return $next($request);
        }
        $method = strtolower(request()->method());
        $method = ($method == 'put' || $method == 'patch') ? 'update' : $method;
        $resourceName = request()->segment(2) . '.' . $method;
        $resource = Resource::where('name', $resourceName)->first();
        $policy = Policy::where(['role_id' => $user->role_id, 'resource_id' => $resource->id])->first();
        if(!empty($policy)) {
            return $next($request);
        }
        throw new  BadRequestHttpException("Do not have enough permission", null, 401);
    }
}

<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class IsAdminMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */


  public function handle(Request $request, Closure $next): Response
  {
    // dd([$request->user()->role, User::ROLE_ADMIN]);
    // dd($request->user()->id);
    if ($request->user()->role !== User::ROLE_ADMIN) {
      return redirect()->back();
    }
    return $next($request);
  }
}

<?php

namespace App\Http\Middleware;

use Closure; 


class MyMiddleware
{
	
	public function handle($request,Closure $next)
	{
		if(!auth('admin')->user())
		{
			return redirect('admin/login');
		}
		else
		{	

			return $next($request);

		}

	
	}
}

<?php

namespace App\Http\Middleware;

use Closure;

class Cliente {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        
        if(\Session::get('cliente') == false){
    
            $url = $request->path();
            $q = '';
            foreach ($request->query() as $k=>$v) {
                if ($q != '') {
                    $q .= '&';
                }
                $q .= $k . '='. $v;
            }
            if ($q != '') {
                $url .= '?' . $q;
            }
            
            \Session::put('next-url', $url);
            return redirect('cadastro_login');
        }
            
        return $next($request);
    }

}

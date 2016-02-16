<?php
namespace App\Application\Api\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{

    protected $namespace = 'App\Application\Api\Http\Controllers';
    protected $path      = 'Application/Api/Http/Routes/routes.php';
    protected $prefix    = 'api';


    public function boot(Router $router)
    {
        parent::boot($router);
    }


    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace, 'prefix' => $this->prefix, 'as' => $this->prefix.'.'], function ($router) {

            require app_path($this->path);

        });
    }
}

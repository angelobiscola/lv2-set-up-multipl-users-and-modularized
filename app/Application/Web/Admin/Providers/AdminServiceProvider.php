<?php
namespace App\Application\Web\Admin\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{

    protected $namespace = 'App\Application\Web\Admin\Http\Controllers';
    protected $path      = 'Application/Web/Admin/Http/Routes/';
    protected $prefix    = 'admin';


    public function boot(Router $router)
    {
        parent::boot($router);
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', $this->prefix);
    }


    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace, 'prefix' => $this->prefix,'as' => $this->prefix.'.', 'middleware' => ['web'] ], function ($router) {

            require app_path($this->path.'routes.php');

            $router->group(['namespace' => 'Client', 'prefix' => 'clients', 'as' => 'client.', 'middleware' => ['auth:'.$this->prefix]], function($router)
            {
                require app_path($this->path.'clients.php');
            });


        });
    }
}

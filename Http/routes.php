<?php

use Illuminate\Routing\Router;
/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/
$router->group(['prefix' => LaravelLocalization::setLocale(), 'before' => 'LaravelLocalizationRedirectFilter|auth.admin|permissions'], function(Router $router)
{
    $router->group(['prefix' => Config::get('core::core.admin-prefix'), 'namespace' => 'Modules\Page\Http\Controllers'], function (Router $router) {

        $router->resource('pages', 'Admin\PageController', ['except' => ['show'], 'names' => [
            'index' => 'dashboard.page.index',
            'create' => 'dashboard.page.create',
            'store' => 'dashboard.page.store',
            'edit' => 'dashboard.page.edit',
            'update' => 'dashboard.page.update',
            'destroy' => 'dashboard.page.destroy',
        ]]);
    });

});

/*
|--------------------------------------------------------------------------
| Api routes
|--------------------------------------------------------------------------
*/

<?php

use Illuminate\Routing\Router;
/** @var Router $router */
/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/

if (! App::runningInConsole()) {
    $locale = LaravelLocalization::setLocale();
    $router->group([
        'prefix' => $locale,
        'before' => 'LaravelLocalizationRedirectFilter',
        'namespace' => 'Modules\Page\Http\Controllers',
    ], function (Router $router) {
        $prefix = Config::get('core::core.admin-prefix');
        $router->get('{uri}', 'PublicController@uri')->where('uri', "(?!$prefix).*");
        $router->get('/', 'PublicController@homepage');
    });
}

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/
$router->model('pages', 'Modules\Page\Entities\Page');

$router->group(['prefix' => LaravelLocalization::setLocale(), 'before' => 'LaravelLocalizationRedirectFilter|auth.admin|permissions'], function (Router $router) {
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

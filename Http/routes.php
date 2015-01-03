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
    $router->group(['prefix' => Config::get('core::core.admin-prefix') . '/page', 'namespace' => 'Modules\Page\Http\Controllers'], function (Router $router) {

        $router->resource('pages', 'Admin\PageController', ['except' => ['show'], 'names' => [
            'index' => 'admin.page.page.index',
            'create' => 'admin.page.page.create',
            'store' => 'admin.page.page.store',
            'edit' => 'admin.page.page.edit',
            'update' => 'admin.page.page.update',
            'destroy' => 'admin.page.page.destroy',
        ]]);
    });

});

/*
|--------------------------------------------------------------------------
| Api routes
|--------------------------------------------------------------------------
*/

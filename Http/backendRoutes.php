<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->model('pages', 'Modules\Page\Entities\Page');

$router->group(['prefix' => '/page'], function (Router $router) {
    $router->resource('pages', 'PageController', ['except' => ['show'], 'names' => [
        'index' => 'admin.page.page.index',
        'create' => 'admin.page.page.create',
        'store' => 'admin.page.page.store',
        'edit' => 'admin.page.page.edit',
        'update' => 'admin.page.page.update',
        'destroy' => 'admin.page.page.destroy',
    ]]);
});

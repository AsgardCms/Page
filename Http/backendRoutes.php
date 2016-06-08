<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->bind('page', function ($id) {
    return app(\Modules\Page\Repositories\PageRepository::class)->find($id);
});

$router->group(['prefix' => '/page'], function (Router $router) {
    $router->get('pages', ['as' => 'admin.page.page.index', 'uses' => 'PageController@index']);
    $router->get('pages/create', ['as' => 'admin.page.page.create', 'uses' => 'PageController@create']);
    $router->post('pages', ['as' => 'admin.page.page.store', 'uses' => 'PageController@store']);
    $router->get('pages/{page}/edit', ['as' => 'admin.page.page.edit', 'uses' => 'PageController@edit']);
    $router->put('pages/{page}/edit', ['as' => 'admin.page.page.update', 'uses' => 'PageController@update']);
    $router->delete('pages/{page}', ['as' => 'admin.page.page.destroy', 'uses' => 'PageController@destroy']);
});

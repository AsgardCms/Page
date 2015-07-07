<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->model('page', 'Modules\Page\Entities\Page');

$router->group(['prefix' => '/page'], function () {
    get('pages', ['as' => 'admin.page.page.index', 'uses' => 'PageController@index']);
    get('pages/create', ['as' => 'admin.page.page.create', 'uses' => 'PageController@create']);
    post('pages', ['as' => 'admin.page.page.store', 'uses' => 'PageController@store']);
    get('pages/{page}/edit', ['as' => 'admin.page.page.edit', 'uses' => 'PageController@edit']);
    put('pages/{page}/edit', ['as' => 'admin.page.page.update', 'uses' => 'PageController@update']);
    delete('pages/{page}', ['as' => 'admin.page.page.destroy', 'uses' => 'PageController@destroy']);
});

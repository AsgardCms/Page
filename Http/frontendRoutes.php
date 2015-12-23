<?php

use Illuminate\Routing\Router;

/** @var Router $router */
if (! App::runningInConsole()) {
    $router->get('/', ['uses' => 'PublicController@homepage', 'as' => 'homepage']);
    $router->any('{uri}', ['uses' => 'PublicController@uri', 'as' => 'page'])->where('uri', '.*');
}

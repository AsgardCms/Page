<?php

use Illuminate\Routing\Router;

/** @var Router $router */
if (! App::runningInConsole()) {
    $router->get('{uri}', ['uses' => 'PublicController@uri', 'as' => 'page']);
    $router->get('/', ['uses' => 'PublicController@homepage', 'as' => 'homepage']);
}

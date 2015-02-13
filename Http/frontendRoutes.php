<?php

use Illuminate\Routing\Router;
/** @var Router $router */
if (! App::runningInConsole()) {
    $router->get('{uri}', 'PublicController@uri');
    $router->get('/', 'PublicController@homepage');
}

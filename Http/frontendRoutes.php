<?php

use Illuminate\Routing\Router;
/** @var Router $router */
if (! App::runningInConsole()) {
    $prefix = config('asgard.core.core.admin-prefix');
    $router->get('{uri}', 'PublicController@uri')->where('uri', "(?!$prefix).*");
    $router->get('/', 'PublicController@homepage');
}

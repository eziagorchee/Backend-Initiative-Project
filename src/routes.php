<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
// use Psr\Http\Message\ServerRequestInterface as Request;
// use Psr\Http\Message\ResponseInterface as Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");

        // Render index view
        return $container->get('renderer')->render($response, 'index.phtml', $args);
    });

    $app->group('/api', function () use ($app){
        // Version group
        $app->group('/v1', function() use ($app) {
            $app->group('/users', function() use ($app) {
                $app->post('/create','create_user');
                $app->get('/read','get_single_user');
                $app->get('/get_all','get_all_users');
                $app->put('/update','update_user');
                $app->delete('/delete','delete_user');
           
            });
            $app->group('/movies', function() use ($app) {
                $app->post('/create', "create_movie");
                $app->get('/get_all','get_all_movies');
                $app->get('/read','get_single_movie');
                $app->put('/update','update_movie');
                $app->delete('/delete','delete_movie');
           
            });
            $app->group('/rentals', function() use ($app) {
                $app->post('/create', 'initiate_rentals');
                $app->post('/get_all', 'get_all_rentals');
           
            });
           
        });
    });
};

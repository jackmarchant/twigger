<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Controllers\PageController;
use App\Controllers\ProfileController;

/** 
 * Creates a route string with Controller:Action
 * 
 * @param string $controller A Controller
 * @param string $action The Controller's handler function
 */
function route(string $controller, string $action) : string
{
    return "$controller:$action";
}


/** 
 * Index
 */
$app->get('/', route(PageController::class, 'index'));

/**
 * Auth
 */
$app->get('/login', route(PageController::class, 'index'));
$app->get('/signup', route(PageController::class, 'signup'));
$app->post('/login', route(PageController::class, 'login'));
$app->get('/logout', route(PageController::class, 'logout'));


/**
 * Reset Password
 */
$app->map(['GET', 'POST'], '/forgot-password', route(PageController::class, 'forgotPassword'));
$app->get('/reset-password/{token}', route(PageController::class, 'resetPasswordGet'));
$app->post('/reset-password', route(PageController::class, 'resetPasswordPost'));


/** 
 * Dashboard
 */
$app->get('/dashboard', route(PageController::class, 'dashboard'));
$app->post('/posts', route(PageController::class, 'createPost'));
$app->get('/profile/{username}', route(ProfileController::class, 'index'));


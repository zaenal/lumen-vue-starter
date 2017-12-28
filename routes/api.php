<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group([], function () use ($router) {
    $router->get('user', function () {
        return auth()->user();
    });
    $router->post('logout', ['uses' => 'Auth\LoginController@logout']);
    $router->patch('settings/profile', ['uses' => 'Settings\ProfileController@update']);
    $router->patch('settings/password', ['uses' => 'Settings\PasswordController@update']);
});

$router->group([], function () use ($router) {
    $router->post('register', ['uses' => 'Auth\RegisterController@register']);
    $router->post('login', ['uses' => 'Auth\LoginController@login']);
    $router->post('password/email', ['uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    $router->post('password/reset', ['uses' => 'Auth\ResetPasswordController@reset']);
});

$router->get('translations/{locale}', ['uses' => 'TranslationController@show']);
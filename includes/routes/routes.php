<?php

$app = new \Slim\Slim();

$app->get('/', function () {
    /* Redirect browser */
    echo('These aren\'t the droids you are looking for');
	//header("Location: ".APPURL."view/login.php");
});

$app->get('/login/', function () {
    /* Redirect browser */
    echo('lol');
	//header("Location: ".APPURL."view/login.php");
});

$app->get('/dashboard', function () {
    /* Redirect browser */
	header("Location: ".APPURL."view/dashboard.php");
});

$app->get('/signup', function () {
    /* Redirect browser */
	header("Location: ".APPURL."view/register.php");
});

$app->run();
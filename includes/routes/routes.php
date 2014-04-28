<?php

$app = new \Slim\Slim();


$app->get('/', function () {
    /* Redirect browser */
    echo('These aren\'t the droids you are looking for');
	//header("Location: ".APPURL."view/login.php");
});

$app->get('/login/', function () use ($app){
    /* Redirect browser */
    // $app->redirect('view/login.php'); 
    include("view/login.php");
    exit();
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
<?php

$app = new \Slim\Slim();


$app->get('/', function () {
    /* Redirect browser */
    echo('These aren\'t the droids you are looking for');
	//header("Location: ".APPURL."view/login.php");
});

//SIGN IN
$app->get('/login/', function (){
    /* Redirect browser */
    // $app->redirect('view/login.php'); 
    include("view/login.php");
    exit();
});


$app->get('/dashboard', function () {
    /* Redirect browser */
	header("Location: ".APPURL."view/dashboard.php");
});

//SIGN UP
$app->get('/signup', function () {
    /* Redirect browser */
	include("view/register.php");
});

$app->post('/signup/', function (){
    /* Redirect browser */
    // $app->redirect('view/login.php'); 
    include("view/register.php");
    exit();
});

// $app->map('/signup/', function (){ 
//     include("view/register.php");
//     exit();
// })->via('GET', 'POST');

// RUN SLIM APPLICATION
$app->run();
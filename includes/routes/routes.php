<?php

$app = new \Slim\Slim();


$app->get('/', function () {
    /* Redirect browser */
    echo('These aren\'t the droids you are looking for');
	//header("Location: ".APPURL."view/login.php");
});

//SIGN IN
// $app->get('/login/', function (){
//     /* Redirect browser */
//     // $app->redirect('view/login.php'); 
//     include("view/login.php");
//     exit();
// });
$app->map('/login/', function (){ 
    
    include("view/login.php");
    exit();
})->via('GET', 'POST');


$app->get('/dashboard', function () {

	include("view/dashboard.php");
    exit();
});

$app->get('/contactos', function () {

    include("view/contactos.php");
    exit();
});

//SIGN UP
$app->get('/signup', function () {

	include("view/register.php");
    exit();
});

$app->post('/signup/', function (){

    include("view/register.php");
    exit();
});

// $app->map('/signup/', function (){ 
//     include("view/register.php");
//     exit();
// })->via('GET', 'POST');

// RUN SLIM APPLICATION
$app->run();
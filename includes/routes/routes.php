<?php

$app = new \Slim\Slim();
include_once('includes/tables/tableController.class.php');

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
    global $mustache;
	echo $mustache->render('dashboard');
    exit();
});

// CONTACTOS
$app->get('/contactos', function () {

    $tables = new tableController();
    $tables->populateFromDB( "gb_contacts", array("created") )->render(); 
    exit();
});

$app->get('/contactos/:id', function () {

    //Get the single
});

$app->post('/contactos', function () {

    $tables = new tableController();
    $tables->insert();
    exit();
});

$app->delete('/contactos', function () {

    $tables = new tableController();
    $tables->delete();
    exit();
});

$app->put('/contactos', function () {

    $tables = new tableController();
    $tables->delete();
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
<?php

class __Templates__8c0ef3cb6e947b1a69547bd281a6918b extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<?php 
';
        $buffer .= $indent . '	include_once(\'includes/session/session_header.php\');
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	// Restrict page for logged users
';
        $buffer .= $indent . '	// secure_session_start(); 
';
        $buffer .= $indent . '	// if($user_controller->login_check() == false) {
';
        $buffer .= $indent . '	// 	$error_handler->logError(\'Login\', \'You are not authorized to see this page, please log in\', true);
';
        $buffer .= $indent . '	// 	exit;
';
        $buffer .= $indent . '	// }
';
        $buffer .= $indent . '	global $app_info;
';
        $buffer .= $indent . '?>
';
        $buffer .= $indent . '<!DOCTYPE html>
';
        $buffer .= $indent . '<html>
';
        $buffer .= $indent . '	<head>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '		<meta charset="utf-8">
';
        $buffer .= $indent . '		<meta http-equiv="X-UA-Compatible" content="IE=edge">
';
        $buffer .= $indent . '		<title><?php echo $app_info->title; ?></title>
';
        $buffer .= $indent . '		<link rel="stylesheet" href="js/scripts/vendor/bootstrap/dist/css/bootstrap.min.css">
';
        $buffer .= $indent . '		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
';
        $buffer .= $indent . '		<link rel="stylesheet" href="style.css">
';
        $buffer .= $indent . '	</head>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<body>';

        return $buffer;
    }
}

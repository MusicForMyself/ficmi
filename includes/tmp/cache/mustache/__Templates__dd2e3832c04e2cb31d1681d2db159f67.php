<?php

class __Templates__dd2e3832c04e2cb31d1681d2db159f67 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<?php 
';
        $buffer .= $indent . '	include_once(\'includes/session/session_header.php\');
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

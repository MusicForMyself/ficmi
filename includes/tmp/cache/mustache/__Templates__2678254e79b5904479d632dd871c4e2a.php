<?php

class __Templates__2678254e79b5904479d632dd871c4e2a extends Mustache_Template
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
        $buffer .= $indent . '		<title>';
        $value = $this->resolveValue($context->find('$app_info->title'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '</title>
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

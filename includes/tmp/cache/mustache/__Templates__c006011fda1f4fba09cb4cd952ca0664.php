<?php

class __Templates__c006011fda1f4fba09cb4cd952ca0664 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<!DOCTYPE html>
';
        $buffer .= $indent . '<html>
';
        $buffer .= $indent . '<head>
';
        $buffer .= $indent . '	<meta charset="utf-8">
';
        $buffer .= $indent . '	<meta http-equiv="X-UA-Compatible" content="IE=edge">
';
        $buffer .= $indent . '	<title>';
        $value = $this->resolveValue($context->find('title'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '</title>
';
        $buffer .= $indent . '	<link rel="stylesheet" href="">
';
        $buffer .= $indent . '</head>
';
        $buffer .= $indent . '<body>
';
        $buffer .= $indent . '	<h1>';
        $value = $this->resolveValue($context->find('value'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '</h1>
';
        $buffer .= $indent . '</body>
';
        $buffer .= $indent . '</html>';

        return $buffer;
    }
}

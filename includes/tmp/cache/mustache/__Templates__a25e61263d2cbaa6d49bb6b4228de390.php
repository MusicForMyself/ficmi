<?php

class __Templates__a25e61263d2cbaa6d49bb6b4228de390 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        if ($partial = $this->mustache->loadPartial('header')) {
            $buffer .= $partial->renderInternal($context, $indent . '');
        }
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

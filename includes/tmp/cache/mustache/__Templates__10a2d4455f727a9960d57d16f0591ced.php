<?php

class __Templates__10a2d4455f727a9960d57d16f0591ced extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        if ($partial = $this->mustache->loadPartial('header')) {
            $buffer .= $partial->renderInternal($context, $indent . '');
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<h1>';
        $value = $this->resolveValue($context->find('value'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '</h1>
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('footer')) {
            $buffer .= $partial->renderInternal($context, $indent . '');
        }

        return $buffer;
    }
}

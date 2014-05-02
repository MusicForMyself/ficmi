<?php

class __Templates__f6f7f6b843ca9efdf4b0395ee7220bca extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        if ($partial = $this->mustache->loadPartial('header')) {
            $buffer .= $partial->renderInternal($context, $indent . '');
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '	
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('footer')) {
            $buffer .= $partial->renderInternal($context, $indent . '');
        }

        return $buffer;
    }
}

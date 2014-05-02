<?php

class __Templates__5f05447b348178571156fd566d5eed87 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        if ($partial = $this->mustache->loadPartial('header_protected')) {
            $buffer .= $partial->renderInternal($context, $indent . '');
        }
        $buffer .= $indent . '	
';
        $buffer .= $indent . '<div class="container-fluid">
';
        $buffer .= $indent . '	
';
        if ($partial = $this->mustache->loadPartial('sidebar')) {
            $buffer .= $partial->renderInternal($context, $indent . '	');
        }
        $buffer .= $indent . '	
';
        $buffer .= $indent . '	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
';
        $buffer .= $indent . '		<h1 class="page-header">Escritorio</h1>
';
        $buffer .= $indent . '		
';
        $buffer .= $indent . '	</div><!-- main -->
';
        $buffer .= $indent . '</div><!-- fluid -->
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('footer')) {
            $buffer .= $partial->renderInternal($context, $indent . '');
        }

        return $buffer;
    }
}

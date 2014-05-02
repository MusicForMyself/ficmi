<?php

class __Templates__c22ff5dffc73e1f35a34bd1f6527e276 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<div class="col-sm-3 col-md-2 sidebar">
';
        $buffer .= $indent . '	<img class="sidebar_logo" src="images/logo.jpg" alt="FICM Festival Internacional de Cine de Morelia">
';
        $buffer .= $indent . '	<ul class="nav nav-sidebar">
';
        $buffer .= $indent . '		<li><a href="<?php site_url(\'dashboard\'); ?>">Escritorio</a></li>
';
        $buffer .= $indent . '		<li><a href="<?php site_url(\'contactos\'); ?>">Contactos</a></li>
';
        $buffer .= $indent . '		<li><a href="#">Invitados</a></li>
';
        $buffer .= $indent . '		<li><a href="#">Películas</a></li>
';
        $buffer .= $indent . '		<li><a href="#">Acreditaciones</a></li>
';
        $buffer .= $indent . '		<li><a href="<?php site_url(\'signup\'); ?>">Create new user</a></li>
';
        $buffer .= $indent . '	</ul>
';
        $buffer .= $indent . '</div>';

        return $buffer;
    }
}

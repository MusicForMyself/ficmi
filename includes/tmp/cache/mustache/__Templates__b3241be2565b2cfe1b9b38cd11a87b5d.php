<?php

class __Templates__b3241be2565b2cfe1b9b38cd11a87b5d extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        if ($partial = $this->mustache->loadPartial('header')) {
            $buffer .= $partial->renderInternal($context, $indent . '');
        }
        $buffer .= $indent . '	
';
        $buffer .= $indent . '	<div class="container-fluid">
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('sidebar')) {
            $buffer .= $partial->renderInternal($context, $indent . '		');
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
';
        $buffer .= $indent . '		
';
        $buffer .= $indent . '			<h1 class="page-header">Contactos</h1>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '			<div class="table-responsive">
';
        $buffer .= $indent . '				<form id="new_column_form" class="inline-form hidden">
';
        $buffer .= $indent . '					<input type="text" name="column" placeholder="Nombre de la columna">
';
        $buffer .= $indent . '				</form>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '				<button id="add_col" type="button" class="btn btn-default btn-sm pull-right">
';
        $buffer .= $indent . '					<span class="glyphicon glyphicon-plus"></span> Column
';
        $buffer .= $indent . '				</button>
';
        $buffer .= $indent . '				<button id="done_adding_col" type="button" class="btn btn-default btn-sm pull-right hidden done-btn" >
';
        $buffer .= $indent . '					<span class="glyphicon glyphicon-ok"></span> Done
';
        $buffer .= $indent . '				</button>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '				';
        $value = $this->resolveValue($context->find('table'), $context, $indent);
        $buffer .= $value;
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '			</div><!-- table-resposive -->
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '			<form id="the_form" method="POST" action="<?php echo esc_url($_SERVER[\'REQUEST_URI\']); ?>" class="hidden">
';
        $buffer .= $indent . '				
';
        $buffer .= $indent . '			</form>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '			<button id="add_row" type="button" class="btn btn-default btn-sm">
';
        $buffer .= $indent . '				<span class="glyphicon glyphicon-plus"></span> Add
';
        $buffer .= $indent . '			</button>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '			<button id="done_adding" type="button" class="btn btn-default btn-sm hidden done-btn">
';
        $buffer .= $indent . '				<span class="glyphicon glyphicon-ok"></span> Done
';
        $buffer .= $indent . '			</button>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '			<button id="delete_row" type="button" class="btn btn-default btn-sm rm-btn">
';
        $buffer .= $indent . '				<span class="glyphicon glyphicon-remove"></span> Delete
';
        $buffer .= $indent . '			</button>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '		</div><!-- container -->
';
        $buffer .= $indent . '	</div><!-- fluid -->
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

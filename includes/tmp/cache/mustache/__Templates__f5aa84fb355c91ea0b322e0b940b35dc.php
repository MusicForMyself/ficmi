<?php

class __Templates__f5aa84fb355c91ea0b322e0b940b35dc extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
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
            $buffer .= $partial->renderInternal($context, $indent . '				');
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
';
        $buffer .= $indent . '				
';
        $buffer .= $indent . '					<h1 class="page-header">Contactos</h1>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '					<div class="table-responsive">
';
        $buffer .= $indent . '						<form id="new_column_form" class="inline-form hidden">
';
        $buffer .= $indent . '							<input type="text" name="column" placeholder="Nombre de la columna">
';
        $buffer .= $indent . '						</form>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '						<button id="add_col" type="button" class="btn btn-default btn-sm pull-right">
';
        $buffer .= $indent . '							<span class="glyphicon glyphicon-plus"></span> Column
';
        $buffer .= $indent . '						</button>
';
        $buffer .= $indent . '						<button id="done_adding_col" type="button" class="btn btn-default btn-sm pull-right hidden done-btn" >
';
        $buffer .= $indent . '							<span class="glyphicon glyphicon-ok"></span> Done
';
        $buffer .= $indent . '						</button>
';
        $buffer .= $indent . '
';
        // 'table' section
        $value = $context->find('table');
        $buffer .= $this->section690644445628861a8cf65499627e065a($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '					</div><!-- table-resposive -->
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '					<button id="add_row" type="button" class="btn btn-default btn-sm">
';
        $buffer .= $indent . '						<span class="glyphicon glyphicon-plus"></span> Add
';
        $buffer .= $indent . '					</button>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '					<button id="done_adding" type="button" class="btn btn-default btn-sm hidden done-btn">
';
        $buffer .= $indent . '						<span class="glyphicon glyphicon-ok"></span> Done
';
        $buffer .= $indent . '					</button>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '					<button id="delete_row" type="button" class="btn btn-default btn-sm rm-btn">
';
        $buffer .= $indent . '						<span class="glyphicon glyphicon-remove"></span> Delete
';
        $buffer .= $indent . '					</button>
';
        $buffer .= $indent . '				</div><!-- container -->
';
        $buffer .= $indent . '			</div><!-- fluid -->
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

    private function section690644445628861a8cf65499627e065a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
								{{>header}}
							';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                if ($partial = $this->mustache->loadPartial('header')) {
                    $buffer .= $partial->renderInternal($context, $indent . '								');
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }
}

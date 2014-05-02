<?php

class __Templates__5c9b17616498d7e4bf237ef9053b6c05 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<?php 
';
        $buffer .= $indent . '	include_once(\'../../gb_header.php\');
';
        $buffer .= $indent . '	include_once(\'includes/tables/tableController.class.php\');
';
        $buffer .= $indent . '?>
';
        $buffer .= $indent . '<table class="table table-striped">
';
        $buffer .= $indent . '	
';
        $buffer .= $indent . '	<thead>
';
        $buffer .= $indent . '		<tr>
';
        $buffer .= $indent . '			
';
        $buffer .= $indent . '			<th class=\'check\'><input type=\'checkbox\' class=\'disabled\' value=\'select_all\'></th>
';
        // 'col_names' section
        $value = $context->find('col_names');
        $buffer .= $this->section00aeebbd119b03202a47deb9ed8252f2($context, $indent, $value);
        $buffer .= $indent . '			
';
        $buffer .= $indent . '		</tr>
';
        $buffer .= $indent . '	</thead>
';
        $buffer .= $indent . '	<tbody id="tableBody">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '		<tr>
';
        $buffer .= $indent . '			<th></th>
';
        $buffer .= $indent . '			<th></th>
';
        $buffer .= $indent . '			<th></th>
';
        $buffer .= $indent . '			<th></th>
';
        $buffer .= $indent . '		</tr>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	</tbody>
';
        $buffer .= $indent . '</table>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<?php include_once(\'footer.php\'); ?>';

        return $buffer;
    }

    private function section00aeebbd119b03202a47deb9ed8252f2(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
				<th>{{name}}</th>
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
                $buffer .= $indent . '				<th>';
                $value = $this->resolveValue($context->find('name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '</th>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
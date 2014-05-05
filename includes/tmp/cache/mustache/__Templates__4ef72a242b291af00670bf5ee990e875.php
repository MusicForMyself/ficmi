<?php

class __Templates__4ef72a242b291af00670bf5ee990e875 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<table class="table table-striped">	
';
        $buffer .= $indent . '	<thead>
';
        $buffer .= $indent . '		<tr>
';
        $buffer .= $indent . '			
';
        $buffer .= $indent . '			<th class="check"><input type="checkbox" class="disabled" value="select_all"></th>
';
        // 'keys' section
        $value = $context->find('keys');
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
        // 'data' section
        $value = $context->find('data');
        $buffer .= $this->sectionBe7a2a1bdd0058dc181512815b687e6f($context, $indent, $value);
        $buffer .= $indent . '			
';
        $buffer .= $indent . '		</tr>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	</tbody>
';
        $buffer .= $indent . '</table>';

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

    private function sectionBe7a2a1bdd0058dc181512815b687e6f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '

			<th>{{first_name}}</th>

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
                $buffer .= $indent . '
';
                $buffer .= $indent . '			<th>';
                $value = $this->resolveValue($context->find('first_name'), $context, $indent);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '</th>
';
                $buffer .= $indent . '
';
                $context->pop();
            }
        }
    
        return $buffer;
    }
}

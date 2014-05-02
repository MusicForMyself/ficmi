<?php

class __Templates__9d5c40c7dcb04c2a6a3804934ac2816f extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<table class="table table-striped">
';
        $buffer .= $indent . '	
';
        $buffer .= $indent . '	<thead>lool
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
        $buffer .= $indent . '				$column_slugs[] = $index;
';
        $buffer .= $indent . '				$removeBtn = (!$indexUnique) ? "<a class=\'fill-anchor\' href=\'?remove=".$index."\'><span class=\'remove_col glyphicon glyphicon-remove glyph-absolute\' ></span></a>" : "";
';
        $buffer .= $indent . '				echo "<th>".$index.$removeBtn."</th>";
';
        $buffer .= $indent . '				$indexUnique = FALSE;
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '			unset($column_slugs[array_search("id", $column_slugs)]);
';
        $buffer .= $indent . '			$column_slugs = array_values($column_slugs);
';
        $buffer .= $indent . '			?>
';
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
        $buffer .= $indent . '		<?php
';
        $buffer .= $indent . '		//TODO: Be able to pass different unique identifier
';
        $buffer .= $indent . '		//Exclude array
';
        $buffer .= $indent . '		foreach ($results as $row) {
';
        $buffer .= $indent . '			echo \'<tr>\';
';
        $buffer .= $indent . '				
';
        $buffer .= $indent . '				echo "<th class=\'check\'><input type=\'checkbox\' data-delete=\'$row->id\' value=\'select_single\'></th>";
';
        $buffer .= $indent . '			foreach ($row as $index => $cell_value) {
';
        $buffer .= $indent . '				if(!in_array($index, $exclude)){
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '					$class = ($index == \'id\') ? \'unique\' : \'\';
';
        $buffer .= $indent . '					$save = ($index == \'id\') ? "<span data-update=\'$cell_value\' class=\'save-absolute glyphicon glyphicon-floppy-disk hidden\'></span>" : "";
';
        $buffer .= $indent . '					echo "<th class=\'$class\'>".$save.$cell_value."</th>";
';
        $buffer .= $indent . '				}
';
        $buffer .= $indent . '				echo "<span data-update=\'$cell_value\' class=\'save-absolute glyphicon glyphicon-floppy-disk hidden\'></span>";
';
        $buffer .= $indent . '			}
';
        $buffer .= $indent . '			echo \'</tr>\';
';
        $buffer .= $indent . '				
';
        $buffer .= $indent . '		}
';
        $buffer .= $indent . '		?>
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
}

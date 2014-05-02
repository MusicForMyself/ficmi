<?php

class __Templates__ab793f0956d7c5097298e1861c2e78bd extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '
';
        $buffer .= $indent . '	<footer></footer>
';
        $buffer .= $indent . '	</body>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<!-- Call the RequireJS script into the head of your index file -->
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<script src="js/scripts/vendor/requirejs/require.js" data-main="js/scripts/main"></script>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</html>';

        return $buffer;
    }
}

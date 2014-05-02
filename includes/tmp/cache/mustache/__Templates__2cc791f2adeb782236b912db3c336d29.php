<?php

class __Templates__2cc791f2adeb782236b912db3c336d29 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '	<footer></footer>
';
        $buffer .= $indent . '	</body>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	<!-- Call the RequireJS script into the footer to speed up load time -->
';
        $buffer .= $indent . '	<script src="js/scripts/vendor/requirejs/require.js" data-main="js/scripts/main"></script>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</html>';

        return $buffer;
    }
}

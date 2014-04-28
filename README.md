<h1>gumbo installation for FICMI</h1>

Php-js based framework for web app development.

<h3>Error handling</h3>
<p>The class in charge of handling errors is calles err_manager.class.php and located inside the includes/err directory. To make use of it try:</p>
<pre>
<code>
	global $err_handler;

	//String $who, String $what_happened, Boolean $pop
	$err_handler->logError($who, $what_happened, $pop);
</code>
</pre>

<p>You can also send error messages via $_GET variables, just try (use php's urlencode() to pass strings):</p>
<pre>
<code>
	http://mywebapp.example/?err=This+is+an+error+message
</code>
</pre>
<p>This function is executed in the header so that if you sent an error message it can be shown. Errors sent via GET will always pop, if you just want to log the error please use the proper function</p>
<pre>
<code>
	$err_handler->checkHeaderErrors();
</code>
</pre>
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

<h3>App Info</h3>
<p>Sometimes you need information about the application such as the Name, the url, or maybe the admin email to send a contact form. <br>
<bold>gumbo</bold> has some functions to help you forget about this stuff.</p>

<p>You can call the global object $app_info and get any of the values you've set in te config.json file of your project.</p>

<pre>
	<code>
		global $app_info;

		$mytitle = $app_info->title;
	</code>
</pre>

<h4>site_url(String $append, boolean $echo)</h4>
<p>This function echoes the app url and accepts a String parameter which is the route you want to append. Also you can specify if you want to echo the value or return it to use in php.
<br>Append parameter defaults to '' and echo defaults to true.</p>

<pre>
	<code>
		<p>This is my url: <?php site_url('dashboard'); ?></p>
		//Outputs This is my url: http://example.com/dashboard
		
		<?php
		$myurl = site_url('', false);
		//$myurl contains http://example.com
		?>
	</code>
</pre>
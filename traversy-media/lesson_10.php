<?php
	// Эксперименты начиная с 10 урока.

	// Урок 10.

	$client = 
	[
		'Client System Info' => $_SERVER['HTTP_USER_AGENT'],
		'Client IP' => $_SERVER['REMOTE_ADDR'],
		'Remote Port' => $_SERVER['REMOTE_PORT'],
		'Absolute Path' => $_SERVER['SCRIPT_FILENAME']
	];
?>

	<!--
	Оборот функции print_r в pre делает
	вывод  функции легкочитаемым и понятным
	-->
	<pre>
		<?php print_r($client);?>
	</pre>
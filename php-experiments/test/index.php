<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<textarea name="textarea"></textarea>
	<p><input type="submit" name="submit"></p>
</form>

<?php
	if (!empty($_POST['submit']))
	{
		$file = 'test.txt';
		$current .= "<!DOCTYPE html>
		";
		$current .= "<html>";
		$current .= "<head>";
		$current .= $_POST['textarea'];
		file_put_contents($file, $current);
	}
?>
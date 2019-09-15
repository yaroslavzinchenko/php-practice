<?php
	session_start();

	$host = $_SESSION['host'];
	$user = $_SESSION['user'];
	$password = $_SESSION['password'];
	$database = $_SESSION['database'];

	$connection = mysqli_connect($host, $user, $password, $database);

	// Check Connection.
	if (mysqli_connect_errno())
	{
		// Connection Failed.
		$msg = 'Failed to connect to MySQL '. mysqli_connect_errno();
		$msgClass = 'alert-danger';
	}
	else
	{
		// No Errors.
		$msg = 'You have successfully connected to MySQL';
		$msgClass = 'alert-success';

		// Create Query.
		$query = 'SELECT * FROM users';
			
		// Get Result.
		$result = mysqli_query($connection, $query);
			
		// Fetch Data.
		$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

		// Free Result.
		mysqli_free_result($result);
			
		// Close Connection.
		mysqli_close($connection);
	}


	// Get Query String.
	$q = $_REQUEST['q'];

	$suggestion = "";

	// Get Suggestions.
	if ($q != '')
	{
		$q = strtolower($q);
		$len = strlen($q);

		foreach($users as $user)
		{
			if (strlen($q) > strlen($user['name']))
			{
				continue;
			}

			if (stristr($q, substr($user['name'], 0, $len)))
			{

				if ($suggestion === "")
				{
					$suggestion = $user['name'];
				}
				else
				{
					$suggestion = ($suggestion.", ".$user['name']);
				}
			}
		}
	}

	echo $suggestion === "" ? "No Suggestions" : $suggestion;
?>
<?php
	// Message Variables.
	$msg = '';
	$msgClass = '';

	// Check For Submit.
	if (filter_has_var(INPUT_POST, 'submit'))
	{
		// Get Form Data.

		// Как я понял, мы используем htmlspecialchars, чтобы пользователь не смог провести
		// XSS-атаку. Иначе он может вставить в форму вредоносный скрипт и выполнить его.
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$message = htmlspecialchars($_POST['message']);

		// Check Required Fields.
		if (!empty($email) && !empty($name) && !empty($message))
		{
			// Check Email.
			if (filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				// Получатель письма.
				$mailTo = 'zin.yar.dev@gmail.com';

				// Тема письма.
				$subject = 'Contact Request From '.$name;

				$body = "Contact Request\nName: ".$name."\nEmail: ".$email."\nMessage: ".$message;

				if (mail($mailTo, $subject, $body))
				{
					// Письмо отправлено.
					$msg = 'Your form has been submitted';
					$msgClass = 'alert-success';
				}
				else
				{
					$msg = 'Your form has not been submitted';
					$msgClass = 'alert-danger';
				}
			}
			else
			{
				// Failed.
				$msg = 'Please, enter correct email address';
				$msgClass = 'alert-danger';
			}
		}
		else
		{
			// Failed.
			$msg = 'Please, fill in all fields';
			$msgClass = 'alert-danger';
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<!-- Масштабирование на мобильных устройствах -->
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Contact Form</title>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo $_SERVER['PHP_SELF']; ?>">Contact Form</a>
			</div>
		</div>
	</nav>
	<div class="container">
		
		<?php if ($msg != ''): ?>
			<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
		<?php endif; ?>

		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
			</div>
			<div class="form-group">
				<label for="">Email</label>
				<input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
			</div>
			<div class="form-group">
				<label for="">Message</label>
				<textarea name="message" class="form-control"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
			</div>
			<br>
			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</body>
</html>
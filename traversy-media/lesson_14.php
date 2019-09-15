<?php
	// В данном участке кода мы проверяем, правильно ли введён
	// email адрес. Такую проверку сделать проще и быстрее,
	// так как здесь мы не используем регулярные выражения.
	if (filter_has_var(INPUT_POST, 'data'))
	{
		$email = $_POST['data'];

		// Удаляем неправильные символы.
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		echo $email.'<br>';

		// Даже если после такой чистки мы получим годный
		// email, конструкция ниже выведет 'Email is not valid'
		// в случае, если email, который мы отсылали, был
		// некорректным, так как в конструкции ниже мы проверяем
		// не уже фильтрованную переменную $email, а данные,
		// изначально полученные из формы.
		// Так что если мы хотил получить 'Email is valid',
		// нам нужно воспользоваться следующей конструкцией:
		// if (filter_var($email, FILTER_VALIDATE_EMAIL)),
		// а остальное оставить также.

		if (filter_input(INPUT_POST, 'data', FILTER_VALIDATE_EMAIL))
		{
			echo 'Email is valid';
		}
		else
		{
			echo 'Email is not valid';
		}
	}
?>

<script src="lesson_14.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lesson 14</title>
</head>
<body>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="text" name="data">
		<button type="submit">Submit</button>
	</form>
</body>
</html>

<?php
	// Помимо всего прочего, в PHP существует возможность фильтровать и
	// чистить массивы: php.net/filter_var_array, php.net/filter_input_array.
?>
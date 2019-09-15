<?php
	class Person
	{
		private $name;
		private $age;
		private $email;

		public function __construct($name, $age, $email)
		{
			$this->name = $name;
			$this->age = $age;
			$this->email = $email;
			echo __CLASS__.' created<br>';
		}


		// "Деструктор будет вызван при освобождении всех ссылок
		// на определенный объект или при завершении скрипта."
		// Источник - https://www.php.net/destruct.
		public function __destruct()
		{
			echo __CLASS__.' destroyed<br>';
		}

		public function setName($name)
		{
			$this->name = $name;
		}

		public function getName()
		{
			return $this->name.'<br>';
		}

		public function setAge($age)
		{
			$this->age = $age;
		}

		public function getAge()
		{
			return $this->age.'<br>';
		}

		public function setEmail($email)
		{
			$this->email = $email;
		}

		public function getEmail()
		{
			return $this->email.'<br>';
		}
	}

	/*
	$person1 = new Person('Vanya', 26, 'vanya@mail.ru');

	echo $person1->getName();
	echo $person1->getAge();
	echo $person1->getEmail();

	echo '<br>';

	print_r($person1);
	echo '<br>';
	*/

	class Customer extends Person
	{
		private $balance;

		private static $ageLimit = 100;

		// Мы можем вывести информацию о static-переменной,
		// даже не создавая объект.
		public static $greeting = 'Hello<br>';

		public function __construct($name, $age, $email, $balance)
		{
			parent::__construct($name, $age, $email);
			$this->balance = $balance;
			echo __CLASS__.' created<br>';
		}

		public function setBalance($balance)
		{
			$this->balance = $balance;
		}

		public function getBalance()
		{
			return $this->balance.'<br>';
		}

		public function getAgeLimit()
		{
			return self::$ageLimit;
		}
	}

	$customer1 = new Customer('Genji', 30, 'genji@mail.com', 500);
	echo $customer1->getBalance();

	// Обращаемся к static-переменной $greeting не создавая объект.
	echo Customer::$greeting;

	// Обращаемся к static-методу.
	echo Customer::getAgeLimit().'<br>';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Lesson 20 - OOP in PHP</title>
</head>
<body>
	
</body>
</html>
<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();
//echo "<pre>";
//print_r($_SESSION["user"]);
//echo "</pre>";

$dir="uploaded";
$test_array=[];
$files=[];

if (is_dir($dir)) 
{
	$files=scandir($dir);
	array_shift($files); 
    array_shift($files);
	//echo "Нашлись следующие файлы в папке:", PHP_EOL;
	//echo "<pre>";
	//print_r($files);
	//echo "</pre>";
}
else
{
	echo "Файлы тестов не загружены в Систему тестирования! Обратитесь к администратору системы.";
}

if (is_dir($dir)) 
{
	opendir($dir);
	//echo "Нашлась такая папка!", PHP_EOL;
	foreach (glob("$dir/*.json") as $filetype) 
	{
		$test_content=file_get_contents($filetype);
		$test_array=explode(",", $test_content);
		//echo "<pre>";
		//print_r($test_array);
		//echo "</pre>";
	}
} 
else 
{
	echo "Тесты не найдены!";
}

foreach ($test_array as $value) 
{
	if (strpos($value, ":") == true) 
	{
		//echo "<pre>";
		//echo "Структура файла корректна";
	}
		else 
	{
		echo "Что-то нетак с форматом файла, который Вы пытаетесь открыть...";
	}
	
} 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Тесты</title>
</head>
<body>
	<h1>Тесты на рожденных в СССР</h1>
	<?php 
	?>
	<p>Дорогой друг!</p>
	<?php
			if ($_SESSION["user"]=="Guest") 
			{
				echo "Как гость, ты можешь ознакомиться со списком тестов в системе! Пройти тесты могут только зарегистрированные пользователи.";
				
			} 
			else 
			{ ?> 
				<p>Если ты ответишь на все три теста правильно, знай, ты рожден в СССР.</p>
			<?php
			}
		?>
	
	<form enctype="multipart/form-data" method="GET">
		<?php
			if ($_SESSION["user"]=="Guest") 
			{
							
			} 
			else 
			{ ?> 
		<p><label><strong>Выбери тест:</strong></label></p>
			<?php
			}
			?>
		<p><input type="radio" name="mytest" value="1" checked>Политический тест</p>
		<p><input type="radio" name="mytest" value="2">Литературный тест</p>
		<p><input type="radio" name="mytest" value="3">Юмористический тест</p>
		<?php
			if ($_SESSION["user"]=="Guest") 
			{
				//echo "Недостаточно прав для прохождения теста! Обратитесь к администратору системы.";
				exit;
			} 
			else 
			{ ?> 
				<p><input type="submit" formaction="test2.php" name="RunTest" value="Пройти тест"></p>
			<?php
			}
		?>
		
	</form>
	
	<p>Желаем удачи!</p>
</body>
</html>
	

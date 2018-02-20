<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$dir="uploaded";
$test_array=[];

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
	<p>Дорогой друг!</p>
	<p>Если ты ответишь на все три теста правильно, знай, ты рожден в СССР.</p>
	<form enctype="multipart/form-data" method="GET">
		<p><label><strong>Выбери тест:</strong></label></p>
		<input type="radio" name="mytest" value="1" checked>Политический тест<br><br>
		<input type="radio" name="mytest" value="2">Литературный тест<br><br>
		<input type="radio" name="mytest" value="3">Юмористический тест<br><br>
		<p><input type="submit" formaction="test2.php" name="RunTest" value="Пройти тест"></p>
	</form>
	
	<p>Желаем удачи!</p>
</body>
</html>
	

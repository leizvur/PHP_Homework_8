<?php
session_start();
echo "<pre>";
print_r($_SESSION["user"]);
echo "</pre>";

if (empty($_SESSION["user"]) || $_SESSION["user"]["is_admin"]!=1) 
{
	echo "Недостаточно прав для доступа к этой странице! Обратитесь к администратору системы.";
	//http_response_code(403);
	exit;
} 
else 
{ 
	//echo $_SESSION["user"];
?>

	<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Добро пожаловать, <?php echo $_SESSION["user"]["username"]?> </h1>

<form enctype="multipart/form-data" action="admin2.php" method="POST">
	<p><label><strong>Выберите файл с тестами в формате JSON для публикации в системе тестирования:</strong></label></p>
	<p><input type="file" name="mytest"	value="Выбрать файл"></p>
	<p><input type="submit" value="Опубликовать тест"></p>
	<?php
}

error_reporting(E_ALL);
ini_set("display_errors", 1);

//echo "<pre>";
//var_dump($_FILES);
//var_dump($_POST);
//echo "</pre>";


@mkdir("uploaded", 0777);


//Шаг 1. Проверяем расширение файла

if (isset($_FILES["mytest"]["name"]) && !empty($_FILES["mytest"]["name"])) 
	{
		$filename=$_FILES["mytest"]["name"];
		$test_array=explode(".", $filename);
		//echo "<pre>";
		//print_r($test_array);
		
		if ($test_array[1] !== "json") 
			{
				echo "Пожалуйста, выберите файл формата JSON.";
			}
		else
			{
				//echo "Спасибо, Вы выбрали корректный формат файла для загрузки на сервер.";
			}

		if ($_FILES["mytest"]["error"] == UPLOAD_ERR_OK)	
			{
				move_uploaded_file($_FILES["mytest"]["tmp_name"], "uploaded/".basename($_FILES["mytest"]["name"]));
				header('Location: list1.php');
				echo "Тест загружен на сервер.";
				echo "<h3>Информация о загруженном на сервер файле: </h3>";
				echo "<p><strong>Оригинальное имя загруженного файла:</strong> ".$_FILES['mytest']['name']."</p>";
				echo "<p><strong>Mime-тип загруженного файла:</strong> ".$_FILES['mytest']['type']."</p>";
				echo "<p><strong>Размер загруженного файла в байтах:</strong> ".$_FILES['mytest']['size']."</p>";
				$filepath=realpath("uploaded/".basename($_FILES["mytest"]["name"]));
				$shortfilepath=str_replace($_SERVER['DOCUMENT_ROOT'], '', $filepath);
				//var_dump($shortfilepath);

?>
				<input type="submit" formaction="list2.php" value="Выбрать тест"><br><br>
<?php			
			}
		else
			{
				echo "Ошибка загрузки теста на сервер.";
			}

	}
	
?>
	
</form>
</body>
</html>
?>
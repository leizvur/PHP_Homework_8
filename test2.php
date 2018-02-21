
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Выбери один ответ на вопрос</h1>

<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
//var_dump($_SESSION["user"]);
//var_dump($_GET);
//var_dump($_POST);
//echo "</pre>";

$test_number;
$test1_array=[];
$test2_array=[];
$test3_array=[];




//Шаг 1. Проверка номера теста

if (isset($_GET["mytest"]) && !empty($_GET["mytest"])) 
	{
		$test_number=$_GET["mytest"];
		//echo "<pre>";
		//var_dump($test_number);
		//echo "</pre>";
	}
	else 
	{
		echo "Ты не выбрал тест.";
	}


//Шаг 2. Загрузка соответствующего номеру json в массив
$test_number;

if ($test_number==="1" && file_exists("./uploaded/test$test_number.json")) 
	{
		//echo "Первый тест";
		$test1_content=file_get_contents("./uploaded/test$test_number.json");
		$test1_array=json_decode($test1_content, true);
		//echo "<pre>";
		//print_r($test1_array);
		//echo "</pre>"; 
		 ?>
		<form action="test2.php?mytest=1" enctype="multipart/form-data" method="POST">
			<p><label><strong><?php echo $test1_array["TEST1_QUESTION"]?></strong></label></p>
			<p><input type="radio" name="answer" value="a1"><?php echo $test1_array["TEST1_ANSWER_1"]?></p>
			<p><input type="radio" name="answer" value="a2"><?php echo $test1_array["TEST1_ANSWER_2"]?></p>
			<p><input type="radio" name="answer" value="a3"><?php echo $test1_array["TEST1_ANSWER_3"]?></p>
  			<p><input type="submit" name="CheckTest" value="Проверить" title="Проверить"></p>
		</form>
		<?php

		if (empty($_POST["answer"]))
		{
			echo "<pre>";
			print_r("У каждого советского человека есть выбор! Выбери один из вариантов ответа!");
			echo "</pre>";
		}

		if (!empty($_POST["answer"]) && $_POST["answer"]==="a3") 
			{
				echo "В точку!";?>
				<form>
					<p><input type="submit" formaction="list2.php" name="ShowTestList" value="Мне понравилось! Хочу еще тест!" title="Мне понравилось! Хочу еще тест!"></p>
					<p><input type="submit" formaction="certificate.php" name="GiveCertificate" value="Получить сертификат" title="Получить"></p>
				</form> <?php
			}

		if (!empty($_POST["answer"]) && $_POST["answer"]!="a3") 
		{
			echo "Неверный ответ! Попробуй еще раз!";
		}
		else
		{
			//echo "нет ответа";
		}
	} 
	
	elseif ($test_number==="2" && file_exists("./uploaded/test$test_number.json")) 
		{
			//echo "Второй тест";
			$test2_content=file_get_contents("./uploaded/test$test_number.json");
			$test2_array=json_decode($test2_content, true);
			//echo "<pre>";
			//print_r($test2_array);
			//echo "</pre>"; ?>
			<form action="test2.php?mytest=2" enctype="multipart/form-data" method="POST">
				<p><label><strong><?php echo $test2_array["TEST2_QUESTION"]?></strong></label></p>
				<p><input type="radio" name="answer" value="a1"><?php echo $test2_array["TEST2_ANSWER_1"]?></p>
				<p><input type="radio" name="answer" value="a2"><?php echo $test2_array["TEST2_ANSWER_2"]?></p>
				<p><input type="radio" name="answer" value="a3"><?php echo $test2_array["TEST2_ANSWER_3"]?></p>
  				<p><input type="submit" name="CheckTest" value="Проверить" title="Проверить"></p>
			</form>
			<?php

			if (empty($_POST["answer"]))
			{
				echo "<pre>";
				print_r("У каждого советского человека есть выбор! Выбери один из вариантов ответа!");
				echo "</pre>";
			}
			if (!empty($_POST["answer"]) && $_POST["answer"]==="a2") 
			{
				echo "В точку!";?>
				<form>
					<p><input type="submit" formaction="list2.php" name="ShowTestList" value="Мне понравилось! Хочу еще тест!" title="Мне понравилось! Хочу еще тест!"></p>
					<p><input type="submit" formaction="certificate.php" name="GiveCertificate" value="Получить сертификат" title="Получить"></p>
				</form> <?php
			} 
			if (!empty($_POST["answer"]) && $_POST["answer"]!="a2") 
			{
				echo "Неверный ответ! Попробуй еще раз!";
			}
			else
			{
				//echo "нет ответа";
			}
			
		}
		elseif ($test_number==="3" && file_exists("./uploaded/test$test_number.json"))
			{
				echo "Третий тест";

				$test3_content=file_get_contents("./uploaded/test$test_number.json");
				$test3_array=json_decode($test3_content, true);
				//echo "<pre>";
				//print_r($test3_array);
				//echo "</pre>"; ?>
				<form action="test2.php?mytest=3" enctype="multipart/form-data" method="POST">
					<p><label><strong><?php echo $test3_array["TEST3_QUESTION"]?></strong></label></p>
					<p><input type="radio" name="answer" value="a1"><?php echo $test3_array["TEST3_ANSWER_1"]?></p>
					<p><input type="radio" name="answer" value="a2"><?php echo $test3_array["TEST3_ANSWER_2"]?></p>
					<p><input type="radio" name="answer" value="a3"><?php echo $test3_array["TEST3_ANSWER_3"]?></p>
  					<p><input type="submit" name="CheckTest" value="Проверить" title="Проверить"></p>
				</form>
				<?php
				if (empty($_POST["answer"]))
				{
					echo "<pre>";
					print_r("У каждого советского человека есть выбор! Выбери один из вариантов ответа!");
					echo "</pre>";
				}				

				if (!empty($_POST["answer"]) && $_POST['answer']==="a1") 
				{
					echo "В точку!!";?>
						<form>
							<p><input type="submit" formaction="list2.php" name="ShowTestList" value="Мне понравилось! Хочу еще тест!" title="Мне понравилось! Хочу еще тест!"></p>
							 <p><input type="submit" formaction="certificate.php" name="GiveCertificate" value="Получить сертификат" title="Получить"></p>
						</form><?php

				} 
				if (!empty($_POST["answer"]) && $_POST["answer"]!="a1") 
				{
					echo "Неверный ответ! Попробуй еще раз!";
				}
				else
				{
					//echo "нет ответа";
				}
				
			} 
			else
			{
				echo "Тест не найден. Обратись к администратору системы.";
				//http_response_code(404);
			}

?>
</body>
</html>

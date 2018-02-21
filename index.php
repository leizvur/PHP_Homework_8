<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();
$errorlog=[];

//var_dump($_POST);

if (!empty($_POST)) 
{
	if ($_POST["Guest"]=="Guest") 
	{	
		$_SESSION["user"]="Guest";
		var_dump($_SESSION["user"]);
		header('Location: list2.php');
	} 
	else
	{
		$users_json=file_get_contents(__DIR__ . "/login.json");
		$users_array=json_decode($users_json, true);
	
		foreach ($users_array as $user)
		{
			if ($_POST["Login"]==$user["login"] && $_POST["Password"]==$user["password"] && $user["is_admin"]!=1 && $_POST["Guest"]!=="Guest") 
			{
				$_SESSION["user"]=$user;
				header('Location: list2.php');
			}
			elseif ($_POST["Login"]==$user["login"] && $_POST["Password"]==$user["password"] && $user["is_admin"]=1 && $_POST["Guest"]!=="Guest") 
			{
				$_SESSION["user"]=$user;
				header('Location: admin2.php');
				}
			elseif ($_POST["Guest"]!=="Guest" && $_POST["Login"]!==$user["login"] && $_POST["Password"]!==$user["password"]) 
			{
				echo "<pre>";
				print_r("Вы ввели неверный логин или пароль.");
				echo "</pre>";
				$errorlog[]="Пользователь ввел неверный логин или пароль!";
			}
			
		}
	}
}

	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Вход в систему</title>
</head>
<body>
<h1>Вход в систему тестирования</h1>
<form action="index.php" enctype="multipart/form-data" method="POST">
	<p><label>Логин:</label>
		<input type="text" name="Login" placeholder="Логин" required></p>
	<p><label>Пароль:</label>
		<input type="text" name="Password" placeholder="Пароль"></p>
	<p><input type="checkbox" name="Guest" value="Guest"><label>Я гость</label></p>	
	<input type="submit" name="enter" value="Войти">
</form>
</body>
</html>

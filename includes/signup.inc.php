<?php
//Условия регистрации. Если какие-то не выполняются, пользователя возвращают на главную страницу с открытой формой регистрации
if(isset($_POST['signup-submit'])){
	
	include "dbh.inc.php";

	$error = NULL;

	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];

	/* Проверка на заполнение всех полей */
	if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
		header("Location: ../index.php?error=emptyfields&uid=".$username."&mail=".$email);
		exit();
	}
	/* Проверка на правильность введенного e-mail'a и имени пользователя */
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9 ]*$/", $username)){
		header("Location: ../index.php?error=invalidmailuid");
		exit();
	}
	/* Проверка на правильность введенного e-mail'a */
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: ../index.php?error=invalidmail&uid=".$username);
		exit();
	}
	/* Проверка на правильность введенного имени пользователя */
	else if (!preg_match("/^[a-zA-Z0-9 ]*$/", $username)){
		header("Location: ../index.php?error=invaliduid&mail=".$email);
		exit();
	}
	/* Проверка на совпадение паролей */
	else if($password !== $passwordRepeat){
		header("Location: ../index.php?error=passwordcheck&uid=".$username."&mail=".$email);
		exit();
	}
	else{
		/* Запрос из базы данных, для проверки не существует ли уже пользователя с таким же именем, которое вводит новый пользователь */
		$sql = "SELECT uidUsers FROM users WHERE uidUsers = ?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../index.php?error=sqlerror");
			exit();			
		} 
		else{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck > 0){
				header("Location: ../index.php?error=usertaken&mail=".$email);
				exit();			
			}
			else{
				$vKey = md5(time().$username);
				$sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers, vKey) VALUES (?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../index.php");
					exit();	
				}
				else{
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashedPwd, $vKey);
					mysqli_stmt_execute($stmt);
					header("Location: ../redirect.php?signup=success"); 
					exit();	
				}		
			}
		}	
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location: ../index.php");
	exit();	
}
?>
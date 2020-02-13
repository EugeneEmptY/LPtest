<?php
/*Условия входа. Если какие-то не выполняются, пользователя возвращают на главную страницу с открытой формой входа*/
if (isset($_POST['login-submit'])){
	include "dbh.inc.php";
	$mailuid = $_POST['uid'];
	$password = $_POST['pwd'];
	
	/* Проверка на заполнение всех полей */
	if (empty($mailuid) || empty($password)){
		header("Location: ../index.php?error=emptyfieldz");
		exit();
	}
	else{
		$sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../index.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "ss", $mailuid, $password);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
				$pwdCheck = password_verify($password, $row['pwdUsers']);
				if($pwdCheck == false){
					header("Location: ../index.php?error=wrongpwd");
					exit();
				}
				else if($pwdCheck == true){
					session_start();
					$_SESSION['userId'] = $row['idUsers'];
					$_SESSION['userUid'] = $row['uidUsers'];
					$_SESSION['accessLevel'] = $row['alUsers'];
					
					header("Location: ../redirect.php?login=success");
					exit();
				}
				else{
					header("Location: ../index.php?error=wrongpwd");
					exit();
				}
			}
			else{
				header("Location: ../index.php?error=nouser");
				exit();
			}
		}
	}
}
else{
	header("Location: ../index.php");
	exit();
}
?>
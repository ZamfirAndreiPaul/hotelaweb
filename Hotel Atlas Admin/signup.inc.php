<?php

	if(isset($_POST['signup_submit'])){
		
		require 'dbh.inc.php';

		$fname = $_POST['first_name'];
		$lname = $_POST['last_name'];
        $email = $_POST['email'];
		$password = $_POST['password'];
		$passwordRepeat = $_POST['password_repeat'];
		
		if(empty($fname) || empty($lname) || empty($email) || empty($password) || empty($passwordRepeat)){
			
			header("Location: register.php?error=emptyfields&uid=".$fname."&email=".$email);
			exit();
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $fname)){
			header("Location: register.php?error=invalidmailuid");
			exit();
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			
			header("Location: register.php?error=invalidmail&uid=".$fname);
			exit();
		}
		else if(!preg_match("/^[a-zA-Z0-9]*$/", $fname)){
			
			header("Location: register.php?error=invaliduid&email=".$email);
			exit();
		}
		else if($password !== $passwordRepeat){
			header("Location: register.php?error=passwordcheck&uid=".$fname."&email=".$email);
			exit();
		}
		else{
			
			$sql = "SELECT email FROM accounts WHERE email=?";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				header("Location: register.php?error=sqlerror");
				exit();
			}else {
				
				mysqli_stmt_bind_param($stmt, "s", $email);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);
				if($resultCheck > 0){
					header("Location: register.php?error=emailtaken&email=".$email);
					exit();
				}
				else
				{
					$sql = "INSERT INTO accounts (fname, lname, email, password) VALUES (?, ?, ?, ?)";
					$stmt = mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt, $sql)){
						header("Location: register.php?error=sqlerror");
						exit();
					}
					else
					{
						$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
						
						mysqli_stmt_bind_param($stmt, "ssss", $fname, $lname, $email, $hashedPwd);
						mysqli_stmt_execute($stmt);
						header("Location: login.php?signup=success");
						exit();
					}
				}
			}
			
		}
		
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
		
	}
	else
	{
		header("Location: ../login.php");
		exit();
	}

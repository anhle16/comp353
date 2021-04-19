<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$date="DATE_FORMAT(date_of_birth, '%d%m%Y')";
		$sql = "SELECT * FROM person WHERE medicare_number='$uname' AND DATE_FORMAT(date_of_birth, '%d%m%Y') ='$pass'";
		
		$result = mysqli_query($conn, $sql);

		if (!$result||mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['medicare_number'] === $uname && DATE_FORMAT(date_create($row['date_of_birth']), 'dmY') === $pass) {
            	$_SESSION['medicare_number'] = $row['medicare_number'];
				$_SESSION['first_name'] = $row['first_name'];
				$_SESSION['last_name'] = $row['last_name'];
				$_SESSION['person_ID'] = $row['Person_ID'];
            	header("Location: symptom.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect User name or password");

		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{

	header("Location: index.php");
	exit();
}
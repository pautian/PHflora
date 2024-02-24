<?php 
session_start(); 
include "dbconn.php";

if (isset($_POST['register_id']) && isset($_POST['passwordreg'])) {

	function validate($data) {
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$register = validate($_POST['register_id']);
	$password = validate($_POST['passwordreg']);

	if (empty($register)) {
		header("Location: finallogin.php?error=username is required");
	    exit();
	} else if(empty($password)) {
        header("Location: finallogin.php?error=password is required");
	    exit();
	} else {
		$sql = "SELECT * FROM register WHERE register_id='$register' AND passwordreg='$password'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['register_id'] = $_POST['register_id'];
			$_SESSION['name'] = $row['name'];
			$status = $row['account_type'];
			if ($status == 'ADM') {
				header('Location: insertflora.php');
			} else {
				header('Location: index.php');
			}
		} else {
			header("Location: finallogin.php?error=Invalid username or password");
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}

?>
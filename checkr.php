<?php 
session_start(); 
include "dbconn.php";

if (isset($_POST['name']) && isset($_POST['register_id'])
    && isset($_POST['age']) && isset($_POST['gender'])
    && isset($_POST['address']) && isset($_POST['birth_date'])
    && isset($_POST['contact_number']) && isset($_POST['email'])
    && isset($_POST['passwordreg']) && isset($_POST['cpassword'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$name = validate($_POST['name']);
    $register = validate($_POST['register_id']);
    $age = validate($_POST['age']);
    $gender = validate($_POST['gender']);
    $address = validate($_POST['address']);
    $birthdate = validate($_POST['birth_date']);
    $contact = validate($_POST['contact_number']);
    $email = validate($_POST['email']);
    $password = validate($_POST['passwordreg']);
    $cpass = validate($_POST['cpassword']);

	


	if (empty($name)) {
		header("Location: register.php?error=Name is required");
	    exit();
	}else if(empty($register)){
        header("Location: register.php?error=Username is required");
	    exit();
	}
	else if(empty($age)){
        header("Location: register.php?error=Age is required");
	    exit();
	}
	else if(empty($gender)){
        header("Location: register.php?error=Gender is required");
	    exit();
	}
    else if(empty($address)){
        header("Location: register.php?error=Address is required");
	    exit();
	}
    else if(empty($birthdate)){
        header("Location: register.php?error=Birthdate is required");
	    exit();
	}
    else if(empty($contact)){
        header("Location: register.php?error=Contact is required");
	    exit();
	}
    else if(empty($email)){
        header("Location: register.php?error=Email is required");
	    exit();
	}
    else if(empty($password)){
        header("Location: register.php?error=Password is required");
	    exit();
	}
    else if(empty($cpass)){
        header("Location: register.php?error=Re password is required");
	    exit();
	}
	else if($password !== $cpass){
        header("Location: register.php?error=The confirmation password  does not match");
	    exit();
	}

	else{
       
	    $sql = "SELECT * FROM register WHERE register_id='$register' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: register.php?error=The username is taken try another");
	        exit();
		}else {
            
            $sql2 = "INSERT INTO register(name, register_id, age, gender, address, birth_date, contact_number, email, passwordreg, account_type, type_description) 
            VALUES('$name', '$register', '$age','$gender','$address','$birthdate','$contact','$email','$password','USR', 'User')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: register.php?success=Your account has been created successfully&color=rgb(22, 192, 138);");
	         exit();
           }else {
	           	header("Location: register.php?error=unknown error occurred");
		        exit();
           }
		}
	}
	
}else{
	header("Location: finallogin.php");
	exit();
}
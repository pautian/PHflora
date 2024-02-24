<?php

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	// Check if the "Option 1" checkbox was checked
	if (isset($_POST['option_1'])) {
		$a = $_POST['option_1'];
	} else {
		$a = 'No Banana';
	}
	
	// Check if the "Option 2" checkbox was checked
	if (isset($_POST['option_2'])) {
		$b = $_POST['option_2'];
	} else {
		$b = 'No Apple';
	}
	
	// Do something with the checkbox values
	// For example, you could store them in a database or display them on the page
	echo "Option 1: $a<br>";
	echo "Option 2: $b";
}

?>
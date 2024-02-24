<?php
include("dbconn.php");

// delete
if (isset($_GET['delete'])) {
   $id = $_GET['delete'];
   $conn->query("DELETE FROM geninfo WHERE plant_id=$id") or die($db_link->error);
   header("Location: records.php");
}

// edit
if (isset($_POST['update'])) {
   $id = $_POST['id'];
   $scientific_name = $_POST['scientific_name'];
   $common_name = $_POST['common_name'];
   $order = $_POST['order'];
   $family = $_POST['family'];
   $description = $_POST['description'];

   $conn->query("UPDATE geninfo SET `scientific_name`='$scientific_name', `common_name`='$common_name', `p_order`='$order', `family`='$family', `pdescription`='$description'
   WHERE plant_id=$id") or die($conn->error);
   header("Location: records.php");
}
?>
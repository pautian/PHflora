<?php
include "dbconn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // chosen plant id
    $plant_id = validate($_POST['selectplant']);

    // delete first
    $sql = "DELETE FROM habitat WHERE plant_id = $plant_id";
    mysqli_query($conn, $sql);

    //insert sql place
    if (isset($_POST['ilocos'])) {
        $sql = "INSERT INTO habitat (`plant_id`, `place_id`) VALUES ('$plant_id', '1')";
        mysqli_query($conn, $sql);    
    }

    if (isset($_POST['cagayanvalley'])) {
        $sql = "INSERT INTO habitat (`plant_id`, `place_id`) VALUES ('$plant_id', '2')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['centralluzon'])) {
        $sql = "INSERT INTO habitat (`plant_id`, `place_id`) VALUES ('$plant_id', '3')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['calabarzon'])) {
        $sql = "INSERT INTO habitat (`plant_id`, `place_id`) VALUES ('$plant_id', '4')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['bicolregion'])) {
        $sql = "INSERT INTO habitat (`plant_id`, `place_id`) VALUES ('$plant_id', '5')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['westernvisayas'])) {
        $sql = "INSERT INTO habitat (`plant_id`, `place_id`) VALUES ('$plant_id', '6')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['centralvisayas'])) {
        $sql = "INSERT INTO habitat (`plant_id`, `place_id`) VALUES ('$plant_id', '7')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['easternvisayas'])) {
        $sql = "INSERT INTO habitat (`plant_id`, `place_id`) VALUES ('$plant_id', '8')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['zamboangapeninsula'])) {
        $sql = "INSERT INTO habitat (`plant_id`, `place_id`) VALUES ('$plant_id', '9')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['northernmindanao'])) {
        $sql = "INSERT INTO habitat (`plant_id`, `place_id`) VALUES ('$plant_id', '10')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['davaoregion'])) {
        $sql = "INSERT INTO habitat (`plant_id`, `place_id`) VALUES ('$plant_id', '11')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['soccskargen'])) {
        $sql = "INSERT INTO habitat (`plant_id`, `place_id`) VALUES ('$plant_id', '12')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['ncr'])) {
        $sql = "INSERT INTO habitat (`plant_id`, `place_id`) VALUES ('$plant_id', '13')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['car'])) {
        $sql = "INSERT INTO habitat (`plant_id`, `place_id`) VALUES ('$plant_id', '14')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['caraga'])) {
        $sql = "INSERT INTO habitat (`plant_id`, `place_id`) VALUES ('$plant_id', '16')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['str'])) {
        $sql = "INSERT INTO habitat (`plant_id`, `place_id`) VALUES ('$plant_id', '17')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['barmm'])) {
        $sql = "INSERT INTO habitat (`plant_id`, `place_id`) VALUES ('$plant_id', '19')";
        mysqli_query($conn, $sql);
    }

    // contribution variables
    $contributor = validate($_POST['contributor']);
    $contribution_date = strtotime($_POST['Contribution_date']);
    $newcontribution_date = date('Y-m-d', $contribution_date);
    $sql = "INSERT INTO contribution VALUES (NULL, '$plant_id', '$contributor', '$newcontribution_date')";
    mysqli_query($conn, $sql);

    //go back to insertplace
    header('Location: insertplace.php');
}
?>
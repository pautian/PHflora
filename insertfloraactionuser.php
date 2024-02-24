<?php
session_start();
include "dbconn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // pictures_submitted table variables
    $photo = validate($_POST['photo']);
    $title = validate($_POST['title']);
    $caption = validate($_POST['caption']);
    $photographer = validate($_POST['photographer']);
    $photo = validate($_POST['photo']);
    $publisher = validate($_POST['publisher']);
    $date_taken = strtotime($_POST['date_taken']);
    $newdate_taken = date('Y-m-d', $date_taken);

    // geninfo_submitted table variables
    $scientificname = validate($_POST['scientificname']);
    $commonname = validate($_POST['commonname']);
    $order = validate($_POST['order']);
    $family = validate($_POST['family']);
    $description = validate($_POST['description']);

    

    if (empty($photo)) {
        // insert sql geninfo_submitted
        $sql = "INSERT INTO geninfo_submitted (`plant_id`, `scientific_name`, `common_name`, `p_order`, `family`, `pdescription`, `photo_id`) 
        VALUES (NULL, '$scientificname', '$commonname', '$order', '$family', '$description', NULL)";
        mysqli_query($conn, $sql);
    } else {
        // insert sql photo
        $sql = "INSERT INTO pictures_submitted (`photo_id`, `photo`, `title`, `caption`, `photographer`, `publisher`, `date_taken`)
        VALUES (NULL, '$photo', '$title', '$caption', '$photographer', '$publisher', '$newdate_taken');";
        mysqli_query($conn, $sql);

        // for getting the current photo
        $sql = "SELECT photo_id FROM pictures_submitted ORDER BY photo_id DESC limit 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $currentphoto = $row['photo_id'];

        // insert sql geninfo_submitted
        $sql = "INSERT INTO geninfo_submitted (`plant_id`, `scientific_name`, `common_name`, `p_order`, `family`, `pdescription`, `photo_id`) 
        VALUES (NULL, '$scientificname', '$commonname', '$order', '$family', '$description', '$currentphoto')";
        mysqli_query($conn, $sql);
    }

    // for getting the current plant
    $sql = "SELECT plant_id FROM geninfo_submitted ORDER BY plant_id DESC limit 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $currentplant = $row['plant_id'];

    // contribution variables
    $contributor = $_SESSION['register_id'];
    // $contribution_date = strtotime($_POST['date_taken']);
    // $newcontribution_date = date('Y-m-d', $contribution_date);
    // date_default_timezone_get('Asia/Manila');
    $contribution_date = date('y-m-d');

    // insert sql contribution
    $sql = "INSERT INTO contribution_submitted (`contribution_id`, `plant_id`, `contributor`, `contribution_date`)
    VALUES (NULL, '$currentplant', '$contributor', '$contribution_date')";
    mysqli_query($conn, $sql);

    // for getting the current contribution
    $sql = "SELECT contribution_id FROM contribution_submitted ORDER BY contribution_id DESC limit 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $currentcontribution = $row['contribution_id'];

    // source variables
    $source = validate($_POST['source']);
    $link = validate($_POST['link']);

    //insert sql source
    $sql = "INSERT INTO contrib_references_submitted (`references_id`, `contribution_id`, `source`, `link`)
    VALUES (NULL, '$currentcontribution', '$source', '$link')";
    mysqli_query($conn, $sql);

    //insert sql place
    if (isset($_POST['ilocos'])) {
        $sql = "INSERT INTO habitat_submitted (`plant_id`, `place_id`) VALUES ('$currentplant', '1')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['cagayanvalley'])) {
        $sql = "INSERT INTO habitat_submitted (`plant_id`, `place_id`) VALUES ('$currentplant', 2)";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['centralluzon'])) {
        $sql = "INSERT INTO habitat_submitted (`plant_id`, `place_id`) VALUES ('$currentplant', '3')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['calabarzon'])) {
        $sql = "INSERT INTO habitat_submitted (`plant_id`, `place_id`) VALUES ('$currentplant', '4')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['bicolregion'])) {
        $sql = "INSERT INTO habitat_submitted (`plant_id`, `place_id`) VALUES ('$currentplant', '5')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['westernvisayas'])) {
        $sql = "INSERT INTO habitat_submitted (`plant_id`, `place_id`) VALUES ('$currentplant', '6')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['centralvisayas'])) {
        $sql = "INSERT INTO habitat_submitted (`plant_id`, `place_id`) VALUES ('$currentplant', '7')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['easternvisayas'])) {
        $sql = "INSERT INTO habitat_submitted (`plant_id`, `place_id`) VALUES ('$currentplant', '8')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['zamboangapeninsula'])) {
        $sql = "INSERT INTO habitat_submitted (`plant_id`, `place_id`) VALUES ('$currentplant', '9')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['northernmindanao'])) {
        $sql = "INSERT INTO habitat_submitted (`plant_id`, `place_id`) VALUES ('$currentplant', '10')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['davaoregion'])) {
        $sql = "INSERT INTO habitat_submitted (`plant_id`, `place_id`) VALUES ('$currentplant', '11')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['soccskargen'])) {
        $sql = "INSERT INTO habitat_submitted (`plant_id`, `place_id`) VALUES ('$currentplant', '12')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['ncr'])) {
        $sql = "INSERT INTO habitat_submitted (`plant_id`, `place_id`) VALUES ('$currentplant', '13')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['car'])) {
        $sql = "INSERT INTO habitat_submitted (`plant_id`, `place_id`) VALUES ('$currentplant', '14')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['caraga'])) {
        $sql = "INSERT INTO habitat_submitted (`plant_id`, `place_id`) VALUES ('$currentplant', '16')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['str'])) {
        $sql = "INSERT INTO habitat_submitted (`plant_id`, `place_id`) VALUES ('$currentplant', '17')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['barmm'])) {
        $sql = "INSERT INTO habitat_submitted (`plant_id`, `place_id`) VALUES ('$currentplant', '19')";
        mysqli_query($conn, $sql);
    }

    //go back to insertflora
    header('Location: insertflorauser.php');
}
?>
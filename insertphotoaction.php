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

    // pictures table variables
    $photo = validate($_POST['photo']);
    $title = validate($_POST['title']);
    $caption = validate($_POST['caption']);
    $photographer = validate($_POST['photographer']);
    $photo = validate($_POST['photo']);
    $publisher = validate($_POST['publisher']);
    $date_taken = strtotime($_POST['date_taken']);
    $newdate_taken = date('Y-m-d', $date_taken);

    if (empty($photo)) {
        header('Location: insertphoto.php');
    } else {

        $sql = "INSERT INTO pictures
        VALUES (NULL, '$photo', '$title', '$caption', '$photographer', '$publisher', '$newdate_taken')";
        mysqli_query($conn, $sql);

        // for getting the current photo
        $sql = "SELECT photo_id FROM pictures ORDER BY photo_id DESC limit 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $currentphoto = $row['photo_id'];

        // update sql geninfo
        $sql = "UPDATE geninfo SET `photo_id`='$currentphoto' WHERE plant_id = $plant_id";
        mysqli_query($conn, $sql);

        // contribution variables
        $contributor = validate($_POST['contributor']);
        $contribution_date = strtotime($_POST['date_taken']);
        $newcontribution_date = date('Y-m-d', $contribution_date);

        // insert sql contribution
        $sql = "INSERT INTO contribution (`contribution_id`, `plant_id`, `contributor`, `contribution_date`)
        VALUES (NULL, '$plant_id', '$contributor', '$newcontribution_date')";
        mysqli_query($conn, $sql);

        // for getting the current contribution
        $sql = "SELECT contribution_id FROM contribution ORDER BY contribution_id DESC limit 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $currentcontribution = $row['contribution_id'];

        // source variables
        $source = validate($_POST['source']);
        $link = validate($_POST['link']);

        //insert sql source
        $sql = "INSERT INTO contrib_references (`references_id`, `contribution_id`, `source`, `link`)
        VALUES (NULL, '$currentcontribution', '$source', '$link')";
        mysqli_query($conn, $sql);
    }

    //go back to insertplace
    header('Location: insertphoto.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add Records</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="css/des2.css">
    </head>
    <header>
    <a href="index.php#" class="logo">phlora<span></span></a>
    <div class="navbar">
        <ul>
            <li><a href="records.php"> Plant list </a></li>
            <li><a href="Insertflora.php"> Add Plant </a></li>
            <li><a href="insertplace.php"> Add place to a listed plant </a></li>
            <li><a href="insertphoto.php"> Add photo to a listed plant </a></li>
            <li><a href="recordssubmitted.php"> Submitted Plants </a></li>
            <li><a href="mysqlcodes.php"> SQL Codes </a></li>
        </ul>
    </div>
    </header>
    <body>
        <div class="manual-form">
            <form action="insertphotoaction.php" method="POST">
                <div class="form">
                    <div class="title">
                        <h4>General Information</h4>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="fn">Plant ID:</label>
                        </div>
                        <div class="col-8">
                        <?php
                            include("dbconn.php");
                            $result = $conn->query("SELECT plant_id, scientific_name, g.photo_id 
                            FROM geninfo g 
                            LEFT JOIN pictures p 
                            ON g.photo_id = p.photo_id 
                            WHERE g.photo_id IS NULL
                            ORDER BY g.plant_id;");

                            echo "<html>";
                            echo "<body>";
                            echo "<select name='selectplant'>";

                            while ($row = $result->fetch_assoc()) {

                                unset($plant_id);
                                $plant_id = $row['plant_id'];
                                $scientific_name = $row['scientific_name'];
                                echo '<option value="'.$plant_id.'">'.$plant_id.' - '.$scientific_name.'</option>';

                            }

                            echo "</select>";
                            echo "</body>";
                            echo "</html>";
                        ?> 
                        </div>
                    </div>
                    <div class="title">
                        <h4>Pictures</h4>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="fn">Photo</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control form-control-sm" name="photo" placeholder="insert link">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="fn">Title</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control form-control-sm" name="title" placeholder="">
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-4">
                            <label for="fn">Caption</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control form-control-sm" name="caption" placeholder="">
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-4">
                            <label for="fn">Photographer</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control form-control-sm" name="photographer" placeholder="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label for="fn">Publisher</label>
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control form-control-sm" name="publisher" placeholder="">
                        </div>
                        <div class="col-2">
                            <label for="fn">Date taken</label>
                        </div>
                        <div class="col-3">
                            <input type="date" class="form-control form-control-sm" name="date_taken">
                        </div>
                    </div>
                </div>

                <hr>

                <div class="title">
                    <h4>Contribution</h4>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="fn">Contributor</label>
                    </div>
                    <div class="col-3">
                    <?php

                        include("dbconn.php");
                        $result = $conn->query("SELECT register_id FROM register ORDER BY register_id");

                        echo "<html>";
                        echo "<body>";
                        echo "<select name='contributor'>";

                        while ($row = $result->fetch_assoc()) {

                            unset($register_id);
                            $register_id = $row['register_id'];
                            echo '<option value="'.$register_id.'">'.$register_id.'</option>';

                        }

                        echo "</select>";
                        echo "</body>";
                        echo "</html>";
                    ?> 
                    </div>
                    <div class="col-2">
                        <label for="fn">Contribution date</label>
                    </div>
                    <div class="col-3">
                        <input type="date" class="form-control form-control-sm" name="Contribution_date">
                    </div>
                </div>

                <hr>

                <div class="title">
                    <h4>References</h4>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="fn">Source</label>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control form-control-sm" name="source" placeholder="Book, Website, Journal...">
                    </div>
                    <div class="col-2">
                        <label for="fn">Link</label>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control form-control-sm" name="link" placeholder="Insert link">
                    </div>
                </div>

                <hr>

                <div class="buttons">
                    <button name="add" class="btn btn-sm" >Submit record</button>
                </div>
            </form>
        </div>
    </body>
</html>
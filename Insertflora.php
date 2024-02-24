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
        <a href="index.php" class="logo">phlora<span></span></a>
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
            <form action="insertfloraaction.php" method="POST">
                <div class="form">
                    <div class="title">
                        <h4>General Information</h4>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="fn">Scientific name</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control form-control-sm" name="scientificname">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="fn">Common name</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control form-control-sm" name="commonname" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="fn">Order</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control form-control-sm" name="order" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="fn">Family</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control form-control-sm" name="family" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="fn">Description</label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control form-control-sm" name="description" placeholder="">
                        </div>
                    </div>

                    <hr>

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
                    <h4>Place origin of floras</h4>
                </div>
                <div class="row">
                    <div class="col-2">
                        <input type="checkbox"  class="form-check-input" name="ilocos" value=1>
                        <label for="check" class="form-check-label">Ilocos</label>
                    </div>
                    
                    <div class="col-2">
                        <input type="checkbox"  class="form-check-input" name="cagayanvalley" value=2>
                        <label for="check" class="form-check-label">Cagayan Valley</label>
                    </div>

                    <div class="col-2">
                        <input type="checkbox"  class="form-check-input" name="centralluzon" value=3>
                        <label for="check" class="form-check-label">Central Luzon</label>
                    </div>

                    <div class="col-2">
                        <input type="checkbox"  class="form-check-input" name="calabarzon" value=4>
                        <label for="check" class="form-check-label">Calabarzon</label>
                    </div>

                    <div class="col-2">
                        <input type="checkbox"  class="form-check-input" name="bicolregion" value=5>
                        <label for="check" class="form-check-label">Bicol Region</label>
                    </div>

                    <div class="col-2">
                        <input type="checkbox"  class="form-check-input" name="westernvisayas" value=6>
                        <label for="check" class="form-check-label">Western Visayas</label>
                    </div>

                    <div class="col-2">
                        <input type="checkbox"  class="form-check-input" name="centralvisayas" value=7>
                        <label for="check" class="form-check-label">Central Visayas</label>
                    </div>

                    <div class="col-2">
                        <input type="checkbox"  class="form-check-input" name="easternvisayas" value=8>
                        <label for="check" class="form-check-label">Eastern Visayas</label>
                    </div>

                    <div class="col-2">
                        <input type="checkbox"  class="form-check-input" name="zamboangapeninsula" value=9>
                        <label for="check" class="form-check-label">Zambaonga Peninsula</label>
                    </div>

                    <div class="col-2">
                        <input type="checkbox"  class="form-check-input" name="northernmindanao" value=10>
                        <label for="check" class="form-check-label">Northern Mindanao</label>
                    </div>

                    <div class="col-2">
                        <input type="checkbox"  class="form-check-input" name="davaoregion" value=11>
                        <label for="check" class="form-check-label">Davao Region</label>
                    </div>

                    <div class="col-2">
                        <input type="checkbox"  class="form-check-input" name="soccskargen" value=12>
                        <label for="check" class="form-check-label">Soccsksargen</label>
                    </div>

                    <div class="col-2">
                        <input type="checkbox"  class="form-check-input" name="ncr" value=13>
                        <label for="check" class="form-check-label">National Capital Region</label>
                    </div>

                    <div class="col-2">
                        <input type="checkbox"  class="form-check-input" name="car" value=14>
                        <label for="check" class="form-check-label">Cordillera Administrative Region</label>
                    </div>

                    <div class="col-2">
                        <input type="checkbox"  class="form-check-input" name="caraga" value=16>
                        <label for="check" class="form-check-label">Caraga</label>
                    </div>

                    <div class="col-2">
                        <input type="checkbox"  class="form-check-input" name="str" value=17>
                        <label for="check" class="form-check-label">Southwestern Tagalog Region</label>
                    </div>

                    <div class="col-2">
                        <input type="checkbox"  class="form-check-input" name="barmm" value=19>
                        <label for="check" class="form-check-label">Bangsamoro Autonomus Region</label>
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
<?php
    session_start();
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Records</title> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.slim.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="css/jquery.dataTables.min.css" />
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
<br><br><br><br><br>
<div class="table-form">
    <div class="container-fluid mt-2">

        <!-- Table of Records -->

        <div class="card">
            <div class="card-body">
                <table id="myDataTable" class="table table-striped table-sm border" cellspacing="0"
                    width="100%" height="300px" style="font-size:15px">
                    <thead>
                        <tr>
                            <th>Plant ID</th>
                            <th>Scientific name</th>
                            <th>Commmon name</th>
                            <th>Order</th>
                            <th>Family</th>
                            <th>Description</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                <tbody>

        <!-- Selecting Records from the database -->

                    <?php
                        include "dbconn.php";
                        $query = "SELECT * FROM geninfo g LEFT JOIN pictures p ON g.photo_id=p.photo_id";
                        $result = mysqli_query($conn, $query);
                        $count = 1;
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo strtoupper ($row['plant_id']);?></td>
                            <td><?php echo strtoupper ($row['scientific_name']);?></td>
                            <td><?php echo strtoupper ($row['common_name']);?></td>
                            <td><?php echo strtoupper ($row['p_order']);?></td>
                            <td><?php echo strtoupper ($row['family']);?></td>
                            <td><?php echo strtolower ($row['pdescription']);?></td>
                            <td><a href="<?php echo strtolower ($row['photo']);?>"><?php echo strtolower ($row['photo']);?></a></td>
                            <td>
                                  <a href="" class="badge badge-primary p-2" data-toggle="modal" data-target="#details<?php echo $row['plant_id']; ?>">details</a>
                                  <a href="" class="badge badge-warning p-2 " data-toggle="modal" data-placement="top" title="edit" data-target="#edit<?php echo $row['plant_id']; ?>">edit</a>
                                  <a href="" class="badge badge-danger p-2" data-toggle="modal" data-placement="top" title="delete" data-target="#delete<?php echo $row['plant_id']; ?>">delete</a>
                              </td>
                        </tr>
<!-- DELETING RECORDS -->
<div class="modal fade" id="delete<?php echo $row['plant_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                <a type="button" class="btn btn-danger btn-sm" href="action.php?delete=<?php echo $row["plant_id"] ?>">Confirm</a>
            </div>
        </div>
    </div>
</div>

 <!-- EDITING RECORDS -->
 <div class="modal fade" id="edit<?php echo $row['plant_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="action.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['plant_id']; ?>">

                        <div class="title">
                            <h4>General Infomation</h4>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="fn">Scientific Name</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm" name="scientific_name" value="<?php echo strtoupper ($row['scientific_name']); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="fn">Common Name</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm" name="common_name" value="<?php echo strtoupper ($row['common_name']); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="fn">Order</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm" name="order" value="<?php echo strtoupper ($row['p_order']); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="fn">Family</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm" name="family" value="<?php echo strtoupper ($row['family']); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="fn">Description</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm" name="description" value="<?php echo strtolower ($row['pdescription']); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="update" class="btn btn-success btn-sm">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
                            
    <!-- VIEWING RECORDS -->
    <div class="modal fade" id="details<?php echo $row['plant_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size:15px;">Plant ID: <?php echo strtoupper($row['plant_id'])?></p>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size:15px;">Scientific name: <?php echo strtoupper($row['scientific_name'])?></p>
                            </div>
                            <div class="col-6">
                                <p style="font-size:15px;">Common name: <?php echo strtoupper($row['common_name'])?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size:15px;">Order: <?php echo strtoupper($row['p_order'])?></p>
                            </div>
                            <div class="col-6">
                                <p style="font-size:15px;">Family: <?php echo strtoupper($row['family'])?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size:15px;">Description:</p>
                            </div>
                            <div class="col-6">
                                <p style="font-size:15px;"><?php echo strtolower($row['pdescription'])?></p>
                            </div>
                        </div>
                        <hr>
                        <?php
                            $currplant_id = $row['plant_id'];
                            $query = "SELECT p.photo_id as photo_id, photo, title, caption, photographer, publisher, date_taken
                                FROM geninfo G JOIN pictures P ON g.photo_id=p.photo_id
                                WHERE plant_id = $currplant_id";
                            $resultpictures = mysqli_query($conn, $query);
                            $rowpictures = mysqli_fetch_array($resultpictures);

                            if (isset($rowpictures['photo_id'])) {
                                $rowpicturesphotoid = $rowpictures['photo_id'];
                            } else {
                                $rowpicturesphotoid = '';
                            }

                            if (isset($rowpictures['photo'])) {
                                $rowpicturesphoto = $rowpictures['photo'];
                            } else {
                                $rowpicturesphoto = '';
                            }

                            if (isset($rowpictures['title'])) {
                                $rowpicturestitle = $rowpictures['title'];
                            } else {
                                $rowpicturestitle = '';
                            }

                            if (isset($rowpictures['caption'])) {
                                $rowpicturescaption = $rowpictures['caption'];
                            } else {
                                $rowpicturescaption = '';
                            }

                            if (isset($rowpictures['photographer'])) {
                                $rowpicturesphotographer = $rowpictures['photographer'];
                            } else {
                                $rowpicturesphotographer = '';
                            }

                            if (isset($rowpictures['publisher'])) {
                                $rowpicturesphotopublisher = $rowpictures['publisher'];
                            } else {
                                $rowpicturesphotopublisher = '';
                            }

                            if (isset($rowpictures['date_taken'])) {
                                $rowpicturesphotodate = $rowpictures['date_taken'];
                            } else {
                                $rowpicturesphotodate = '';
                            }
                        ?>
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size:15px;">Photo ID: <?php echo strtoupper($rowpicturesphotoid)?></p>
                            </div>
                            <div class="col-6">
                                <p style="font-size:15px;">Photo: <?php echo strtoupper($rowpicturesphoto)?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size:15px;">Title: <?php echo strtoupper($rowpicturestitle)?></p>
                            </div>
                            <div class="col-6">
                                <p style="font-size:15px;">Caption: <?php echo strtolower($rowpicturescaption)?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size:15px;">Photographer: <?php echo strtoupper($rowpicturesphotographer)?></p>
                            </div>
                            <div class="col-6">
                                <p style="font-size:15px;">Publisher: <?php echo strtoupper($rowpicturesphotopublisher)?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size:15px;">Date taken: <?php echo strtoupper($rowpicturesphotodate)?></p>
                            </div>
                        </div>
                        <hr>
                        <?php
                            $query = "SELECT place_id
                            FROM geninfo G JOIN habitat H ON G.plant_id=H.plant_id
                            WHERE g.plant_id = $currplant_id;";
                            $resulthabitat = mysqli_query($conn, $query);
                            
                            $ilocos = '';
                            $cagayan = '';
                            $centrall = '';
                            $calabarzon = '';
                            $bicol = '';
                            $westernv = '';
                            $centralv = '';
                            $easternv = '';
                            $zamboanga = '';
                            $northernm = '';
                            $davaor = '';
                            $soccs = '';
                            $ncr = '';
                            $car = '';
                            $caraga = '';
                            $mimaropa = '';
                            $bangsamoro = '';
                            
                            // if ($rowhabitat['place_id'])
                            while ($rowhabitat = mysqli_fetch_array($resulthabitat)) {

                                switch ($rowhabitat['place_id']) {

                                    case 1:
                                        $ilocos = 'CHECK';
                                        break;

                                    case 2:
                                        $cagayan = 'CHECK';
                                        break;

                                    case "3":
                                        $centrall = 'CHECK';
                                        break;

                                    case "4":
                                        $calabarzon = 'CHECK';
                                        break;

                                    case "5":
                                        $bicol = 'CHECK';
                                        break;

                                    case "6":
                                        $westernv = 'CHECK';
                                        break;

                                    case "7":
                                        $centralv = 'CHECK';
                                        break;

                                    case "8":
                                        $easternv = 'CHECK';
                                        break;

                                    case "9":
                                        $zamboanga = 'CHECK';
                                        break;

                                    case "10":
                                        $northernm = 'CHECK';
                                        break;
                                    
                                    case "11":
                                        $davaor = 'CHECK';
                                        break;
                                    
                                    case "12":
                                        $soccs = 'CHECK';
                                        break;
                                    
                                    case "13":
                                        $ncr= 'CHECK';
                                        break;
                                    
                                    case "14":
                                        $car = 'CHECK';
                                        break;
                                    
                                    case "16":
                                        $caraga = 'CHECK';
                                        break;
                                    
                                    case "17":
                                        $mimaropa = 'CHECK';
                                        break;
                                    
                                    case "19":
                                        $bangsamoro = 'CHECK';
                                        break;
                                    
                                    default:
                                        break;
                                }
                            }
                        ?>
                        <h5>Regions</h5>
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size:15px;">Ilocos Region: <?php echo strtoupper($ilocos)?></p>
                            </div>
                            <div class="col-6">
                                <p style="font-size:15px;">Cagayan Valley: <?php echo strtoupper($cagayan)?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size:15px;">Central Luzon: <?php echo strtoupper($centrall)?></p>
                            </div>
                            <div class="col-6">
                                <p style="font-size:15px;">CALABARZON: <?php echo strtoupper($calabarzon)?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size:15px;">Bicol Region: <?php echo strtoupper($bicol)?></p>
                            </div>
                            <div class="col-6">
                                <p style="font-size:15px;">Western Visayas: <?php echo strtoupper($westernv)?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size:15px;">Central Visayas: <?php echo strtoupper($centralv)?></p>
                            </div>
                            <div class="col-6">
                                <p style="font-size:15px;">Eastern Visayas: <?php echo strtoupper($easternv)?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size:15px;">Zamboanga Peninsula: <?php echo strtoupper($zamboanga)?></p>
                            </div>
                            <div class="col-6">
                                <p style="font-size:15px;">Northern Mindanao: <?php echo strtoupper($northernm)?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size:15px;">Davao Region: <?php echo strtoupper($davaor)?></p>
                            </div>
                            <div class="col-6">
                                <p style="font-size:15px;">SOCCSKARGEN: <?php echo strtoupper($soccs)?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size:15px;">NCR: <?php echo strtoupper($ncr)?></p>
                            </div>
                            <div class="col-6">
                                <p style="font-size:15px;">CAR: <?php echo strtoupper($car)?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size:15px;">Caraga: <?php echo strtoupper($caraga)?></p>
                            </div>
                            <div class="col-6">
                                <p style="font-size:15px;">MIMAROPA: <?php echo strtoupper($mimaropa)?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size:15px;">Bangsamoro: <?php echo strtoupper($bangsamoro)?></p>
                            </div>
                        </div>
                        <hr>
                        <h5>Contribution</h5>
                        <div class="row">
                            <div class="col-12">
                                <p style="font-size:15px;">
                                <?php

                                    include("dbconn.php");
                                    $resultcon = $conn->query("SELECT contributor, contribution_date, source, link
                                    FROM geninfo g LEFT JOIN contribution c ON g.plant_id=c.plant_id LEFT JOIN contrib_references r ON c.contribution_id=r.contribution_id
                                    WHERE g.plant_id=$currplant_id;");

                                    echo "<html>";
                                    echo "<body>";
                                    

                                    while ($rowcon = $resultcon->fetch_array()) {

                                        echo '<p style="font-size:15px;">';
                                        unset($contributor);
                                        unset($contribution_date);
                                        unset($source);
                                        unset($register_id);
                                        $contributor = $rowcon['contributor'];
                                        $contribution_date = $rowcon['contribution_date'];
                                        $source = $rowcon['source'];
                                        $link = $rowcon['link'];
                                        echo "Contributor: $contributor <br>";
                                        echo "Contribution Date: $contribution_date <br>";
                                        echo "Source: $source <br>";
                                        echo 'Link: <a href="' . $link . '">' . $link . '</a><br>';
                                        echo "<hr>";
                                        echo "</p>";
                                    }
                                    
                                    echo "</select>";
                                    echo "</body>";
                                    echo "</html>";

                                ?> 
                                </p>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>                
<?php } ?>
            </tbody>             
    </table>
</body>

<link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-print-2.2.2/datatables.min.js"></script>

<script>
    $(document).ready( function () {
    $('#myDataTable').DataTable()
} );
</script>
</html>
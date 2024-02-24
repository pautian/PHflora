<?php
    session_start();
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    include "dbconn.php";
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
<br>
<br>
<br>
<br>
<br>

<div class="table-form">
    <div class="container-fluid mt-2">
        <div class="card">
            <div class="card-body">
                <div class="title">
                    <h6>1. Display information on the region which has "luzon" as its island group and "region I" as its place description</h6>
                </div>
                <table id="myDataTable" class="table table-striped table-sm border" cellspacing="0" width="100%" height="300px" style="font-size:15px">
                    <thead>
                        <tr>
                            <th>Place_id</th>
                            <th>Island Group</th>
                            <th>Region</th>
                            <th>Place Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM phflora.place WHERE island_group ='Luzon' and place_description ='Region I';";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                                while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo ($row['place_id']);?></td>
                                <td><?php echo ($row['island_group']);?></td>
                                <td><?php echo ($row['region']);?></td>
                                <td><?php echo ($row['place_description']);?></td>
                            </tr>    
                        <?php }} else {echo "0 results";} ?>
                    </tbody>
                </table>
            </div>    
        </div>  
        <div class="card">
            <div class="card-body">
                <div class="title">
                    <h6>2. Display the regions that belongs to the luzon island group.</h6>
                </div>
                <table id="myDataTable2" class="table table-striped table-sm border" cellspacing="0" width="100%" height="300px" style="font-size:15px">
                    <thead>
                        <tr>
                            <th>Island Group</th>
                            <th>Region</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT island_group, region FROM phflora.place WHERE island_group = 'luzon';";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                                while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo ($row['island_group']);?></td>
                                <td><?php echo ($row['region']);?></td>
                            </tr>    
                        <?php }} else {echo "0 results";} ?>
                    </tbody>
                </table>
            </div>    
        </div>  
        <div class="card">
            <div class="card-body">
                <div class="title">
                    <h6>3. Count the number of island groups in mindanao..</h6>
                </div>
                <table id="myDataTable3" class="table table-striped table-sm border" cellspacing="0" width="100%" height="300px" style="font-size:15px">
                    <thead>
                        <tr>
                            <th>Island Group</th>
                            <th>Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT island_group, count(island_group) as count
                            FROM phflora.place
                            WHERE island_group ='Mindanao';";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                                while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo ($row['island_group']);?></td>
                                <td><?php echo ($row['count']);?></td>
                            </tr>    
                        <?php }} else {echo "0 results";} ?>
                    </tbody>
                </table>
            </div>    
        </div>
        <div class="card">
            <div class="card-body">
                <div class="title">
                    <h6>1. Lists the number of region in each island group. Only include island group with more than 4 region.</h6>
                </div>
                <table id="myDataTable4" class="table table-striped table-sm border" cellspacing="0" width="100%" height="300px" style="font-size:15px">
                    <thead>
                        <tr>
                            <th>Island Group</th>
                            <th>Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT COUNT(region) as count, island_group FROM place GROUP BY island_group HAVING COUNT(region) > 4;";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                                while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo ($row['island_group']);?></td>
                                <td><?php echo ($row['count']);?></td>
                            </tr>    
                        <?php }} else {echo "0 results";} ?>
                    </tbody>
                </table>
            </div>    
        </div>  
        <div class="card">
            <div class="card-body">
                <div class="title">
                    <h6>2. Display the average age by gender only if the average is 21 and above.</h6>
                </div>
                <table id="myDataTable5" class="table table-striped table-sm border" cellspacing="0" width="100%" height="300px" style="font-size:15px">
                    <thead>
                        <tr>
                            <th>Gender</th>
                            <th>Average</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT gender, AVG(age) as aveage FROM register GROUP BY gender HAVING AVG(age) >= 21;";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                                while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo ($row['gender']);?></td>
                                <td><?php echo ($row['aveage']);?></td>
                            </tr>    
                        <?php }} else {echo "0 results";} ?>
                    </tbody>
                </table>
            </div>    
        </div>
        <div class="card">
            <div class="card-body">
                <div class="title">
                    <h6>3. Display the name of the users where gender is female and their age is 20.</h6>
                </div>
                <table id="myDataTable6" class="table table-striped table-sm border" cellspacing="0" width="100%" height="300px" style="font-size:15px">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT name, address, age FROM register WHERE gender = 'F' GROUP BY name, address, age HAVING age = 20;";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                                while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo ($row['name']);?></td>
                                <td><?php echo ($row['address']);?></td>
                                <td><?php echo ($row['age']);?></td>
                            </tr>    
                        <?php }} else {echo "0 results";} ?>
                    </tbody>
                </table>
            </div>    
        </div>
        <div class="card">
            <div class="card-body">
                <div class="title">
                    <h6>1. Display the Scientific Name of the plant along the Name of the Contributor and the Date.</h6>
                </div>
                <table id="myDataTable7" class="table table-striped table-sm border" cellspacing="0" width="100%" height="300px" style="font-size:15px">
                    <thead>
                        <tr>
                            <th>Scientific Name</th>
                            <th>Contributor</th>
                            <th>Contribution Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT scientific_name, contributor, contribution_date
                            FROM geninfo G JOIN contribution C ON G.Plant_id = C.Plant_id JOIN register R ON C.contributor = R.register_id;";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                                while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo ($row['scientific_name']);?></td>
                                <td><?php echo ($row['contributor']);?></td>
                                <td><?php echo ($row['contribution_date']);?></td>
                            </tr>    
                        <?php }} else {echo "0 results";} ?>
                    </tbody>
                </table>
            </div>    
        </div>
        <div class="card">
            <div class="card-body">
                <div class="title">
                    <h6>2. Display the Common Name of the plant also with region, Island group, and the Description of the plant.</h6>
                </div>
                <table id="myDataTable8" class="table table-striped table-sm border" cellspacing="0" width="100%" height="300px" style="font-size:15px">
                    <thead>
                        <tr>
                            <th>Common Name</th>
                            <th>Region</th>
                            <th>Island Group</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT common_name, p.region, p.island_group, pdescription
                            FROM geninfo G JOIN habitat H ON G.plant_id = H.plant_id JOIN place P ON H.place_id = P.place_id;";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                                while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo ($row['common_name']);?></td>
                                <td><?php echo ($row['region']);?></td>
                                <td><?php echo ($row['island_group']);?></td>
                                <td><?php echo ($row['pdescription']);?></td>
                            </tr>    
                        <?php }} else {echo "0 results";} ?>
                    </tbody>
                </table>
            </div>    
        </div>
        <div class="card">
            <div class="card-body">
                <div class="title">
                    <h6>1. Give the full information available in the first 3 regions (based on alphabetical order) in each island group.</h6>
                </div>
                <table id="myDataTable9" class="table table-striped table-sm border" cellspacing="0" width="100%" height="300px" style="font-size:15px">
                    <thead>
                        <tr>
                            <th>Place ID</th>
                            <th>Island Group</th>
                            <th>Region</th>
                            <th>Place Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT *
                            FROM place
                            WHERE place_id IN (SELECT * FROM (
                                    SELECT place_id
                                    FROM place
                                    WHERE island_group = 'luzon'
                                    ORDER BY region
                                    LIMIT 3)
                                AS subq)
                                OR place_id IN (SELECT * FROM (
                                    SELECT place_id
                                    FROM place
                                    WHERE island_group = 'visayas'
                                    ORDER BY region
                                    LIMIT 3)
                                AS subq2)
                                OR place_id IN (SELECT * FROM (
                                    SELECT place_id
                                    FROM place
                                    WHERE island_group = 'mindanao'
                                    ORDER BY region
                                    LIMIT 3)
                                AS subq3)
                                ORDER BY island_group, region;";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                                while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo ($row['place_id']);?></td>
                                <td><?php echo ($row['island_group']);?></td>
                                <td><?php echo ($row['region']);?></td>
                                <td><?php echo ($row['place_description']);?></td>
                            </tr>    
                        <?php }} else {echo "0 results";} ?>
                    </tbody>
                </table>
            </div>    
        </div>
        <div class="card">
            <div class="card-body">
                <div class="title">
                    <h6>2. Give the information on users that have the minimum age.</h6>
                </div>
                <table id="myDataTable8" class="table table-striped table-sm border" cellspacing="0" width="100%" height="300px" style="font-size:15px">
                    <thead>
                        <tr>
                            <th>Register ID</th>
                            <th>Password</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Birth Date</th>
                            <th>Age</th>
                            <th>Contact number</th>
                            <th>email</th>
                            <th>account_type</th>
                            <th>type_description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT *
                            FROM register
                            WHERE age = (SELECT min(age)
                                FROM register);";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                                while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo ($row['register_id']);?></td>
                                <td><?php echo ($row['passwordreg']);?></td>
                                <td><?php echo ($row['name']);?></td>
                                <td><?php echo ($row['gender']);?></td>
                                <td><?php echo ($row['address']);?></td>
                                <td><?php echo ($row['birth_date']);?></td>
                                <td><?php echo ($row['age']);?></td>
                                <td><?php echo ($row['contact_number']);?></td>
                                <td><?php echo ($row['email']);?></td>
                                <td><?php echo ($row['account_type']);?></td>
                                <td><?php echo ($row['type_description']);?></td>
                            </tr>    
                        <?php }} else {echo "0 results";} ?>
                    </tbody>
                </table>
            </div>    
        </div>
    </div>
</div>        
</body>

<link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-print-2.2.2/datatables.min.js"></script>

<script>
    $(document).ready( function () {
    $('#myDataTable').DataTable()
} );
    $(document).ready( function () {
    $('#myDataTable2').DataTable()
} );
    $(document).ready( function () {
    $('#myDataTable3').DataTable()
} );
    $(document).ready( function () {
    $('#myDataTable4').DataTable()
} );
    $(document).ready( function () {
    $('#myDataTable5').DataTable()
} );
    $(document).ready( function () {
    $('#myDataTable6').DataTable()
} );
    $(document).ready( function () {
    $('#myDataTable7').DataTable()
} );
    $(document).ready( function () {
    $('#myDataTable8').DataTable()
} );
    $(document).ready( function () {
    $('#myDataTable9').DataTable()
} );
    $(document).ready( function () {
    $('#myDataTable10').DataTable()
} );
    $(document).ready( function () {
    $('#myDataTable11').DataTable()
} );
    $(document).ready( function () {
    $('#myDataTable12').DataTable()
} );
</script>
</html>
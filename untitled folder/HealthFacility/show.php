<?php require_once '../database.php';

$statement = $conn->prepare("SELECT * FROM comp353.HealthFacility AS facility WHERE facility.Facility_ID = :Facility_ID");
$statement->bindParam(":Facility_ID", $_GET["Facility_ID"]);
$statement->execute();
$facility = $statement->fetch(PDO::FETCH_ASSOC);
//print('Connected');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $facility["Facility_ID"] ?></title>
</head>
<body>
    <h1>Facility ID: <?= $facility["Facility_ID"] ?></h1>
    <p>Name: <?= $facility["facility_Name"] ?></p>
    <p>Address: <?= $facility["facility_Address"] ?></p>
    <p>Phone: <?= $facility["facility_Phone"] ?></p>
    <p>Website: <?= $facility["facility_Web_Address"] ?></p>
    <p>Type: <?= $facility["facility_Type"] ?></p>
    <p>Drive-thru or not: <?= $facility["facility_drivethru"] ?></p>
    <p>Appointment Type: <?= $facility["facility_appointment_type"] ?></p>
    <a href="./">Back to Facility List</a>

   </body>
</html>
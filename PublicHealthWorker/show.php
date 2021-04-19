<?php require_once '../database.php';

$statement = $conn->prepare("SELECT * 
                            FROM rec353_4.publichealthworker 
                            AS publichealthworker 
                            WHERE publichealthworker.Person_ID = :Person_ID 
                            and publichealthworker.Serving_facility = :Serving_facility
                            and publichealthworker.Joining_Date = :Joining_Date
                            ");
$statement->bindParam(":Person_ID", $_GET["Person_ID"]);
$statement->bindParam(":Serving_facility", $_GET["Serving_facility"]);
$statement->bindParam(":Joining_Date", $_GET["Joining_Date"]);
$statement->execute();
$worker = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $worker["Person_ID"] ?></title>
</head>
<body>
    <h1>Person ID: <?= $worker["Person_ID"] ?></h1>
    <p>Facility: <?= $worker["Serving_facility"] ?></p>
    <p>Position: <?= $worker["Position"] ?></p>
    <p>Join Date: <?= $worker["Joining_Date"] ?></p>
    <p>Leave Date: <?= $worker["Leaving_Date"] ?></p>
    <!-- <p>Work Schedule: <?= $worker["working_schedule"] ?></p> -->
    <a href="./">Back to Worker List</a>
</body>
</html>
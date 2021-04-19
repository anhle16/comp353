<?php require_once '../database.php';

$statement = $conn->prepare("SELECT * 
                            FROM comp353.regions 
                            AS regions 
                            WHERE regions.id = :id
                            ;
                            ");
$statement->bindParam(":id", $_GET["id"]);
$statement->execute();
$recommendation = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $recommendation["id"] ?></title>
</head>
<body>
    <h1>Region ID: <?= $recommendation["id"] ?> </h1>
    <p>Region Name: <?= $recommendation["region_name"] ?></p
    ><p>Current Alert Level: <?= $recommendation["alert_level"] ?></p>
        <a href="./">Back to Regions List</a>
</body>
</html>
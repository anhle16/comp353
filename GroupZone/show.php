<?php require_once '../database.php';

$statement = $conn->prepare("SELECT * FROM comp353.GroupZone AS GroupZone WHERE GroupZone.Zone_ID = :Zone_ID");
$statement->bindParam(":Zone_ID", $_GET["Zone_ID"]);
$statement->execute();
$zone = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $zone["Zone_ID"] ?></title>
</head>
<body>
    <h1>Group Zone ID: <?= $zone["Zone_ID"] ?></h1>
    <p>Group Zone Name: <?= $zone["Group_name"] ?></p>

    <a href="./">Back to Group Zone List</a>
</body>
</html>
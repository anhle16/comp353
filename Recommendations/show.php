<?php require_once '../database.php';

$statement = $conn->prepare("SELECT * 
                            FROM comp353.public_health_recommendations 
                            AS public_health_recommendations 
                            WHERE public_health_recommendations.policy_id = :policy_id
                            AND public_health_recommendations.policy_subid = :policy_subid;
                            ");
$statement->bindParam(":policy_id", $_GET["policy_id"]);
$statement->bindParam(":policy_subid", $_GET["policy_subid"]);
$statement->execute();
$recommendation = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $recommendation["policy_id"] ?></title>
</head>
<body>
    <h1>Policy ID: <?= $recommendation["policy_id"] ?>--<?= $recommendation["policy_subid"] ?> </h1>
    <p>Publish Date: <?= $recommendation["publish_date"] ?></p>
    <p>Details: <?= $recommendation["policy_description"] ?></p>
    <p>Change Date: <?= $recommendation["change_date"] ?></p>
    <a href="./">Back to Recommendations List</a>
</body>
</html>
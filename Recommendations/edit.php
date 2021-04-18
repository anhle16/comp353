<?php require_once '../database.php';

$statement = $conn->prepare("SELECT * 
                            FROM rec353_4.public_health_recommendations 
                            AS public_health_recommendations 
                            WHERE public_health_recommendations.policy_id = :policy_id
                            AND public_health_recommendations.policy_subid = :policy_subid
                            ");
$statement->bindParam(":policy_id", $_GET["policy_id"]);
$statement->bindParam(":policy_subid", $_GET["policy_subid"]);
$statement->execute();
$policy = $statement->fetch(PDO::FETCH_ASSOC);

if (
    isset($_POST["policy_id"]) 
    && isset($_POST["policy_subid"]) 
    && isset($_POST["policy_description"])
    && isset($_POST["publish_date"])
    && isset($_POST["change_date"])
) {
    $statement = $conn->prepare("UPDATE rec353_4.public_health_recommendations 
                                SET policy_description = :policy_description,
                                    publish_date = :publish_date,
                                    change_date = :change_date
                                WHERE policy_id = :policy_id
                                AND policy_subid = :policy_subid
                                ;");

    $statement->bindParam(':policy_description', $_POST["policy_description"]);
    $statement->bindParam(':publish_date', $_POST["publish_date"]);
    $statement->bindParam(':change_date', $_POST["change_date"]);
    $statement->bindParam(':policy_id', $_POST["policy_id"]);
    $statement->bindParam(':policy_subid', $_POST["policy_subid"]);

    if ($statement->execute()){
        // echo("PASS");
        header("Location: .");
    } else {
        echo("Fail");
        header("Location: ./edit.php?policy_id=".$_POST["policy_id"]
        ."&&policy_subid=".$_POST["policy_subid"]);
        echo("Error, Please Try Again!");
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit A Recommendation</title>
</head>

<body>
    <h1>Edit A Recommendation</h1>
    <form action="./edit.php" method="post">

        <!-- <label for="Person_ID">Person_ID</label><br> -->
        <input type="hidden" name="policy_id" id="policy_id" value="<?= $policy["policy_id"] ?>"> 
        <p>Policy ID: <?=$policy["policy_id"] ?> </p>
        
        <!-- <label for="Serving_facility">Serving Facility</label><br> -->
        <input type="hidden" name="policy_subid" id="policy_subid" value="<?= $policy["policy_subid"] ?>"> 
        <p>Policy Sub-ID: <?= $policy["policy_subid"] ?></p>

        <label for="policy_description"> Policy Description </label><br>
        <input type="text" name="policy_description" id="policy_description" value="<?= $policy["policy_description"] ?>"> <br><br>
        
        <label for="publish_date">Publish Date</label><br>
        <input type="date" name="publish_date" id="publish_date" value="<?= $policy["publish_date"] ?>"> <br><br>
        
        <label for="change_date">Change Date</label><br>
        <input type="date" name="change_date" id="change_date" value="<?= $policy["change_date"] ?>"> <br><br>
        
        <button type="submit">Update</button>
    </form>
    <a href="./">Back to Recommendations list</a>
</body>

</html>
<?php require_once '../database.php';

if (
    isset($_POST["policy_id"]) 
    && isset($_POST["policy_subid"]) 
    && isset($_POST["policy_description"])
    && isset($_POST["publish_date"])
    && isset($_POST["change_date"])
) 
{
    $policy = $conn->prepare("INSERT INTO rec353_4.public_health_recommendations (policy_id, policy_subid, policy_description, publish_date, change_date) 
                            VALUES (:policy_id, :policy_subid, :policy_description, :publish_date, :change_date);
                            ");

    $policy->bindParam(':policy_id', $_POST["policy_id"]);
    $policy->bindParam(':policy_subid', $_POST["policy_subid"]);
    $policy->bindParam(':policy_description', $_POST["policy_description"]);
    $policy->bindParam(':publish_date', $_POST["publish_date"]);
    $policy->bindParam(':change_date', $_POST["change_date"]);

    if ($policy->execute())
    {
        header("Location: .");
    }else 
    {
        echo"Error: Policy ID is already present or not all fields are filled, please try again!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Recommendation</title>
</head>

<body>
    <h1>Add a Recommendation</h1>
    <form action="./create.php" method="post">
        <label for="policy_id">Policy ID</label><br>
        <input type="number" name="policy_id" id="policy_id"> <br>

        <label for="policy_subid">Policy ID</label><br>
        <input type="number" name="policy_subid" id="policy_subid"> <br>

        <label for="policy_description">policy description: </label><br>
        <input type="text" name="policy_description" id="policy_description"> <br>

        <label for="publish_date">Publish Date</label><br>
        <input type="date" name="publish_date" id="publish_date"> <br>

        <label for="change_date">Change Date</label><br>
        <input type="date" name="change_date" id="change_date"> <br>

        <button type="submit">Add</button>
    </form>
    <a href="./">Back to Recommendations list</a>
</body>

</html>
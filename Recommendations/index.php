<?php require_once '../database.php';

$statement = $conn->prepare('SELECT * 
                            FROM comp353.public_health_recommendations 
                            AS recommendations
                            ORDER BY policy_id ASC
                            ');
$statement->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommendations</title>
</head>

<body>
    <h1>List of Public health Information and Recommendations.</h1>
    <a href="./create.php">Add a Policy/Recommendation</a>
    <table>
        <thead>
            <tr>
                <td>Policy Id</td>
                <td>Policy Details</td>
                <td>Publish Date</td>
                <td>Change Date</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                <tr>
                    <td><?= $row["policy_id"]."--".$row["policy_subid"] ?></td>
                    <td><?= $row["policy_description"] ?></td>
                    <td><?= $row["publish_date"] ?></td>
                    <td><?= $row["change_date"] ?></td>
                    <td>
                        <a href="./show.php?policy_id=<?= $row["policy_id"] ?>&&policy_subid=<?= $row["policy_subid"]?>">Show</a>
                        <a href="./edit.php?policy_id=<?= $row["policy_id"] ?>&&policy_subid=<?= $row["policy_subid"]?>">Edit</a>
                        <a href="./delete.php?policy_id=<?= $row["policy_id"] ?>&&policy_subid=<?= $row["policy_subid"]?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="../">Back to homepage</a>
</body>

</html>
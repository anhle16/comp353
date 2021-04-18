<?php require_once '../database.php';

$statement = $conn->prepare('SELECT * FROM comp353.GroupZone AS GroupZone');
$statement->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Zone</title>
</head>

<body>
    <h1>List of Group Zone.</h1>
    <a href="./create.php">Add a new Group Zone</a>
    <table>
        <thead>
            <tr>
                <td>Group Zone Id</td>
                <td>Group Zone Name</td>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                <tr>
                    <td><?= $row["Zone_ID"] ?></td>
                    <td><?= $row["Group_name"] ?></td>
                    <td>
                        <a href="./show.php?Zone_ID=<?= $row["Zone_ID"] ?>">Show</a>
                        <a href="./edit.php?Zone_ID=<?= $row["Zone_ID"] ?>">Edit</a>
                        <a href="./delete.php?Zone_ID=<?= $row["Zone_ID"] ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="../">Back to homepage</a>
</body>

</html>
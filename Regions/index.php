<?php require_once '../database.php';

$statement = $conn->prepare('SELECT * 
                            FROM rec353_4.regions 
                            AS regions
                            ORDER BY id ASC
                            ');
$statement->execute();

$statement2 = $conn->prepare('SELECT * 
                                FROM rec353_4.cities, rec353_4.regions
                                WHERE region_id = :region_id 
                            ');
$statement2->bindParam(":region_id", $_GET["region_id"]);
$statement2->execute();
$s2result = $statement2->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regions</title>
</head>
<body>
    <h1>List of Regions</h1>
        <a href="./create.php">Add a Region</a>
        <table>
            <thead>
                <tr>
                    <td>Region Id</td>
                    <td>Region Name</td>
                    <td>Current Alert Level</td>
                    <!-- <td>Cities included: </td> -->
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT) ) 
                { 
                    // $row2 = $statement2->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)
                    ?>
                    <tr>
                        <td><?= $row["id"] ?></td>
                        <td><?= $row["region_name"] ?></td>
                        <td><?= $row["alert_level"] ?></td>
                        <!-- <td><?= $row2["city_name"] ?></td> -->
                        <!-- <td>1</td> -->
                        
                        <td>
                            <a href="./show.php?id=<?= $row["id"] ?>">Show</a>
                            <a href="./edit.php?id=<?= $row["id"] ?>">Edit</a>
                            <a href="./delete.php?id=<?= $row["id"] ?>">Delete</a>
                        </td>
                    </tr>
                <?php 
                } ?>
            </tbody>
        </table>
        <a href="../">Back to Homepage</a>
</body>
</html>
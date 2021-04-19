<?php require_once '../database.php';

$statement = $conn->prepare('SELECT * FROM rec353_4.publichealthworker AS Worker');
$statement->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>List of Public Health Workers.</h1>
    <a href="./create.php">Add a new Public Health Worker</a>
    <table>
        <thead>
            <tr>
                <td>Person ID</td>
                <td>Serving Facility</td>
                <td>Positionn</td>
                <td>Join Date</td>
                <td>Leave Date</td>
                <!-- <td>Work Schedule</td> -->
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                <tr>
                    <td><?= $row["Person_ID"] ?></td>
                    <td><?= $row["Serving_facility"] ?></td>
                    <td><?= $row["Position"] ?></td>
                    <td><?= $row["Joining_Date"] ?></td>
                    <td><?= $row["Leaving_Date"] ?></td>
                    <!-- <td><?= $row["working_schedule"] ?></td> -->
                    <td>
                        <a href="./show.php?Person_ID=<?= $row["Person_ID"] ?>&&Serving_facility=<?= $row["Serving_facility"]?>&&Joining_Date=<?= $row["Joining_Date"]?>">Show</a>
                        <a href="./edit.php?Person_ID=<?= $row["Person_ID"] ?>&&Serving_facility=<?= $row["Serving_facility"]?>&&Joining_Date=<?= $row["Joining_Date"]?>">Edit</a>
                        <a href="./delete.php?Person_ID=<?= $row["Person_ID"] ?>&&Serving_facility=<?= $row["Serving_facility"]?>&&Joining_Date=<?= $row["Joining_Date"]?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="../">Back to homepage</a>
</body>

</html>
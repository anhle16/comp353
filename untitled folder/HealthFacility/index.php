<?php require_once '../database.php';

$statement = $conn->prepare('SELECT * FROM comp353.HealthFacility AS HealthFacility');
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
    <h1>List of Health Facilities.</h1>
    <a href="./create.php">Add a new Health Facility</a>
    <table>
        <thead>
            <tr>
                <td>Facility ID</td>
                <td>Name</td>
                <td>Address</td>
                <td>Phone</td>
                <td>Website Address</td>
                <td>Type</td>
                <td>Drive-thru or not:</td>
                <td>Appointment Type:</td>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                <tr>
                    <td><?= $row["Facility_ID"] ?></td>
                    <td><?= $row["facility_Name"] ?></td>
                    <td><?= $row["facility_Address"] ?></td>
                    <td><?= $row["facility_Phone"] ?></td>
                    <td><?= $row["facility_Web_Address"] ?></td>
                    <td><?= $row["facility_Type"] ?></td>
                    <td><?= $row["facility_drivethru"] ?></td>
                    <td><?= $row["facility_appointment_type"] ?></td>
                    <td>
                        <a href="./show.php?Facility_ID=<?= $row["Facility_ID"] ?>">Show</a>
                        <a href="./edit.php?Facility_ID=<?= $row["Facility_ID"] ?>">Edit</a>
                        <a href="./delete.php?Facility_ID=<?= $row["Facility_ID"] ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="../">Back to homepage</a>
</body>

</html>
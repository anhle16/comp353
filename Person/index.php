<?php require_once '../database.php';

$statement = $conn->prepare('SELECT * FROM rec353_4.person AS person');
$statement->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person List</title>
</head>

<body>
    <h1>List of people.</h1>
    <a href="./create.php">Add a new Person</a>
    <table>
        <thead>
            <tr>
                <td>Id</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Date of Birth</td>
                <td>Medicare Number</td>
                <td>Telephone Number</td>
                <td>Address</td>
                <td>City</td>
                <td>Province</td>
                <td>Postal Code</td>
                <td>Citizenship</td>
                <td>Email Address</td>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                <tr>
                    <td><?= $row["Person_ID"] ?></td>
                    <td><?= $row["first_name"] ?></td>
                    <td><?= $row["last_name"] ?></td>
                    <td><?= $row["date_of_birth"] ?></td>
                    <td><?= $row["medicare_number"] ?></td>
                    <td><?= $row["telephone_number"] ?></td>
                    <td><?= $row["physical_address"] ?></td>
                    <td><?= $row["city"] ?></td>
                    <td><?= $row["province"] ?></td>
                    <td><?= $row["postal_code"] ?></td>
                    <td><?= $row["citizenship"] ?></td>
                    <td><?= $row["email_address"] ?></td>
                    <td>
                        <a href="./show.php?Person_ID=<?= $row["Person_ID"] ?>">Show</a>
                        <a href="./edit.php?Person_ID=<?= $row["Person_ID"] ?>">Edit</a>
                        <a href="./delete.php?Person_ID=<?= $row["Person_ID"] ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="../">Back to homepage</a>
</body>

</html>
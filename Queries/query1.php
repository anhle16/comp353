<?php require_once '../database.php';

$statement = $conn->prepare("SELECT first_name, last_name, date_of_birth, email_address, telephone_number, city 
                                FROM rec353_4.person,rec353_4.Person_zone_junction 
                                WHERE person.Person_ID = Person_zone_junction.Person_ID 
                                AND Person_zone_junction.Zone_ID = (SELECT Zone_ID 
									                                From rec353_4.GroupZone 
									                                WHERE Group_name = 'MontrealPrimaryGrade1_Group_1');");
$statement->bindParam(":Person_ID", $_GET["Person_ID"]);
$statement->bindParam(":Zone_ID", $_GET["Zone_ID"]);
$statement->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $result["Person_ID"] ?></title>
</head>
<body>
    <h1><?= "Query 1 Result" ?></h1>
    <table>
        <thead>
            <tr>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Date of Birth</td>
                <td>Telephone Number</td>
                <td>City</td>
                <td>Email Address</td>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { ?>
                <tr>
                    <td><?= $row["first_name"] ?></td>
                    <td><?= $row["last_name"] ?></td>
                    <td><?= $row["date_of_birth"] ?></td>
                    <td><?= $row["telephone_number"] ?></td>
                    <td><?= $row["city"] ?></td>
                    <td><?= $row["email_address"] ?></td>
                </tr>
            <?php } ?>
        </body>
    </table>
    <a href="./">Back to Queries List</a>
</html>
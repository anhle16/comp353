<?php require_once '../database.php';

$statement = $conn->prepare("SELECT * FROM comp353.Person AS Person WHERE Person.Person_ID = :Person_ID");
$statement->bindParam(":Person_ID", $_GET["Person_ID"]);
$statement->execute();
$person = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $person["Person_ID"] ?></title>
</head>
<body>
    <h1>Person ID: <?= $person["Person_ID"] ?></h1>
    <p>First Name: <?= $person["first_name"] ?></p>
    <p>Last Name: <?= $person["last_name"] ?></p>
    <p>Date of Birth: <?= $person["date_of_birth"] ?></p>
    <p>Medicare Number: <?= $person["medicare_number"] ?></p>
    <p>Telephone Number: <?= $person["telephone_number"] ?></p>
    <p>Address: <?= $person["physical_address"] ?></p>
    <p>City: <?= $person["city"] ?></p>
    <p>Province: <?= $person["province"] ?></p>
    <p>Postal Code: <?= $person["postal_code"] ?></p>
    <p>Citizenship: <?= $person["citizenship"] ?></p>
    <p>Email Address: <?= $person["email_address"] ?></p>

    <a href="./">Back to Person List</a>
</body>
</html>
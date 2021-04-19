<?php require_once '../database.php';

$statement = $conn->prepare("SELECT * FROM rec353_4.person 
                            AS person 
                            WHERE person.Person_ID = :Person_ID
                            ");
$statement->bindParam(":Person_ID", $_GET["Person_ID"]);
$statement->execute();
$person = $statement->fetch(PDO::FETCH_ASSOC);

if (
    isset($_POST["first_name"]) 
    && isset($_POST["last_name"])
    && isset($_POST["date_of_birth"])
    && isset($_POST["medicare_number"])
    && isset($_POST["telephone_number"])
    && isset($_POST["physical_address"])
    && isset($_POST["city"])
    && isset($_POST["province"])
    && isset($_POST["postal_code"])
    && isset($_POST["citizenship"])
    && isset($_POST["email_address"])
    && isset($_POST["Person_ID"])
){
    $statement = $conn->prepare("UPDATE rec353_4.person 
                                SET first_name = :first_name,
                                    last_name = :last_name,
                                    date_of_birth = :date_of_birth,
                                    medicare_number = :medicare_number,
                                    telephone_number = :telephone_number,
                                    physical_address = :physical_address,
                                    city = :city,
                                    province = :province,
                                    postal_code = :postal_code,
                                    citizenship = :citizenship,
                                    email_address = :email_address
                                WHERE Person_ID = :Person_ID;");

    $statement->bindParam(':first_name', $_POST["first_name"]);
    $statement->bindParam(':last_name', $_POST["last_name"]);
    $statement->bindParam(':date_of_birth', $_POST["date_of_birth"]);
    $statement->bindParam(':medicare_number', $_POST["medicare_number"]);
    $statement->bindParam(':telephone_number', $_POST["telephone_number"]);
    $statement->bindParam(':physical_address', $_POST["physical_address"]);
    $statement->bindParam(':city', $_POST["city"]);
    $statement->bindParam(':province', $_POST["province"]);
    $statement->bindParam(':postal_code', $_POST["postal_code"]);
    $statement->bindParam(':citizenship', $_POST["citizenship"]);
    $statement->bindParam(':email_address', $_POST["email_address"]);
    $statement->bindParam(':Person_ID', $_POST["Person_ID"]);

    if ($statement->execute()){
        header("Location: .");
    } else {
        header("Location: ./edit.php?Person_ID=".$_POST["Person_ID"]);
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Person</title>
</head>

<body>
    <h1>Edit Person</h1>
    <form action="./edit.php" method="post">

        <label for="first_name">First Name</label><br>
        <input type="text" name="first_name" id="first_name" value="<?= $person["first_name"] ?>"> <br>

        <label for="last_name">Last Name</label><br>
        <input type="text" name="last_name" id="last_name" value="<?= $person["last_name"] ?>"> <br>
        
        <label for="date_of_birth">Date of Birth</label><br>
        <input type="date" name="date_of_birth" id="date_of_birth"value="<?= $person["date_of_birth"] ?>"> <br>
        
        <label for="medicare_number">Medical Number</label><br>
        <input type="text" name="medicare_number" id="medicare_number" value="<?= $person["medicare_number"] ?>"> <br>
        
        <label for="telephone_number">Telephone Number</label><br>
        <input type="text" name="telephone_number" id="telephone_number" value="<?= $person["telephone_number"] ?>"> <br>
        
        <label for="physical_address">Address</label><br>
        <input type="text" name="physical_address" id="physical_address" value="<?= $person["physical_address"] ?>"> <br>
        
        <label for="city">City</label><br>
        <input type="text" name="city" id="city" value="<?= $person["city"] ?>"> <br>
        
        <label for="province">Province</label><br>
        <input type="text" name="province" id="province" value="<?= $person["province"] ?>"> <br>
        
        <label for="postal_code">Postal Code</label><br>
        <input type="text" name="postal_code" id="postal_code" value="<?= $person["postal_code"] ?>"> <br>
        
        <label for="citizenship">Citizenship</label><br>
        <input type="text" name="citizenship" id="citizenship" value="<?= $person["citizenship"] ?>"> <br>
        
        <label for="email_address">Email Address</label><br>
        <input type="text" name="email_address" id="email_address" value="<?= $person["email_address"] ?>"> <br>

        <input type="hidden" name="Person_ID" id="Person_ID" value="<?= $person["Person_ID"] ?>"> <br>

        <button type="submit">Update</button>
    </form>
    <a href="./">Back to Person list</a>
</body>

</html>
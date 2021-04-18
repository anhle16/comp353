<?php require_once '../database.php';

$statement = $conn->prepare("SELECT * 
                            FROM rec353_4.Person 
                            AS Person 
                            WHERE Person.Person_ID = :Person_ID
                            AND Person.medicare_number =:medicare_number
                            ");
$statement->bindParam(":Person_ID", $_GET["Person_ID"]);
$statement->bindParam(":medicare_number", $_GET["medicare_number"]);
$statement->execute();
$person = $statement->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>  
<body>  
    <h1> User Login Page</h1>
    <form>
        <div class="container"> 
            <label>Username : </label> 
            <input type="text" placeholder="Enter Username" name="Person_ID" id="Person_ID" required> <br>
            <label>Password : </label> 
            <input type="password" placeholder="Enter Password" name="medicare_number" id="medicare_number" required>  <br>
            <button type="submit">Login</button> 
            <p>Medicare Number: <?= $person["medicare_number"] ?></p>
            <p>Citizenship: <?= $person["citizenship"] ?></p>
    </form>   
</body>   
</html>

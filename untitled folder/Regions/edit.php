<?php require_once '../database.php';

$statement = $conn->prepare("SELECT *
                            FROM comp353.regions 
                            AS regions 
                            WHERE regions.id = :id 
                            ");
$statement->bindParam(":id", $_GET["id"]);
$statement->execute();
$worker = $statement->fetch(PDO::FETCH_ASSOC);

if ( 
    isset($_POST["region_name"])
    && isset($_POST["alert_level"])
){
    $statement = $conn->prepare("UPDATE comp353.regions 
                                SET region_name = :region_name,
                                    alert_level = :alert_level
                                WHERE id = :id
                                ;");

    $statement->bindParam(':region_name', $_POST["region_name"]);
    $statement->bindParam(':alert_level', $_POST["alert_level"]);
    $statement->bindParam(':id', $_POST["id"]);
    
    if ($statement->execute()){
        // echo("SUCCESS");
        header("Location: .");
    } else {
        header("Location: ./edit.php?id=".$_POST["id"]);
        echo("Error, Please Try Again!");
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Region</title>
</head>

<body>
    <h1>Edit Region</h1>
    <form action="./edit.php" method="post">
        
        <!-- <label for="Person_ID">Person_ID</label><br> -->
        <input type="hidden" name="id" id="id" value="<?= $worker["id"] ?>"> 
        <p>Region ID: <?=$worker["id"] ?> </p>

        <label for="region_name"> Region Name</label><br>
        <input type="text" name="region_name" id="region_name" value="<?= $worker["region_name"] ?>"> <br><br>
        
        <label for="alert_level">Current Alert Level</label><br>
        <input type="number" name="alert_level" id="alert_level" value="<?= $worker["alert_level"] ?>"> <br><br>
        
        <button type="submit">Update</button>
    </form>
    <a href="./">Back to Region list</a>
</body>

</html>
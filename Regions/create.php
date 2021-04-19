<?php require_once '../database.php';

if (
    isset($_POST["id"]) 
    && isset($_POST["region_name"]) 
    && isset($_POST["alert_level"])
    // && isset($_POST["working_schedule"])
    )
{
    $region = $conn->prepare("INSERT INTO rec353_4.regions (id, region_name, alert_level)
                                    VALUES (:id, :region_name, 
                                                            :alert_level);");


    $region->bindParam(':id', $_POST["id"]);
    $region->bindParam(':region_name', $_POST["region_name"]);
    $region->bindParam(':alert_level', $_POST["alert_level"]);
    // $worker->bindParam(':working_schedule', $_POST["working_schedule"]);

    if ($region->execute()){
        header("Location: .");
    }else {
            echo"Error!";
        }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Region</title>
</head>

<body>
    <h1>Add a Region</h1>
    <form action="./create.php" method="post">
        
        <label for="id">Region ID</label><br>
        <input type="number" name="id" id="id"> <br>

        <label for="region_name">Region Name</label><br>
        <input type="text" name="region_name" id="region_name"> <br>

        <label for="alert_level">Current Alert Level </label><br>
        <input type="number" name="alert_level" id="alert_level"> <br>

        <!-- <label for="working_schedule">Working Shedule</label><br>
        <input type="text" name="working_schedule" id="working_schedule"> <br> -->

        <button type="submit">Add</button>
    </form>
    <a href="./">Back to Region list</a>
</body>

</html>
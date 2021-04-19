<?php require_once '../database.php';

$statement = $conn->prepare("SELECT *
                            FROM rec353_4.publichealthworker 
                            AS publichealthworker 
                            WHERE publichealthworker.Person_ID = :Person_ID 
                            and publichealthworker.Serving_facility = :Serving_facility
                            and publichealthworker.Joining_Date = :Joining_Date
                            ");
$statement->bindParam(":Person_ID", $_GET["Person_ID"]);
$statement->bindParam(":Serving_facility", $_GET["Serving_facility"]);
$statement->bindParam(":Joining_Date", $_GET["Joining_Date"]);
$statement->execute();
$worker = $statement->fetch(PDO::FETCH_ASSOC);

if ( 
    isset($_POST["Position"])
    && isset($_POST["Leaving_Date"])
    // && isset($_POST["working_schedule"])
    && isset($_POST["Person_ID"])
    && isset($_POST["Serving_facility"])
    && isset($_POST["Joining_Date"])
){
    $statement = $conn->prepare("UPDATE rec353_4.publichealthworker 
                                SET Position = :Position,
                                    Leaving_Date = :Leaving_Date,
                                    -- working_schedule = :working_schedule
                                WHERE Person_ID = :Person_ID
                                AND Serving_facility = :Serving_facility
                                AND Joining_Date = :Joining_Date
                                ;");

    $statement->bindParam(':Position', $_POST["Position"]);
    $statement->bindParam(':Leaving_Date', $_POST["Leaving_Date"]);
    // $statement->bindParam(':working_schedule', $_POST["working_schedule"]);
    $statement->bindParam(':Person_ID', $_POST["Person_ID"]);
    $statement->bindParam(':Serving_facility', $_POST["Serving_facility"]);
    $statement->bindParam(':Joining_Date', $_POST["Joining_Date"]);
    
    if ($statement->execute()){
        // echo("SUCCESS");
        header("Location: .");
    } else {
        header("Location: ./edit.php?Person_ID=".$_POST["Person_ID"]
        ."&&Serving_facility=".$_POST["Serving_facility"]."&&Joining_Date=".$_POST["Joining_Date"]);
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
    <title>Edit Public Health Worker</title>
</head>

<body>
    <h1>Edit Pubblic Health Worker</h1>
    <form action="./edit.php" method="post">
        
        <!-- <label for="Person_ID">Person_ID</label><br> -->
        <input type="hidden" name="Person_ID" id="Person_ID" value="<?= $worker["Person_ID"] ?>"> 
        <p>Person ID: <?=$worker["Person_ID"] ?> </p>
        
        <!-- <label for="Serving_facility">Serving Facility</label><br> -->
        <input type="hidden" name="Serving_facility" id="Serving_facility" value="<?= $worker["Serving_facility"] ?>"> 
        <p>Facility ID: <?= $worker["Serving_facility"] ?></p>

        <!-- <label for="Joining_Date">Joining Date</label><br> -->
        <input type="hidden" name="Joining_Date" id="Joining_Date" value="<?= $worker["Joining_Date"] ?>"> 
        <p>Joining Date: <?= $worker["Joining_Date"] ?></p>

        <label for="Position"> Working Position</label><br>
        <input type="text" name="Position" id="Position" value="<?= $worker["Position"] ?>"> <br><br>
        
        <label for="Leaving_Date">Leaving Date</label><br>
        <input type="date" name="Leaving_Date" id="Leaving_Date" value="<?= $worker["Leaving_Date"] ?>"> <br><br>
        
        <!-- <label for="working_schedule">Working Schedule</label><br>
        <input type="text" name="working_schedule" id="working_schedule" value="<?= $worker["working_schedule"] ?>"> <br><br> -->

        <button type="submit">Update</button>
    </form>
    <a href="./">Back to Worker list</a>
</body>

</html>
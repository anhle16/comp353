<?php require_once '../database.php';

if (
    isset($_POST["Person_ID"]) 
    && isset($_POST["Serving_facility"]) 
    && isset($_POST["Position"])
    && isset($_POST["Joining_Date"])
    && isset($_POST["Leaving_Date"])
    // && isset($_POST["working_schedule"])
    )
{
    $worker = $conn->prepare("INSERT INTO rec353_4.publichealthworker (Person_ID, Serving_facility, Position, 
                                                            Joining_Date, Leaving_Date)
                                    VALUES (:Person_ID, :Serving_facility, :Position, 
                                                            :Joining_Date, :Leaving_Date);");


    $worker->bindParam(':Person_ID', $_POST["Person_ID"]);
    $worker->bindParam(':Serving_facility', $_POST["Serving_facility"]);
    $worker->bindParam(':Position', $_POST["Position"]);
    $worker->bindParam(':Joining_Date', $_POST["Joining_Date"]);
    $worker->bindParam(':Leaving_Date', $_POST["Leaving_Date"]);
    // $worker->bindParam(':working_schedule', $_POST["working_schedule"]);

    if ($worker->execute()){
        header("Location: .");
    }else {
            echo"Error: Person ID is already present or not all fields are filled or keys mismatch present, please try again!";
        }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Public Heath Worker</title>
</head>

<body>
    <h1>Add Public Heath Worker</h1>
    <form action="./create.php" method="post">
        <label for="Person_ID">Person ID</label><br>
        <input type="text" name="Person_ID" id="Person_ID"> <br>

        <label for="Serving_facility">Facility serving</label><br>
        <input type="number" name="Serving_facility" id="Serving_facility"> <br>

        <label for="Position">Position </label><br>
        <input type="text" name="Position" id="Position"> <br>

        <label for="Joining_Date">Join Date</label><br>
        <input type="date" name="Joining_Date" id="Joining_Date"> <br>

        <label for="Leaving_Date">Leave Date</label><br>
        <input type="date" name="Leaving_Date" id="Leaving_Date"> <br>

        <!-- <label for="working_schedule">Working Shedule</label><br>
        <input type="text" name="working_schedule" id="working_schedule"> <br> -->

        <button type="submit">Add</button>
    </form>
    <a href="./">Back to worker list</a>
</body>

</html>
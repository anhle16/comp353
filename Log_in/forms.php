<?php require_once '../database.php';

if (
    isset($_POST["Person_ID"]) 
    && isset($_POST["fill_up_date"]) 
    && isset($_POST["fill_up_time"])
    && isset($_POST["fever"])
    && isset($_POST["cough"])
    && isset($_POST["short_of_breath"])
    && isset($_POST["loss_of_taste_smell"])
    && isset($_POST["nausea"])
    && isset($_POST["stomach_aches"])
    && isset($_POST["vomiting"])
    && isset($_POST["headache"])
    && isset($_POST["muscle_pain"])
    && isset($_POST["diarrhea"])
    && isset($_POST["sore_throat"])
    && isset($_POST["other_symptoms"])
    )
{
    $symptoms = $conn->prepare("INSERT INTO comp353.healthcare_form (Person_ID, fill_up_date, fill_up_time, 
                                                            fever, cough, short_of_breath, 
                                                            loss_of_taste_smell, nausea, stomach_aches,
                                                            vomiting, headache, muscle_pain, 
                                                            diarrhea, sore_throat,other_symptoms)
                                    VALUES (:Person_ID, :fill_up_date, :fill_up_time, 
                                                            :fever, :cough, :short_of_breath, 
                                                            :loss_of_taste_smell, :nausea, :stomach_aches,
                                                            :vomiting, :headache, :muscle_pain, 
                                                            :diarrhea, :sore_throat, :other_symptoms);");

    // $check = $conn->prepare("SELECT * FROM comp353.Person AS person WHERE person.Person_ID = :Person_ID");
    // $check->bindParam(":Person_ID", $_GET["Person_ID"]);
    // $result = $check->execute();
    // $numRows = $check->num_rows;
    // echo ($numRows);
    // if($numRows >= 1)
    // {
    //     echo 'alert("ID already exists")';
    // }

    $symptoms->bindParam(':Person_ID', $_POST["Person_ID"]);
    $symptoms->bindParam(':fill_up_date', $_POST["fill_up_date"]);
    $symptoms->bindParam(':fill_up_time', $_POST["fill_up_time"]);
    $symptoms->bindParam(':fever', $_POST["fever"]);
    $symptoms->bindParam(':cough', $_POST["cough"]);
    $symptoms->bindParam(':short_of_breath', $_POST["short_of_breath"]);
    $symptoms->bindParam(':loss_of_taste_smell', $_POST["loss_of_taste_smell"]);
    $symptoms->bindParam(':nausea', $_POST["nausea"]);
    $symptoms->bindParam(':stomach_aches', $_POST["stomach_aches"]);
    $symptoms->bindParam(':vomiting', $_POST["vomiting"]);
    $symptoms->bindParam(':headache', $_POST["headache"]);
    $symptoms->bindParam(':muscle_pain', $_POST["muscle_pain"]);
    $symptoms->bindParam(':diarrhea', $_POST["diarrhea"]);
    $symptoms->bindParam(':sore_throat', $_POST["sore_throat"]);
    $symptoms->bindParam(':other_symptoms', $_POST["other_symptoms"]);
 
    if ($symptoms->execute())
    {
        header("Location: .");
    } else {
        echo"Error: Person ID is already present or not all fields are filled, please try again!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Your Symptoms</title>
</head>

<body>
    <h1>Add Your Symptoms</h1>
    <form action="./create.php" method="post">
        <label for="Person_ID">Person ID</label><br>
        <input type="text" name="Person_ID" id="Person_ID"> <br>
        <label for="first_name">First Name</label><br>
        <input type="text" name="first_name" id="first_name"> <br>
        <label for="last_name">Last Name</label><br>
        <input type="text" name="last_name" id="last_name"> <br>
        <label for="date_of_birth">Date of Birth</label><br>
        <input type="date" name="date_of_birth" id="date_of_birth"> <br>
        <label for="medicare_number">Medical Number</label><br>
        <input type="text" name="medicare_number" id="medicare_number"> <br>
        <label for="telephone_number">Telephone Number</label><br>
        <input type="text" name="telephone_number" id="telephone_number"> <br>
        <label for="physical_address">Address</label><br>
        <input type="text" name="physical_address" id="physical_address"> <br>
        <label for="city">City</label><br>
        <input type="text" name="city" id="city"> <br>
        <label for="province">Province</label><br>
        <input type="text" name="province" id="province"> <br>
        <label for="postal_code">Postal Code</label><br>
        <input type="text" name="postal_code" id="postal_code"> <br>
        <label for="citizenship">Citizenship</label><br>
        <input type="text" name="citizenship" id="citizenship"> <br>
        <label for="email_address">Email Address</label><br>
        <input type="text" name="email_address" id="email_address"> <br>
        <button type="submit">Add</button>
    </form>
    <a href="./">Back to Person list</a>
</body>

</html>
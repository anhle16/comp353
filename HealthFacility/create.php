<?php require_once '../database.php';

if (
    isset($_POST["Facility_ID"]) 
    && isset($_POST["facility_Name"]) 
    && isset($_POST["facility_Address"])
    && isset($_POST["facility_Phone"])
    && isset($_POST["facility_Web_Address"])
    && isset($_POST["facility_Type"])
    && isset($_POST["facility_drivethru"])
    && isset($_POST["facility_appointment_type"]))
{
    $facility = $conn->prepare("INSERT INTO rec353_4.HealthFacility (Facility_ID, 
                                                                    facility_Name, 
                                                                    facility_Address, 
                                                                    facility_Phone, 
                                                                    facility_Web_Address, 
                                                                    facility_Type,
                                                                    facility_drivethru,
                                                                    facility_appointment_type)
                                VALUES (:Facility_ID, 
                                        :facility_Name, 
                                        :facility_Address, 
                                        :facility_Phone, 
                                        :facility_Web_Address, 
                                        :facility_Type,
                                        :facility_drivethru,
                                        :facility_appointment_type);");

    $facility->bindParam(':Facility_ID', $_POST["Facility_ID"]);
    $facility->bindParam(':facility_Name', $_POST["facility_Name"]);
    $facility->bindParam(':facility_Address', $_POST["facility_Address"]);
    $facility->bindParam(':facility_Phone', $_POST["facility_Phone"]);
    $facility->bindParam(':facility_Web_Address', $_POST["facility_Web_Address"]);
    $facility->bindParam(':facility_Type', $_POST["facility_Type"]);
    $facility->bindParam(':facility_drivethru', $_POST["facility_drivethru"]);
    $facility->bindParam(':facility_appointment_type', $_POST["facility_appointment_type"]);

    if ($facility->execute()){
        header("Location: .");
    } else {
        echo"Error";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Facility</title>
</head>

<body>
    <h1>Add Facility</h1>
    <form action="./create.php" method="post">

        <label for="Facility_ID">Facility ID</label><br>
        <input type="text" name="Facility_ID" id="Facility_ID"> <br>

        <label for="facility_Name">Facility Name</label><br>
        <input type="text" name="facility_Name" id="facility_Name"> <br>

        <label for="facility_Address">Address </label><br>
        <input type="text" name="facility_Address" id="facility_Address"> <br>

        <label for="facility_Phone">Phone</label><br>
        <input type="text" name="facility_Phone" id="facility_Phone"> <br>
        
        <label for="facility_Web_Address">Website </label><br>
        <input type="text" name="facility_Web_Address" id="facility_Web_Address"> <br>
        
        <label for="facility_Type">Type</label><br>
        <input type="text" name="facility_Type" id="facility_Type"> <br>

        <label for="facility_drivethru"> Have Drive (Yes/No) </label><br>
        <!-- <input type="text" name="facility_drivethru" id="facility_drivethru"> <br> -->

        <select name = "facility_drivethru" id="facility_drivethru">
            <!-- <option value = <?= $city["city_id"] ?>> <?= $city["city_id"] ?> <br> </option> -->
            <option value = "Y"> Yes </option>
            <option value = "N"> No <br></option>
            </select> <br>

        <label for="facility_appointment_type"> Appointment Type : Walkin, Appointment or Both </label><br>
        <select name = "facility_appointment_type" id="facility_appointment_type">
            <!-- <option value = <?= $city["city_id"] ?>> <?= $city["city_id"] ?> <br> </option> -->
            <option value = "Walkin"> Walkin </option>
            <option value = "Appointment Only"> Appointment Only <br></option>
            <option value = "Both"> Both <br></option>
            </select><br><br>

        <!-- <input type="text" name="facility_appointment_type" id="facility_appointment_type"> <br> -->
        
        <button type="submit">Add</button>
    </form>
    <a href="./">Back to Facility list</a>
</body>

</html>
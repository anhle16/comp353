<?php require_once '../database.php';

$statement = $conn->prepare("SELECT * FROM comp353.HealthFacility AS facility WHERE facility.Facility_ID = :Facility_ID");
$statement->bindParam(":Facility_ID", $_GET["Facility_ID"]);
$statement->execute();
$facility = $statement->fetch(PDO::FETCH_ASSOC);

if (
    isset($_POST["facility_Name"])
    && isset($_POST["facility_Address"])
    && isset($_POST["facility_Phone"])
    && isset($_POST["facility_Web_Address"])
    && isset($_POST["facility_Type"])
    && isset($_POST["Facility_ID"])
    && isset($_POST["facility_drivethru"])
    && isset($_POST["facility_appointment_type"])
) {
    $statement = $conn->prepare("UPDATE comp353.HealthFacility 
                                SET facility_Name = :facility_Name,
                                    facility_Address = :facility_Address,
                                    facility_Phone = :facility_Phone,
                                    facility_Web_Address = :facility_Web_Address,
                                    facility_Type = :facility_Type,
                                    facility_drivethru = :facility_drivethru,
                                    facility_appointment_type = :facility_appointment_type
                                WHERE Facility_ID = :Facility_ID;");

    $statement->bindParam(':facility_Name', $_POST["facility_Name"]);
    $statement->bindParam(':facility_Address', $_POST["facility_Address"]);
    $statement->bindParam(':facility_Phone', $_POST["facility_Phone"]);
    $statement->bindParam(':facility_Web_Address', $_POST["facility_Web_Address"]);
    $statement->bindParam(':facility_Type', $_POST["facility_Type"]);
    $statement->bindParam(':Facility_ID', $_POST["Facility_ID"]);
    $statement->bindParam(':facility_Type', $_POST["facility_Type"]);
    $statement->bindParam(':Facility_ID', $_POST["Facility_ID"]);
    $statement->bindParam(':facility_drivethru', $_POST["facility_drivethru"]);
    $statement->bindParam(':facility_appointment_type', $_POST["facility_appointment_type"]);

    if ($statement->execute()){
        header("Location: .");
    } else {
        header("Location: ./edit.php?Facility_ID=".$_POST["Facility_ID"]);
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Facility</title>
</head>

<body>
    <h1>Edit Facility</h1>
    <form action="./edit.php" method="post">
    
        <label for="facility_Name">Facility Name</label><br>
        <input type="text" name="facility_Name" id="facility_Name" value="<?= $facility["facility_Name"] ?>"> <br>
        
        <label for="facility_Address">Facility Address</label><br>
        <input type="text" name="facility_Address" id="facility_Address" value="<?= $facility["facility_Address"] ?>"> <br>
        
        <label for="facility_Phone">Facility Phone</label><br>
        <input type="text" name="facility_Phone" id="facility_Phone" value="<?= $facility["facility_Phone"] ?>"> <br>
        
        <label for="facility_Web_Address">Website</label><br>
        <input type="text" name="facility_Web_Address" id="facility_Web_Address" value="<?= $facility["facility_Web_Address"] ?>"> <br>
        
        <label for="facility_Type">Facility Type</label><br>
        <input type="text" name="facility_Type" id="facility_Type" value="<?= $facility["facility_Type"] ?>"> <br>
        
        <label for="facility_drivethru">Facility drivethru (Yes/No): </label><br>
        <!-- <input type="text" name="facility_drivethru" id="facility_drivethru" value="<?= $facility["facility_drivethru"] ?>"> <br> -->
        <select name = "facility_drivethru" id="facility_drivethru">
            <option value = "Y"> Yes <br></option>
            <option value = "N"> No <br></option>
            </select><br>

        <label for="facility_appointment_type">Choose appointment type: <br> </label>
        <select name = "facility_appointment_type" id="facility_appointment_type">
            <option value = "Walkin"> Walkin </option>
            <option value = "Appointment"> Appointment <br></option>
            <option value = "Both"> Both <br></option>
            </select><br>

        <input type="hidden" name="Facility_ID" id="Facility_ID" value="<?= $facility["Facility_ID"] ?>"> <br>

        <button type="submit">Update</button>
    </form>
    <a href="./">Back to Facilities list</a>
</body>

</html>
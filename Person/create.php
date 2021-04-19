<?php require_once '../database.php';

$statement = $conn->prepare("SELECT city_id FROM rec353_4.cities 
                             ");
$statement->bindParam(":city_id", $_GET["city_id"]);
$statement->execute();
$city = $statement->fetch(PDO::FETCH_ASSOC);

if (
    isset($_POST["Person_ID"]) 
    && isset($_POST["first_name"]) 
    && isset($_POST["last_name"])
    && isset($_POST["date_of_birth"])
    && isset($_POST["medicare_number"])
    && isset($_POST["telephone_number"])
    && isset($_POST["physical_address"])
    && isset($_POST["city"])
    && isset($_POST["province"])
    && isset($_POST["postal_code"])
    && isset($_POST["citizenship"])
    && isset($_POST["email_address"]))
{
    $person = $conn->prepare("INSERT INTO rec353_4.person (person_ID, first_name, last_name, 
                                                            date_of_birth, medicare_number, telephone_number, physical_address, city,
                                                            province, postal_code, citizenship, email_address)
                                    VALUES (:Person_ID, :first_name, :last_name, 
                                                            :date_of_birth, :medicare_number, :telephone_number, :physical_address, :city,
                                                            :province, :postal_code, :citizenship, :email_address);");

    // $check = $conn->prepare("SELECT * FROM comp353.Person AS person WHERE person.Person_ID = :Person_ID");
    // $check->bindParam(":Person_ID", $_GET["Person_ID"]);
    // $result = $check->execute();
    // $numRows = $check->num_rows;
    // echo ($numRows);
    // if($numRows >= 1)
    // {
    //     echo 'alert("ID already exists")';
    // }

    $person->bindParam(':Person_ID', $_POST["Person_ID"]);
    $person->bindParam(':first_name', $_POST["first_name"]);
    $person->bindParam(':last_name', $_POST["last_name"]);
    $person->bindParam(':date_of_birth', $_POST["date_of_birth"]);
    $person->bindParam(':medicare_number', $_POST["medicare_number"]);
    $person->bindParam(':telephone_number', $_POST["telephone_number"]);
    $person->bindParam(':physical_address', $_POST["physical_address"]);
    $person->bindParam(':city', $_POST["city"]);
    $person->bindParam(':province', $_POST["province"]);
    $person->bindParam(':postal_code', $_POST["postal_code"]);
    $person->bindParam(':citizenship', $_POST["citizenship"]);
    $person->bindParam(':email_address', $_POST["email_address"]);


    if ($person->execute())
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
    <title>Add Person</title>
</head>

<body>
    <h1>Add Person</h1>
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

        <!-- <label for="city">City</label><br> -->
        <!-- <input type="text" name="city" id="city"> <br><br> -->
        <!-- <select name = 'TEST' > -->
        <!-- <br><br><br><br> -->
        <label for="city">Choose a city:  </label>
        <select name = "city" id="city_id">
            <!-- <option value = <?= $city["city_id"] ?>> <?= $city["city_id"] ?> <br> </option> -->
            <option value = "1"> 1</option>
            <option value = "2"> 2 <br></option>
            <option value = "3"> 3 <br></option>
            <option value = "4"> 4 <br></option>
            <option value = "5"> 5 <br></option>
            <option value = "6"> 6 <br></option>
            <option value = "7"> 7 <br></option>
            <option value = "8"> 8 <br></option>
            <option value = "9"> 9 <br></option>
            <option value = "10"> 10 <br></option>
            </select>
            <!-- <input type="submit" value="Submit"> -->
            <!-- <br><br><br><br> -->
        <label for="province">Province</label><br>
        <input type="text" name="province" id="province"> <br>
        <label for="postal_code">Postal Code</label><br>
        <input type="text" name="postal_code" id="postal_code"> <br>
        <label for="citizenship">Citizenship</label><br>
        <input type="text" name="citizenship" id="citizenship"> <br>
        <label for="email_address">Email Address</label><br>
        <input type="text" name="email_address" id="email_address"> <br><br>
        <button type="submit">Add</button> <br>
    </form>
    <br><a href="./">Back to Person list</a>
</body>

</html>
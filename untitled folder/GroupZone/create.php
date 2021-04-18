<?php require_once '../database.php';

$statement = $conn->prepare("SELECT Zone_ID FROM comp353.GroupZone 
                             ");
$statement->bindParam(":Zone_ID", $_GET["Zone_ID"]);
$statement->execute();
$zone = $statement->fetch(PDO::FETCH_ASSOC);

if (
    isset($_POST["Zone_ID"]) 
    && isset($_POST["Group_name"]))
{
    $zone = $conn->prepare("INSERT INTO comp353.GroupZone (Zone_ID, Group_name)
                                    VALUES (:Zone_ID, :Group_name);");

    $zone->bindParam(':Zone_ID', $_POST["Zone_ID"]);
    $zone->bindParam(':Group_name', $_POST["Group_name"]);


    if ($zone->execute())
    {
        header("Location: .");
    } else {
        echo "Error";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Group Zone</title>
</head>

<body>
    <h1>Add Group Zone</h1>
    <form action="./create.php" method="post">
        <label for="Zone_ID"> Group Zone ID </label><br>
        <input type="text" name="Zone_ID" id="Zone_ID"> <br>
        <label for="Group_name">Group Zone Name</label><br>
        <input type="text" name="Group_name" id="Group_name"> <br>

        <button type="submit">Add</button>
    </form>
    <a href="./">Back to Group Zone list</a>
</body>

</html>
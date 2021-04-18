<?php require_once '../database.php';

$statement = $conn->prepare("SELECT * FROM rec353_4.GroupZone 
                            AS GroupZone 
                            WHERE GroupZone.Zone_ID = :Zone_ID
                            ");
$statement->bindParam(":Zone_ID", $_GET["Zone_ID"]);
$statement->execute();
$zone = $statement->fetch(PDO::FETCH_ASSOC);

if (
    isset($_POST["Group_name"]) 
    && isset($_POST["Zone_ID"])
){
    $statement = $conn->prepare("UPDATE rec353_4.GroupZone 
                                SET Group_name = :Group_name
                                WHERE Zone_ID = :Zone_ID;");

    $statement->bindParam(':Group_name', $_POST["Group_name"]);
    $statement->bindParam(':Zone_ID', $_POST["Zone_ID"]);

    if ($statement->execute()){
        header("Location: .");
    } else {
        header("Location: ./edit.php?Zone_ID=".$_POST["Zone_ID"]);
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Group Zone </title>
</head>

<body>
    <h1>Edit Group Zone</h1>
    <form action="./edit.php" method="post">

        <label for="Group_name">Group Zone Name</label><br>
        <input type="text" name="Group_name" id="Group_name" value="<?= $zone["Group_name"] ?>"> <br>

        <input type="hidden" name="Zone_ID" id="Zone_ID" value="<?= $zone["Zone_ID"] ?>"> <br>

        <button type="submit">Update</button>
    </form>
    <a href="./">Back to Group Zone list</a>
</body>

</html>
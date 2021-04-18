<?php require_once '../database.php';

$statement = $conn->prepare("DELETE FROM comp353.GroupZone WHERE GroupZone.Zone_ID = :Zone_ID; ");
$statement->bindParam(":Zone_ID", $_GET["Zone_ID"]);
$statement->execute();

header("Location: .");

?>
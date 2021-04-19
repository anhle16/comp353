<?php require_once '../database.php';

$statement = $conn->prepare("DELETE FROM rec353_4.person WHERE person.Person_ID = :Person_ID; ");
$statement->bindParam(":Person_ID", $_GET["Person_ID"]);
$statement->execute();

header("Location: .");

?>
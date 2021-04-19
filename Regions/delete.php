<?php require_once '../database.php';

$statement = $conn->prepare("DELETE FROM rec353_4.regions 
                                WHERE   regions.id = :id
                                                                    ; ");
$statement->bindParam(":id", $_GET["id"]);
$statement->execute();

header("Location: .");

?>
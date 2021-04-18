<?php require_once '../database.php';

$statement = $conn->prepare("DELETE FROM comp353.PublicHealthWorker 
                                WHERE   PublicHealthWorker.Person_ID = :Person_ID
                                        and PublicHealthWorker.Serving_facility = :Serving_facility 
                                        and PublicHealthWorker.Joining_Date = :Joining_Date
                                                                    ; ");
$statement->bindParam(":Person_ID", $_GET["Person_ID"]);
$statement->bindParam(":Serving_facility", $_GET["Serving_facility"]);
$statement->bindParam(":Joining_Date", $_GET["Joining_Date"]);
$statement->execute();

header("Location: .");

?>
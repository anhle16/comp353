<?php require_once '../database.php';

$statement = $conn->prepare("DELETE FROM rec353_4.publichealthworker 
                                WHERE   publichealthworker.Person_ID = :Person_ID
                                        and publichealthworker.Serving_facility = :Serving_facility 
                                        and publichealthworker.Joining_Date = :Joining_Date
                                                                    ; ");
$statement->bindParam(":Person_ID", $_GET["Person_ID"]);
$statement->bindParam(":Serving_facility", $_GET["Serving_facility"]);
$statement->bindParam(":Joining_Date", $_GET["Joining_Date"]);
$statement->execute();

header("Location: .");

?>
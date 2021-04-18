<?php require_once '../database.php';

$statement = $conn->prepare("DELETE FROM rec353_4.HealthFacility WHERE HealthFacility.Facility_ID = :Facility_ID; ");
$statement->bindParam(":Facility_ID", $_GET["Facility_ID"]);
$statement->execute();

header("Location: .");

?>
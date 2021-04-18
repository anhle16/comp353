<?php require_once '../database.php';

$statement = $conn->prepare("DELETE FROM comp353.public_health_recommendations 
                            WHERE public_health_recommendations.policy_id = :policy_id
                            AND public_health_recommendations.policy_subid = :policy_subid; 
                            ");
$statement->bindParam(":policy_id", $_GET["policy_id"]);
$statement->bindParam(":policy_subid", $_GET["policy_subid"]);
$statement->execute();

header("Location: .");

?>
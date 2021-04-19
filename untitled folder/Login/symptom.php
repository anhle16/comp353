<?php 
session_start();

if (isset($_SESSION['medicare_number']) && isset($_SESSION['first_name'])&& isset($_SESSION['last_name'])&& isset($_SESSION['person_ID'])) {
?>

<?php

require_once '../database.php';
if (
    isset($_POST["person_id"]) 
    && isset($_POST["fill_up_date"]) 
    && isset($_POST["fill_up_time"])
    && isset($_POST["fever"])
    && isset($_POST["cough"])
    && isset($_POST["short_of_breath"])
    && isset($_POST["loss_of_taste_smell"])
    && isset($_POST["nausea"])
    && isset($_POST["stomach_aches"])
    && isset($_POST["vomiting"])
    && isset($_POST["headache"])
    && isset($_POST["muscle_pain"]) 
    && isset($_POST["diarrhea"])
    && isset($_POST["sore_throat"])
    && isset($_POST["other_symptoms"])
)
{
	
$healthcare_form = $conn->prepare("INSERT INTO comp353.healthcare_form (person_id ,fill_up_date, fill_up_time, fever, cough,
                                                            short_of_breath, loss_of_taste_smell, nausea, stomach_aches, vomiting,
                                                            headache, muscle_pain, diarrhea, sore_throat,other_symptoms)
                                    VALUES (:person_id ,:fill_up_date, :fill_up_time, :fever, :cough,
                                                            :short_of_breath, :loss_of_taste_smell, :nausea, :stomach_aches, :vomiting,
                                                            :headache, :muscle_pain, :diarrhea, :sore_throat,:other_symptoms);");
/*
$healthcare_form = $conn->prepare("INSERT INTO comp353.healthcare_form (person_id)
                                    VALUES (:person_id);");*/
															
	$healthcare_form->bindParam(':person_id', $_SESSION['person_id']);													
    $healthcare_form->bindParam(':fill_up_date', $_POST["fill_up_date"]);
    $healthcare_form->bindParam(':fill_up_time', $_POST["fill_up_time"]);
    $healthcare_form->bindParam(':fever', $_POST["fever"]);
	$healthcare_form->bindParam(':cough', $_POST["cough"]);
    $healthcare_form->bindParam(':short_of_breath', $_POST["short_of_breath"]);
    $healthcare_form->bindParam(':loss_of_taste_smell', $_POST["loss_of_taste_smell"]);
    $healthcare_form->bindParam(':nausea', $_POST["nausea"]);
    $healthcare_form->bindParam(':stomach_aches', $_POST["stomach_aches"]);
    $healthcare_form->bindParam(':vomiting', $_POST["vomiting"]);
    $healthcare_form->bindParam(':headache', $_POST["headache"]);
    $healthcare_form->bindParam(':muscle_pain', $_POST["muscle_pain"]);
    $healthcare_form->bindParam(':diarrhea', $_POST["diarrhea"]);
    $healthcare_form->bindParam(':sore_throat', $_POST["sore_throat"]);
	$healthcare_form->bindParam(':other_symptoms', $_POST["other_symptoms"]);
	

	    if ($healthcare_form->execute())
    {
        header("Location: .");
    } else {
        echo"Error: Person ID is already present or not all fields are filled, please try again!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Your Symptoms</title>
</head>

<body>
<h1><?php echo '99'.$_SESSION['person_id'];echo" ";echo $_SESSION['last_name'];echo" symptoms form"?></h1>
<a href="logout.php">Logout</a>

<input type="text" name="person_id" id="person_id" value="<?= $person["person_id"] ?>"> <br>
    <form action="./symptom.php" method="post">
    <label for="fill_up_date">Date:</label><br>
    <input type="date" id="fill_up_date" name="fill_up_date" value=""><br>

    <label for="fill_up_time">Time:</label><br>
    <input type="time" id="fill_up_time" name="fill_up_time" value=""><br>

    <label for="fever">Fever(temperature): </label>
    <input type="text" id="fever" name="fever" value=""><br>

    <label for="cough">Cough (Y or N):</label>
    <input type="text" id="cough" name="cough" maxlength="1" size="1"><br>

    <label for="short_of_breath">Shortness of breath or difficulty breathing (Y or N):</label>
    <input type="text" id="short_of_breath" name="short_of_breath" maxlength="1" size="1">  <br>

    <label for="loss_of_taste_smell">Loss of taste and smell (Y or N):</label>
    <input type="text" id="loss_of_taste_smell" name="loss_of_taste_smell" maxlength="1"size="1"><br>

    <label for="nausea">Nausea (Y or N):</label>
    <input type="text" id="nausea" name="nausea" maxlength="1"size="1"><br>
        
    <label for="stomach_aches">Stomach aches (Y or N):</label>
    <input type="text" id="stomach_aches" name="stomach_aches" maxlength="1"size="1"><br>

    <label for="vomiting">Vomiting (Y or N):</label>
    <input type="text" id="vomiting" name="vomiting" maxlength="1"size="1"><br>

    <label for="headache">Headache (Y or N):</label>
    <input type="text" id="headache" name="headache" maxlength="1"size="1"><br>

    <label for="muscle_pain">Muscle pain (Y or N):</label>
    <input type="text" id="muscle_pain" name="muscle_pain" maxlength="1"size="1"><br>

    <label for="diarrhea">Diarrhea (Y or N):</label>
    <input type="text" id="diarrhea" name="diarrhea" maxlength="1"size="1"><br>

    <label for="sore_throat">Sore throat (Y or N):</label>
    <input type="text" id="sore_throat" name="sore_throat" maxlength="1"size="1"><br>

    <label for="other_symptoms">Other symptoms:</label>
    <input type="text" id="other_symptoms" name="other_symptoms" value=""><br>



    <button type="submit">submit</button>
        </form>
    <a href="./index.php">Back</a>
</form> 



</body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
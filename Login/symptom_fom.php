<?php require_once '../database.php';

    $healthcare_form = $conn->prepare("INSERT INTO comp353.healthcare_form (fill_up_date, fill_up_time, fever, 
                                                            short_of_breath, loss_of_taste_smell, nausea, stomach_aches, vomiting,
                                                            headache, muscle_pain, diarrhea, sore_throat,other_symptoms)
                                    VALUES (:fill_up_date, :fill_up_time, :fever, 
                                                            :short_of_breath, :loss_of_taste_smell, :nausea, :stomach_aches, :vomiting,
                                                            :headache, :muscle_pain, :diarrhea, :sore_throat,other_symptoms);");
															
    $healthcare_form->bindParam(':fill_up_date', $_POST["fill_up_date"]);
    $healthcare_form->bindParam(':fill_up_time', $_POST["fill_up_time"]);
    $healthcare_form->bindParam(':fever', $_POST["fever"]);
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
?>

<!DOCTYPE html>
<html>
<body>

<h2>Symptom</h2>

    <form action="./symptoms form.php" method="post">
  <label for="fname">Date:</label><br>
  <input type="date" id="fill_up_date" name="fill_up_date" value=""><br>
  
  <label for="lname">Time:</label><br>
  <input type="time" id="fill_up_time" name="fill_up_time" value=""><br>
  
  <label for="lname">Fever(temperature): </label>
  <input type="text" id="fever" name="fever" value=""><br>
  
  <input type="checkbox" id="short_of_breath" name="short_of_breath" value="">
  <label for="lname">Shortness of breath or difficulty breathing:</label><br>
  
    <input type="checkbox" id="loss_of_taste_smell" name="loss_of_taste_smell" value="">
  <label for="lname">Loss of taste and smell:</label><br>
  
    <input type="checkbox" id="nausea" name="nausea" value="">
    <label for="lname">Nausea:</label><br>
  
    <input type="checkbox" id="stomach_aches" name="stomach_aches" value="">
    <label for="lname">Stomach aches:</label><br>
  
    <input type="checkbox" id="vomiting" name="vomiting" value="">
    <label for="lname">Vomiting:</label><br>
  
  	<input type="checkbox" id="headache" name="headache" value="">
    <label for="lname">Headache:</label><br>
  
    <input type="checkbox" id="muscle_pain" name="muscle_pain" value="">
    <label for="lname">Muscle pain:</label><br>
  
    <input type="checkbox" id="diarrhea" name="diarrhea" value="">
    <label for="lname">Diarrhea:</label><br>

  
    <input type="checkbox" id="sore_throat" name="sore_throat" value="">
	<label for="lname">Sore throat:</label><br>
  

	<label for="lname">Other symptoms:</label><br>
	<input type="text" id="other_symptoms" name="other_symptoms" value="">

  <input type="submit" value="Submit">
      </form>
    <a href="./index.php">Back</a>
</form> 



</body>
</html>
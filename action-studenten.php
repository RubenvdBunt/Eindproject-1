<?php

//action.php

include('includes/conn.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == "insert")
	{
		$query = "
		INSERT INTO `student` (`StudentVoornaam`, `StudentAchternaam`, `StudentTussenvoegsel`, `StudentAdres`, `StudentPlaats`, `StudentPostcode`, `StudentGeboortedatum`, `StudentEmail`) VALUES ('".$_POST["student_first_name"]."', '".$_POST["student_second_name"]."', '".$_POST["student_insertion"]."', '".$_POST["student_adres"]."', '".$_POST["student_place"]."', '".$_POST["student_mailnr"]."', '".$_POST["student_birth"]."', '".$_POST["student_email"]."')
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data toegevoegd...</p>';
	}
	if($_POST["action"] == "fetch_single")
	{
		$query = "
		SELECT * FROM student WHERE StudentID = '".$_POST["StudentID"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['student_first_name'] = $row['StudentVoornaam'];
			$output['student_second_name'] = $row['StudentAchternaam'];
			$output['student_insertion'] = $row['StudentTussenvoegsel'];
			$output['student_adres'] = $row['StudentAdres'];
			$output['student_place'] = $row['StudentPlaats'];
			$output['student_mailnr'] = $row['StudentPostcode'];
			$output['student_birth'] = $row['StudentGeboortedatum'];
			$output['student_email'] = $row['StudentEmail'];
		}
		echo json_encode($output);
	}
	if($_POST["action"] == "update")
	{
		$query = "
		UPDATE `student`
		SET `StudentVoornaam` = '".$_POST["student_first_name"]."',
		`StudentAchternaam` = '".$_POST["student_second_name"]."',
		`StudentTussenvoegsel` = '".$_POST["student_insertion"]."',
		`StudentAdres` = '".$_POST["student_adres"]."',
		`StudentPlaats` = '".$_POST["student_place"]."',
		`StudentPostcode` = '".$_POST["student_mailnr"]."',
		`StudentGeboortedatum` = '".$_POST["student_birth"]."',
		`StudentEmail` = '".$_POST["student_email"]."'
		WHERE StudentID = '".$_POST["hidden_id"]."'
		";
		
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data updated</p>';
	}
	if($_POST["action"] == "delete")
	{
		$query = "DELETE FROM student WHERE StudentID = '".$_POST["id"]."'";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data verwijderd</p>';
	}
}

?>

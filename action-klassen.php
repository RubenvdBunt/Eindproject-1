<?php

//action.php

include('includes/conn.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == "insert")
	{
		$query = "
		INSERT INTO klas (DocentID, KlasNaam) VALUES ('".$_POST["teacher_name"]."', '".$_POST["class_name"]."')
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data toegevoegd...</p>';
	}
	if($_POST["action"] == "fetch_single")
	{
		$query = "
		SELECT * FROM klas WHERE KlasID = '".$_POST["KlasID"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['class_name'] = $row['KlasNaam'];
			$output['teacher_name'] = $row['DocentID'];
		}
		echo json_encode($output);
	}
	if($_POST["action"] == "update")
	{
		$query = "
		UPDATE klas
		SET KlasNaam = '".$_POST["class_name"]."',
		DocentID = '".$_POST["teacher_name"]."'
		WHERE KlasID = '".$_POST["hidden_id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data updated</p>';
	}
	if($_POST["action"] == "delete")
	{
		$query = "DELETE FROM klas WHERE KlasID = '".$_POST["id"]."'";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data verwijderd</p>';
	}
}

?>

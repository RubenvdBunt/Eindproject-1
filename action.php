<?php

//action.php

include('includes/conn.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == "insert")
	{
		$query = "
		INSERT INTO docent (DocentVoornaam, DocentAchternaam, DocentEmail) VALUES ('".$_POST["first_name"]."', '".$_POST["last_name"]."','".$_POST["email"]."')
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Inserted...</p>';
	}
	if($_POST["action"] == "fetch_single")
	{
		$query = "
		SELECT * FROM docent WHERE DocentID = '".$_POST["DocentID"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['first_name'] = $row['DocentVoornaam'];
			$output['last_name'] = $row['DocentAchternaam'];
			$output['email'] = $row['DocentEmail'];
		}
		echo json_encode($output);
	}
	if($_POST["action"] == "update")
	{
		$query = "
		UPDATE docent
		SET DocentVoornaam = '".$_POST["first_name"]."',
		DocentAchternaam = '".$_POST["last_name"]."',
		DocentEmail = '".$_POST["email"]."'
		WHERE DocentID = '".$_POST["hidden_id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Updated</p>';
	}
	if($_POST["action"] == "delete")
	{
		$query = "DELETE FROM docent WHERE DocentID = '".$_POST["id"]."'";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Deleted</p>';
	}
}

?>

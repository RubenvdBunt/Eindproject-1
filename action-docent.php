<?php

//action.php

include('includes/conn.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == "insert")
	{
		$salted = "afurwhfiudncmisdcjsducjw383wjfwesjn".$_POST["wachtwoord"]."srgjnvisciwecose";
		$hashed = hash('sha512', $salted);

		$account_query = "
		INSERT INTO gebruiker (GebruikerEmail, GebruikerWachtwoord, DocentSession) VALUES ('".$_POST["email"]."', '".$hashed."','1')
		";
		$account_statement = $connect->prepare($account_query);
		$account_statement->execute();

		$gebruikerid_result = $connect->prepare('SELECT GebruikerID FROM gebruiker ORDER BY GebruikerID DESC LIMIT 1');
		$gebruikerid_result->execute();
		$gebruikerid_result = $gebruikerid_result->fetchAll(PDO::FETCH_ASSOC);


		$query = "
		INSERT INTO docent (GebruikerID, DocentVoornaam, DocentAchternaam, DocentEmail) VALUES ('".$gebruikerid_result['0']['GebruikerID']."','".$_POST["first_name"]."', '".$_POST["last_name"]."','".$_POST["email"]."')
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data toegevoegd...</p>';
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
		echo '<p>Data updated</p>';
	}
	if($_POST["action"] == "delete")
	{
		$query = "DELETE gebruiker.*, docent.* FROM gebruiker LEFT JOIN docent ON gebruiker.GebruikerID = docent.GebruikerID WHERE docent.DocentID = '".$_POST["id"]."'";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data verwijderd</p>';
	}
}

?>

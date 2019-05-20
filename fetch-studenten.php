<?php

//fetch.php
include("includes/conn.php");

$query = "SELECT * FROM student";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '
<table class="table table-striped table-bordered">
	<tr>
		<th>Voornaam</th>
		<th>Achternaam</th>
		<th>Tussenvoegsel</th>
		<th>Adres</th>
		<th>Plaats</th>
		<th>Postcode</th>
		<th>Geboortedatum</th>
		<th>Email</th>
		<th>Klas</th>
		<th>Bewerken</th>
		<th>Verwijderen</th>
	</tr>
';
if($total_row > 0)
{
	foreach($result as $row)
	{
		$query1 = 'SELECT k.KlasNaam FROM klas k LEFT JOIN student s ON k.KlasID = s.KlasID WHERE k.KlasID = '.$row['KlasID'].'';
		$statement_docent = $connect->prepare($query1);
		$statement_docent->execute();
		$result1 = $statement_docent->fetchAll();

		if(empty($result1)){
			$voor = "Geen klas toegevoegd";
		}
		else{
			$voor = $result1["0"]["KlasNaam"];
		}


		$output .= '
		<tr>
			<td width="40%">'.$row["StudentVoornaam"].'</td>
			<td width="40%">'.$row["StudentAchternaam"].'</td>
			<td width="40%">'.$row["StudentTussenvoegsel"].'</td>
			<td width="40%">'.$row["StudentAdres"].'</td>
			<td width="40%">'.$row["StudentPlaats"].'</td>
			<td width="40%">'.$row["StudentPostcode"].'</td>
			<td width="40%">'.$row["StudentGeboortedatum"].'</td>
			<td width="40%">'.$row["StudentEmail"].'</td>
			<td width="40%">'.$voor.'</td>
			<td width="10%">
				<button type="button" name="edit" class="btn btn-primary btn-xs edit" id="'.$row["StudentID"].'">Bewerken</button>
			</td>
			<td width="10%">
				<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["StudentID"].'">Verwijderen</button>
			</td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="4" align="center">Geen data gevonden</td>
	</tr>
	';
}
$output .= '</table>';
echo $output;
?>

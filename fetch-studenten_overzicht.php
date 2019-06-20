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
		<th>Klas</th>
		<th>Detail</th>
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

		$row["StudentGeboortedatum"] = date("d-m-Y", strtotime($row["StudentGeboortedatum"]));

		$output .= '
		<tr>
			<td width="40%">'.$row["StudentVoornaam"].'</td>
			<td width="40%">'.$row["StudentAchternaam"].'</td>
			<td width="40%">'.$voor.'</td>
			<td width="10%">
				<button type="button" name="edit" class="btn btn-primary btn-xs edit" id="'.$row["StudentID"].'">Detail</button>
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

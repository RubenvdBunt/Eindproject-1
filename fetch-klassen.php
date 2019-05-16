<?php

//fetch.php
include("includes/conn.php");

$query = "SELECT * FROM klas";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '
<table class="table table-striped table-bordered">
	<tr>
		<th>Klas naam</th>
		<th>Mentor</th>
		<th>Bewerken</th>
		<th>Verwijderen</th>
	</tr>
';
if($total_row > 0)
{
	foreach($result as $row)
	{
		$query1 = 'SELECT d.DocentVoornaam, d.DocentAchternaam FROM docent d LEFT JOIN klas k ON d.DocentID = k.DocentID WHERE d.DocentID = '.$row['DocentID'].'';
		$statement_docent = $connect->prepare($query1);
		$statement_docent->execute();
		$result1 = $statement_docent->fetchAll();

		if(empty($result1)){
			$voor = "Geen";
			$achter = "mentor";
		}
		else{
			$voor = $result1["0"]["DocentVoornaam"];
			$achter = $result1["0"]["DocentAchternaam"];
		}


		$output .= '
		<tr>
			<td width="40%">'.$row["KlasNaam"].'</td>
			<td width="40%">'.$voor.' '.$achter.'</td>
			<td width="10%">
				<button type="button" name="edit" class="btn btn-primary btn-xs edit" id="'.$row["KlasID"].'">Bewerken</button>
			</td>
			<td width="10%">
				<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["KlasID"].'">Verwijderen</button>
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

<?php

//fetch.php
include("includes/conn.php");

$query = "SELECT * FROM docent";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '
<table class="table table-striped table-bordered">
	<tr>
		<th>Voornaam</th>
		<th>Achternaam</th>
		<th>Email</th>
		<th>Mentor klas</th>
		<th>Bewerken</th>
		<th>Verwijderen</th>
	</tr>
';
if($total_row > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td width="40%">'.$row["DocentVoornaam"].'</td>
			<td width="40%">'.$row["DocentAchternaam"].'</td>
			<td width="40%">'.$row["DocentEmail"].'</td>
			<td width="40%">'.$row["KlasNaam"].'</td>
			<td width="10%">
				<button type="button" name="edit" class="btn btn-primary btn-xs edit" id="'.$row["DocentID"].'">Bewerken</button>
			</td>
			<td width="10%">
				<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["DocentID"].'">Verwijderen</button>
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

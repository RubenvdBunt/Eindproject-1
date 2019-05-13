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
		$output .= '
		<tr>
			<td width="40%">'.$row["KlasNaam"].'</td>
			<td width="40%">'.$row["DocentID"].'</td>
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

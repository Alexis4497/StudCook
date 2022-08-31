<?php

//fetch.php

$connect = new PDO("mysql:host=localhost; dbname=test-studcook", "root", "");

$query = "
	SELECT * FROM recettes WHERE prix_recette BETWEEN '".$_POST["minimum_range"]."' AND '".$_POST["maximum_range"]."' ORDER BY prix_recette ASC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '
<h4 align="center">Total de recettes: '.$total_row.'</h4>
<div class="row">
';

if($total_row > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<div class="col-md-2">
			<img src="images/'.$row["image"].'" class="img-responsive img-thumnail" />
			<h4 align="center">'.$row["titre_recette"].'</h4>
			<h3 align="center" class="text-danger">'.$row["prix_recette"].'</h3>
			<br />
		</div>
		';
	}
}
else
{
	$output .= '
		<h3 align="center">No Product Found</h3>
	';
}
$output .= '
</div>
';

echo $output;

?>
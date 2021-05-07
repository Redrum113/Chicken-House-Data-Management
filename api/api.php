<?php

$con = mysqli_connect("localhost","root","","chicken2");
$con->set_charset("utf8");

//$con->query("SET NAMES utf8");

if($_REQUEST["load"]=="chickenData"){
	
	$result = $con->query("select * 
		from chickens c 
		left join ages a on c.chicken_type = a.id
		left join breeds b on c.breeds_id = b.id
		where c.houses_id='{$_GET["houses_id"]}' AND c.coop_id='{$_GET["coop_id"]}'
		");

	$array = array();
	while($row = $result->fetch_object()){
		
		array_push($array, $row);
	}
	echo json_encode($array);
}




?>




<?php

include ('Connection.php');

$a = new Connection();

$link = $a->Connect();

$table = "receita";

$sql = "SELECT * FROM $table";
        
//$result = mysqli_query($link, $sql);


//if(!$result){
//    die("Error retrieving scores".mysql_error());
//}


if ($result = mysqli_query($link, $sql))
{
	// If so, then create a results array and a temporary one
	// to hold the data
	$resultArray = array();
	$tempArray = array();
 
	// Loop through each row in the result set
	while($row = $result->fetch_object())
	{
		// Add each row into our results array
		$tempArray = $row;
	    array_push($resultArray, $tempArray);
	}
 
	// Finally, encode the array to JSON and output the results
	echo json_encode($resultArray);
}
        
?>
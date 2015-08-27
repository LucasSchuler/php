<?php

include_once 'Connection.php';

$id = $_POST['id'];

$a = new Connection();
$link = $a->Connect();
$sql = "SELECT * FROM receita where idCategoria = $id";
       
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
        mysqli_close($link);
 
	// Finally, encode the array to JSON and output the results
	echo json_encode($resultArray);
}
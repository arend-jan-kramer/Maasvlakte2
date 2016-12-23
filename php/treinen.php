<?php
include('database.php');

if($connectionActive)
{
	$query=mysql_query("select * from treinen");
	
	$treinen = Array();
	$thisTrein = Array();
	
	while($trein=mysql_fetch_array($query)){
		$thisTrein[0] = $trein[0];
		$thisTrein[1]= $trein[1];
		
		$treinen[] = $thisTrein;
	}
	
	echo json_encode($treinen);
}
else
{
	echo "connectionFailed";	
}
?>
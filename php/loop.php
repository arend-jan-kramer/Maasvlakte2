<?php
// database connectie
include('database.php'); 


// random trein uit de database
$query9=mysql_query("select * from treinen WHERE onderweg='nee' ORDER BY RAND()LIMIT 1");
while($trein=mysql_fetch_array($query9))
{
	echo "<br>";
	echo $trein[0];
	$_POST['trein'] = $trein[0];		
	echo "<br>";	
}
			
			
// vertrek naar random spoorneeerrr
$query8=mysql_query("select * from sporen WHERE bezet='nee' ORDER BY RAND() LIMIT 1");
while($spoor=mysql_fetch_array($query8))
{
	echo $spoor[2];
	$_POST['spoor'] = $spoor[2];
	echo "<br>";
} 


// soort trein (for example. trrood, trgroen)
$query6=mysql_query("select * from soorttrein ORDER BY RAND() LIMIT 1");
while($soorttrein=mysql_fetch_array($query6))
{
	echo $soorttrein[1];
	$_POST['soorttrein'] = $soorttrein[1];
	echo "<br>";
} 
		

// Insert Query voor het toevoegen van de Ritgegevens van 1 rit.

$query = "INSERT INTO `ritgegevens`(`ID-ritnummer`, `vertrek-naar`, `soort-trein`, `tijdstip`, `positie`, `datum`, `onderweg`, `treinnummer`, `richting`) 
VALUES (NULL,'".$_POST['spoor']."','".$_POST['soorttrein']."',CURTIME(),'48',CURDATE(),'ja','".$_POST['trein']."','in')";
	
mysql_query($query)	
	

?>	
<?php
$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => "https://www.omdbapi.com/?i=tt1569923&apikey=34b63443"
	));
	$resp = curl_exec($curl);
	curl_close($curl);
	
	echo $resp;
	?>

<?php
$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => "https://www.omdbapi.com/?s=Drama&apikey=34b63443"
		));
		$resp = curl_exec($curl);
		curl_close($curl);
	
		$json = json_decode($resp);
		
		//print_r($json);
		
		
		foreach($json as $obj){
			foreach($obj as $o){
				echo $o -> {'Title'};
				echo $o -> {'Year'};
				echo $o -> {'imdbID'};
				echo $o -> {'Poster'};
			}
		}
	
	?>

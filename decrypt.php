<?php
date_default_timezone_set("Asia/Manila");                 // sets default timezone to Manila, Philippines
$encrypted = $_GET['code'];                               // get encrypted code from the URL
parse_str(base64_decode($encrypted), $decryptedinfo);     // divide decrypted string into several variables

if(isset($decryptedinfo['username'])){ // checks if username is in decrypted string
	if(isset($decryptedinfo['filename'])){ // checks if file user wants to download is in decrypted string
		if(isset($decryptedinfo['expiration'])){ // checks if expiration date and time is in decrypted string
			$finaldatetime = str_replace("/"," ", $decryptedinfo['expiration']); //remove front slash from the expiration date and time
			$timeinput = strtotime($finaldatetime); // convert a expiration to a Unix time
			$status = ($timeinput < time()) ? "Expired" : "Good"; //checks if expiration is less than now
			
			if($status == "Expired"){
				include("expired.php");
			}else{
				$filePath = $decryptedinfo['username'].'/'.$decryptedinfo['filename'];
				if(!empty($decryptedinfo['filename']) && file_exists($filePath)){
					header("Content-Length: " . filesize($filePath));  
					header("Content-Encoding: none");
					header("Cache-Control: public");
					header("Content-Description: File Transfer");
					header("Content-Disposition: attachment; filename=".$decryptedinfo['filename']);
					header("Content-Type: application/stream");
					header("Content-Transfer-Encoding: binary");
					
					readfile($filePath); // Read the file
					exit;
				}else{ include("404.php"); }
			}
		}else{ include("404.php"); }
	}else{ include("404.php"); }
}else{ include("404.php"); }
?>
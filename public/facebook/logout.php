<?php 

//   include('src/facebook.php');	
 	$app_id = "265691696900687";
   	$app_secret = "2c39c1ee9037c99daa6cb182e9d479b7";
   	$my_url = "http://localhost/facebook/logout.php";

   session_start();
   $token = $_SESSION["access_token"];
   if($token) {
     $graph_url = "https://graph.facebook.com/me/permissions?method=delete&access_token=" 
       . $token;

     $result = json_decode(file_get_contents($graph_url));
     if($result) {
        session_destroy();
        echo("User is now logged out.");
     }
   } else {
     echo("User already logged out.");
   }
?>
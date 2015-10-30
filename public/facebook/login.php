<?php
	include('src/facebook.php');	
 	$app_id = "265691696900687";
   	$app_secret = "2c39c1ee9037c99daa6cb182e9d479b7";
   	$my_url = "http://localhost/facebook/login.php";

   	session_start();

   	$facebook = new Facebook(array(
	    'appId'  => '265691696900687',
	    'secret' => '2c39c1ee9037c99daa6cb182e9d479b7',
	));
	$code = $_REQUEST["code"];

   	if(empty($code)) {
    	$_SESSION['state'] = md5(uniqid(rand(), TRUE)); // CSRF protection
     	$dialog_url = "https://www.facebook.com/dialog/oauth?display=popup&domain=localhost&locale=en_US&client_id=" 
				       . $app_id . "&redirect_uri=" . urlencode($my_url) . "&state="
				       . $_SESSION['state'];

     	
//     	echo '<a href="'.$dialog_url.'" onclick="window.open (this.href, "child", "height=400,width=300"); return false">Click to log out</a>'; 
				       header("Location: " . $dialog_url);
   	}
   	if($_SESSION['state'] && ($_SESSION['state'] === $_REQUEST['state'])) {
    	$token_url = "https://graph.facebook.com/oauth/access_token?"
			       . "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
			       . "&client_secret=" . $app_secret . "&code=" . $code;

     	$response = file_get_contents($token_url);
     	$params = null;
     	parse_str($response, $params);

     	$_SESSION['access_token'] = $params['access_token'];

     	$graph_url = "https://graph.facebook.com/me?access_token=" 
       				. $params['access_token'];

	     $user = json_decode(file_get_contents($graph_url));
	     echo("Hello " . $user->name);
	     echo("<br><a href='logout.php'>Click to log out</a>");
   	}else {
     	echo("The state does not match. You may be a victim of CSRF.");
   	}
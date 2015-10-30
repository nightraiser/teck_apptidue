<?php
include('src/facebook.php');	
	$app_id = "265691696900687";
	$app_secret = "2c39c1ee9037c99daa6cb182e9d479b7";
// define("FACEBOOOK_ACCESS_TOKEN","CAADxpSs2qk8BANeiK67AqzJ4nYYhHMbZAZALr2pSu0UNHL19cdkd0tVS4c51kOZB9NZCfJZAZCjrHKUjizfLy0DKYy8iZA78UGZCcipQjAkIZCrfCZAZBzRm1C3aFnEJkD5HepuabgnBhxOLZAfT83VApxLtrP8jd9dCeo4ZD");
//$name = $_POST['name'];
//$token = $_POST['access_token'];
//$startTime = $_POST['start_time'];
//$endTime = $_POST['end_time'];
//$location = $_POST['location'];
//$description = $_POST['description'];
$my_url = "http://localhost/facebook/event.php";
session_start();
date_default_timezone_set('Asia/Calcutta');
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
   	}
   	
$name = 'name';
$token = $_SESSION['access_token'];
$startTime = date('Y-m-d H:i:s', mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
$endTime = date('Y-m-d H:i:s', mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
$location = 'location';
$description = 'description';
 
$fileName = "/images/logo.png"; //profile picture of the event

  $url = "https://graph.facebook.com/$app_id/events?" . $token; 
    $params = array();
    // Prepare Event fields
    foreach($_POST as $key=>$value)
    if(strlen($value))
        $params[$key] = $value;

$params['name']=$name;
$params['description']=$description;
$params['location']=$location;
$params['start_time']=$startTime;
$params['end_time']=$endTime; 
$params['privacy_type']="SECRET";

   // Start the Graph API call
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
$result = curl_exec($ch);
$decoded = json_decode($result, true);
curl_close($ch);
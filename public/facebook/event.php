<?php
include('src/facebook.php');	
	$app_id = "648381938508676";
	$app_secret = "0a6dcbd453715026a53ef63bc0976c51";
// define("FACEBOOOK_ACCESS_TOKEN","CAADxpSs2qk8BANeiK67AqzJ4nYYhHMbZAZALr2pSu0UNHL19cdkd0tVS4c51kOZB9NZCfJZAZCjrHKUjizfLy0DKYy8iZA78UGZCcipQjAkIZCrfCZAZBzRm1C3aFnEJkD5HepuabgnBhxOLZAfT83VApxLtrP8jd9dCeo4ZD");
//$name = $_POST['name'];
//$token = $_POST['access_token'];
//$startTime = $_POST['start_time'];
//$endTime = $_POST['end_time'];
//$location = $_POST['location'];
//$description = $_POST['description'];
$my_url = "http://localhost/facebook/event.php";
date_default_timezone_set('Asia/Calcutta');

   	$facebook = new Facebook(array(
	    'appId'  => '648381938508676',
	    'secret' => '0a6dcbd453715026a53ef63bc0976c51',
   		  'cookie' => false,
  'req_perms' => 'manage_pages,create_event'
));
$access_token = $facebook->getAccessToken();
$page_id = '426572030758957';
// Now, getting the PAGE Access token, using the user access token
session_start();
//$page_token_url = "https://graph.facebook.com/$app_id?fields=access_token&" . $access_token;
//$response = file_get_contents($page_token_url);

// Parse the return value and get the Page access token
//$resp_obj = json_decode($response,true);
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

$page_access_token = $_SESSION['access_token'];

// Declare the variables we'll use to demonstrate
// the new event-management APIs
$event_id = 0;
$event_name = "New Event API Test Event";
$event_start = time() + rand(1, 100) * rand(24, 64) * 3600;
$event_privacy = "OPEN"; // We'll make it secret so we don't annoy folks.

// We'll create an event in this example.
// We'll need create_event permission for this.
$params = array(
  'name' => $event_name,
  'start_time' => $event_start,
  'privacy_type' => $event_privacy,
  'access_token' => $page_access_token
);

// Create an event
$ret_obj = $facebook->api("/$page_id/events", 'POST', $params);
if(isset($ret_obj['id'])) {
  // Success
  $event_id = $ret_obj['id'];
  printMsg('Event ID: ' . $event_id);
} else {
  printMsg("Couldn't create event.");
}

// Convenience method to print simple pre-formatted text.
function printMsg($msg) {
   echo "<pre>$msg</pre>";
}


//	$code = $_REQUEST["code"];
//
//   	if(empty($code)) {
//    	$_SESSION['state'] = md5(uniqid(rand(), TRUE)); // CSRF protection
//     	$dialog_url = "https://www.facebook.com/dialog/oauth?display=popup&domain=localhost&locale=en_US&client_id=" 
//				       . $app_id . "&redirect_uri=" . urlencode($my_url) . "&state="
//				       . $_SESSION['state'];
//
//     	
////     	echo '<a href="'.$dialog_url.'" onclick="window.open (this.href, "child", "height=400,width=300"); return false">Click to log out</a>'; 
//				       header("Location: " . $dialog_url);
//   	}
//   	if($_SESSION['state'] && ($_SESSION['state'] === $_REQUEST['state'])) {
//    	$token_url = "https://graph.facebook.com/oauth/access_token?"
//			       . "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
//			       . "&client_secret=" . $app_secret . "&code=" . $code;
//
//     	$response = file_get_contents($token_url);
//     	$params = null;
//     	parse_str($response, $params);
//
//     	$_SESSION['access_token'] = $params['access_token'];
//
//     	$graph_url = "https://graph.facebook.com/me?access_token=" 
//       				. $params['access_token'];
//
//	     $user = json_decode(file_get_contents($graph_url));
//	     echo("Hello " . $user->name);
//	     echo("<br><a href='logout.php'>Click to log out</a>");
//   	}
//   	
//$name = 'name';
//$token = $_SESSION['access_token'];
//$startTime = date('Y-m-d H:i:s', mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
//$endTime = date('Y-m-d H:i:s', mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
//$location = 'location';
//$description = 'description';
 
//$fileName = "/images/logo.png"; //profile picture of the event
// 
//$fb = new Facebook(array(
//    'appId'      => $app_id,
//    'secret'     => $app_secret,
//    'cookie'     => false,
//    'fileUpload' => true     // this is important !
//));
// 
////$fb->setAccessToken($token);
// 
//$data = array("name"=>$name,
////              "access_token"=>$token,
//				"privacy_type" => "SECRET",
//              "start_time"=>$startTime,
//              "end_time"=>$endTime,
//              "location"=>$location,
//              "description"=>$description
////              basename($fileName) => '@'.$fileName
//);
//
//$page_id = '426572030758957';
////$page = $fb->api("/$page_id");
////$event_data = array(
////'name' => 'Event: ' . date("H:m:s"),
////'start_time' => time() + 60*60,
////'end_time' => time() + 60*60*2,
////'owner' => $page
////);
////$post = $fb->api("/$page_id/events", 'POST', $event_data);
//
////$data[basename($fileName)] = '@' . realpath($fileName);
//try{
//    $result = $fb->api("/me/events/?access_token=$token","post",$data);
//    $facebookEventId = $result['id'];
//    echo $facebookEventId;
//}catch( Exception $e){
//    echo "0";
//}
//?>
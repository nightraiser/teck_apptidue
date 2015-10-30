<?php
include('src/facebook.php');	
	$app_id = "265691696900687";
	$app_secret = "2c39c1ee9037c99daa6cb182e9d479b7";
	$access_token = 'CAADxpSs2qk8BANeiK67AqzJ4nYYhHMbZAZALr2pSu0UNHL19cdkd0tVS4c51kOZB9NZCfJZAZCjrHKUjizfLy0DKYy8iZA78UGZCcipQjAkIZCrfCZAZBzRm1C3aFnEJkD5HepuabgnBhxOLZAfT83VApxLtrP8jd9dCeo4ZD';
$profile_id   = 'kotturs';

$pageId = "426572030758957";


define('API_SECRET', '2c39c1ee9037c99daa6cb182e9d479b7');

$baseurl = "http://localhost/facebook/event.php";

$facebook = new Facebook(array(
    'appId'  => '265691696900687',
    'secret' => API_SECRET,
    'cookie' => true,
    'fileUpload' => true
));
	session_start();
$session = $facebook->getSession();

$me = null;

$time = time() + rand(1, 100) * rand(24, 64) * 3600;
    $event_info = array(
        "privacy_type" => "SECRET",
//      "name" => "Event Title "  . time(),
        "name" => "Test Event Title "  . time(),
        "host" => "Me ",
        "start_time" => $time,
        "end_time" => $time + 120,
        "location" => "London " . time(),
        "description" => "Event Description " . time()
    );
    //The key part - The path to the file with the CURL syntax
//  $event_info[basename($file)] = '@' . realpath($file);
    //Make the call - returns the event ID
//  var_dump($facebook->api('me/events','post',$event_info));
    var_dump($facebook->api("/$pageId/events/?access_token=$access_token", 'post', $event_info));
    
// Session based API call.
if ($session) {
    $uid = $facebook->getUser();
  $me = $facebook->api('/me');
//    $me = $facebook->api("/$pageId");
}

if ($me) {
    $logoutMe = $facebook->getLogoutUrl(array('next' => $base_url));
} else {
    $loginMe =  $loginUrl = $facebook->getLoginUrl(array(
        'display'   => 'popup',
        'next'      => $baseurl /*. '?loginsucc=1'*/,
//      'cancel_url'=> $baseurl . '?cancel=1',
        'req_perms' => 'create_event'
    ));
}

// if user click cancel in the popup window
if ($me && empty($_GET['session']) && empty($_COOKIE['fbs_' . API_SECRET])) {
    die("<script>window.close();</script>");
} elseif($me && !empty($_GET['session'])) {
    //only if valid session found and loginsucc is set, 
    //after facebook redirects it will send a session parameter as a json value
    //now decode them, make them array and sort based on keys
    $sortArray = get_object_vars(json_decode($_GET['session']));
    ksort($sortArray);
    $strCookie  =   "";
    $flag       =   false;
    foreach($sortArray as $key=>$item){
        if ($flag) $strCookie .= '&';
        $strCookie .= $key . '=' . $item;
        $flag = true;
    }

    //now set the cookie so that next time user don't need to click login again
    setCookie('fbs_' . API_SECRET, $strCookie);

    die("<script>window.close();window.opener.location.reload();</script>");
}

if ($me) {
    var_dump($me);
    //Path to photo (only tested with relative path to same directory)
//  $file = "end300.jpg";
    //The event information array (timestamps are "Facebook time"...)
    $time = time() + rand(1, 100) * rand(24, 64) * 3600;
//    $event_info = array(
//        "privacy_type" => "SECRET",
////      "name" => "Event Title "  . time(),
//        "title" => "Test Event Title "  . time(),
//        "host" => "Me ",
//        "start_time" => $time,
//        "end_time" => $time + 120,
//        "location" => "London " . time(),
//        "description" => "Event Description " . time()
//    );
    //The key part - The path to the file with the CURL syntax
//  $event_info[basename($file)] = '@' . realpath($file);
    //Make the call - returns the event ID
//  var_dump($facebook->api('me/events','post',$event_info));
//    var_dump($facebook->api("$pageId/events", 'post', $event_info));
?>
<a href="<?= $facebook->getLogoutUrl() ?>">Logout</a>
<?
} else { ?>
<script type="text/javascript">
    var newwindow;
    var intId;
    function login(){
        var  screenX    = typeof window.screenX != 'undefined' ? window.screenX : window.screenLeft,
            screenY    = typeof window.screenY != 'undefined' ? window.screenY : window.screenTop,
            outerWidth = typeof window.outerWidth != 'undefined' ? window.outerWidth : document.body.clientWidth,
            outerHeight = typeof window.outerHeight != 'undefined' ? window.outerHeight : (document.body.clientHeight - 22),
            width    = 500,
            height   = 270,
            left     = parseInt(screenX + ((outerWidth - width) / 2), 10),
            top      = parseInt(screenY + ((outerHeight - height) / 2.5), 10),
            features = (
            'width=' + width +
            ',height=' + height +
            ',left=' + left +
            ',top=' + top
            );
        newwindow=window.open('<?=$loginUrl?>','Login by facebook',features);
        if (window.focus) {newwindow.focus()}
        return false;
    }
</script>
Please login to Facebook and we will setup the event for you! <br />
<a href="#" onclick="login();return false;">
    <img src="http://static.ak.fbcdn.net/rsrc.php/zB6N8/hash/4li2k73z.gif" border="0">
</a>
<?php } ?>
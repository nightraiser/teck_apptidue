<?php
$appapikey = '265691696900687';
include('src/facebook.php');	
date_default_timezone_set('Asia/Calcutta');
//$facebook = new Facebook($appapikey, '2c39c1ee9037c99daa6cb182e9d479b7');
$facebook = new Facebook(array(
				'appId'      => '265691696900687',
				'secret'     => '2c39c1ee9037c99daa6cb182e9d479b7',
				'cookie'     => false,
				'fileUpload' => true 
				));

$app_id = "265691696900687";
$app_secret = "2c39c1ee9037c99daa6cb182e9d479b7";
$my_url = "http://localhost/facebook/even.php";
$event_url = '';
$code = '';
if(isset($_REQUEST["code"])){
	$code = $_REQUEST["code"];
}	 
if(empty($code)) {
    $auth_url = "http://www.facebook.com/dialog/oauth?client_id="
    . $app_id . "&redirect_uri=" . urlencode($my_url)
    . "&scope=create_event,manage_pages,publish_stream,rsvp_event,publish_actions";
    echo("<script>top.location.href='" . $auth_url . "'</script>");
}

if($code){ 
	$token_url = "https://graph.facebook.com/oauth/access_token?client_id="
	. $app_id . "&redirect_uri=" . urlencode($my_url)
	. "&client_secret=" . $app_secret
	. "&code=" . $code;
	$response = file_get_contents($token_url);
	//
	//$token_url = "https://graph.facebook.com/oauth/access_token?"
	//			       . "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
	//			       . "&client_secret=" . $app_secret . "&code=" . $code;
	//
	//     	$response = file_get_contents($token_url);
	     	$params = null;
	     	parse_str($response, $params);
	if($params['access_token'])
	$friends = $facebook->api('/me/friends',array('access_token'=>$params['access_token']));
	$htmlStr = '';
	foreach($friends['data'] as $friend){
		$htmlStr .= '<li id="'.$friend['id'].'"><a><input type="checkbox" name="frndChk" class="frndChk" value="'.$friend['id'].'"><img src="http://graph.facebook.com/'.$friend['id'].'/picture"/><span class="frndName">'.$friend['name'].'<span></a></li>';
	}
//	echo var_dump($friends);
	$event_url = "https://graph.facebook.com/Dine365/events?access_token=" . $params['access_token'];
	
}
?>
<!doctype html>
<html>
	<head>
		<title>Create An Event</title>
		<script type="text/javascript" src="/js/jquery.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			jQuery.expr[':'].Contains = function(a, i, m) {
	             return jQuery(a).text().toUpperCase()
	                 .indexOf(m[3].toUpperCase()) >= 0;
	           };
	           jQuery.expr[':'].contains = function(a, i, m) {
	             return jQuery(a).text().toUpperCase()
	                 .indexOf(m[3].toUpperCase()) >= 0;
	           };

			$('#userList').html('<?= $htmlStr?>');
			$('#fbformsub').click(function(){
				var url = "<?= $event_url?>";
				var frmData = $('#fbform').serializeArray();
				$.post(url,frmData,function(data){
					if(data){
						for(var item in data){
							alert(item+'=='+data[item]);
							var token = "<?= $params['access_token']?>";
							var url = "https://graph.facebook.com/"+data[item]+"/invited?access_token="+token; 
							$.post(url,{users:100001967445618},function(data){
								if(data){
									alert(data);
								}
							});
						}
					}
				});
				return false;
			});
//			$(".frndName:contains('Nitin')").siblings().css("text-decoration","line-through");
			$('#searchList').keypress(function(data){
				var tex = $(this).val();
				if(tex == ''){
					$('#userList li').css('display','block');
				}
				$(".frndName:contains('"+tex+"')").parents('li').css("display", "block");
				$(".frndName:not(:contains('"+tex+"'))").parents('li').css("display", "none");
			});
		});
		</script>
		<style>
			label {float: left; width: 100px;}
			input[type=text],textarea {width: 210px;}
			#userList li{
				width:300px;
			}
		</style>
	</head>
	<body>
	<input type="text" id="searchList" value=""></input>
		<div>
			<ul id="userList"></ul>
		</div>
		<form enctype="multipart/form-data" action="" method="post" id="fbform">
		    <p><label for="name">Event Name</label><input type="text" name="name" id="name" value="" /></p>
		    <p><label for="description">Event Description</label><textarea name="description" id="description"></textarea></p>
		    <p><label for="location">Location</label><input type="text" name="location" id="location" value="" /></p>
		    <p><label for="">Start Time</label><input type="text" name="start_time" id="start_time"value="<?php echo date('Y-m-d\TH:i:sO'); ?>" /></p>
		    <p><label for="end_time">End Time</label><input type="text" name="end_time" id="end_time"value="<?php echo date('Y-m-d\TH:i:sO', mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"))); ?>" /></p>
		    <p><label for="picture">Event Picture</label><input type="file" name="picture" id="picture"/></p>
		    <p>
		        <label for="privacy_type">Privacy</label>
		        <input type="radio" name="privacy_type" id="privacy_type"value="OPEN" checked='checked'/>Open&nbsp;&nbsp;&nbsp;
		        <input type="radio" name="privacy_type" id="privacy_type"value="CLOSED" />Closed&nbsp;&nbsp;&nbsp;
		        <input type="radio" name="privacy_type" id="privacy_type"value="SECRET" />Secret&nbsp;&nbsp;&nbsp;
		    </p>
		    <p><input type="submit" id="fbformsub" value="Create Event" /></p>
		</form>
		
	</body>
</html>
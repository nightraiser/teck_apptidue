<?php
/**
This Example shows how to ping using the Leadersend class and do some basic error checking.
**/
require_once 'inc/Leadersend.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new Leadersend($apikey);

// generate full MIME document for the message
$mimeEmail = <<<MIME
Subject: Test transactional raw email
From: John Doe <john@doe.com>
MIME-Version: 1.0
Content-Type: multipart/alternative;
    boundary="b1_0d10f8e7346416e35169c0a715b306ae"

--b1_0d10f8e7346416e35169c0a715b306ae
Content-Type: text/plain; charset="utf-8"
Content-Transfer-Encoding: quoted-printable

Hi, Customer !

Thanks for registering in our system.

Please click here:
http://company.com/your_confirm_link_here/ to confirm your registration.

--b1_0d10f8e7346416e35169c0a715b306ae
Content-Type: text/html; charset = "utf-8"
Content-Transfer-Encoding: quoted-printable

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<body>
<p>Hi, Customer !</p>
<p>Thanks for registering in our system.</p>
<p>Please click <a href=3D"http://company.com/your_confirm_link_here/">here</a> to confirm your registration.</p>
</body>
</html>

--b1_0d10f8e7346416e35169c0a715b306ae--
MIME;

$request = array(
	'to' => array(    // required. A list of recipients
		// recipient #1 with name and email
		array(
			'name'  => 'Jennifer',
			'email' => 'email@company.com'
		),
		// recipinet #2 with just email
		'test@example.com'
	),
	'raw' => $mimeEmail
);

$retval = $api->messagesSendRaw($request);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load messagesSendRaw()!";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {    
	echo "Success!\n";
	foreach($retval as $val){
		echo $val['email']. " ".$val['status']."\n";
		echo "\tmessage-id:".$val['id']."\n";
	}
}
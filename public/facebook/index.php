<?php 

$restID = $_REQUEST['restID']; 

if($restID == ""){
	include('src/facebook.php');	
	$app_id = "245249068954402";
	$app_secret = "6cc304b08b56416cf48906316ae0b6b4";
	
	$signed_request = $_REQUEST["signed_request"];
		 
		 list($encoded_sig, $payload) = explode('.', $signed_request, 2); 
	
		 $data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);
	
		 $page=$data["page"];
		
		 //facebook page id from facebook API.  This should grab the page id of the restaurant who installed the app.  We will use this to get the RestID from Dinedesk
		  $page_id = $page["id"];
		 //This is final URL which calls Dinedesk server.
		 $file = fopen("http://www.dinedesk.com/FirmManagement/Firm/firmdetailsbysocialid/fbpageid/".$page_id, "r");
		 $contents = stream_get_contents($file);
		 $json_a=json_decode($contents,true);
		 $restID = $json_a[restaurantid];
		 $themeStyle = $json_a[themestyle];
		 fclose($handle);
		 
		 
		 //$json_a[restaurantid] ==> returns the RestaurantId 
		 //$json_a[restaurantname] ==> returns the Restaurant Name
		 //$json_a[restaurantaddress] ==> returns the Restaurant Address
 		 //$json_a[restaurantphone] ==> returns the Restaurant PhoneNumber
		 //Example:-
		 //echo $json_a[restaurantid].' '.$json_a[restaurantname].' '.$json_a[restaurantaddress];		 
		 
	//restID value from database query needs to be added to end of canvas_page url below.  Also URL should be update to the location of the this index.php on urserv.com
		 $canvas_page = "http://www.dinedesk.com/facebook/index.php?restID=".$restID;
	
		 $auth_url = "http://www.facebook.com/dialog/oauth?client_id=" 
				. $app_id . "&redirect_uri=" . urlencode($canvas_page);
	 
	 
}
if($restID != ""){?>
		<?php if($themeStyle == "H"){ ?>
        	<iframe src="https://www.dinedesk.com/index.php/Reservation/Reservation/socialreservationwidget/restid/<?php echo $restID; ?>" scrolling="no" frameborder="0" style="margin:0 0 0 60px; overflow:hidden; width:500px; height:600px;" allowTransparency="true"></iframe>
        <?php }else{ ?>
        	<iframe src="https://www.dinedesk.com/index.php/Reservation/Reservation/socialreservationwidget/restid/<?php echo $restID; ?>" scrolling="no" frameborder="0" style="margin:0 0 0 60px; overflow:hidden; width:500px; height:600px;" allowTransparency="true"></iframe>
        <?php } ?>
<p>&nbsp;</p>
<?php }else{
		echo '<div style="position:relative; top:20px; width:280px; left:60px; text-align:center;">
				<div style="height:224px; width:217px; padding:92px 23px 61px; color:#653614; font-family:Arial,Helvetica,sans-serif; font-size:14px;">
					<div style="border:1px solid #acabab; padding:5px; text-align:left; border-radius:6px; -moz-border-radius:6px; -webkit-border-radius:6px; -khtml-border-radius:6px; background:#ffffff; -webkit-box-shadow: 5px 5px 10px #ccc; -moz-box-shadow: 5px 5px 10px #ccc; box-shadow: 5px 5px 10px #ccc;">
						Please update the page id of your facebook in your restaurant facebook profile settings on manage widgets page.
					</div><br/>
				    <div style="border:1px solid #acabab; padding:5px; text-align:left; border-radius:6px; -moz-border-radius:6px; -webkit-border-radius:6px; -khtml-border-radius:6px; background:#ffffff; -webkit-box-shadow: 5px 5px 10px #ccc; -moz-box-shadow: 5px 5px 10px #ccc; box-shadow: 5px 5px 10px #ccc;">
				    	Please contact Dinedesk Support at support@dinedesk.com to report the problem.  
				    </div>
		   		</div>
		 </div>';
	
}?>

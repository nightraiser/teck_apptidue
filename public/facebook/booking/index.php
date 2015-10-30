<?php 

$restID = $_REQUEST['restID']; 

if($restID == ""){
	include('src/facebook.php');	
	$app_id = "495105947210186";
	$app_secret = "f71105000014291feefb8116503f5cd8";
	
	$signed_request = $_REQUEST["signed_request"];
		 
		 list($encoded_sig, $payload) = explode('.', $signed_request, 2); 
	
		 $data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);
	
		 $page=$data["page"];
		
		 //facebook page id from facebook API.  This should grab the page id of the restaurant who installed the app.  We will use this to get the RestID from Dinedesk
		  $page_id = $page["id"];
		 //This is final URL which calls Dinedesk server.
		 $file = fopen("http://www.dinedesk.com/FirmManagement/Firm/firmdetailsbyreservationsocialid/fbpageid/".$page_id, "r");
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
		 $canvas_page = "http://www.dinedesk.com/facebook/bookings/index.php?restID=".$restID;
	
		 $auth_url = "http://www.facebook.com/dialog/oauth?client_id=" 
				. $app_id . "&redirect_uri=" . urlencode($canvas_page);
	 
	 
}
if($restID != ""){?>
	<link rel="stylesheet" type="text/css" media="screen" href="http://www.dinedesk.com/css/tabs-styles.css">
<script type="text/javascript" src="http://www.dinedesk.com/js/tabs.js"></script>
<script type="text/javascript" src="http://www.dinedesk.com/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
		if($('#tab3').hasClass('selectedTab')){
			$('#tab3').removeClass('selectedTab');
			$('#tab3Content').removeClass('visibleContent');
			$('#tab3Content').addClass('hiddenContent');
		}
		if(!$('#tab1').hasClass('selectedTab')){
			$('#tab1Content').removeClass('hiddenContent');
			$('#tab1Content').addClass('visibleContent');
			$('#tab1').addClass('selectedTab');
		} 
});
</script> 
<style>
.clear{
	clear:both;
	}
.gap {
	clear: both;
	height: 10px;
	float:none;
	width:auto !important; 
	}
.tabwrap{
	width:800px;
	height:620px;
	}
#mtwrapper {
background: #fff;
}
</style>
<div class="gap clear"></div>
<div class="tabwrap">
	<div class="gap"></div>
	<div class="tabs">
		<ul id="tabnav">
			<li class="selectedTab" id="tab1"><a onclick="changeclass('tab1');">Reservations</a></li>
			<li class="" id="tab2"><a onclick="changeclass('tab2');">Deals</a></li>
			<li class="" id="tab3"><a onclick="changeclass('tab3');">Menu</a></li>
		</ul>
		<div id="cardContent">
			<div id="tab1Content" class="visibleContent">
			  <div class="tabcont" style="margin-left:0; ">
					<div style="width:400px;">
						<iframe src="https://www.dinedesk.com/index.php/Reservation/Reservation/socialreservationwidget/restid/<?php echo $restID; ?>" scrolling="no" frameborder="0" style=" overflow:hidden; width:350px; height:500px;" allowTransparency="true"></iframe>
					</div>
			  </div>
			</div>
			<div id="tab2Content" class="visibleContent">
			  <div class="tabcont" style="margin-left:0; background:url(/images/header/about_us.png) top right no-repeat;">
				 <div style="width:800px; margin:0 auto;">
					<iframe src="http://www.dinedesk.com/index.php/Reservation/Reservation/dealwidgetviewall/restid/<?php echo $restID; ?>" scrolling="no" frameborder="0" style="overflow:auto; overflow-x:hidden; width:800px; height:620px;" allowTransparency="true"></iframe>
				</div>
			  </div>
			</div>
			<div id="tab3Content" class="visibleContent">
			  <div class="tabcont" style="margin-left:0; background:url(/images/header/about_us.png) top right no-repeat;">
			  		<div style="width:800px; margin:0 auto;">
						<iframe src="http://www.dinedesk.com/index.php/FirmManagement/Firm/socialfirmcuisines/restaurantid/<?php echo $restID; ?>" scrolling="no" frameborder="0" style="overflow:auto; overflow-x:hidden; width:800px; height:615px;" allowTransparency="true"></iframe>
					</div>
			  </div>
			</div>
		</div>
	</div>
</div>
	
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

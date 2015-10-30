<?php 
	$pageid = $_REQUEST['tabs_added'];
	foreach($pageid as $key=>$value){
		$id = $key;
	}
	header( 'Location: http://www.dinedesk.com/FirmManagement/Firm/showbookingsocialid/pageid/'.$id ) ;
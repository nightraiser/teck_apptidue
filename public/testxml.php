<?php 
include_once("LeaderSend/inc/Leadersend.php");
        $LeaderSendApi  = new Leadersend();
		$request = array(
										'subject' => 'test subbb',
										'from'    => array( // required. A sender’s information
															'name'  => 'DineDesk',
															'email' => 'admin@dinedesk.com'
													),
										'signing_domain'=>'dinedesk.com',
										'to' => array(
													array(
														'name' => 'snehal',
														'email' => 'kotturs@gmail.com')
												),
										'html'       => 'Hi there iteem reviewlds', // email's HTML content
										'auto_plain' => true, // automatically generate a text part for the messages of HTML part
										'merge_vars' => array( // define merge variables for each recipient
											'kotturs@gmail.com' => array(
												array(
													'name'  => 'FNAME',
													'value' => 'Alex'
												),
												array(
													'name'  => 'LNAME',
													'value' => 'Doubt'
												)
											)
										)
									);
		print_r($request);
							$retval = $LeaderSendApi->messagesSend($request);
							echo 'sdf';
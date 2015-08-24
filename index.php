<?php
require('../common.php');

if(i($QUERY,'action') == 'Register') {
	$sql->insert("Backathon_Participant", array(
		'name'		=> $QUERY['name'],
		'phone'		=> $QUERY['phone'],
		'email'		=> $QUERY['email'],
		'city_id'	=> $QUERY['city_id'],
		'added_on'	=> 'NOW()',
		'referrer_id' => $QUERY['user_id']
	));
	$QUERY['success'] = 'Thank you for registering for the backathon. See you at the event :-)';
}

render('template/index.php');

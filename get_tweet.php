<?php

	require_once('twitter-api-php/TwitterAPIExchange.php');
	require_once('settings.php');

	// Extracting from 'about' parameter
	if (isset($_REQUEST['about']))
	{
		$p_word = $_REQUEST['about'];
	}

	// This is in case the parameter is not accessible
	if (!$p_word)	
	{
		$p_word = 'work';
	}

	/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
	$url = 'https://api.twitter.com/1.1/search/tweets.json';
	$requestMethod = 'GET';

	$getfield = '?q=%23'.$p_word.'&result_type=recent&count=12';
	$twitter = new TwitterAPIExchange($settings);

	// Interpreting the result as simple JSON
	header("Content-Type: application/json");
	echo $twitter->setGetfield($getfield)
	             ->buildOauth($url, $requestMethod)
	             ->performRequest();

?>
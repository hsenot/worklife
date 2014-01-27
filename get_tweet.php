<?php

	require_once('twitter-api-php/TwitterAPIExchange.php');
	require_once('settings.php');

	/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
	$url = 'https://api.twitter.com/1.1/search/tweets.json';
	$requestMethod = 'GET';

	$getfield = '?q=%23work';
	$twitter = new TwitterAPIExchange($settings);
	echo $twitter->setGetfield($getfield)
	             ->buildOauth($url, $requestMethod)
	             ->performRequest();     

?>
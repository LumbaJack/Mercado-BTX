<?php
require_once("twitteroauth/twitteroauth.php");

$twitteruser = "mercadobtx";
$notweets = 3;
$consumerkey = "hq4aDizjhoKV5dIi2NFdoQ";
$consumersecret = "ZlSpFbugOsoB1w2dNqMi0REwDHwTs5AoUQMnxh8P4s";
$accesstoken = "2303929123-A7iB22UttlKhf1Z4ilK0JKaycq9jYmSSHtymJRG";
$accesstokensecret = "MWbVGorH7eNIMzS9yvCz3DxC1P3PpklX6L46frgk3NdKh";

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
	$connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
	return $connection;
}

$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);

echo json_encode($tweets);
?>

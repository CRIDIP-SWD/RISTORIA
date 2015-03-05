<?php
//~ http://api.worldweatheronline.com/free/v1/weather.ashx?key=xxxxxxxxxxxxxxxxx&q=SW1&num_of_days=3&format=xml

//Minimum request
//Can be city,state,country, zip/postal code, IP address, longtitude/latitude. If long/lat are 2 elements, they will be assembled. IP address is one element.
$loc_array= Array("46.50,-1.7833");		//data validated in foreach. 
$api_key="b04cc5e17440c7232f5e70cdf0e55";		//should be embedded in your code, so no data validation necessary, otherwise if(strlen($api_key)!=24)
$num_of_days=2;					//data validated in sprintf

$loc_safe=Array();
foreach($loc_array as $loc){
	$loc_safe[]= urlencode($loc);
}
$loc_string=implode(",", $loc_safe);

//To add more conditions to the query, just lengthen the url string
$basicurl=sprintf('http://api.worldweatheronline.com/free/v2/weather.ashx?key=%s&q=%s&num_of_days=%s', 
	$api_key, $loc_string, intval($num_of_days));

//Premium API
$premiumurl=sprintf('http://api.worldweatheronline.com/premium/v1/premium-weather-V2.ashx?key=%s&q=%s&num_of_days=%s', 
	$api_key, $loc_string, intval($num_of_days));

$xml_response = file_get_contents($basicurl);
$xml = simplexml_load_string($xml_response);

 ?>
<?php

$curl = curl_init();
$channel =$_GET['c'];

$url="https://spapi.zee5.com/singlePlayback/getDetails/secure?channel_id=$channel&device_id=ff6a6d41-28fb-49c2-917f-0f51d5521835&platform_name=mobile_web&translation=en&user_language=hi&country=IN&state=UP&app_version=4.5.1&user_type=premium&check_parental_control=false&gender=Male&age_group=25-32&uid=378f3a58-4284-4a38-9d2d-f6769c0db4aa&ppid=ff6a6d41-28fb-49c2-917f-0f51d5521835&version=12";

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "x-access-token": "",  
  "Authorization": ""
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));


$response = curl_exec($curl);
curl_close($curl);

$zx = json_decode($response, true);
$image= $zx["assetDetails"]['image_url'];
$img = str_replace('270x152', '1170x658', $image);
$title= $zx["assetDetails"]['title'];
$des= $zx["assetDetails"]['description'];
$playit= $zx["keyOsDetails"]['video_token'];



header("Location: $playit");

?>

<?php

$curl = curl_init();
$channel =$_GET['id'];
curl_setopt_array($curl, [
  CURLOPT_URL => "https://api-apac.revlet.net/service/api/v1/page/stream?path=channel/live/".$channel,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "Accept: */*",
    "Host: api-apac.revlet.net",
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36",
    "box-id: 6ddcca20-7c3d-a2d9-ca8a-9764251ba601",
    "session-id: e78f7a96-5593-45b9-8c9d-dfbfe2c74d7c",
    "tenant-code: aastha"

  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


$zx = json_decode($response, true);
$streamurl = $zx["response"]["streams"][0]["url"];
if ($err) {
  echo "cURL Error #:" . $err;
} else {
   echo $streamurl;
  header("Location:".$streamurl,true,301);
}

?>
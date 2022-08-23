<?php
$data="account=$account&passwd=$password";
$curl = curl_init();
$cookiefile=dirname(__FILE__).'cookie.txt';
curl_setopt($curl, CURLOPT_URL, "https://cis.ncu.edu.tw/Course/main/news/announce");
curl_setopt($curl, CURLOPT_COOKIEJAR, $cookiefile); //取得cookie
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_exec($curl);
//登入
curl_setopt($curl, CURLOPT_URL, "https://cis.ncu.edu.tw/Course/main/login");
curl_setopt($curl, CURLOPT_COOKIEFILE, $cookiefile);//同時提交cookie
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
curl_exec($curl);

//顯示我的課表
curl_setopt($curl, CURLOPT_URL, "https://cis.ncu.edu.tw/Course/main/personal/A4Crstable");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);   
curl_setopt($curl, CURLOPT_COOKIEFILE, $cookiefile);
$result=curl_exec($curl);
echo $result;
curl_close($curl);

unlink($cookiefile);
?>
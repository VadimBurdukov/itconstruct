<?
$url = "https://api.github.com/users/vadimburdukov";

$cInit = curl_init();

curl_setopt($cInit, CURLOPT_URL, $url);
curl_setopt($cInit, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($cInit, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);

$output = curl_exec($cInit);
$info = curl_getinfo($cInit, CURLINFO_HTTP_CODE);
$result = json_decode($output);

curl_close($cInit);

if ($info==200)
{
    echo '<pre>'.print_r($result, true).'</pre>';
}

?>
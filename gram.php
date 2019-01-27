<?php


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://downloadgram.com');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$x = curl_exec($ch);


// print_r($x);

preg_match("<input name=\"build_id\" value=\"(.+?)\" type=\"hidden\" />", $x, $a);
preg_match("<input name=\"build_key\" value=\"(.+?)\" type=\"hidden\" />", $x, $b);

echo "Link Photo/Video : ";
$link = trim(fgets(STDIN));

$data = 'url='.$link.'&build_id='.$a[1].'&build_key='.$b[1];

$chs = curl_init();
curl_setopt($chs, CURLOPT_URL, 'https://downloadgram.com/process.php');
curl_setopt($chs, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($chs, CURLOPT_POSTFIELDS, $data);
$z = curl_exec($chs);

// menampilkan data dari $chs
// echo ($z);
// echo $invalid = preg_match("<a class=\"error\">", $z, $v);

preg_match("<a href=\"(.+?)\" class=\"button\" target=\"_blank\">", $z, $y);

@$download = substr($y[1], 0, -5);

echo "\n\n [+] DOWNLOAD => : \n".$download."\n\n";

?>
<?php
/* try */
/* { */
/*   $db = new PDO('mysql:host=localhost;dbname=epitech;charset=utf8', 'root', ''); */
/* } */
/* catch (Exception $e) */
/* { */
/*   die('Erreur : ' . $e->getMessage()); */
/* } */

$URL = "https://intra.epitech.eu/";

if (!isset($argv[1]))
  die("Merci d'indiquer l'url de l'event, exemple : https://intra.epitech.eu/module/2016/B-PAV-560/PAR-5-1/acti-221385/event-238443/registered\n");
$url_event = rtrim($argv[1], "/");

$ch = curl_init();
$opts_base = array( CURLOPT_URL => $URL.'login',
                    CURLOPT_SSL_VERIFYPEER => FALSE,
                    CURLOPT_VERBOSE=> FALSE,
                    CURLOPT_COOKIEJAR => "cookie.txt",
                    CURLOPT_COOKIEFILE => "cookie.txt",
                    CURLOPT_RETURNTRANSFER => TRUE,
                    CURLOPT_HTTPHEADER => array('Content-Type: application/json', 'Connection: Keep-Alive')
                    );
curl_setopt_array($ch, $opts_base);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"login":"prenom.nom@epitech.eu","password":"PASSWORD_UNIX"}');
$html = curl_exec($ch);
curl_setopt($ch, CURLOPT_POSTFIELDS, FALSE);
curl_setopt($ch, CURLOPT_POST, FALSE);
curl_setopt($ch, CURLOPT_URL, $url_event."?format=json");
$html = curl_exec($ch);
var_dump($html);

$data = explode("/", $url_event);
$full_url = "";
$lol="";
while ( $ex = (strncmp(($truc = current($data)), "acti", 4)) != 0) {
  $lol .= $truc."/";
  next($data);
}

var_dump($lol);
foreach ($data as $content)
  {
    $full_url .= $content."/";
    if (!strncmp($content, "acti", 4))
      echo "$content \n";
    else if (!strncmp($content, "event", 5))
      echo "$content \n";
  }

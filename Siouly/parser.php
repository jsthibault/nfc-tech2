<?php

try {
	$db = new PDO('mysql:host=localhost;dbname=epitech;charset=utf8', 'root', '');
}
catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
}

$filepath = file_get_contents("C:\Users\Siouly\Desktop\RFID\output.txt");
$output = json_decode($filepath, true);
$login = $output['Records'][0]['Text'];

if (isset($output['Records'][1]['Text'])) { // Debug -> permet de me repasser à absente facilement.
	$reset = $output['Records'][1]['Text'];
	if (!strcmp("siouly.nguy@epitech.eu", $login) && !strcmp("Reset", $reset)) {
		$insert = $db->prepare("UPDATE users SET status = 0 WHERE login = :login");
		$insert->execute(array('login' => $login));
	}
}
else {
	$insert = $db->prepare("UPDATE users SET status = 1 WHERE login = :login");
	$insert->execute(array('login' => $login));
}
$insert->closeCursor();	

?>

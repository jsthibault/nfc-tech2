<?php
try {
	$db = new PDO('mysql:host=localhost;dbname=epitech;charset=utf8', 'root', '');
}
catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
}

$query = $db->query('SELECT * FROM users');
echo "<table>";
while ($user = $query->fetch())
{
	$user['status'] ? $status = "Présent(e)" : $status = "Absent(e)";
	if ($user['status'])
		echo "<tr><td><b>" . $user['login'] . "</b></td><td style=\"color:green; padding:15px\">" . $status . "</td></tr>";
	else
		echo "<tr><td><b>" . $user['login'] . "</b></td><td style=\"color:red; padding:15px\">" . $status . "</td></tr>";
}
echo "</table>";
$query->closeCursor();
?>
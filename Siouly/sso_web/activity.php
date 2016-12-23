<?php
/* 
 @abstract User is directed to this page after the web app gets tokens.
*/

namespace Microsoft\Office365\UnifiedAPI\Connect;

ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('epitech_api.php');

//We store user name, id, and tokens in session variables
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Use the given name if it exists, otherwise, use the alias
$greetingName = isset($_SESSION['given_name']) 
                ? $_SESSION['given_name'] 
                : die();
$user = new \User($_SESSION['unique_name']);

function print_r_clean($array) {
	foreach	($array as $key => $value) {
		echo "<b>[$key]</b> : $value <br />";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Connexion NFCTech2</title>

  <!-- Third party dependencies. -->
  <link 
      rel="stylesheet" 
      href="https://appsforoffice.microsoft.com/fabric/1.0/fabric.css">
  <link 
      rel="stylesheet" 
      href="https://appsforoffice.microsoft.com/fabric/1.0/fabric.components.css">
  <!-- App code. -->
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="custom.css">
</head>

<body><!--<body class="ms-Grid">-->
    <div id="corps" class="ms-Grid-row">
    <!-- App navigation bar markup. -->
    <div class="ms-NavBar">
    <ul class="ms-NavBar-items">
		<li class="navbar-header">~ Connexion SSO NFCTech2 ~</li>
        <li 
			class="ms-NavBar-item ms-NavBar-item--right"
            onclick="window.location.href='disconnect.php'">
            <i class="ms-Icon ms-Icon--x"></i> Déconnexion
        </li>
    </ul>
    </div>
    <div style="padding-left:10px">
		<div>
			<p class="ms-font-m">
<?php
                    echo "<img src=\"https://cdn.local.epitech.eu/userprofil/profilview/" . $user->getUsername() . ".jpg\" alt=\"" . $user->getUsername() . "\" title=\"" . $user->getUsername() . "\" /><br />";
                    echo "<b>Login</b> : " . $user->getLogin() . "<br />";
		    echo "<b>Nom</b> : " . $user->getNom() . "<br />";
		    echo "<b>SI_Nom</b> : " . $user->getSI_Nom() . "<br />";
                    echo "<b>Prenom</b> : " . $user->getPrenom() . "<br />";
                    echo "<b>SI_Prenom</b> : " . $user->getSI_Prenom() . "<br />";
                    echo "<b>Promotion</b> : " . $user->getPromotion() . "<br />";
                    echo "<b>Username</b> : " . $user->getUsername() . "<br />";
		    echo $user->getAdmin() ? "<b>isAdmin<b> : true<br />" : "<b>isAdmin</b> : false<br />";

                        if ((!$user->getAdmin() && $user->getLogin() != "siouly.nguy@epitech.eu") && 
							(!$user->getAdmin() && $user->getLogin() != "nathan.szwec@epitech.eu") &&
							(!$user->getAdmin() && $user->getLogin() != "maxime.bourgeois@epitech.eu")) {
							die("<br /><span style=\"color:red;font-weight:bold\"><u>Erreur</u> : Vous n'êtes pas Administrateur ou membre de l'équipe pédagogique Epitech. Vous n'avez pas la permission d'acceder à ces ressources.</span>");
                        }
		?>
			</p>
		</div>
	</div>

<span style="color:red;font-size:0.5em"><b><u>Debug SSO</u></b> : </span><br /> 
<div style="height:400px;overflow-y:scroll; overflow-x:none">
<p class="ms-font-m">
<?php print_r_clean($_SESSION); ?>
</p>
</div>

</div>
</body>

</html>

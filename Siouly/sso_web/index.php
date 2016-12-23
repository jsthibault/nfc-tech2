<?php
namespace Microsoft\Office365\UnifiedAPI\Connect;

require_once'AuthenticationManager.php';

// User clicked the "connect" button. Start the authentication flow.
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    AuthenticationManager::connect();
//}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>O365 Connect sample</title>

  <!-- Third party dependencies. -->
  <link
      rel="stylesheet"
      href="https://appsforoffice.microsoft.com/fabric/1.0/fabric.css">
  <link
      rel="stylesheet"
      href="https://appsforoffice.microsoft.com/fabric/1.0/fabric.components.css">

  <!-- App code. -->
  <link rel="stylesheet" href="styles.css">
</head>

<body class="ms-Grid">
    <form action="" method="post">
    <div class="ms-Grid-row">
    <!-- App navigation bar markup. -->
        <div class="ms-NavBar">
            <ul class="ms-NavBar-items">
                <li class="navbar-header">Office 365 Connect sample</li>
            </ul>
        </div>

    <!-- App main content markup. -->
    <div class="ms-Grid-col ms-u-mdPush1 ms-u-md9 ms-u-lgPush1 ms-u-lg6">
        <div>
            <p class="ms-font-xl">Use the button below to connect to Office 365.</p>
            <button class="ms-Button">
                <span class="ms-Button-label">Connect to Office 365</span>
            </button>
        </div>
    </div>
    </div>
    </form>
</body>
</html>

<?php
/* 
 @abstract Users are redirected to this page to initiate the disconnect flow
*/

namespace Microsoft\Office365\UnifiedAPI\Connect;

require_once 'AuthenticationManager.php';

AuthenticationManager::disconnect();
?>

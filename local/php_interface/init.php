<?php
if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/constants.php")) {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/constants.php");
}

if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/event_handlers.php")) {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/event_handlers.php");
}

if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/functions.php")) {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/functions.php");
}

if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/agent.php")) {
	require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/agent.php");
}

?>
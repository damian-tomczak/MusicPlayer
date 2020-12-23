<?php
ini_set( "display_errors", true );
date_default_timezone_get("Europe/Warsow");
define("DB_DSN", "mysql:host=localhost;dbname=srv22455_muzyka");
define("DB_USERNAME", "srv22455_muzyka");
define("DB_PASSWORD", "srv22455_muzyka");
define("CLASS_PATH", "classes");
define("TEMPLATE_PATH", "templates");
define( "ADMIN_USERNAME", "admin" );
define( "ADMIN_PASSWORD", "admin" );


function handleException ($exception) {
    echo "Sorry, a problem occurred. Please try later.";
    error_log($exception->getMessage());
}

set_exception_handler('handleException');

?>
<?php
ini_set( "display_errors", true );

function handleException ($exception) {
    echo "Sorry, a problem occurred. Please try later.";
    error_log($exception->getMessage());
}

set_exception_handler('handleException');

?>
<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "db_connect.php";

// it will be implemented in the next step
?>
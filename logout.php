<?php
// closing  the session
session_start();
// remove all session variables
session_unset();
// destroy the session - process logout and redirect to login 
session_destroy();
header('Location: login.php');



?>
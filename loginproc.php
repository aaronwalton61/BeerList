<?php

// Inialize session
session_start();

// Load up the DB config and open it up.
//**************************************
include 'database/config.php';
include 'database/opendb.php';

// Retrieve username and password from database according to user's input
$login = mysql_query("SELECT * FROM user WHERE (username = '" . mysql_real_escape_string($_POST['username']) . "') and (password = '" . mysql_real_escape_string(md5($_POST['password'])) . "')");

// Check username and password match
if (mysql_num_rows($login) == 1) {
// Set username session variable
$_SESSION['username'] = $_POST['username'];
// Jump to secured page
header('Location: beer.php');
}
else {
// Jump to login page
header('Location: login.php');
}

?>
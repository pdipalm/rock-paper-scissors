<?php

include("dbpwd.php");

session_start();

$db->query("UPDATE users SET status=0 WHERE username = '". $_SESSION['username']  ."'");

unset($_SESSION['username']);
unset($_SESSION['userid']);

header('Location: home.php', true, 302);

?>
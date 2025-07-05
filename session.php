<?php
session_start();

$_SESSION["username"]="Cyber Worries";
echo $_SESSION["username"];

session_unset();
?>
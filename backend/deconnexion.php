<?php
session_destroy();
$_SESSION = array();

unset($_SESSION);

header("location:espaceadmin.php");





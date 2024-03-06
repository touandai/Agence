<?php
session_start();

session_destroy();
unset($_SESSION['donnees_client']);



header("location:../espaceclient.php");



<?php
session_destroy();

unset($_SESSION);

header("location:espaceadmin.php");





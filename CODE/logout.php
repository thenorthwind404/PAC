<?php
session_start();
session_destroy();
header('Location: SE.htm');
die();
?>
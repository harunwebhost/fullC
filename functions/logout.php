<?php 
require_once('db_function.php');
session_start();
session_destroy();
page_redirection("../index.php","Logged Out");

?>
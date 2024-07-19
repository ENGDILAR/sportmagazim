<?php
session_start();//start a new session
include('inc/connection.php');
session_unset();//clear all session data in the current session withot close it
session_destroy();//close all session and back to the default state and protect from un autherized ww
header('location: login.php');
?>
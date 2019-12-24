<?php
session_start();
require 'includes/config.php';
require 'includes/clients_functions.php';
require 'includes/users_functions.php';

if(!checkLogin())
    header("LOCATION: login.php");

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if(deleteClient($id))
    echo 'deleted';
else
    echo 'not deleted';
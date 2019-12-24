<?php
/**
 * Created by PhpStorm.
 * User: Syamٍ
 * Date: 12/24/2019
 * Time: 03:51 ص
 */
session_start();
require('includes/config.php');
require('includes/client_Functions.php');
require('includes/users_functions.php');
if(!checkLogin())
    header('LOCATION:login.php');
$id = isset($_GET['id'])?(int)$_GET['id']:0;
if(deleteClient($id))
    echo'deleted';
else
    echo'not deleted';
?>
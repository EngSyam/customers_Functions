<?php
/**
 * Created by PhpStorm.
 * User: Syamٍ
 * Date: 12/24/2019
 * Time: 06:12 ص
 */
session_start();
require('includes/users_functions.php');
logout();
header('LOCATION:login.php');
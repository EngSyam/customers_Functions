<?php
/**
 * Created by PhpStorm.
 * User: Syamٍ
 * Date: 12/24/2019
 * Time: 03:51 ص
 */
require('config.php');
require('functions.php');
$id = isset($_GET['id'])?(int)$_GET['id']:0;
if(deleteClient($id))
    echo'deleted';
else
    echo'not deleted';
?>
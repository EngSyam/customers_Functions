<?php
/**
 * Created by PhpStorm.
 * User: Syamٍ
 * Date: 12/24/2019
 * Time: 05:25 ص
 */

function login($username,$password){
    $connection = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
    if(!$connection)
        exit('ERROR : '.mysqli_error($connection));
    $query = mysqli_query($connection,"SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'");
    if(mysqli_num_rows($query)>0){
        $_SESSION['username']=$username;
        mysqli_close($connection);
        return true;
    }
    else{
        mysqli_close($connection);
        return false;
    }
}
function checkLogin(){
    return isset($_SESSION['username']);
}
function logout(){
    session_destroy();
}
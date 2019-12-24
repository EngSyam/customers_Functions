<?php
/**
 * Created by PhpStorm.
 * User: Syamٍ
 * Date: 12/24/2019
 * Time: 01:56 ص
 */
session_start();
require('includes/config.php');
require('includes/client_Functions.php');
require('includes/users_functions.php');
if(!checkLogin())
    header('LOCATION:login.php');
if(count($_POST)>0){
    $name  = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $city  = $_POST['city'];
    if(addClient($name,$email,$phone,$city))
        echo'user Added Successfully';
    else
        echo'error adding new user';

}
else{
?>
<form action="add.php" method="post">
name  <input name="name" type="text"><br>
phone <input name="phone" type="text"><br>
email <input name="email" type="text"><br>
city  <input name="city" type="text"><br>
    <button type="submit">add Client</button>
</form>
<?php } ?>
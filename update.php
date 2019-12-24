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
$id = isset($_GET['id'])?(int)$_GET['id']:0;
$client = getClient($id);
if(count($_POST)>0){
    $name  = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $city  = $_POST['city'];
    if(updateClient($id,$name,$email,$phone,$city))
        echo'user updated Successfully';
    else
        echo'error updating new user';

}
else{
?>
<form action="update.php?id=<?php echo $id; ?>" method="post">
    name  <input name="name" type="text"  value="<?php echo $client['name'] ?>"><br>
    phone <input name="phone" type="text" value="<?php echo $client['phone'] ?>"><br>
    email <input name="email" type="text" value="<?php echo $client['email'] ?>"><br>
    city  <input name="city" type="text"  value="<?php echo $client['city'] ?>"><br>
          <button type="submit">Update Client</button>
</form>
<?php }?>
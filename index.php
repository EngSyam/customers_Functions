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
$clients = getClients();
?>
welcome <?php echo $_SESSION['username'];?>|<a href="logout.php">logout</a><hr>
<h1>All Clients</h1>
<form action="search.php" method="get">
search <input type="text" name="keyword">
    <button type="submit">Search</button>
</form>
<table border="1">
    <thead>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>phone</th>
        <th>city</th>
        <th>Control</th>
    </thead>
    <?php
        foreach($clients as $client){
            $id    = $client['id'];
            $name  = $client['name'];
            $phone = $client['phone'];
            $email = $client['email'];
            $city  = $client['city'];
            echo"
                <tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$email</td>
                    <td>$phone</td>
                    <td>$city</td>
                    <td>
                        <a href='delete.php?id=$id'>delete</a>
                        <a href='update.php?id=$id'>update</a>
                    </td>
                </tr>";
        }
    ?>
</table>
<a href="add.php">Add New Client</a>
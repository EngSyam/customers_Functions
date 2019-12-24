<?php
/**
 * Created by PhpStorm.
 * User: Syamٍ
 * Date: 12/24/2019
 * Time: 01:56 ص
 */
require('config.php');
require('functions.php');
$clients = getClients();
?>
<h1>All Clients</h1>
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
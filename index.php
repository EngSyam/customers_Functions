<?php
session_start();
require 'includes/config.php';
require 'includes/clients_functions.php';
require 'includes/users_functions.php';

if(!checkLogin())
    header("LOCATION: login.php");

$clients = getClients();
?>
welcome <?php echo $_SESSION['username']; ?> | <a href="logout.php">logout</a><hr />
<h1>All Clients</h1>
<form action="search.php" method="get">
search <input type="text" name="keyword" />
<button type="submit">search</button>
</form>
<table border="1">
    <tr>
        <td>id</td>
        <td>name</td>
        <td>phone</td>
        <td>city</td>
        <td>email</td>
        <td>image</td>
        <td>control</td>
    </tr>

    <?php
        foreach ($clients as $client)
        {
            $id     = $client['id'];
            $name   = $client['name'];
            $phone  = $client['phone'];
            $city   = $client['city'];
            $email  = $client['email'];
            $image  = $client['image'];

            echo "
                <tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$phone</td>
                    <td>$city</td>
                    <td>$email</td>
                    <td><img width='100' height='100' src='uploads/$image' /> </td>
                    <td>
                        <a href='delete.php?id=$id'>delete</a>
                        <a href='update.php?id=$id'>update</a>
                    </td>
                </tr>        
            ";
        }

    ?>

</table>
<a href="add.php">add new client</a>
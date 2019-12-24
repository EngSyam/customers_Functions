<?php
session_start();
require 'includes/config.php';
require 'includes/clients_functions.php';
require 'includes/users_functions.php';

if(!checkLogin())
    header("LOCATION: login.php");

$keyword = isset($_GET['keyword'])? $_GET['keyword'] : '';

$clients = searchClients($keyword);

?>

<h1>Search Results</h1>
<form action="search.php" method="get">
search <input type="text" name="keyword" value="<?php echo $keyword; ?>" />
<button type="submit">search</button>
</form>
<table border="1">
    <tr>
        <td>id</td>
        <td>name</td>
        <td>phone</td>
        <td>city</td>
        <td>email</td>
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

            echo "
                <tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$phone</td>
                    <td>$city</td>
                    <td>$email</td>
                    <td>
                        <a href='delete.php?id=$id'>delete</a>
                        <a href='update.php?id=$id'>update</a>
                    </td>
                </tr>        
            ";
        }

    ?>

</table>
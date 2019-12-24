<?php
/**
 * Created by PhpStorm.
 * User: Syamٍ
 * Date: 12/24/2019
 * Time: 01:56 ص
 */
require('config.php');
require('functions.php');
$keyword = isset($_GET['keyword'])?$_GET['keyword']:'';
$clients = searchClients($keyword);
?>
<h1>Search Results</h1>
<form action="search.php" method="get">
    search <input type="text" name="keyword" value="<?php echo $keyword; ?>">
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
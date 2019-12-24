<?php
session_start();
require 'includes/config.php';
require 'includes/clients_functions.php';
require 'includes/users_functions.php';

if(!checkLogin())
    header("LOCATION: login.php");

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if(count($_POST) > 0)
{
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$city = $_POST['city'];
	if(updateClient($id,$name,$phone,$email,$city))
		echo 'client updated successfully';
	else
		echo 'user not updated';


}
else
{

	$client = getClient($id);

	if(count($client) == 0)
		exit('invalid client selected');

?>

	<form action="update.php?id=<?php echo $id; ?>" method="post">
	name <input type="text" name="name" value="<?php echo $client['name']; ?>" /><br />
	phone <input type="text" name="phone" value="<?php echo $client['phone']; ?>" /><br />
	email <input type="text" name="email" value="<?php echo $client['email']; ?>" /><br />
	city <input type="text" name="city" value="<?php echo $client['city']; ?>" /><br />
	<button type="submit">update client</button>
	</form>
<?php } ?>
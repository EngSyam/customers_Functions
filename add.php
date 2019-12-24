<?php
session_start();
require 'includes/config.php';
require 'includes/clients_functions.php';
require 'includes/users_functions.php';

if(!checkLogin())
    header("LOCATION: login.php");
if(count($_POST) > 0)
{
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$city = $_POST['city'];

	//images: png
	$errors = [];

	//check
	if($_FILES['image']['type'] !== 'image/png')
		$errors[] = 'only images are allowed';

	if($_FILES['image']['error'] > 0)
		$errors[] = 'error no. '.$_FILES['image']['error'].' occurred';

	if($_FILES['image']['size'] > 1024*1024)
		$errors[] = 'max file size exceeded';

	$newName = 'no-image.jpg';
	if(count($errors) == 0)
	{
		$newName = uniqueName().'.'.getExt($_FILES['image']['name']);
		move_uploaded_file($_FILES['image']['tmp_name'],'uploads/'.$newName);
	}
	if(addClient($name,$phone,$email,$city,$newName))
		echo 'user added successfully';
	else
		echo 'error adding new user';
}
else
{
?>

<form action="add.php" method="post" enctype="multipart/form-data">
name <input type="text" name="name" /><br />
phone <input type="text" name="phone" /><br />
email <input type="text" name="email" /><br />
city <input type="text" name="city" /><br />
image <input type="file" name="image" /><br />
<button type="submit">add client</button>
</form>

<?php } ?>
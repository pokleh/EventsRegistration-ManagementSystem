<?php



include('connection.php');

$id = $_POST['id'];
$message = $_POST['message'];
$userID = $_POST['userID'];

if($connection->query("INSERT INTO reply (messageID,repply,status,class,userID) VALUES ('$id','$message','unseen','admin','$userID')"))

{

	if($connection->query("UPDATE clientmessage SET statusClient = 'unseen', deleteStatus = '' WHERE id = '$id'"))
	{

	echo "<script>

	alert('Message sent');
	location.reload();

	</script>";
	}
}

?>
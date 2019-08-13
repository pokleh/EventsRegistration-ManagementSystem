<?php



include('connection.php');

$id = $_POST['id'];
$message = $_POST['message'];
$userID = $_POST['userID'];

if($connection->query("INSERT INTO reply (messageID,repply,statusAdmin,class,userID) VALUES ('$id','$message','unseen','user','$userID')")){


	if($connection->query("UPDATE clientmessage SET status = 'unseen', deleteStatusAdmin = '' WHERE id = '$id'"))
	{



	echo "<script>

	alert('Message sent');
	window.location='readmessage?id=' + $id;

	</script>";

}
}

?>
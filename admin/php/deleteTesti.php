<?php
session_start();
include('connection.php');


$id = $_POST['id'];




if($connection->query("DELETE FROM testimonials WHERE id = '$id' "))

{
	$_SESSION['deleted'] = 'Testimonial successfully deleted';
	echo "<script>
	window.location= 'testimonials';

	</script>";
}

?>
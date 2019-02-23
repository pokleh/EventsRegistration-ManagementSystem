	<style>

#men > li{
	margin-top: 5px;
}
	</style>

<ul id="men">
<?php

 

include('connection.php');



$userID = $_POST['userID'];
$eventID = $_POST['eventID'];



$query = "SELECT * FROM foodChoice WHERE userID = '$userID' AND eventID ='$eventID' AND status='' ";
$result = $connection->query($query);
	while($row = $result->fetch_assoc()){

?>

<li id="rec_<?php echo $row['id']; ?>">
<span id="rec_" style="padding-left:10px;padding-right:10px;background-image: linear-gradient(to right top, #00ebe1, #02e9e4, #0ae8e8, #16e6eb, #20e4ed);padding:5px;border-radius:5%;color:white;text-decoration:none;margin-left:5px;">
<?php echo ucwords($row['menu']); ?>
<a style="cursor:pointer;color:gray;padding-left:10px;" class="delRec" id="<?php echo $row['id']; ?>"><i class="fa fa-close" style="font-size:14px;"></i></a>
	
</span>
</li>


<?php } ?>


</ul>


<script>
	


	$(document).ready(function(){
		$(".delRec").click(function(){
			var id = $(this).attr('id');
				
				$.ajax({
					type:'post',
					url:'php/deleteMenuChoice.php',
					data:{id:id},
					success:function(data)
					{

						$("#rec_" + id).fadeOut(500);
						$("#ajax_catcher").html(data);
					}

				});

				


		});
	});

</script>
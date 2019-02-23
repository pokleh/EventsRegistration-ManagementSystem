	<style>

#men > li{
	margin-top: 5px;
	display: inline-block;margin-top: 10px;
}
	</style>

<ul id="men">
<?php

 

include('connection.php');



$lastID = $_POST['lastID'];




$query = "SELECT * FROM  packageincluded WHERE eventID = '$lastID'";
$result = $connection->query($query);
	while($row = $result->fetch_assoc()){

?>

<li id="rec_<?php echo $row['id']; ?>">
<span id="rec_" style="padding-left:10px;padding-right:10px;background-image: linear-gradient(to right top, #00ebe1, #02e9e4, #0ae8e8, #16e6eb, #20e4ed);padding:5px;border-radius:5%;color:white;text-decoration:none;margin-left:5px;">
<?php echo ucwords($row['package']); ?>
<a style="cursor:pointer;color:gray;padding-left:10px;" class="delRec" id="<?php echo $row['id']; ?>"><i class="fa fa-close" style="font-size:14px;padding-right:10px;"></i></a>
	
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
					url:'php/deletePack.php',
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
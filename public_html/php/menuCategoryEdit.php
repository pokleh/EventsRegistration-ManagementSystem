<style>
	#categoryList > li {
		display: inline-block;
		margin-top: 30px;
		margin-left: 40px; 
	}
</style>

<div class="container">
	<ul id="categoryList">
<?php
include('session.php');
$category = $_POST['category'];
$id = $_POST['id'];
$userID = $_POST['userID'];
$eventID = $_POST['eventID'];

$stmt = $connection->query("SELECT * FROM menu WHERE category = '$category' ORDER BY menu ASC");



while($row = $stmt->fetch_assoc())
{

$menuID = $row['menuID'];

$query = 
$menuChecked = $connection->query("SELECT * FROM foodchoice WHERE userID = '$userID' AND eventID = '$eventID' AND menuID = '$menuID' AND status = 'approved'");
?>




		<li>

			<img src="img/menu/<?php echo $row['img'] ?>" alt="" style="width:260px;height:260px;">
			<br><br>
			<center> <h4><?php echo ucwords($row['menu']) ?></h4> <input type="checkbox" class="menu" id="<?php echo $row['menuID']; ?>" value="<?php echo $row['menu']; ?>" <?php if($menuChecked->num_rows > 0){ echo "checked"; } ?> > </center>

	


		</li>



<?php } ?> 


</ul>

<div id="catcher"></div>
</div>

<script>
	$(document).ready(function(){
		$('.menu').on('change', function(){
			var menuID =$(this).attr('id');
			var menu = $(this).val();
			var eventID = <?php echo $id ?>;
			var userID = <?php echo $userID ?>;
   if(this.checked)
    {
     
     $.ajax({
     	type:'post',
     	url:'php/addMenuEdit.php',
     	data:{menuID:menuID,menu:menu,eventID:eventID,userID:userID},
     	success:function(x){
     		$("#catcher").html(x);
     	}

     });
 
    }
    else
    {
    	

    	 $.ajax({
     	type:'post',
     	url:'php/deleteMenu.php',
     	data:{menuID:menuID,menu:menu,eventID:eventID,userID:userID},
     	success:function(x){
     		$("#catcher").html(x);
     	}

     });



    }
})
	});
</script>
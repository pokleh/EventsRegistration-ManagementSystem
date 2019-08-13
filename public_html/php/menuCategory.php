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
$total = $_POST['total'];
$eventID = $_POST['eventID'];

$selectCount = $connection->query("SELECT count(id) AS count FROM foodchoice WHERE eventID = '$eventID' AND userID ='$userID' AND status = '' ")->fetch_assoc();

$totalCount = $selectCount['count'];
echo "<script>

$('#kaCount').val($totalCount);

</script>";


if($totalCount == $total){

    echo "<script>

 $('.menu:not(:checked)').attr('disabled', 'disabled');

</script>";

}

else
{
echo "<script>

$('.menu').removeAttr('disabled');

</script>";
}



$stmt = $connection->query("SELECT * FROM menu WHERE category = '$category' ORDER BY menu ASC");

while($row = $stmt->fetch_assoc())
{

?> 

 

		<li style="">

			<img src="img/menu/<?php echo $row['img'] ?>" alt="" style="width:260px;height:260px;">
			<br><br>
			<center>
             <h4><?php echo ucwords($row['menu']) ?></h4> <input type="checkbox"  class="menu menunu" id="<?php echo $row['menuID']; ?>" value="<?php echo $row['menu']; ?>"
              <?php 
$mID = $row['menuID'];
$selectCheck = $connection->query("SELECT * FROM foodchoice WHERE eventID = '$eventID' AND userID ='$userID' AND status = '' AND menuID ='$mID' ");
    if($selectCheck->num_rows > 0)
    {
        echo "checked";
    }

             ?>
             > 
               <br>
                <a style="cursor:pointer;text-decoration:none;color:#4285f4;"  class="infoo" id="<?php echo $row['menuID']; ?>">View info <span class="clo" style="display:none;">x</span></a>
                <br>
                <br>
                <div class="info-container" id="info_id<?php echo $row['menuID']; ?>" style="display:none;">
                    <?php echo $row['ing']; ?>
                </div>
            </center>

	


		</li>



<?php } ?>


</ul>


<input type="text" id="curID" value="" hidden>


<div id="catcher"></div>
</div>


<script>














	$(document).ready(function(){
		$('.menu').on('change', function(){
			var menuID =$(this).attr('id');
			var menu = $(this).val();
			var eventID = <?php echo $id; ?>;
			var userID = <?php echo $userID ;?>;
			var total = <?php echo $total; ?>;

           


			var id = [];  
                
                $('.menu:checked').each(function(i){  
                     id[i] = $(this).val();  
                });  

                

                if(id.length == +total) //tell you if the array is empty  
                {  
                    $('.menu:not(:checked)').attr('disabled', 'disabled');
                }   
                else
                {
                 $('.menu').removeAttr('disabled');
                }
   if(this.checked)
    {
 

     $.ajax({
     	type:'post',
     	url:'php/addMenu.php',
     	data:{menuID:menuID,menu:menu,eventID:eventID,userID:userID,total:total},
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
     	data:{menuID:menuID,menu:menu,eventID:eventID,userID:userID,total:total},
     	success:function(x){
     		$("#catcher").html(x);
     	}

     });



    }
});
	});



$(document).ready(function(){
        $('.infoo').click(function(){

var id = $(this).attr('id');
var curID = $("#curID").val();

$("#info_id" + curID).hide();



$("#info_id" + id) .toggle(function(){

});

$(".clo") .toggle(function(){

});




$("#curID").val(id);



});
    });



</script>
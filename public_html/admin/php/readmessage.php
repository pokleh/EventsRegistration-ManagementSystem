<?php
include('connection.php');
$id = $_POST['id'];

$row = $connection->query("SELECT * FROM messages WHERE id = '$id'")->fetch_assoc();

if($connection->query("UPDATE messages SET status = 'seen' WHERE id = '$id'"))
{

}

?>


<body>
	
	<!-- Trigger the modal with a button -->
<button type="button" id="trigger" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="display:none;">Open Modal</button>
 
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
        	<?php 

        	echo ucwords($row['name']) . "<br>";
        	echo "<small>" . ucfirst($row['email']) . "</small><br>" ;
        	echo "<small>" . date('g:i a',strtotime($row['dateSent'])) . " " . "<br>" . date('Y-m-d',strtotime($row['dateSent'])) . "</small>" ;

        	?>
        </h4>
      </div>
      <div class="modal-body">
        <p>
        	
        	<?php 

        		echo "<b>Suject: </b>" . $row['subject']; 

        	?>

        	<br><br>

        	<?php 

        			echo $row['message'];

        	?>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger delete2" >Delete</button>
      </div>
    </div>

  </div>
</div>
</body>

<script>
	$(document).ready(function(){

	$("#trigger").click();

	});

$(document).ready(function() {

$(".delete2").click(function(){

var id = <?php echo $id ?>;

if(confirm('Do you really want to delete this message?'))
{

    $.ajax({

        type:'post',
        url:'php/deleteMessage.php',
        data:{id:id},
        success:function(x)
        {
            $("#ajax_catcher").html(x);
        }

    });
}

});

  });


</script>
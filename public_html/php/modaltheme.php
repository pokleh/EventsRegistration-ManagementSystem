  
        <?php
include('connection.php');
$sex = $_POST['sex'];

        $selectTheme = "SELECT * FROM theme WHERE category = 'birthday' AND sex = '$sex';";
            $resultTheme = $connection->query($selectTheme);

            while($rowTheme = $resultTheme->fetch_assoc())
                    { 


        ?>



                 <img src="img/<?php echo $rowTheme['img']; ?>" alt="" style="width:100%;">
                        <br><br>
                        <h5><?php echo ucwords($rowTheme['theme']) ?></h5>
                        <br>
                      <button class="btn btn-success btn-sm selectTheme" id="<?php echo $rowTheme['theme'] ?>">Select theme</button>
                        
                        <hr>








        <?php } ?> 



 <script>

$(document).ready(function(){
    $(".selectTheme").click(function(){

        var theme = $(this).attr('id');

     $("#choosenTheme").val(theme);
     $('#modalTheme').modal('toggle');
       
        
    });

 });
 </script>
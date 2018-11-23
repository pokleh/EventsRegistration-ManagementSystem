<?php

include('../php/session.php');
if(isset($_SESSION['admin']))
{
    header("location:admin/");
}

?>
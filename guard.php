<?php
if(empty($_SESSION['studentName']))
{
    die("<script>alert('Please Sign Up first');window.location.href='studentlogin.php';</script>");
}
?>
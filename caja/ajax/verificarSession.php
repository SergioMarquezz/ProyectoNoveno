<?php
session_start();
if(isset($_SESSION['name_admin'])){
}else{
    
    echo "<script>
        window.location.href='login';
    </script>";
}
?>

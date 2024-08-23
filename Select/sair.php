<?php
    if(!isset($_SESSION)){
        session_start();
    }
        SESSION_DESTROY();
        header("location: login.php")




?>
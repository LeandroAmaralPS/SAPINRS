<?php
    session_start();
    if(!isset($_SESSION["logado"])){
        $_SESSION["logado"] = TRUE;

    } else {
        unset ($_SESSION['logado']);
        session_destroy();
    }
    
    header( "Location: /SAPINRS/index.php" );
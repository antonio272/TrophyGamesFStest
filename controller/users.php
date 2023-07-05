<?php
    require("model/users.php");

    $modelUsers = new Users;

    if( !empty($action) ) {

        if( !isset($_SESSION["user_id"]) ) {
            header("Location: " .BASE_PATH. "access/login");
            exit;
        }

        $user = $modelUsers->getUser( $action );
        
        if( empty($user) ) {
            header("HTTP/1.1 404 Not Found");
            die("Not Found");
        }

        require("view/user.php");
        
    }
    else {
        header("HTTP/1.1 400 Bad Request");
        die("Bad request");
    }

    
?>

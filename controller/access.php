<?php
    $actions = ["login", "logout", "register"];

    if( empty($action) || !in_array($action, $actions) ) {
        header("HTTP/1.1 400 Bad Request");
        die("Bad Request");
    }
    
    $action = $action;

    if( $action === "logout") {
        session_destroy();

        header("Location: " . BASE_PATH);
        exit;
    }

    require("model/users.php");
   

    $modelUsers = new Users;
   
   
    if( isset($_POST["send"]) ) {
    
        if($action === "register") {

            if ($_POST["captcha"] === $_SESSION["captcha"]){
                //var_dump(count($_POST));
                //var_dump($_POST);
                
                if( $_POST["user_type"] === "user" && count($_POST) === 7 ) {

                    $userExists = $modelUsers->checkUserExists( $_POST["name"], $_POST["email"] );

                    if( $userExists ) {
                        $message = "The email and/or name fields are already in use, please select another one(s)";
                    }
                    else {
                        $result = $modelUsers->create( $_POST );
        
                        if($result) {
                            header("Location:" .BASE_PATH. "access/login");
                        }
                        else {
                            $message = "Fill in all fields correctly";
                        }
                    }

                }
                else {
                    header("HTTP/1.1 400 Bad Request");
                    die("Bad Request");
                }
        }else{
            $message = "Incorrect captcha. Try again.";
        }
        }
        elseif($action === "login") {

                $user = $modelUsers->login( $_POST );
            
                if( !empty($user) ) {
                    
                    $_SESSION["user_id"] = $user["user_id"];
                    $_SESSION["is_admin"] = ($user["is_admin"] ? true : null);

                    $_SESSION["image"] = $user["image"];
                    $_SESSION["name"] = $user["name"];
                    $_SESSION["email"] = $user["email"];
                    header("Location: " .BASE_PATH. "games");
                }
                else {
                    $message = "Incorrect email or password. Try again.";
                }
            
        }
        
    }
    
    require("view/" .$action. ".php");
?>
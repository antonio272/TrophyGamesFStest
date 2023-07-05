<?php
    if( !isset($_SESSION["user_id"])) {
        header("Location: " .BASE_PATH. "access/login");
        exit;
    }  

    $actions = ["updateprofile", "changepassword", "delete"];

    if( empty($action) || 
        !in_array($action, $actions) 
        ){
        header("HTTP/1.1 400 Bad Request");
        die("Bad Request");
    }

    if( ( !isset($_SESSION["is_admin"]) && isset($secondAction) ) || 
        ( !isset($_SESSION["is_admin"]) && isset($thirdAction) ) || 
        ( !isset($_SESSION["is_admin"]) && !isset($_SESSION["user_id"]) && isset($_POST["user"]) )
    ){
        header("HTTP/1.1 401 Unauthorized");
        die("Unauthorized");
    }

    
    $action = $action;

    if(isset($secondAction)){
        $secondAction = $secondAction;
    }

    if(isset($thirdAction)){
        $thirdAction = $thirdAction;
    }

    require("model/users.php");
    
    $modelUsers = new Users;
    

    if( isset($_POST["send"]) ) {

        if( $action === "updateprofile" ) {

            if( isset($_SESSION["is_admin"]) && isset($secondAction) && isset($thirdAction) ) {

                if( $secondAction === "user") {

                    $oldProfile = $modelUsers->getUser( $thirdAction );

                    if( empty($_POST["name"]) ) {
                        $_POST["name"] = $oldProfile["name"];
                    }

                    if( empty($_POST["email"]) ) {
                        $_POST["email"] = $oldProfile["email"];
                    }
                    
                    $newProfile = $modelUsers->updateProfile( $_POST, $thirdAction );

                    if( isset($_POST['image'])) {
                        $name = $_POST['image'];
                        
                        @unlink($_SERVER['DOCUMENT_ROOT']."/images/" . $name);
                        
                    }

                    if($newProfile) {
                        if(isset($_SESSION["user_id"]) && isset($_POST["name"])){
                    
                            $userProfile = $modelUsers->getUser( $_SESSION["user_id"] );
                            
                            $_SESSION["name"] = $_POST["name"];
                            $_SESSION["image"] = $userProfile["image"];
                        
                        }
                        header("Location: " .BASE_PATH. "users/" .$_SESSION["user_id"]);

                        
                    }
                    else {
                        $message = "Fill in all fields correctly. 
                        Img size must be lower than 125KB.
                        Img file type must be jpg, jpeg or png";
                    }

                }
                
                
            }
            if( isset($_SESSION["user_id"]) && !isset($secondAction) && !isset($thirdAction) ) {

                $oldProfile = $modelUsers->getUser( $_SESSION["user_id"] );

                $newProfile = $modelUsers->updateProfile( $_POST, $_SESSION["user_id"] );

                if( isset($_POST["image"]) ) {
                    $name = $_POST['image'];
    
                    @unlink($_SERVER['DOCUMENT_ROOT']."/images/" . $name);
                    
                }
            
                if($newProfile) {
                    if(isset($_SESSION["user_id"]) && isset($_POST["name"])){
                    
                    $userProfile = $modelUsers->getUser( $_SESSION["user_id"] );
                    
                    $_SESSION["name"] = $_POST["name"];
                    $_SESSION["image"] = $userProfile["image"];
                    
                    }
                    header("Location: " .BASE_PATH. "users/" .$_SESSION["user_id"]);
                    
                }
                else {
                    $message = "Fill in all fields correctly. 
                    Img size must be lower than 125KB.
                    Img file type must be jpg, jpeg or png";
                }
        
            }
            

        }
        elseif( $action === "changepassword" ) {

            if( isset($_SESSION["user_id"]) ) {
                
                $result = $modelUsers->changePassword( $_SESSION["user_id"], $_POST );

                if($result) {
                    header( "Location:" .BASE_PATH. "users/". $_SESSION["user_id"] );
                }
                else {
                    $message = "Fill in all fields correctly";
                }
        
            }
            
        }
        if( $action === "delete") {

            if( isset($_SESSION["is_admin"]) && isset($_POST["user"]) ) {
                $result = $modelUsers->delete(  $_POST["user"] );
                
                if( isset($_POST["image"]) ) {
                    $name = $_POST['image'];
    
                    @unlink($_SERVER['DOCUMENT_ROOT']."/images/" . $name);
                    
                }

                if($result){
                    header("Location: " . BASE_PATH . "admin");
                }
            }
            elseif( isset($_SESSION["user_id"])) {
                $result = $modelUsers->delete($_SESSION["user_id"]);

                if( isset($_POST["image"]) ) {
                    $name = $_POST['image'];
    
                    @unlink($_SERVER['DOCUMENT_ROOT']."/images/" . $name);
                    
                }

                if($result){
                    session_destroy();
                    header("Location: " . BASE_PATH);
                    exit;
                }
            }
           

        }
    }
    
    require("view/" .$action. ".php");

?>
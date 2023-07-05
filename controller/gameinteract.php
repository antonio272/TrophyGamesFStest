<?php
    if( !isset($_SESSION["user_id"]) ) {
        header("Location: " .BASE_PATH. "access/login");
        exit;
    }    

    $actions = ["creategame", "editgame", "deletegame"];

    if( empty($action) || 
        !in_array($action, $actions) || 
        ( $action === "deletegame" && !isset($_POST["send"]) )
        ){
        header("HTTP/1.1 400 Bad Request");
        die("Bad Request");
    }

    if( ( !isset($_SESSION["is_admin"]) && isset($thirdAction) ) || 
        ( !isset($_SESSION["is_admin"]) && isset($_POST["adminDelete"]) ) 
       ){
        header("HTTP/1.1 401 Unauthorized");
        die("Unauthorized");
    }

    require("model/games.php");
    $modelGames = new Games;
 
    $action = $action;

    if( !empty($secondAction) ) {
        
        if( !isset($_SESSION["is_admin"]) ) {
            header("Location: " .BASE_PATH. "access/login");
            exit;
        }
        
        $gamePostEdit = $modelGames->getGame( $secondAction, $_SESSION["is_admin"]);
        
        if( empty($gamePostEdit) ) {
            header("HTTP/1.1 404 Not Found");
            die("Not Found");
        }

        
    }

    if( isset($_POST["send"]) ) {
    
        if($action === "creategame") {

            if( isset($_SESSION["is_admin"]) ) {

            $result = $modelGames->createGame( $_POST );
            
            if($result) {
                
                header( "Location:" .BASE_PATH. "allgames/");
                
            }

            else {
                $message = "Fill in all fields correctly. 
                            Img size must be lower than 125KB.
                            Img file type must be jpg, jpeg or png";
            }

            }
           
        }
        elseif($action === "editgame") {

            if( isset($_SESSION["is_admin"]) ){

                
                if( empty($secondAction) ) {
                    header("HTTP/1.1 400 Bad Request");
                    die("Bad Request");
                }

                $secondAction = $secondAction;

                $oldGame = $modelGames->getGame( $secondAction );

                if( empty($_POST["game_id"]) ) {
                    $_POST["game_id"] = $secondAction;
                }

                if( empty($_POST["name"]) ) {
                    $_POST["name"] = $oldGame["name"];
                }

                if( empty($_POST["description"]) ) {
                    $_POST["description"] = $oldGame["description"];
                }

                if( empty($_POST["lat1"]) ) {
                    $_POST["lat1"] = $oldGame["lat1"];
                }

                if( empty($_POST["lon1"]) ) {
                    $_POST["lon1"] = $oldGame["lon1"];
                }

                if( empty($_POST["lat2"]) ) {
                    $_POST["lat2"] = $oldGame["lat2"];
                }

                if( empty($_POST["lon2"]) ) {
                    $_POST["lon2"] = $oldGame["lon2"];
                }

                if( empty($_POST["vel1"]) ) {
                    $_POST["vel1"] = $oldGame["vel1"];
                }

                if( empty($_POST["vel2"]) ) {
                    $_POST["vel2"] = $oldGame["vel2"];
                }

                if( empty($_POST["my_image"]) ) {
                    $_POST["my_image"] = $oldGame["image"];
                }

                $newGame = $modelGames->editGame($_POST, $secondAction, $oldGame);

                if( isset($_POST["image"]) ) {
                    $name = $_POST['image'];
    
                    @unlink($_SERVER['DOCUMENT_ROOT']."/images/" . $name);
                    
                }
    
                if($newGame) {
                    header( "Location:" .BASE_PATH. "allgames/");

                    
                }
                else {
                    $message = "Fill in all fields correctly. 
                    Img size must be lower than 125KB.
                    Img file type must be jpg, jpeg or png";
                }
            
            }
            else {
                    header("HTTP/1.1 400 Bad Request");
                    die("Bad Request");
 
            }

        }
        elseif($action === "deletegame") {

            if( isset($_SESSION["is_admin"]) && isset($_POST["adminDelete"]) ) {

                $deletedGame = $modelGames->delete( $_POST["adminDelete"] );

                
                if( isset($_POST["image"]) ) {
                $name = $_POST['image'];

                @unlink($_SERVER['DOCUMENT_ROOT']."/images/" . $name);
                
                }
                
                if($deletedGame){
                    
                    header( "Location:" .BASE_PATH. "allgames/");
                    var_dump($_POST);
                   
                }

                
            }
           
        }
    }


    require("view/" .$action. ".php");
   
?>
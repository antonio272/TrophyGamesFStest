<?php
    $actions = ["subscribe", "unsubscribe"];

    if( empty($action) || !in_array($action, $actions) ) {
        header("HTTP/1.1 400 Bad Request");
        die("Bad Request");
    }

    $action = $action;

    require("model/userplays.php");
    require("model/games.php");

    $modelUserPlays = new Userplays;
    $modelGames = new Games;

    if( $action === "subscribe" ) {

        $usersPlayed = $modelUserPlays->userPlay( $_POST, $_SESSION["user_id"] );
           
        header("Location: " .BASE_PATH. "games/" .$_POST["game"]);

    }
   
   
?>
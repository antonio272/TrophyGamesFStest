<?php
   require("model/games.php");
    require("model/userplays.php");


    $modelGames = new Games;
    $modelUserPlays = new Userplays;
 
 
    if( !empty($action) ) {

        if( !isset($_SESSION["user_id"]) ) {
            header("Location: " .BASE_PATH. "access/login");
            exit;
        }
        $game = $modelGames->getGame( $action );      

        if( empty($game) ) {
            header("HTTP/1.1 404 Not Found");
            die("Not Found");
        }

        $usersPlayed = $modelUserPlays->getUserPlayed($action);

        require("view/game.php");

        $usersPlayed = array();
       
        
    }
    else {
        $games = $modelGames->getGames();

        $games = array_slice($games, 0, 3, true);/**/

        require("view/home.php");
        
    }
?>
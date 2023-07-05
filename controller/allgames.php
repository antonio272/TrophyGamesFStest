<?php
    if( !isset($_SESSION["user_id"]) ) {
        header("Location: " .BASE_PATH. "access/login");
        exit;
    }

    require("model/games.php");

    $model = new Games;
    $modelGames = new Games;
 
    $games = $model->getGames();

    require("view/allgames.php");
?>
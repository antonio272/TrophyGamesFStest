<?php
    if( !isset($_SESSION["is_admin"]) ) {
        header("Location: " .BASE_PATH. "games");
        exit;
    }

    require("model/users.php");
    require("model/games.php");
    
    $modelUsers = new Users;
    $modelGames = new Games;
    
    $users = $modelUsers->getUsers();
    $games = $modelGames->getGames();
    
    require("view/admin.php");
    
?>
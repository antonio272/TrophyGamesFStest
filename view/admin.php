<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Zone</title>
        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
            integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
        
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
<?php
    if( isset($_SESSION["is_admin"]) ) {
        include("headeradmin.php");
        
    }
    
?>
<section id="formulariologin">
                <div class="col-md-12 text-center mt-5 mb-5">
                <div class="wrap">
        <h1>Administrador Zone</h1>
        <div>
            <h2>List of Users:</h2>
            
<?php
    foreach($users as $user) {
        echo '
        <li>
            <a href="' .BASE_PATH. 'users/' .$user["user_id"]. '">' .$user["name"]. '</a>
            <p>Email [' .$user["email"]. ']</p>
            <p>Created at [' .$user["created_at"]. ']</p>';
            
            echo '
            
            <form method="post" action="' .BASE_PATH. 'profileinteract/delete">
                <input type="hidden" name="user" value="' .$user["user_id"]. '">
                <input type="hidden" name="image" value="' .$user["image"]. '">
                <button type="submit" onclick="return confirm(' ."'". 'Do you want delete this user?' ."'". ');"  name="send"> [Delete User] </button>
            </form>
        </li>
        ';
    }
    
?>
<h2>List of Games:</h2>
<?php
    foreach($games as $game) {
        echo '
        <li>
            <a href="' .BASE_PATH. 'games/' .$game["game_id"]. '"><p>Let`s play [' .$game["name"]. ']</p></a>
            <p>Created at [' .$game["created_at"]. ']</p>
        ';
            
        echo '
         
        <a href="' .BASE_PATH. 'gameinteract/editgame/' .$game["game_id"]. '"> [Edit Game] </a>
            <form method="post" action="' .BASE_PATH. 'gameinteract/deletegame">
            <input type="hidden" name="adminDelete" value="' .$game["game_id"]. '">
            <input type="hidden" name="image" value="' .$game["image"]. '">
            <button type="submit" onclick="return confirm(' ."'". 'Do you want delete this game?' ."'". ');"  name="send"> [Delete Game] </button>
            </form>
        </li>
        ';
        
    }
   
?>
    </div>
    </div>
                            
            </section>      
<?php      
          include("footer.php");
?>
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

    <!-- Script -->
    <script src="../scripts/app.js"></script>
    <script src="/scripts/ckeditorscript.js"></script>

    </body>
</html>
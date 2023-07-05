<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search Game</title>
        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
            integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
       
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
            
<?php
    include("header.php");
    
?>       
                          
        <div id="hero">
            
            <div class="container-fluid">
            <div class="row">
            <div class="col-md-1 col-sd-2 align-items-center"></div>
            <div class="gamegrid col-md-10 col-sd-8 align-items-center justify-content-center">
            <?php
                
                foreach($games as $game) {
                
                    echo '
                    <li>
                        <div class="field">
                       
                        <a href="' .BASE_PATH. 'games/' .$game["game_id"]. '">' .$game["name"]. '</a>
    
                        <a href="' .BASE_PATH. 'games/' .$game["game_id"]. '"><img src="' .BASE_PATH. 'images/'.$game["image"].'"></a>

                        <div class="fieldinfo d-flex justify-content-between px-3">
                        <p class="date">' .$game ["created_at"].  '</p>

                            <!-- div icones apagar editar -->
                            <div class="d-flex">
    
                    ';
                            if( isset($_SESSION["user_id"]) ) {
                                if( 
                                isset($_SESSION["is_admin"])){
                                    echo ' <!-- delete game -->

                                    <form method="post" action="' .BASE_PATH. 'gameinteract/deletegame">
                                    <input type="hidden" name="adminDelete" value="' .$game["game_id"]. '">
                                    <input type="hidden" name="game" value="' .$game["game_id"]. '">
                                    <input type="hidden" name="image" value="' .$game["image"]. '">
                                    
                                    <button type="submit" name="send" class="btn trigger border-0 my-2" style="background-color:transparent" 
                                    ><i class="fa fa-trash-o" style="font-size:24px; color: gray"></i></button>
                                    </form>
                                    
                                    <!--endif-->

                            <!-- edit game -->
                            
                            <button class="border-0 my-2 px-0" style="background-color:transparent">
                                    <a href="' .BASE_PATH. 'gameinteract/editgame/' .$game["game_id"]. '"> 
                                    <i class="fa fa-pencil-square-o " style="font-size:24px; color: gray"></i></button>
                                    </a>
                            </button>
                            ';
                                    }
                                }
                                echo '

                            </div>

                        </div>
                        </div>

                       
                    </li>
                    ';
                   
                }
                
            ?>
            </div>
            <div class="col-md-1 col-sd-2 align-items-center"></div>
            </div>
            </div>
        </div>
        </div>
        </div>
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
                              
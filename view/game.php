
<!DOCTYPE html>
<html lang="pt">

         <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Play Games</title>
        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
            integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600&display=swap" rel="stylesheet">
     
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/stylesgames.css">


<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>

     <script src="../scripts/app.js"></script>
     
     <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
 integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
 crossorigin=""></script>

 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

</head>
<body>
<?php
    include("header.php");
?> 
    

<div class="board">
     <!-- Script game -->

<?php

if (file_exists( $_SERVER['DOCUMENT_ROOT']."/view/gamescore/" . $game["name"] . "script.php" )) {
    include( "gamescore/". $game["name"] . "script.php" );
    
} else {
    //echo "Load game file ". $game["name"] . "script.php";
   if(isset($_SESSION["is_admin"])){
    echo '<p class="gameloadinfo">Load game file '. $game["name"] . 'script.php</p>'; 
    }else{
    echo '<p class="gameloadinfo">No game available</p>'; 
    }
    echo '<img src="' .BASE_PATH. 'images/'.$game["image"].'" 
    class="gameloadimagegame">
    ';  /**/
        
}  

?>


<div class="gameinfo">
        <h1><?php echo $game["name"]; ?></h1>
        <div>
            <div class="gameimage">    
            <?php echo '<img src="' .BASE_PATH. 'images/'.$game["image"].'">'; ?>
            </div> 
            <div class="description">
                <?php echo $game["description"]; ?>
                
            </div>  
            <div class="createdat">
                <label for="">created at
                <?php echo $game["created_at"]; ?>
                </label>
            </div>  
              
        </div>
</div>
</div>

 
    
    <?php
    if(empty($usersPlayed)) {
        //echo "<p>Doesn't exist any comments yet!</p>";
    }
    else {
        if( count($usersPlayed) === 10 ){
            //echo "<p>!!!10 Comments!!!</p>";
        }}
?>            
    

    <!--</ul>-->
<?php
    include("footer.php");
?>
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 



</body>
</html>
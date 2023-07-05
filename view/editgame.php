<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create a Post Game</title>
        <script src="/ckeditor/ckeditor.js" type="text/javascript"></script>
        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
            integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
       
        <link rel="stylesheet" href="../css/styles.css">

        <style>

header {
    background-size: 100%;
    background-color: rgb(15, 15, 15);
    height: auto;
}


header .logo-text {
    font-family: 'Candal', serif;
    color: #eaca38;
    
}

header .logo-text span {
    color: #eaca38;

}

nav ul {
    list-style: none;
    margin-right: 30px;
    
}

nav ul li {
    display: inline-block;
    margin-right: 30px;

}

nav ul li:last-child {
    margin-right: 0;

}

nav ul li:last-child a {
    display: inline-block;
    text-transform: uppercase;
    font-size: 14px;
    color: #000000;
    background: #eaca38;
    padding: 10px 35px;
    border-radius: 25px;
    border-color: #000000;
    letter-spacing: 1px;
    transition: transform .2s;

}

nav ul li:last-child a:hover {
    color: #3b9488;
    background: #FFFFFF;
    text-decoration: none;
    border-color: #3b9488;
    transform: scale(1.1);

}

nav ul li a {
    display: block;
    color: #1191a7;
    font-size: 18px;

}

nav ul li a:hover {
    color: #f8d50b;
    text-decoration: none;

}

#formulariologin {
    background: rgb(250,250,250);
    border: 1px solid rgb(255,255,255);
    font-family: 'Work Sans', sans-serif;
    height: fit-content;
    color: #888888;
    
}

#formulariologin h2 {
    color: #4f546e;
    font-size: 2vw;
    
}

#formulariologin input {
    color: #888888;
    border: 3px solid #888888;
     
}

#formulariologin .wrap {
    margin: auto;
    width: 350px;
    padding-top: 20px;
    padding-bottom: 20px;
    border: 1px solid #bbbaba;
    border-radius: 5px;
    
}
#formulariologin .wrap input {
    padding: 5px;
    margin: 2px;
    border-radius: 5px;
    border: 1px solid #bbbaba;
    width: inherit;
    
}
#formulariologin .wrap label {
    width: 90%;
    
}

footer {
    padding: 20px 0;
    background: rgb(0, 0, 0);
    color: #989898;
    font-size: 12px;
    text-align: center;
    margin-top: 50px;
}

 </style>

    </head>
    <body>
    
<?php
    include("header.php");
?>
                           
    <section id="formulariologin">
                <div class="col-md-12 text-center mt-5 mb-5">
                            <h1>Edit a Game field</h1>
<?php
    if(isset($message)) {
        echo '<p role="alert">' .$message. '</p>';
    }
    //var_dump($gamePostEdit)
    
?>

        <div class="wrap">
        <!--<div idcreateGroupForm>-->
            <form method="post" action="<?=BASE_PATH?>gameinteract/editgame/<?=$secondAction?>" enctype="multipart/form-data">

            <label>
                Name
            <input type="text" name="name"
            placeholder=<?=$gamePostEdit["name"]?> required>
            </label>
              
            <label>
                Description
               <!--<textarea name="description" cols="30" rows="10" id="myeditor" -->
                <textarea name="description" cols="30" rows="10"
                placeholder=<?=$gamePostEdit["description"]?> required></textarea>
            </label>
                       
            <label for="image" class="col-md-4 col-form-label text-md-end"></label>
                           
            <input type="file" id="image" name="my_image" class="form-control-file" accept="image/jpeg,image/png">
                
            <label>
                GAME STATS
            </label>

            <label>
                Lat ini
            <input type="number" step=".0000001" name="lat1"
            placeholder=<?=$gamePostEdit["lat1"]?>>
            </label>

            <label>
                Lng ini
            <input type="number" step=".0000001" name="lon1"
            placeholder=<?=$gamePostEdit["lon1"]?>>
            </label>

            <label>
                Lat end
            <input type="number" step=".0000001" name="lat2"
            placeholder=<?=$gamePostEdit["lat2"]?>>
            </label>

            <label>
                Lon end
            <input type="number" step=".0000001" name="lon2"
            placeholder=<?=$gamePostEdit["lon2"]?>>
            </label>

            <label>
                vel ini
            <input type="number" name="vel1"
            placeholder=<?=$gamePostEdit["vel1"]?>>
            </label>

            <label>
                vel turbo
            <input type="number" name="vel2"
            placeholder=<?=$gamePostEdit["vel2"]?>>
            </label>
            <?php echo '<input type="hidden" name="image" value="' .$gamePostEdit["image"]. '">';?>
            
            <input type="submit" value="edit" name="send">
                
            </form>

            <a href="<?=BASE_PATH?>allgames">Cancel</a>


        </div>                    
                            
    </section> 
<?php
    include("footer.php");
?>
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

    <!-- Script -->
    <script src="../scripts/app.js"></script>
    

    </body>
</html>
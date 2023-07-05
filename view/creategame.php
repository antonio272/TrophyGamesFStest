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
    </head>
    <body>
    
<?php
    include("header.php");
?>
                           
    <section id="formulariologin">
                <div class="col-md-12 text-center mt-5 mb-5">
                            <h1>Create a Game field</h1>
<?php
    if(isset($message)) {
        echo '<p role="alert">' .$message. '</p>';
    }
?>

        <div class="wrap">
        <!--<div idcreateGroupForm>-->
            <form method="post" action="<?=BASE_PATH?>gameinteract/creategame" enctype="multipart/form-data">
              
            <label>
                Name
            <input type="text" name="name" required>
            </label>

            <label>
                Description
                <textarea name="description" cols="30" rows="10" id="myeditor" required></textarea>
            </label>
                       
            <label for="image" class="col-md-4 col-form-label text-md-end"></label>
                           
            <input type="file" id="image" name="my_image" class="form-control-file" accept="image/jpeg,image/png">
                
            <label>
                GAME STATS
            </label>

            <label>
                Lat ini
            <input type="number" step=".0000001" name="lat1"
            >
            </label>

            <label>
                Lng ini
            <input type="number" step=".0000001" name="lon1"
            >
            </label>

            <label>
                Lat end
            <input type="number" step=".0000001" name="lat2"
            >
            </label>

            <label>
                Lon end
            <input type="number" step=".0000001" name="lon2"
            >
            </label>

            <label>
                vel ini
            <input type="number" name="vel1"
            >
            </label>

            <label>
                vel turbo
            <input type="number" name="vel2"
            >
            </label>
            
            <input type="submit" value="Create" name="send">
                
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
    <script src="/scripts/ckeditorscript.js"></script>

    </body>
</html>
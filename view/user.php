<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $user["name"]; ?></title>
        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
            integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600&display=swap" rel="stylesheet">

            
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
    
<?php
    include("headeruser.php");
?>
                                
                          
    <section id="formulariologin">
        <div class="col-md-12 text-center mt-5 mb-5">
            <div class="wrap">
                <form method="post" action="<?=BASE_PATH?>profileinteract/delete">
                
                <?php echo '
                <input type="hidden" name="user" value="' .$user["user_id"]. '">
                <input type="hidden" name="image" value="' .$user["image"]. '">
                '; ?>
                
                <button type="submit" onclick="return confirm('Do you want delete your perfil?');" name="send"> >Delete count< </button>
                </form>
            </div>  
   
            <?php echo '<img src="' .BASE_PATH. 'images/'.$user["image"].'" alt="" class="rounded-circle" style="width: 50px; border: 1px solid rgba(128, 128, 128, 0.16);"> '; ?>
            <h1><?php echo $user["name"]; ?></h1>
            <div class="bio">
                <p>Email:<?php echo $user["email"]; ?></p>
                <p>Created at:<?php echo $user["created_at"]; ?></p>
            </div>

        </div>
                            
    </section> 

<?php
    include("footer.php");
?>
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

    <!-- Slick Carousel -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- Custom Script -->
    <script src="../scripts/script.js"></script>
    <script src="../scripts/app.js"></script>

    </body>
</html>
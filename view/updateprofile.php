<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Profile</title>
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
                            <h1>Update Profile</h1>
<?php
    if(isset($message)) {
        echo '<p role="alert">' .$message. '</p>';
    }

?>

        <div class="wrap">
<?php
    if( isset($_SESSION["is_admin"]) && isset($secondAction) && isset($thirdAction) ){
?>
            <form method="post" action="<?=BASE_PATH?>profileinteract/updateprofile/<?=$secondAction?>/<?=$thirdAction?>" enctype="multipart/form-data">
<?php
    }
    else{
?>
            <form method="post" action="<?=BASE_PATH?>profileinteract/updateprofile" enctype="multipart/form-data">
<?php
    }
?>
                <div>
                    <label>
                        Name
                        <input type="text" name="name" maxlength="64" autofocus placeholder=<?=$_SESSION["name"]?>>
                    </label>
                </div>
                <div>
                    <label>
                        Email
                        <input type="email" name="email" placeholder=<?=$_SESSION["email"]?>>
                    </label>
                </div>

                <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>
                           
                <input type="file" id="image" name="my_imagep" class="form-control-file" accept="image/jpeg,image/png" >

                <?php echo '<input type="hidden" name="image" value="' .$_SESSION["image"]. '">';?>

                <div>
                    <button type="submit" name="send">Update</button>
                    <a href="<?=BASE_PATH?>games">Cancel</a>
                </div>
            </form>
        </div>
    
    
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
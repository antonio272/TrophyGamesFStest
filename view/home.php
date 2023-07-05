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
        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600&display=swap" rel="stylesheet">
     
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
            
<?php
    include("header.php");
    
?>                              
        <div class="scanlines"></div>            
        <div id="hero">
            <div class="row">
                <div class="col-sd-12 col-md-12 mt-4 mb-4 mb-md-5">                   
                    <div class="video-land">
                        <video
                        src="../videos/videointro.mp4"
                        muted
                        loop
                        autoplay
                        ></video>
                        <div class="findgamehome">
                            <div class="select col-md-12 d-flex align-items-center my-4"> 
                                    <button type="submit" id="newPostiniBtn" class="btn-pink mx-5" name="viewform"><a href="<?=BASE_PATH?>allgames">Play Now</a></button>    
                            </div>
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
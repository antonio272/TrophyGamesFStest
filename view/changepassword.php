<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Password</title>
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
                                
                            </ul>
                        </nav>
                    </div>
                </div>
    </header>
    <section id="formulariologin">
        <div class="col-md-12 text-center mt-5 mb-5">
                            <h1>Update Password</h1>
<?php
    if(isset($message)) {
        echo '<p role="alert">' .$message. '</p>';
    }
?>      
       <!-- <div idstoreForm>-->
            <form method="post" action="<?=BASE_PATH?>profileinteract/changepassword">
            <div class="wrap">
                <div>
                    <label>
                        Old Password
                        <input type="password" name="oldpassword" minlength="8" maxlength="1000"required >
                    </label>
                </div>
                <div>
                    <label>
                        New Password
                        <input type="password" name="newpassword" minlength="8" maxlength="1000"required >
                    </label>
                </div>
                <div>
                    <label>
                        Repeat Password
                        <input type="password" name="rep_newpassword" minlength="8" maxlength="1000" required>
                    </label>
                </div>
                <div>
                <button type="submit" name="send">Change password</button>
                <a href="<?=BASE_PATH?>groups">Cancel</a>
                </div>
            </div>
            </form>
        
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
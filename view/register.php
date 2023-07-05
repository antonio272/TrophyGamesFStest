<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
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

        <section id="formularioregister">
            <div class="col-md-12 text-center mt-5 mb-5">
                        
                    <h1>Create an account</h1>
<?php
if(isset($message)) { echo '<p role="alert">' .$message. '</p>'; }
?>
            <p>If you already have an account, <a href="<?=BASE_PATH?>access/login"> sign in</a>.</p>
            <div class="wrap">
        
        <div id="userForm">
            <form method="post" action="<?=BASE_PATH?>access/register">
                <div>
                    <label>
                        Name
                        <input type="text" name="name" minlength="2" maxlength="64"required autofocus>
                    </label>
                </div>
                <div>
                    <label>
                        Email
                        <input type="email" name="email" required>
                    </label>
                </div>
                <div>
                    <label>
                        Password
                        <input type="password" name="password" minlength="8" maxlength="1000"required >
                    </label>
                </div>
                <div>
                    <label>
                        Rep. Password
                        <input type="password" name="rep_password" minlength="8" maxlength="1000" required>
                    </label>
                </div>

                <div>
                <img src="../captcha.php">
                </div>
                <div>
                    <label>
                        Type the text!:
                        <input type="text" name="captcha" required>
                    </label>
                </div><!---->

                <div>
                <input type="hidden" name="user_type" value="user">
                <button type="submit" name="send">Registar</button>
                <a href="<?=BASE_PATH?>games">Cancel</a>
                </div>
            </form>
        </div>
        </div>
                            
        </div>            
                        
    </section>
        

        <script src="/scripts/register.js"></script>
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
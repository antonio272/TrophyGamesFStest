<nav>
<ul>
<li><a href="<?=BASE_PATH?>games"><i class="fas fa-home"></i>Home</a></li>
       
                
<?php
        
    if(isset($_SESSION["user_id"]) && !isset($_SESSION["is_admin"]) ) {
?>
        <li><a href="<?=BASE_PATH?>profileinteract/updateprofile"><i class="fas fa-user"></i>Update Profile</a></li>
        <li> <a href="<?=BASE_PATH?>profileinteract/changepassword"><i class="fas fa-user"></i>Change Password</a></li> 
        <li><?php echo '<img src="' .BASE_PATH. 'images/'.$_SESSION["image"].'" alt="" class="rounded-circle" style="width: 50px; border: 1px solid rgba(128, 128, 128, 0.16);"> '; ?></li>                  
<?php
        }
        elseif(isset($_SESSION["user_id"]) && isset($_SESSION["is_admin"]) ) {
?>
        <li><a href="<?=BASE_PATH?>profileinteract/updateprofile"><i class="fas fa-user"></i>Update Profile</a></li>
        <li> <a href="<?=BASE_PATH?>profileinteract/changepassword"><i class="fas fa-user"></i>Change Password</a></li>              
        <li><a href="<?=BASE_PATH?>admin"><i class="fas fa-user"></i>My Admin</a></li>
        <li><?php echo '<img src="' .BASE_PATH. 'images/'.$user["image"].'" alt="" class="rounded-circle" style="width: 50px; border: 1px solid rgba(128, 128, 128, 0.16);"> '; ?></li>
                
<?php

}
?>
</ul>
    
</nav>



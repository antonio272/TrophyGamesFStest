<nav>
<?php
    if(!isset($_SESSION["user_id"])) {
?>
        
        <li><a href="<?=BASE_PATH?>access/login" class="nouser"><i class="fas fa-user"></i>Login</a></li>
        
<?php
    }
    else if(isset($_SESSION["is_admin"])){
?>
        <li><a href="<?=BASE_PATH?>games"><i class="fas fa-home"></i>Home</a></li>
        <li><a href="<?=BASE_PATH?>allgames"><i class="fas fa-gamepad"></i>Games</a></li>
        <li><a href="<?=BASE_PATH?>users/<?=$_SESSION["user_id"]?>"><i class="fas fa-user"></i>My Profile</a></li>
        <li><a href="<?=BASE_PATH?>access/logout"><i class="fas fa-user"></i>Logout</a></li>
        <li><?php echo '<img src="' .BASE_PATH. 'images/'.$_SESSION["image"].'" alt="" class="rounded-circle" style="width: 50px; border: 1px solid rgba(128, 128, 128, 0.16);"> '; ?></li>  
       
<?php
}
elseif(isset($_SESSION["user_id"])) {
?>
        <li><a href="<?=BASE_PATH?>games"><i class="fas fa-home"></i>Home</a></li>
        <li><a href="<?=BASE_PATH?>allgames"><i class="fas fa-gamepad"></i>Games</a></li>
        <li><a href="<?=BASE_PATH?>users/<?=$_SESSION["user_id"]?>"><i class="fas fa-user"></i>My Profile</a></li>
        <li><a href="<?=BASE_PATH?>access/logout"><i class="fas fa-user"></i>Logout</a></li> 
        <li><?php echo '<img src="' .BASE_PATH. 'images/'.$_SESSION["image"].'" alt="" class="rounded-circle" style="width: 50px; border: 1px solid rgba(128, 128, 128, 0.16);"> '; ?></li>    
       

<?php  
}
?>
</nav>
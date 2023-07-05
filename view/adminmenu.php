<nav>
<ul>
<li><a href="<?=BASE_PATH?>games"><i class="fas fa-home"></i>Home</a></li>
       
                
<?php
        
    if(isset($_SESSION["user_id"]) && !isset($_SESSION["is_admin"]) ) {
?>
        
<?php
        }
        elseif(isset($_SESSION["user_id"]) && isset($_SESSION["is_admin"]) ) {
?>
        
        <li><a href="<?=BASE_PATH?>users/<?=$_SESSION["user_id"]?>"><i class="fas fa-user"></i>My Profile</a></li>
        <li><a href="<?=BASE_PATH?>gameinteract/creategame"><i class="fas fa-pen"></i>New game</a></li>
        <li><a href="<?=BASE_PATH?>access/logout"><i class="fas fa-user"></i>Logout</a></li> 
        <li><?php echo '<img src="' .BASE_PATH. 'images/'.$_SESSION["image"].'" alt="" class="rounded-circle" style="width: 50px; border: 1px solid rgba(128, 128, 128, 0.16);"> '; ?></li>
                
<?php
        }
?>
</ul>
    
</nav>



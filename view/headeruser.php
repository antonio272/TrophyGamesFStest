<header class="container-fluid sticky-top">
                <div class="row no-gutters">           
                    <div class="col-3 mt-2 ml-2 col-md-3 text-md-right mt-md-3">        
                            <h1 class="logo-text"><span>AF</span> </h1>   
                    </div> 
                    
                    <div class="col-md-8">
                        <nav class="text-center text-md-right mt-md-4">
                            <ul>
<?php
    if( isset($_SESSION["user_id"])){
        if($_SESSION["user_id"] === $user["user_id"]){
            include("profilemenu.php");
        }
        else{
            include("menu.php");
        }
    }
?>                           
                            </ul>
                        </nav>
                    </div>
                </div>
</header>


                
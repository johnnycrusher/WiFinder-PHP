<div id="button-loc">
<?php 
$name = $_SERVER['PHP_SELF'];
if(strcmp($name,"/search_page.php")==0){
    echo('<a href="search_page.php" id="search-menu" class="current-page">Search <i class="fa fa-search"></i></a>');
    echo('<a href="Registration_page.php" id="sign-up-menu" class="menu-btn">Sign-Up <i class="fa fa-user-plus"></i></a>');
    echo('<a href="Login_page.php" id="login-menu" class="menu-btn">Login <i class="fa fa-user-o"></i></a>');
} elseif(strcmp($name,"/Registration_page.php")==0){
    echo('<a href="search_page.php" id="search-menu" class="menu-btn">Search <i class="fa fa-search"></i></a>');
    echo('<a href="Registration_page.php" id="sign-up-menu" class="current-page">Sign-Up <i class="fa fa-user-plus"></i></a>');
    echo('<a href="Login_page.php" id="login-menu" class="menu-btn">Login <i class="fa fa-user-o"></i></a>');
} elseif (strcmp($name,"/Login_page.php")==0){
    echo('<a href="search_page.php" id="search-menu" class="menu-btn">Search <i class="fa fa-search"></i></a>');
    echo('<a href="Registration_page.php" id="sign-up-menu" class="menu-btn">Sign-Up <i class="fa fa-user-plus"></i></a>');
    echo('<a href="Login_page.php" id="login-menu" class="current-page">Login <i class="fa fa-user-o"></i></a>');
} else{
    echo('<a href="search_page.php" id="search-menu" class="menu-btn">Search <i class="fa fa-search"></i></a>');
    echo('<a href="Registration_page.php" id="sign-up-menu" class="menu-btn">Sign-Up <i class="fa fa-user-plus"></i></a>');
    echo('<a href="Login_page.php" id="login-menu" class="menu-btn">Login <i class="fa fa-user-o"></i></a>');
}
?>
</div>








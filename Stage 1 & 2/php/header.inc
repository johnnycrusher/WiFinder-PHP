<div id="logo-elements" class="center-items">
<img id="logo-img" src="img/logo_final_text_400x400.png" width="277" height="81" alt="WiFinder Logo">
</div>
<div id="header-text" class="center-items">
<?php
$name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
    if(strcmp($name,"search_page")==0){
        echo("<h1>Advance Search Page</h1>");
    } elseif(strcmp($name,"Registration_Page")==0){
        echo("<h1>Registration Page</h1>");
    } elseif(strcmp($name,"Login_page")==0){
        echo("<h1>Login</h1>");
    } elseif(strcmp($name,"Individual_Result_Page")==0){
        echo("<h1>WiFi Location</h1>");
    } elseif(strcmp($name,"search_results_page")==0){
        echo("<h1>Results</h1>");
    }
?>
    
</div>

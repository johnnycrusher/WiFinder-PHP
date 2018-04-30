<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Registration Page</title>
        <link href="css/Registration_Page_Styles.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="js/registration_page_script.js"></script>
    </head>
    <body>
        <div class="grid">
            <div id="header">
                <div id="logo-elements" class="center-items">
                <img id="logo-img" src="img/logo final text 400x400.png" width="277px" height="81px">
                </div>
                <div id="header-text" class="center-items">
                    <h1>Sign Up</h1>
                </div>
            </div>
            <div id="header-fill-left"></div>
            <div id="header-fill-right"></div>
            <div id="menubar">
                <div id="button-loc">
                    <a href="search_page.html" id="search-menu" class="menu-btn">Search <i class="fa fa-search"></i></a>
                    <a href="Registration_page.html" id="sign-up-menu"class="current-page">Sign-Up <i class="fa fa-user-plus"></i></a>
                    <a href="Login_Page.html" id="login-menu" class="menu-btn">Login <i class="fa fa-user-o"></i></a>
                </div>
            </div>
            <div id="content">
                <div id="other">
                    <h1>This is a page for other content</h1>
                    <h2>other shit blah blah blah</h2>
                </div>
                <div id="registation">
                    <?php 
                        $errors = array();
                        $submitted = False;
                        require(dirname(__DIR__).'/Stage 1 & 2/php/validate.php');
                        if(isset($_POST['first-name'])|| isset($_POST['last-name'])){
                            validateName($errors, $_POST, 'first-name', 'last-name');
                        }
                        if(isset($_POST['email'])){
                            validateEmail($errors, $_POST, 'email');
                        }
                        if(isset($_POST['username'])){
                            validateUsername($errors, $_POST, 'username');
                        }
                        if(isset($_POST['password'])){
                            validatePassword($errors, $_POST, 'password','confirm-password');
                        }
                        if(isset($_POST['month'])){
                            validateBirthday($errors, $_POST, 'month','day', 'year');
                        }
                        
                        if ($errors) {
                            echo '<h1>Invalid, correct the following errors:</h1>';
                            foreach ($errors as $field => $error) {
                                echo "$field $error<br>";
                            }
                        // redisplay the form
                        } else if($submitted) {
                            echo 'form submitted successfully with no errors';
                        }
                    ?>
                    <form id="create-account" action="Registration_Page.php" method="POST">
                        <fieldset>
                            <legend>
                                <Strong>Sign Up</Strong>
                            </legend>
                            <!-- <p><strong>Name:</strong></p>
                            <input type="text" id="firstName" name="First Name" class="input-field" placeholder="First Name" required="required" onchange="hideError(this)">
                            <input type="text" id="lastName" name="Last Name" class="input-field" placeholder="Last Name" required="required" onchange="hideError(this)">
                            <span id="nameMissing" class="error-message">First Name and Last Name is a required field!</span> -->
                            <?php
                                $error = array();
                                require(dirname(__DIR__).'/Stage 1 & 2/php/fields.php');
                                generateName($error);
                                generateDataField("Email:","email","email","email", "input-field","Email","hideError(this)",$error);
                                generateDataField("Username:","text","username","username","input-field","Username","hideError(this)",$error);
                                generatePassword($error);
                                birthdayField($error);
                            ?>
                            <!-- <p><strong>Email:</strong></p>
                            <input type="email" id="email" name="email" class="input-field" placeholder="Email" required="required" onchange="hideError(this)">
                            <span id="emailMissing" class="error-message"> Email is a required field! </span> -->

                            <!-- <p><strong>Username:</strong></p>
                            <input type="text" id="username" name="username" class="input-field" placeholder="Username" required="required" onchange="hideError(this)">
                            <span id="usernameMissing" class="error-message"> Username is a required field! </span> -->

                            <!-- <p><strong>Password:</strong></p>
                            <input type="password" id="password" name="password" class="input-field" required="required" onchange="hideError(this)">
                            <p><strong>Comfirm your Password:</strong></p>
                            <input type="password" id="confirm-password" name="confirm-password" class="input-field" required="required" onchange="hideError(this)">
                            <span id="passwordMissing" class="error-message">Password is a required field!</span> -->

                            <!-- <p><strong>Birthday:</strong></p>
                            <select id="month" name="month" onchange="hideError(this)">
                                <option value="Select">Select</option>
                                <option value="Jan">Jan</option>
                                <option value="Feb">Feb</option>
                                <option value="Mar">Mar</option>
                                <option value="May">May</option>
                                <option value="Jun">Jun</option>
                                <option value="Jul">Jul</option>
                                <option value="Aug">Aug</option>
                                <option value="Sep">Sep</option>
                                <option value="Oct">Oct</option>
                                <option value="Nov">Nov</option>
                                <option value="Dec">Dec</option>
                            </select>
                            <input type="number" id="day" name="day" placeholder="day" required="required"  onchange="hideError(this)">
                            <input type="number" id="year" name="year" min="1900" max="2018" required="required" placeholder="Year" onchange="hideError(this)">
                            <span id="birthdayMissing" class="error-message"> Password is not the same on both fields! </span> -->
                            <p><strong>Gender:</strong></p>
                            <input type="radio" id="female-gender" class="radio-btn" name="Gendern" value="Female" onchange="hideError(this)"> Female
                            <input type="radio" id="male-gender" class="radio-btn" name="Gender" value="Male" onchange="hideError(this)"> Male
                            <input type="radio" id="other-gender" class="radio-btn" name="Gender" value="Other" onchange="hideError(this)"> Other
                            <span id="genderMissing" class="error-message">Please select a gender!</span><br>
                            <input id="sign-up-btn" type="Submit" value="Sign up" onclick="return validate()"/>
                        </fieldset>
                    </form>     
                </div>
            </div>
            <div id="footer">
                <div id="Our-Mission-Text">
                    <h2>Our Mission</h2>
                    <p>WiFinder mission is to conntect the citizens of Brisbane with location data on where the closest Free Wifi-Location. To ensure they stay connected to the internet</p>
                </div>
                <div id="connect-with-us">
                    <h2>Connect With Us On:</h2>
                    <a href="" style="Color:White"><i class="fa fa-facebook-square fa-3x"></i></a>
                    <a href="" style="Color:White"><i class="fa fa-instagram fa-3x"></i></a>
                    <a href="" style="Color:White"><i class="fa fa-twitter-square fa-3x"></i></a>
                </div>
            </div>
            <div id="footer-fill-left"></div>
            <div id="footer-fill-right"></div>
        </div>
    </body>
</html>
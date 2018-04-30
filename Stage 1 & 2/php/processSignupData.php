<?php
$errors = array();
require 'validate.php';
validateName($errors, $_POST, 'first-name', 'last-name');
validateEmail($errors, $_POST, 'email');
validatePassword($errors, $_POST, 'password','confirm-password');
validateUsername($errors, $_POST, 'username');
validateBirthday($errors, $_POST, 'month','day', 'year');
if ($errors) {
    echo '<h1>Invalid, correct the following errors:</h1>';
    foreach ($errors as $field => $error) {
        echo "$field $error<br>";
    }
// redisplay the form
} else {
    echo 'form submitted successfully with no errors';
}
?>
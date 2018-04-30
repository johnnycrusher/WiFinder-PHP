<?php 
function generateFieldName($name){
    echo("<p><strong>".$name."</strong></p>");
}

function generateInputField($type, $id,$name, $class,$value,$placeholder,$onchange){
    echo("<input type=\"$type\" id=\"$id\" name=\"$name\" class=\"$class\" value=\"$value\" placeholder=\"$placeholder\" onchange=\"$onchange\">");
    postData($name);
}

function generateError($error, $id){
    $errorID = "error-".$id;
    echo ("<span id=\"$errorID\" class=\"error-message\">");
    if(isset($error[$id])){
        echo($error[$name]);
    }
    echo("</span>");
}

function postData($name){
    if(isset($_POST[$name])){
        return htmlspecialchars($_POST[$name]);
    }
    else {
        return "";
    }
}

function generateBirthMonthField($id, $name, $onchange){
    echo("<select id=\"$id\" name=\"$name\" onchange=\"$onchange\">");
    $monthArray = array("Select","Jan","Feb","Mar","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
    for($month = 0; $month<sizeof($monthArray); $month++){
        echo("<option value=\"$monthArray[$month]\">$monthArray[$month]</option>");
    }
}

function generateDataField($labelName,$type,$id,$name,$class,$placeholder,$onchange,$error){
    generateFieldName($labelName);
    $value = postData($name);
    generateInputField($type, $id, $name, $class,$value, $placeholder, $onchange,$error);
    generateError($error,$id);
}

function birthdayField($errors){
    generateFieldName("Birthday:");
    generateBirthMonthField("month","month","hideError(this)");
    $dayValue = postData("day");
    $yearValue = postData("year");
    generateInputField("number","day","day","null",$dayValue,"day","hideError(this)");
    generateInputField("number","year","year","null",$yearValue,"year","hideError(this)");
    generateError($errors,"birthday");
}

function generateName($error){
    generateFieldName("Name:");
    $firstNameValue = postData("first-name");
    $lastNameValue = postData("last-name");
    generateInputField("text","firstName","first-name","input-field",$firstNameValue,"First Name","hideError(this)");
    generateInputField("text","lastName","last-name","input-field",$lastNameValue,"Last Name","hideError(this)");
    generateError($error,"name");
}

function generatePassword($error){
    generateFieldName("Password:");
    $value = "";
    generateInputField("password","password", "password","input-field",$value,"Password","hideError(this)");
    generateFieldName("Confirm your Password:");
    generateInputField("password","confirm-password","confirm-password","input-field",$value,"Password","hideError(this)");
    generateError($error, "password");
}
function generateGender($error){

}
?>
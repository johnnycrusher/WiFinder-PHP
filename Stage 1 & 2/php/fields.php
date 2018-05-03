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
   
    if(isset($error[$id])){
        echo ("<span id=\"$errorID\" class=\"error-message\" style=\"visibility: visible\">");
        echo($error[$id]);
    }else{
        echo ("<span id=\"$errorID\" class=\"error-message\">");
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
    $monthValue = postData("month");
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

function generateRadioBox($id, $class, $name, $value, $onchange , $checked){
    echo("<input type=\"radio\" id=\"$id\" class=\"$class\" name=\"$name\" value=\"$value\" onchange=\"$onchange\" checked=\"$checked\"> $value ");
}

function generateGender($error){
    generateFieldName("Gender:");
    echo("<input type=\"hidden\" name=\"gender\" value=\"no-selection\" />");
    if(isset($_POST['gender'])){
        $value = $_POST['gender'];
        if(strcmp($value,"Female") == 0){
            generateRadioBox("femail-gender", "radio-btn", "gender", "Female", "hideEror(this)","checked");
            generateRadioBox("male-gender", "radio-btn", "gender", "Male", "hideEror(this)","false");
            generateRadioBox("other-gender", "radio-btn", "gender", "Other", "hideEror(this)","false");
        }else if(strcmp($value,"Male") == 0){
            generateRadioBox("femail-gender", "radio-btn", "gender", "Female", "hideEror(this)","false");
            generateRadioBox("male-gender", "radio-btn", "gender", "Male", "hideEror(this)","checked");
            generateRadioBox("other-gender", "radio-btn", "gender", "Other", "hideEror(this)","false");
        }else if(strcmp($value,"Other") == 0){
            generateRadioBox("femail-gender", "radio-btn", "gender", "Female", "hideEror(this)","false");
            generateRadioBox("male-gender", "radio-btn", "gender", "Male", "hideEror(this)","false");
            generateRadioBox("other-gender", "radio-btn", "gender", "Other", "hideEror(this)","checked");
        } else{
            generateRadioBox("femail-gender", "radio-btn", "gender", "Female", "hideEror(this)","false");
            generateRadioBox("male-gender", "radio-btn", "gender", "Male", "hideEror(this)","false");
            generateRadioBox("other-gender", "radio-btn", "gender", "Other", "hideEror(this)","false");
        }
    }
    else{
        generateRadioBox("femail-gender", "radio-btn", "gender", "Female", "hideEror(this)","false");
        generateRadioBox("male-gender", "radio-btn", "gender", "Male", "hideEror(this)","false");
        generateRadioBox("other-gender", "radio-btn", "gender", "Other", "hideEror(this)","false");
    }
    generateError($error, "gender");
}
?>
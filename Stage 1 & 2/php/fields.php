<?php 
function generateFieldName($name){
    echo("<p><strong>".$name."</strong></p>");
}

function generateInputField($type, $id,$name, $class,$value,$placeholder,$onchange){
    echo("<input type=\"$type\" id=\"$id\" name=\"$name\" class=\"$class\" value=\"$value\" placeholder=\"$placeholder\" onchange=\"$onchange\">");
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

function generateBirthMonthField($id, $name, $onchange,$postDataBool){
    if($postDataBool == true){
        $value = postData($name);
    }else{
        $value = "Select";
    }
    
    echo("<select id=\"$id\" name=\"$name\" onchange=\"$onchange\">");
    $monthArray = array("Select","Jan","Feb","Mar","April","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
    $monthValue = array("Select","01","02","03","04","05","06","07","08","09","10","11","12");
    for($month = 0; $month<sizeof($monthArray); $month++){
        if($value == $monthValue[$month]){
            echo("<option value=\"$monthValue[$month]\" selected=\"selected\">$monthArray[$month]</option>");
        }
        echo("<option value=\"$monthValue[$month]\">$monthArray[$month]</option>");
    }
}

function generateDataField($labelName,$type,$id,$name,$class,$placeholder,$onchange,$error,$postDataBool){
    generateFieldName($labelName);
    if($postDataBool == true){
        $value = postData($name);
    }else{
        $value = "";
    }
    generateInputField($type, $id, $name, $class,$value, $placeholder, $onchange,$error);
    generateError($error,$id);
}

function birthdayField($errors,$postDataBool){
    generateFieldName("Birthday:");
    $monthValue = postData("month");
    generateBirthMonthField("month","month","hideError(this)",$postDataBool);
    if($postDataBool == true){
        $dayValue = postData("day");
        $yearValue = postData("year");
    }else{
        $dayValue = "";
        $yearValue = "";
    }
    generateDateInputField("number","day","day",$dayValue,"day","hideError(this)");
    generateDateInputField("number","year","year",$yearValue,"year","hideError(this)");
    generateError($errors,"birthday");
}

function generateName($error,$postDataBool){
    generateFieldName("Name:");
    if($postDataBool == true){
        $firstNameValue = postData("first-name");
        $lastNameValue = postData("last-name");
    }else{
        $firstNameValue = "";
        $lastNameValue = "";
    }
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

function generateDateInputField($type, $id,$name,$value,$placeholder,$onchange){
    echo("<input type=\"$type\" id=\"$id\" name=\"$name\" value=\"$value\" placeholder=\"$placeholder\" onchange=\"$onchange\">");
}

function generateRadioBox($id, $class, $name, $value, $onchange, $checked){
    if(strcmp($checked,"false")==0){
        echo("<input type=\"radio\" id=\"$id\" class=\"$class\" name=\"$name\" value=\"$value\" onchange=\"$onchange\"> $value ");
    }else{
        echo("<input type=\"radio\" id=\"$id\" class=\"$class\" name=\"$name\" value=\"$value\" onchange=\"$onchange\" checked=\"$checked\"> $value ");
    }
    
}

function generateGender($error,$postDataBool){
    generateFieldName("Gender:");
    echo("<input type=\"hidden\" name=\"gender\" value=\"no-selection\" />");
    if(isset($_POST['gender']) && $postDataBool == true){
        $value = $_POST['gender'];
        if(strcmp($value,"Female") == 0){
            generateRadioBox("female-gender", "radio-btn", "gender", "Female", "hideEror(this)","checked");
            generateRadioBox("male-gender", "radio-btn", "gender", "Male", "hideEror(this)","false");
            generateRadioBox("other-gender", "radio-btn", "gender", "Other", "hideEror(this)","false");
        }else if(strcmp($value,"Male") == 0){
            generateRadioBox("female-gender", "radio-btn", "gender", "Female", "hideEror(this)","false");
            generateRadioBox("male-gender", "radio-btn", "gender", "Male", "hideEror(this)","checked");
            generateRadioBox("other-gender", "radio-btn", "gender", "Other", "hideEror(this)","false");
        }else if(strcmp($value,"Other") == 0){
            generateRadioBox("female-gender", "radio-btn", "gender", "Female", "hideEror(this)","false");
            generateRadioBox("male-gender", "radio-btn", "gender", "Male", "hideEror(this)","false");
            generateRadioBox("other-gender", "radio-btn", "gender", "Other", "hideEror(this)","checked");
        } else{
            generateRadioBox("female-gender", "radio-btn", "gender", "Female", "hideEror(this)","false");
            generateRadioBox("male-gender", "radio-btn", "gender", "Male", "hideEror(this)","false");
            generateRadioBox("other-gender", "radio-btn", "gender", "Other", "hideEror(this)","false");
        }
    }
    else{
        generateRadioBox("female-gender", "radio-btn", "gender", "Female", "hideEror(this)","false");
        generateRadioBox("male-gender", "radio-btn", "gender", "Male", "hideEror(this)","false");
        generateRadioBox("other-gender", "radio-btn", "gender", "Other", "hideEror(this)","false");
    }
    generateError($error, "gender");
}
?>
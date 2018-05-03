<?php
function validateName(&$error, $field_list, $field_name, $field_lastName){
    if((strlen($field_list[$field_name]) == 0) && !($field_list[$field_lastName] == 0)){
        $error["name"] = 'First Name is required field';
    }
    if((strlen($field_list[$field_lastName]) == 0) && !(strlen($field_list[$field_name]) == 0)){
        $error["name"] = 'Last Name is a required field';
    }
    if(strlen($field_list[$field_name]) == 0 && (strlen($field_list[$field_lastName]) == 0)){
        $error["name"] = 'First Name and Last Name is required field';
    }
}

function validateEmail(&$error, $field_list, $field_name) {
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
    if (!isset($field_list[$field_name])|| empty($field_list[$field_name])) {
    $error[$field_name] = 'Email is a required field';
    } else if (!preg_match($pattern, $field_list[$field_name])) {
    $error[$field_name] = 'Email is invalid';
    }
}

function validatePassword(&$error,$field_list, $field_name, $field_name_confirm){
    if( strlen($field_list[$field_name]) == 0){
        $error[$field_name] = 'Password is a required field';
    }else if (strlen($field_list[$field_name]) < 8 && strlen($field_list[$field_name]) > 0){
        $error[$field_name] = 'Password entered is less then 8 Characers';
    }else if (strcmp($field_list[$field_name],$field_list[$field_name_confirm])){
        $error[$field_name] = "Passwords do not match";
    }
}

function validateUsername(&$error, $field_list,$field_name){
    if(strlen($field_list[$field_name]) == 0){
        $error[$field_name] = "Username is a required field";
    }
}

function validateBirthday(&$error, $field_list, $field_month,$field_day, $field_year){
    
    $day = (int)$field_list[$field_day];
    $year = (int)$field_list[$field_year];
    switch ($field_list[$field_month]){
        case "Jan":
        case "Mar":
        case "Jul";
        case "Oct";
        case "Dec":
            if(($day<=0) || ($day>31)){
                $error["birthday"] = "This is not a valid Date";
            }
            break;
        case "Apr":
        case "Jun":
        case "Sep":
        case "Nov":
            if(($day<0) || ($day>30)){
                $error["birthday"] = "This is not a valid Date";
            }
            break;
        case "Feb":
            $leapYearChecker = checkLeapYear($year);
            if($leapYearChecker == true){
                if($day>29 || $day<0){
                    $error["birthday"] = "This is not a valid Date";
                }
            }
            else {
                if ($day>28 || $day<0){
                    $error["birthday"] = "This is not a valid Date";
                }
            }
            break;
        default:
            $error["birthday"] = "Please select a month";
    }        
}

function checkLeapYear($year){
    $yearDivBy4 = $year % 4;
    $yearDivBy100 = $year % 100;
    $yearDivBy400 = $year % 400;

    if(($yearDivBy4==0) && !($yearDivBy100 == 0)){
        return true;
    }else if($yearDivBy400==0){
        return true;
    }else{
        return false;
    }
}

function validateGender(&$error, $field_list, $field_name){
    if(strcmp($field_list[$field_name],"no-selection") == 0){
        $error[$field_name] = "Please select a gender";
    }
}
?>
<?php
function validateName(&$errors, $field_list, $field_name, $field_lastName){
    if(strlen($field_list[$field_name]) == 0){
        $error[$field_name] = 'required';
    }
    if(strlen($field_list[$field_lastName] == 0)){
        $errors[$field_lastName] = 'required';
    }
}
function validateEmail(&$errors, $field_list, $field_name) {
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
    if (!isset($field_list[$field_name])|| empty($field_list[$field_name])) {
    $errors[$field_name] = 'required';
    } else if (!preg_match($pattern, $field_list[$field_name])) {
    $errors[$field_name] = 'invalid';
    }
}

function validatePassword(&$error,$field_list, $field_name, $field_name_confirm){
    if( strlen($field_list[$field_name]) == 0){
        $error[$field_name] = 'required';
    }else if (strlen($field_list[$field_name]) < 8 && strlen($field_list[$field_name]) > 0){
        $error[$field_name] = 'invalid';
    }else if (strcmp($field_list[$field_name],$field_list[$field_name_confirm])){
        $error[$field_name] = "does not match";
    }
}

function validateUsername(&$error, $field_list,$field_name){
    if(strlen($field_list[$field_name]) == 0){
        $error[$field_name] = "required";
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
                $error[$field_month] = "This is not a valid Date";
            }
            break;
        case "Apr":
        case "Jun":
        case "Sep":
        case "Nov":
            if(($day<0) || ($day>30)){
                $error[$field_month] = "This is not a valid Date";
            }
            break;
        case "Feb":
            $leapYearChecker = checkLeapYear($year);
            if($leapYearChecker == true){
                if($day>29 || $day<0){
                    $error[$field_month] = "This is not a valid Date";
                }
            }
            else {
                if ($day>28 || $day<0){
                    $error[$field_month] = "This is not a valid Date";
                }
            }
            break;
        default:
            $error[$field_month] = "required";
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
?>
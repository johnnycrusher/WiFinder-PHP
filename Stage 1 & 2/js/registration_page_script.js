function validate(){  
    checkName();
    checkEmail();
    checkUsername();
    checkPassword();
    checkBirthDate();
}
function checkName(){
    var firstName = document.getElementById("firstName");
    var firstNameValue = firstName.value;

    var lastName = document.getElementById("lastName");
    var lastNameValue = lastName.value;

    if((firstNameValue.length==0) || (lastNameValue.length == 0)){
        //alert("No Name Entered");
        document.getElementById("nameMissing").style.visibility = "visible";
        return false;
    }
    return true;
}

function checkEmail(){
    var email = document.getElementById("email");
    var emailValue = email.value;
    if(emailValue.length == 0){
        document.getElementById("emailMissing").style.visibility = "visible";
        document.getElementById("emailMissing").innerHTML="Email is a required field!";
        return false;
    }
    if(!(emailValue.indexOf("@") > -1)){
        document.getElementById("emailMissing").style.visibility = "visible";
        document.getElementById("emailMissing").innerHTML="Email is not in a correct format missing @";
        return false;
    }
    return true;
}

function checkUsername(){
    var username = document.getElementById("username");
    var usernameValue = username.value;
    if(usernameValue.length == 0){
        document.getElementById("usernameMissing").style.visibility = "visible";
        return false;
    }
    return true;
}
function checkPassword(){
    var password = document.getElementById("password");
    var passwordValue = password.value;

    var confirmPassword = document.getElementById("confirm-password");
    var confirmPasswordValue = confirmPassword.value;

    if((passwordValue.length == 0) || (confirmPasswordValue.length == 0)){
        document.getElementById("passwordMissing").innerHTML = "Password is a required field!";
        document.getElementById("passwordMissing").style.visibility = "visible";
        return false;
    }
    if(!(passwordValue === confirmPasswordValue)){
        document.getElementById("passwordMissing").innerHTML = "Password fields don't match!";
        document.getElementById("passwordMissing").style.visibility = "visible";
        return false;
    }
    return true;
}
function checkBirthDate(){
    var month = document.getElementById("month");
    var monthValue = month.options[month.selectedIndex].text;
    
    var day = document.getElementById("day");
    var dayValue = day.value;
    var dayValueInt = parseInt(dayValue);

    var year = document.getElementById("year");
    var yearValue = year.value;
    var yearValueInt = parseInt(yearValue);

    if( monthValue == "Select"){
        document.getElementById("birthdayMissing").innerHTML = "Please Select a Month";
        document.getElementById("birthdayMissing").style.visibility = "visible";
        return false;
    }
    else if( dayValue == ""){
        document.getElementById("birthdayMissing").innerHTML = "Please enter a day";
        document.getElementById("birthdayMissing").style.visibility = "visible";
        return false;
    }
    else if( yearValue == "" ){
        document.getElementById("birthdayMissing").innerHTML = "Please enter a year";
        document.getElementById("birthdayMissing").style.visibility = "visible";
        return false;  
    }

    switch (monthValue) {
        case "Jan":
        case "Mar":
        case "May":
        case "Jul":
        case "Oct":
        case "Dec":
            if(!((dayValueInt>0) && (dayValueInt<32))){
                document.getElementById("birthdayMissing").innerHTML = "This is not a valid date";
                document.getElementById("birthdayMissing").style.visibility = "visible";
                return false;
            }
            break;

        case "Apr":
        case "Jun":
        case "Sep":
        case "Nov":
            if(!((dayValueInt>0) && (dayValueInt<31))){
                document.getElementById("birthdayMissing").innerHTML = "This is not a valid date";
                document.getElementById("birthdayMissing").style.visibility = "visible";
                return false;
            }
            break;

        case "Feb":
            var leapYearChecker = checkLeapYear(yearValueInt);
            if(leapYearChecker==true){
                if(!((dayValueInt>0) && (dayValueInt<30))){
                    document.getElementById("birthdayMissing").innerHTML = "This is not a valid date";
                    document.getElementById("birthdayMissing").style.visibility = "visible";
                    return false;
                }
            }else{
                if(!((dayValueInt>0) && (dayValueInt<29))){
                    document.getElementById("birthdayMissing").innerHTML = "This is not a valid date";
                    document.getElementById("birthdayMissing").style.visibility = "visible";
                    return false;
                }
            }
            break;
    }
    return true;
}

function checkLeapYear(year){
    var yearDivBy4 = year % 4;
    var yearDivBy100 = year % 100;
    var yearDivBy400 = year % 400;

    if ((yearDivBy4==0) && !(yearDivBy100 == 0)){
        return true;
    }
    else if(yearDivBy400==0){
        return true;
    }
    else{
        return false;
    }
}

function hideError(x){
    if(("firstName" == x.id) || ("lastName" == x.id)){
        document.getElementById("nameMissing").style.visibility = "hidden";
    }
    if("email" == x.id){
        document.getElementById("emailMissing").style.visibility = "hidden";
    }
    if("username" == x.id){
        document.getElementById("usernameMissing").style.visibility = "hidden";
    }
    if(("password" == x.id) || ("confim-password" == x.id)){
        document.getElementById("passwordMissing").style.visibility = "hidden";
    }
    if(("month" == x.id) || ("day" == x.id) || ("year" == x.id)){
        document.getElementById("birthdayMissing").style.visibility = "hidden";
    }
}
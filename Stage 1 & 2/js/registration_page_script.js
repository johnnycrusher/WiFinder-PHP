//A function to validate the whole registration
function validate(){  
    var Name = checkName();
    var Email = checkEmail();
    var Username = checkUsername();
    var Password = checkPassword();
    var Birthdate = checkBirthDate();
    var GenderSelection = checkGenderSelection();
    if(Name && Email && Username && Password && Birthdate && GenderSelection){
        return true;
    }
    if(!Name || !Email || !Username || !Password || !Birthdate || !GenderSelection){
        return false;
    }
}
//A validation method to check if name is correct format
function checkName(){
    var firstName = document.getElementById("firstName");
    var firstNameValue = firstName.value;

    var lastName = document.getElementById("lastName");
    var lastNameValue = lastName.value;

    if((firstNameValue.length==0) || (lastNameValue.length == 0)){
        //alert("No Name Entered");
        document.getElementById("error-name").innerHTML = "First and last name is a required field";
        document.getElementById("error-name").style.visibility = "visible";
        return false;
    }
    return true;
}
//A validation method to check if email is in the correct format
function checkEmail(){
    var email = document.getElementById("email");
    var emailValue = email.value;
    if(emailValue.length == 0){
        document.getElementById("error-email").style.visibility = "visible";
        document.getElementById("error-email").innerHTML="Email is a required field!";
        return false;
    }
    if(!(emailValue.indexOf("@") > -1)){
        document.getElementById("error-email").style.visibility = "visible";
        document.getElementById("error-email").innerHTML="Email is not in a correct format missing @";
        return false;
    }
    return true;
}

//A validation method to check if the username is present and in correct format
function checkUsername(){
    var username = document.getElementById("username");
    var usernameValue = username.value;
    if(usernameValue.length == 0){
        document.getElementById("error-username").innerHTML = "Username is a required field!";
        document.getElementById("error-username").style.visibility = "visible";
        return false;
    }
    return true;
}
//A function to check if the passwords match 
function checkPassword(){
    var password = document.getElementById("password");
    var passwordValue = password.value;

    var confirmPassword = document.getElementById("confirm-password");
    var confirmPasswordValue = confirmPassword.value;

    if((passwordValue.length == 0) || (confirmPasswordValue.length == 0)){
        document.getElementById("error-password").innerHTML = "Password is a required field!";
        document.getElementById("error-password").style.visibility = "visible";
        return false;
    }
    if(!(passwordValue === confirmPasswordValue)){
        document.getElementById("error-password").innerHTML = "Password fields don't match!";
        document.getElementById("error-password").style.visibility = "visible";
        return false;
    }
    return true;
}
//A function to check if the birthday is a valid date (doesn't check the future tho)
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
        document.getElementById("error-birthday").innerHTML = "Please Select a Month";
        document.getElementById("error-birthday").style.visibility = "visible";
        return false;
    }
    else if( dayValue == ""){
        document.getElementById("error-birthday").innerHTML = "Please enter a day";
        document.getElementById("error-birthday").style.visibility = "visible";
        return false;
    }
    else if( yearValue == "" ){
        document.getElementById("error-birthday").innerHTML = "Please enter a year";
        document.getElementById("error-birthday").style.visibility = "visible";
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
                document.getElementById("error-birthday").innerHTML = "This is not a valid date";
                document.getElementById("error-birthday").style.visibility = "visible";
                return false;
            }
            break;

        case "Apr":
        case "Jun":
        case "Sep":
        case "Nov":
            if(!((dayValueInt>0) && (dayValueInt<31))){
                document.getElementById("error-birthday").innerHTML = "This is not a valid date";
                document.getElementById("error-birthday").style.visibility = "visible";
                return false;
            }
            break;

        case "Feb":
            var leapYearChecker = checkLeapYear(yearValueInt);
            if(leapYearChecker==true){
                if(!((dayValueInt>0) && (dayValueInt<30))){
                    document.getElementById("error-birthday").innerHTML = "This is not a valid date";
                    document.getElementById("error-birthday").style.visibility = "visible";
                    return false;
                }
            }else{
                if(!((dayValueInt>0) && (dayValueInt<29))){
                    document.getElementById("error-birthday").innerHTML = "This is not a valid date";
                    document.getElementById("error-birthday").style.visibility = "visible";
                    return false;
                }
            }
            break;
    }
    return true;
}

//heaper method to check if the specified year is a leap year
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

//a validation method to check if a gender selection is made
function checkGenderSelection(){
    var FemaleGen = document.getElementById("female-gender");
    var MaleGen = document.getElementById("male-gender");
    var OtherGen = document.getElementById("other-gender");

    if(!(FemaleGen.checked) && !(MaleGen.checked) && !(OtherGen.checked)){
        document.getElementById("error-gender").innerHTML = "Please select a gender";
        document.getElementById("error-gender").style.visibility = "visible";
        return false;
    }
    return true;
}

//a function that hides error messages if the user has changed it
function hideError(x){
    if(("firstName" == x.id) || ("lastName" == x.id)){
        document.getElementById("error-name").style.visibility = "hidden";
    }
    if("email" == x.id){
        document.getElementById("error-email").style.visibility = "hidden";
    }
    if("username" == x.id){
        document.getElementById("error-username").style.visibility = "hidden";
    }
    if(("password" == x.id) || ("confim-password" == x.id)){
        document.getElementById("error-password").style.visibility = "hidden";
    }
    if(("month" == x.id) || ("day" == x.id) || ("year" == x.id)){
        document.getElementById("error-birthday").style.visibility = "hidden";
    }
    if(("female-gender" == x.id) || ("male-gender" == x.id) || ("other-gender" == x.id)){
        document.getElementById("error-gender").style.visibility = "hidden";
    }
}
function validate(form) {
    //TODO 1: implement JavaScript validation
    //ensure it returns false for an error and true for success
    
    let email = form.email.value;
    //Regex for email
    const reEmail = new RegExp('^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$');
    
    //Regex for username
    const reUser = new RegExp('^[a-z0-9_-]{3,16}$');
    
    let password = form.password.value;

    /***Regex testing for passwords***/
    const rePass = new RegExp('^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$');
    
    /** for finding the current pathname */
    let path = window.location.pathname;
    let page = path.substring(path.lastIndexOf('/')+1);
   
    let isValid = true;

    if(!reEmail.test(email)){
        if(!reUser.test(email)){
            isValid = false;
            flash("Invalid email", "warning");
        }
    }
    if(password.length < 8){
        isValid = false;
        flash("Password must be more than 8 characters!","warning");    
    }
    //set form value variables for profile and register
    //I tried seeing if they could share a confirm password variable since they're similar
    //but this had me going in and trying to set the names as the same thing across the PHPs
    //confirmPassword vs. confirm
    if(page == 'profile.php' || page =='register.php'){
        let password = form.password.value;
        let username = form.username.value;
        //Tried to share confirmPass name with Profile and Register
        let confirmPass = form.confirmPassword.value;
        if(!reUser.test(username)){
            isValid = false
            flash("Invalid username","warning");
        }
        if(password > 0 && password !== confirmPass){
            flash("Passwords must match", "warning");
            isValid = false;
        //Find the profile.php and setting a variable for new password
        } if(page == 'profile.php'){
            let newPass = form.newPassword.value;
            if(newPass.length < 8 ){
            isValid = false;
            flash("New password must be a minimum of 8 characters","warning");
            //flash("Password must be a minimum of eight characters and contain at least one uppercase letter, one lowercase letter, one number and one special character", "warning");
            }
            if(confirmPass !== newPass){
            isValid = false;    
            flash("New passwords must match","warning");
        }
        }
    }
    //testing regex for passwords
    /*if(!rePass.test(password)){
        isValid = false;
        flash("Password must be a minimum of eight characters and contain at least one uppercase letter, one lowercase letter, one number and one special character", "warning");
    }*/
    return isValid;


}
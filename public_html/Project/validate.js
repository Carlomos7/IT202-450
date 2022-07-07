function validate(form) {
    //TODO 1: implement JavaScript validation
    //ensure it returns false for an error and true for success
    let email = form.email.value;
    const reEmail = new RegExp('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/');
    
    let username = form.username.value;
    const reUser = new RegExp('/^[a-z0-9_-]{3,16}$/');
    
    let password = form.email.value;
    //const rePass = new RegExp('');

    let isValid = true;

    if(!email.test(reEmail)){
        isValid = false;
        flash("Invalid email", "warning");
    }
    if(!username.test(reUser)){
        isValid = false;
        flash("Invalid username","warning");
    }    
    if(length(password) < 8){
        flash("Password length must be more than 8 characters", "warning");
        isValid= false;
    }
    return isValid;


}
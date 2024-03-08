function showError(message){
    let error = document.getElementsByClassName('errorMessage')[0];
    if(message == null || message == undefined){
        if(!error.classList.contains('d-none')){
            error.classList.add('d-none');
        }
    }
    else{
        error.classList.remove('d-none');
        error.innerHTML =  message;
    }
}

function valiteInput(){
    let emailField = document.getElementById('email');
    let passwordField = document.getElementById('pwd');

    let email = emailField.value;
    let pass = passwordField.value;

    if(email == ''){
        showError('Please enter your email address.');
        return false;
    }
    if(!email.includes('@')){
        showError('This is not a vaild email address');
        return false;
    }
    if(pass == ''){
        showError('Please enter your email password');
        return false;
    }
    showError(null);
    return true;
}
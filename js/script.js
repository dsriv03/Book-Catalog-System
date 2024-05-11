let defaultMsg = '';

let loginName = document.querySelector("#username");
let loginPass = document.querySelector("#password");

let loginNameError = document.createElement('p');
loginNameError.setAttribute("class", "warning");
document.querySelectorAll(".formLabel")[0].append(loginNameError);

let passError = document.createElement('p');
passError.setAttribute("class", "warning");
document.querySelectorAll(".formLabel")[1].append(passError);

function validateName() {
    let error;
    let name = loginName.value.toString().toLowerCase();
    let regexp = /^.{1,15}$/;
    if (regexp.test(name)) {
        error = defaultMsg;
    }
    else {
        error = "Username should be non empty and within 15 characters."
    }
    return error;
}

function validatePassLength() {
    let error;
    let pass = loginPass.value;
    let regex = /.{1,15}/;
    if (regex.test(pass)) {
        error = defaultMsg;
    }
    else {
        error = "Password must be at least 8 and at most 15 characters long.";
    }
    return error;
}


function validate() {
    let valid = true;
    let nameValid = validateName();
    if (nameValid !== defaultMsg) {
        loginName.style.borderColor = "red";
        loginNameError.textContent = nameValid;
        valid = false;
    }

    let passLengthValid = validatePassLength();
    if (passLengthValid !== defaultMsg) {
        loginPass.style.borderColor = "red";
        passError.textContent = passLengthValid;
        valid = false;
    }
    if (valid == false) {
        loginName.addEventListener("input", function () {
            let isValid = validateName();
            if (isValid == defaultMsg) {
                loginNameError.textContent = defaultMsg;
                loginName.style.borderColor = "initial";
            }
        });
        loginPass.addEventListener("input", function () {
            let isValid = validatePassLength();
            if (isValid == defaultMsg) {
                passError.textContent = defaultMsg;
                loginPass.style.borderColor = "initial";
            }
        });
        event.preventDefault();
    }
    return valid;
}

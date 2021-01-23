const form = document.querySelector(".register-form");
const emailinput = form.querySelector('input[name="email"]');
const confirmedPasswordInput = form.querySelector('input[name="repeat_password"]')

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validateEmail() {
    setTimeout( function() {
        markValidation(emailinput, isEmail(emailinput.value));
    }, 1000);
}

function validatePassword() {
    console.log("dsad")
    setTimeout( function() {
        const condition = arePasswordsSame(
            form.querySelector('input[name="password"]').value,
            confirmedPasswordInput.value
        );
        markValidation(confirmedPasswordInput, condition);
    }, 1000);
}

emailinput.addEventListener('keyup', validateEmail);
confirmedPasswordInput.addEventListener('keyup', validatePassword)
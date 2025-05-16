const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const passwordConfirmInput = document.getElementById('password-confirmation');

const nameError = document.getElementById('nameError');
const emailError = document.getElementById('emailError');
const passwordError = document.getElementById('passwordError');
const passwordConfirmError = document.getElementById('passwordConfirmError');

const loginForm = document.getElementById('loginForm');
const registerForm = document.getElementById('registerForm');

if(loginForm) {
    loginForm.addEventListener('submit', function(event) {
        let isValid = true;
    
        // Clear previous errors
        emailError.textContent = '';
        passwordError.textContent = '';
    
        // Get values
        const email = emailInput.value.trim();
        const password = passwordInput.value;
    
        // Email validation (regex for format)
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email || !emailPattern.test(email)) {
            emailError.textContent = 'Please enter a valid email address.';
            isValid = false;
        }
    
        if(!password) {
            passwordError.textContent = 'Please enter a password';
            isValid = false;
        }
    
        if (!isValid) {
            event.preventDefault(); // stop form submission
        }
    });
}

if(registerForm) {
    registerForm.addEventListener('submit', function(e) {
        let isValid = true;
    
        // Clear previous errors
        nameError.textContent = '';
        emailError.textContent = '';
        passwordError.textContent = '';
        passwordConfirmError.textContent = '';
    
        // Get values
        const name = nameInput.value;
        const email = emailInput.value.trim();
        const password = passwordInput.value;
        const passwordConfirm = passwordConfirmInput.value;
    
        if(!name) {
            nameError.textContent = 'Please enter user name';
            isValid = false;
        }

        // Email validation (regex for format)
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email || !emailPattern.test(email)) {
            emailError.textContent = 'Please enter a valid email address.';
            isValid = false;
        }
    
        if(!password) {
            passwordError.textContent = 'Please enter a password';
            isValid = false;
        }

        if(!passwordConfirm) {
            passwordConfirmError.textContent = 'Please retype your password';
            isValid = false;
        }

        if(password != passwordConfirm) {
            passwordConfirmError.textContent = 'Confirm Password do not match';
            isValid = false;
        }
    
        if (!isValid) {
            event.preventDefault(); // stop form submission
        }
    })
}

nameInput.addEventListener('keyup', function(event) {
    nameError.textContent = '';
})

emailInput.addEventListener('keyup', function(event) {
    emailError.textContent = '';
})

passwordInput.addEventListener('keyup', function(event) {
    passwordError.textContent = '';
})

passwordConfirmInput.addEventListener('keyup', function(event) {
    passwordConfirmError.textContent = '';
})
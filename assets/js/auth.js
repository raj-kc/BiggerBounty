document.addEventListener("DOMContentLoaded", function () {
    const fullName = document.getElementById("fullName");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const terms = document.getElementById("terms");
    const registerForm = document.getElementById("registerForm");

    // Error Messages
    const nameError = document.getElementById("nameError");
    const emailError = document.getElementById("emailError");
    const passwordError = document.getElementById("passwordError");

    // Password Criteria
    const lengthCriteria = document.getElementById("length");
    const letterCriteria = document.getElementById("letter");
    const numberCriteria = document.getElementById("number");
    const specialCriteria = document.getElementById("special");

    function validateName() {
        const nameRegex = /^[A-Za-z\s]+$/;
        if (!nameRegex.test(fullName.value.trim())) {
            nameError.style.display = "block";
            return false;
        }
        nameError.style.display = "none";
        return true;
    }

    function validateEmail() {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email.value.trim())) {
            emailError.style.display = "block";
            return false;
        }
        emailError.style.display = "none";
        return true;
    }

    function validatePassword() {
        const value = password.value.trim();
        const hasLetter = /[A-Za-z]/.test(value);
        const hasNumber = /[0-9]/.test(value);
        const hasSpecial = /[!@#$%^&*(),.?":{}|<>]/.test(value);
        const hasLength = value.length >= 6;

        lengthCriteria.classList.toggle("valid", hasLength);
        lengthCriteria.classList.toggle("invalid", !hasLength);

        letterCriteria.classList.toggle("valid", hasLetter);
        letterCriteria.classList.toggle("invalid", !hasLetter);

        numberCriteria.classList.toggle("valid", hasNumber);
        numberCriteria.classList.toggle("invalid", !hasNumber);

        specialCriteria.classList.toggle("valid", hasSpecial);
        specialCriteria.classList.toggle("invalid", !hasSpecial);

        if (hasLetter && hasNumber && hasSpecial && hasLength) {
            passwordError.style.display = "none";
            return true;
        } else {
            passwordError.style.display = "block";
            return false;
        }
    }

    fullName.addEventListener("input", validateName);
    email.addEventListener("input", validateEmail);
    password.addEventListener("input", validatePassword);

    registerForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const isNameValid = validateName();
        const isEmailValid = validateEmail();
        const isPasswordValid = validatePassword();

        // if (!terms.checked) {
        //     alert("Please agree to the terms and conditions.");
        //     return;
        // }

        if (isNameValid && isEmailValid && isPasswordValid) {
            // Prepare data
            let formData = new FormData();
            formData.append("full_name", fullName.value.trim());
            formData.append("email", email.value.trim());
            formData.append("password", password.value.trim());
            formData.append("register", "true"); // Indicating this is a registration request

            // Send AJAX request using fetch()
            fetch("includes/auth.php", {
                method: "POST",
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        alert(data.message);
                        window.location.href = "./index.php"; // Redirect after successful registration
                    } else {
                        alert(data.message); // Show error message
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("Something went wrong. Please try again.");
                });
        } else {
            alert("Please fill all fields correctly before submitting.");
        }
    });
});

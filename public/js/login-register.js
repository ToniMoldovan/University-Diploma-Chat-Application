// when the document loads, check if there is any cookie named "remember_user" and if there is, check if its true or false, if its true, display the login div, else display the register div
$(document).ready(function () {
    console.log("login-register.js loaded");

    // check if there is any cookie named "remember_user"
    if (document.cookie.indexOf("remember_user") >= 0) { // if there is a cookie named "remember_user" found at the start of the string (index 0) then
        console.log("cookie named remember_user found");
        // TODO: authenticate the user
    }
    else {
        console.log("no cookie named remember_user found");
        // display the register div and hide the login div using simple css
        $("#login-container").css("display", "block");
        $("#register-container").css("display", "none");
    }

    // place listener for the "Sign Up" button
    $("#sign-up-btn").click(function () {
        clearFields();

        $("#login-container").css("display", "none");
        $("#register-container").css("display", "block");
    });

    // place listener for the "Login" button
    $("#login-btn").click(function () {
        clearFields();

        $("#login-container").css("display", "block");
        $("#register-container").css("display", "none");
    });

    function clearFields() {
        $("#first-name").val("");
        $("#last-name").val("");
        $("#email").val("");
        $("#username").val("");
        $("#password").val("");
        $("#username-login").val("");
        $("#password-login").val("");

        // set the border color of all fields to neutral
        $("#first-name, #last-name, #email, #username, #password").css("border", "1px solid #ccc");
    }

    // Function to validate the email format
    function validateEmail(email) {
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Function to check if all fields are valid and enable/disable the "Register" button accordingly
    function checkFields() {
        let isValid = true;

        // Check each field for validation status
        $("#first-name, #last-name, #email, #username, #password").each(function () {
            let value = $(this).val(); // Get the value of the field (if any)
            let isValidField = value && $(this).css("border-color") === "rgb(0, 128, 0)"; // Check if the field has a value and a green border color

            if (!isValidField) {
                isValid = false;
                return false; // Exit the loop early if any field is invalid
            }
        });

        // Enable/disable the "Register" button based on the validation status
        $("#submit-register-btn").prop("disabled", !isValid);
    }

    // Add input event listeners to each field
    $("#first-name, #last-name, #email, #username, #password").on("input", function () {
        let value = $(this).val();
        let inputElement = $(this);

        // Validate field and update border color
        if (inputElement.attr("id") === "email") {
            if (!validateEmail(value)) {
                inputElement.css("border", "2px solid red");
            } else {
                inputElement.css("border", "2px solid green");
            }
        } else if (value.length < 3 || value.length > 16) {
            inputElement.css("border", "2px solid red");
        } else {
            inputElement.css("border", "2px solid green");
        }

        // Check fields after each input event
        checkFields();
    });

});




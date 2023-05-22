function checkTag(tag) {
    $.get('/check-tag', {tag: tag}, function(data) {
        if (data === 'exists') {
            // If the tag already exists, generate a new one and check again
            let newTag = generateTag();
            checkTag(newTag);
        } else {
            console.log("Unique generated tag: " + tag);
            $('#room-tag').text(" | Unique Room Tag: " + tag);
            $('#create-room-tag').val(tag);
        }
    });
}

function titleIsAvailable(title) {
    return new Promise((resolve, reject) => {
        $.get('/check-room-title', {title: title}, function(data) {
            if (data === 'exists') {
                resolve(false);
            } else {
                console.log("Room title is OK: " + title);
                resolve(true);
            }
        });
    });
}

// Function to generate a random tag
function generateTag() {
    // You can replace this with your own tag generation logic
    return Math.random().toString(36).substr(2, 6);
}
$(document).ready(function () {
    let initialTag = generateTag();
    checkTag(initialTag);

    $("#room-password-container").css("display", "none");
    // change the color of the password label to red

    $("#room-password-label").css("color", "#fd0707");

    // listener for the 'room-is-private' checkbox to show/hide the password field
    $("#room-is-private").change(function () {
        if ($(this).is(":checked")) {
            $("#room-password-container").css("display", "block");
        }
        else {
            $("#room-password-container").css("display", "none");
        }
    });

    //listener for the `room-description` textarea to check the length of the description and change the border color and make the submit button clickable
    $("#room-description").change(function () {
        let description = $("#room-description").val();

        if (description.length >= 10 && description.length <= 100) {
            $("#room-description").css("border-color", "#3f9d28");

            // make the submit button clickable
            $("#create-new-room-btn").prop("disabled", false);
        } else {
            $("#room-description").css("border-color", "#fd0707");
            // make the submit button unclickable
            $("#create-new-room-btn").prop("disabled", true);
        }
    });

    // listener for the 'room-title-input' to check if the title is unique
    $("#room-name").change(function () {
        let title = $("#room-name").val();

        if (title.length >= 4 && title.length <= 30) {
            titleIsAvailable(title).then(isOk => {
                if(isOk === true) {
                    $("#room-name").css("border-color", "#3f9d28");

                    // make the submit button clickable
                    $("#create-new-room-btn").prop("disabled", false);
                }
                else {
                    $("#room-name").css("border-color", "#fd0707");
                    // make the submit button unclickable
                    $("#create-new-room-btn").prop("disabled", true);
                }
            });
        } else {
            $("#room-name").css("border-color", "#fd0707");
            // make the submit button unclickable
            $("#create-new-room-btn").prop("disabled", true);
        }
    });

    // listener for the 'create-room' button
    $("#create-new-room-btn").click(function () {
        let passwordLength = $("#room-password-input").val().length;

        //Check if the #room-is-private is checked, if so, check if the password is empty
        if ($("#room-is-private").is(":checked")) {
            console.log(passwordLength);

            if ($("#room-password-input").val() == "") {
                alert("Please enter a password for the room.");
                return;
            }
            if (passwordLength > 10 || passwordLength < 3) {
                alert("Password must be less than 10 characters and more than 3 characters.");
                return;
            }
        }
    });

});
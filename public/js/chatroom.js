$(document).ready(function() {
    /*Variables*/
    let roomTag = document.body.dataset.roomTag;
    let userID = document.body.dataset.userId;
    let conn = new WebSocket("ws://localhost:6062");
    let chatForm = $('#chatForm');
    let messageInput = $('#messageBody');

    /*When the user joins the chatroom*/
    conn.onopen = function(e) {
        console.log("Connection established!");
        conn.send(JSON.stringify({
            command: "subscribe",
            room: roomTag,
            user: userID
        }));
        console.log("Subscribe message sent!");
    };

    // Load the message history when the page loads.
    $.ajax({
        url: '/getMessages/' + roomTag,
        method: 'POST',
        success: function(data) {
            // Parse the JSON string to an array of messages.
            let messages = JSON.parse(data);

            // Add each message to the chat box.
            for (let message of messages) {
                loadMessageHistory(message);
            }
            scrollToBottom();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error: ' + textStatus, errorThrown);
        }
    });


    /*When the current user sends a message via input form*/
    chatForm.on('submit', function(e) {
        e.preventDefault();

        //spam protection against empty messages and messages with only spaces here
        if (messageInput.val() === '' ||
            messageInput.val().trim() === '' ||
            messageInput.val() === null ||
            messageInput.val() === undefined ||
            messageInput.val().length === 0 ||
            messageInput.val().length === 1) {

            console.log("Empty message!");
            return;
        }

        let message = messageInput.val();
        console.log("Sending message: " + message);
        conn.send(JSON.stringify({
            command: "message",
            room: roomTag,
            message: message,
            user: userID
        }));
        messageInput.val('');
    });

    function scrollToBottom() {
        let chatBox = document.querySelector('.chat-box');
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    function loadMessageHistory(message) {
        let date = new Date(message.sent_at);
        let formattedDate = date.getDate() + ' ' + date.toLocaleString('default', { month: 'long' }) + ' ' + date.getFullYear() + ' at ' + date.getHours() + ':' + date.getMinutes();

        // Create a new div for the message.
        let messageDiv = document.createElement('div');
        messageDiv.classList.add('media', 'w-50', 'mb-3');

        // Check if the message is from the current user.
        if (message.sender_id == userID) {
            // The message is from the current user.
            // Add the 'ml-auto' class to align the message to the right.
            messageDiv.classList.add('ml-auto');

            // Create the inner HTML for the message.
            messageDiv.innerHTML = `
            <div class="media-body">
                <div class="bg-primary rounded py-2 px-3 mb-2" style="max-width: 300px; word-wrap: break-word;">
                    <p class="text-small mb-0 text-white">${message.message_body}</p>
                </div>
                <p class="small text-muted text-right">${formattedDate}</p>
            </div>
            `;
        } else {
            // The message is from another user.
            // Add the user's avatar to the message.
            messageDiv.innerHTML = `
            <img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
            <div class="media-body ml-3">
                <div class="bg-light rounded py-2 px-3 mb-2" style="max-width: 300px; word-wrap: break-word;">
                    <p class="text-small mb-0 text-muted">${message.message_body}</p>
                </div>
                <p class="small text-muted">${formattedDate}</p>
            </div>
            `;
        }



        // Append the message to the chat box.
        $('.chat-box').append(messageDiv);
    }

    function addMessageToChatBox(message) {
        let date = new Date();
        let formattedDate = date.getDate() + ' ' + date.toLocaleString('default', { month: 'long' }) + ' ' + date.getFullYear() + ' at ' + date.getHours() + ':' + date.getMinutes();

        // Create a new div for the message.
        let messageDiv = document.createElement('div');
        messageDiv.classList.add('media', 'w-50', 'mb-3');

        // Check if the message is from the current user.
        if (message.user == userID) {
            // The message is from the current user.
            // Add the 'ml-auto' class to align the message to the right.
            messageDiv.classList.add('ml-auto');

            // Create the inner HTML for the message.
            messageDiv.innerHTML = `
            <div class="media-body">
                <div class="bg-primary rounded py-2 px-3 mb-2 " style="max-width: 300px; word-wrap: break-word;">
                    <p class="text-small mb-0 text-white">${message.message}</p>
                </div>
                <p class="small text-muted text-right">${formattedDate}</p>
            </div>
        `;
        } else {
            // The message is from another user.
            // Add the user's avatar to the message.
            messageDiv.innerHTML = `
            <img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
            <div class="media-body ml-3">
                <div class="bg-light rounded py-2 px-3 mb-2" style="max-width: 300px; word-wrap: break-word;">
                    <p class="text-small mb-0 text-muted">${message.message}</p>
                </div>
                <p class="small text-muted">${formattedDate}</p>
            </div>
        `;
        }

        // Append the message to the chat box.
        $('.chat-box').append(messageDiv);
        scrollToBottom();
    }

    // When a new message is received, add it to the chat box.
    conn.onmessage = function(e) {
        let data = JSON.parse(e.data);
        console.log(data);
        if (data.command === 'message') {
            addMessageToChatBox(data);
        }
    };

});

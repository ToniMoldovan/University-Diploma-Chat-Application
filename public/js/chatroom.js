let socket = new WebSocket("ws://localhost:6062");
let roomID = document.body.dataset.roomTag;

socket.onopen = function(e) {
    console.log("[client]: Connection established successfully with chatroom tag: " + roomID);
    socket.send(JSON.stringify({
        command: "subscribe",
        room: roomID // replace this with the actual room ID
    }));
};

socket.onmessage = function(event) {
    console.log(`[client]: Received data: ${event.data}`);
    // Here, you could add the received message to your chat box
};

socket.onerror = function(error) {
    console.error(`[client]: Error ${error.message}`);
};

// When user sends a message
$(document).ready(function() {
    $("#sendButton").click(function() {
        let message = $("#message-body").val();
        console.log("[client]: Sending message: " + message);




        /*socket.send(JSON.stringify({
            command: "message",
            room: roomID, // replace this with the actual room ID
            message: message
        }));*/
    });
});


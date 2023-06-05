<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Website</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link rel="icon" href="<?php echo $GLOBALS['assets'] . 'images/chat-app-icon.png'; ?>" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="<?php echo $GLOBALS['assets'] . 'style/style.css'; ?>">
    <link rel="stylesheet" href="<?php echo $GLOBALS['assets'] . 'style/chatroom.css'; ?>">
</head>
<body data-room-tag="<?php echo $this->chatroom_tag; ?>">
<?php include 'components/navbar.php'; ?>

<main>
    <div class="container py-5 px-4">
        <header class="text-center">
            <h1 class="display-4 text-white"><?php echo $this->data["chatroom_title"]; ?></h1>
            <p class="text-white lead mb-3"><?php echo $this->data["description"]; ?></p>
        </header>

        <div class="row rounded-lg overflow-hidden shadow">
            <!-- Users box-->
            <div class="col-5 px-0">
                <div class="bg-white">

                    <div class="bg-gray px-4 py-2 bg-light">
                        <p class="h5 mb-0 py-1" id="participants_counter">People in this Circle</p>
                    </div>

                    <div class="messages-box">
                        <div class="list-group rounded-0">
                            <?php for ($i = 0; $i < 10; $i++) { ?>
                                <a class="list-group-item list-group-item-action list-group-item-light rounded-0">
                                    <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                        <div class="media-body ml-4">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <h6 id="participant_name" class="mb-0">Jason Doe</h6><small class="small font-weight-bold" id="last_message_date">25 Dec</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Chat Box-->
            <div class="col-7 px-0">
                <div class="px-4 py-5 chat-box bg-white">
                    <!-- Sender Message-->
                    <div class="media w-50 mb-3"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                        <div class="media-body ml-3">
                            <div class="bg-light rounded py-2 px-3 mb-2">
                                <p class="text-small mb-0 text-muted">Test which is a new approach all solutions est which is a new approach all solutions est which is a new approach all solutions</p>
                            </div>
                            <p class="small text-muted">12:00 PM | Aug 13</p>
                        </div>
                    </div>

                    <!-- Reciever Message-->
                    <div class="media w-50 ml-auto mb-3">
                        <div class="media-body">
                            <div class="bg-primary rounded py-2 px-3 mb-2">
                                <p id="current_user_chat_message" class="text-small mb-0 text-white">Test which is a new approach to have all solutions</p>
                            </div>
                            <p class="small text-muted">12:00 PM | Aug 13</p>
                        </div>
                    </div>
                </div>
                    <!-- Typing area -->
                <form action="#" class="bg-light">
                        <div class="input-group">
                            <input type="text" id="message-body" style="padding-bottom: 10px;padding-top: 14px;" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 bg-light">
                            <div class="input-group-append">
                                <button id="sendButton" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>

</main>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?php echo $GLOBALS['assets'] . 'js/chatroom.js' ?>"></script>
<?php include 'components/footer.php'; ?>
</body>
</html>

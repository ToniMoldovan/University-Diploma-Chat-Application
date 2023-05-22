<!DOCTYPE html>
<html lang="en">
<head>
    <title>CircleTalk - Create Room</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <!--icon browser-->
    <link rel="icon" href="<?php echo $GLOBALS['assets'] . 'images/chat-app-icon.png'; ?>" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="<?php echo $GLOBALS['assets'] . 'style/style.css'; ?>">
</head>
<body>
<?php include 'components/navbar.php'; ?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--Error messages-->
                <?php if (isset($_SESSION['error_message'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['error_message']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif;
                // unset the error message after displaying it once
                unset($_SESSION['error_message']);
                ?>

                <!--Success messages-->
                <?php if (isset($_SESSION['success_message'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['success_message']; ?>
                        <a href="/chatroom/<?php echo $_SESSION['chatroom_tag']; ?>" class="alert-link">Click here to go to your room.</a>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif;
                // unset the success message after displaying it once
                unset($_SESSION['success_message']);
                ?>

                <h1 id="create-a-room-title">
                    Create a room
                    <small class="text-muted" id="room-tag"></small>
                </h1>

            </div>
        </div>
        <div class="spacer-md"></div>
        <div class="row">
            <div class="col-12">
                <form id="create-new-room-form" action="/create-room" method="POST">
                    <!--Room tag-->
                    <div class="form-group">
                        <label for="room-name">Room tag</label>
                        <input class="form-control" id="create-room-tag" name="room_tag" type="text" readonly>
                    </div>

                    <!--Room name-->
                    <div class="form-group">
                        <label for="room-name">Room name</label>
                        <input required class="form-control" id="room-name" name="room_name" type="text" placeholder="Example: The best movies of 2020">
                        <small id="room-name-help-text" class="form-text text-muted">
                            Choose a name that describes the topic of your room with a total of 30 characters or fewer.
                        </small>
                    </div>


                    <!--Room description-->
                    <div class="form-group">
                        <label for="room-description">Description</label>
                        <textarea required class="form-control" id="room-description" name="room_description" rows="3" placeholder="Example: Let's talk about the best movies of 2020!"></textarea>
                    </div>

                    <!--Room genre-->
                    <div class="form-group mt-4">
                        <label for="room-genre">Genre</label>
                        <select required class="form-control" id="room-genre" name="room_genre">
                            <option selected>IT & Computer Science</option>
                            <option>Science</option>
                            <option>Mathematics</option>
                            <option>Business</option>
                            <option>Art</option>
                            <option>Music</option>
                            <option>Health & Fitness</option>
                            <option>Food & Drink</option>
                            <option>Travel</option>
                            <option>News</option>
                            <option>Sports</option>
                            <option>TV & Film</option>
                            <option>Games</option>
                            <option>Books</option>
                            <option>History</option>
                        </select>
                        <small id="room-genre-help-text" class="form-text text-muted">
                            Choose a genre that best describes the topic of your room.
                        </small>
                    </div>

                    <!--Room image link-->
                    <div class="form-group mt-4">
                        <label for="room-image-link">Image link</label>
                        <input class="form-control" id="room-image-link" name="room_image_link" type="text" placeholder="This is not required">
                        <small id="room-image-link-help-text" class="form-text text-muted">
                            Choose an image link that describes the topic of your room with a total of 100 characters or fewer. <strong>Example: https://www.example.com/image.png</strong>
                        </small>
                    </div>

                    <!--Is room public or private checkbox-->
                    <div class="form-check mt-4">
                        <input class="form-check-input" name="room_is_private" type="checkbox" id="room-is-private">
                        <label class="form-check-label" for="room-is-private">
                            This room is private.
                        </label>
                    </div>

                    <!--Room password-->
                    <div class="form-group mt-4" id="room-password-container">
                        <label id="room-password-label" for="room-password">Room password</label>
                        <input class="form-control" id="room-password-input" name="room_password" type="text">
                        <small id="room-genre-help-text" class="form-text text-muted">
                            Choose a password for your private room with a total of 10 characters or fewer.
                        </small>
                    </div>

                    <!--Submit button-->
                    <div class="form-group mt-4">
                        <input type="submit" class="submit-btn-form btn btn-primary" id="create-new-room-btn" value="Create room">
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
<script src="<?php echo $GLOBALS['assets'] . 'js/create-room.js' ?>"></script>


<?php include 'components/footer.php'; ?>
</body>
</html>

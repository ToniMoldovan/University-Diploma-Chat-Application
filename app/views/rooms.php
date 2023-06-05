<!DOCTYPE html>
<html lang="en">
<head>
    <title>CircleTalk - Home</title>
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
            <div class="col-lg-3">
                <div class="sidebar">
                    <!--Searchbar widget-->
                    <div class="widget border-0">
                        <div class="search">
                            <input class="form-control" type="text" placeholder="Search here">
                        </div>
                    </div>
                    <!--Category widget-->
                    <div class="widget">
                        <div class="widget-title widget-collapse">
                            <h6>Category</h6>
                            <a class="ml-auto" data-toggle="collapse" href="#specialism" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a>
                        </div>
                        <div class="collapse show" id="specialism">
                            <div class="widget-content">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="programming">
                                    <label class="custom-control-label" for="programming">IT & Programming</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9">
                <div class="row mb-4">
                    <div class="col-12">
                        <h6 class="mb-0">... rooms found.</h6>
                    </div>
                </div>
                <div class="job-filter mb-4 d-sm-flex align-items-center">
                    <div class="job-alert-bt"> <a class="btn btn-md btn-dark" href="#"><i class="fa fa-envelope"></i> Join private room </a></div>
                </div>
                <div class="row">
                    <?php foreach ($this->rooms as $room): ?>
                    <div class="col-md-4">
                        <div class="card chatroom-card mb-4 shadow-sm">
                            <img src="https://st3.depositphotos.com/1031174/18773/i/1600/depositphotos_187735842-stock-photo-brown-textured-background.jpg" class="card-img-top" alt="Room image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $room['chatroom_title'] ?></h5>
                                <p class="card-text"><?php echo $room['description'] ?></p>
                                <div class="mb-3">
                                    <span class="badge badge-secondary"><?php echo $room['genre'] ?></span>
                                </div>
                                <button onclick="location.href='/room/<?php echo $room['chatroom_tag']; ?>'" type="button" class="mt-auto btn btn-sm btn-primary btn-block join-btn">Join Now</button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<?php include 'components/footer.php'; ?>
</body>
</html>

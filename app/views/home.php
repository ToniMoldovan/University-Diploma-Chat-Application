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
                    <div class="widget border-0">
                        <div class="search">
                            <input class="form-control" type="text" placeholder="Search here">
                        </div>
                    </div>
                    <div class="widget">
                        <div class="widget-title widget-collapse">
                            <h6>Category</h6>
                            <a class="ml-auto" data-toggle="collapse" href="#specialism" role="button" aria-expanded="false" aria-controls="specialism"> <i class="fas fa-chevron-down"></i> </a>
                        </div>
                        <div class="collapse show" id="specialism">
                            <div class="widget-content">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="specialism1">
                                    <label class="custom-control-label" for="specialism1">IT & Programming</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="specialism2">
                                    <label class="custom-control-label" for="specialism2">Arts & Creativity</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="specialism3">
                                    <label class="custom-control-label" for="specialism3">Crypto Trading</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="specialism4">
                                    <label class="custom-control-label" for="specialism4">Gaming</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="specialism5">
                                    <label class="custom-control-label" for="specialism5">Sports</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget border-0">
                        <div class="widget-add">
                            <img class="img-fluid" src="images/add-banner.png" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row mb-4">
                    <div class="col-12">
                        <h6 class="mb-0">Showing 1-10 of <span class="text-primary">28 Candidates</span></h6>
                    </div>
                </div>
                <div class="job-filter mb-4 d-sm-flex align-items-center">
                    <div class="job-alert-bt"> <a class="btn btn-md btn-dark" href="#"><i class="fa fa-envelope"></i>Get job alert </a> </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="candidate-list candidate-grid">
                            <div class="candidate-list-image">
                                <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                            </div>
                            <div class="candidate-list-details">
                                <div class="candidate-list-info">
                                    <div class="candidate-list-title">
                                        <h5><a href="candidate-detail.html">Rafael Briggs</a></h5>
                                    </div>
                                    <div class="candidate-list-option">
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-filter pr-1"></i>Recruitment Consultancy</li>
                                            <li><i class="fas fa-map-marker-alt pr-1"></i>Haines City, FL 33844</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="candidate-list-favourite-time">
                                    <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                    <span class="candidate-list-time order-1"><i class="far fa-clock pr-1"></i>1M ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="candidate-list candidate-grid">
                            <div class="candidate-list-image">
                                <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
                            </div>
                            <div class="candidate-list-details">
                                <div class="candidate-list-info">
                                    <div class="candidate-list-title">
                                        <h5><a href="candidate-detail.html">Roderick Moss</a></h5>
                                    </div>
                                    <div class="candidate-list-option">
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-filter pr-1"></i>Information Technology</li>
                                            <li><i class="fas fa-map-marker-alt pr-1"></i>Lynch Lane, Weymouth</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="candidate-list-favourite-time">
                                    <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                    <span class="candidate-list-time order-1"><i class="far fa-clock pr-1"></i>3M ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="candidate-list candidate-grid">
                            <div class="candidate-list-image">
                                <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
                            </div>
                            <div class="candidate-list-details">
                                <div class="candidate-list-info">
                                    <div class="candidate-list-title">
                                        <h5><a href="candidate-detail.html">Ronald Bradley</a></h5>
                                    </div>
                                    <div class="candidate-list-option">
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-filter pr-1"></i>Human Resources</li>
                                            <li><i class="fas fa-map-marker-alt pr-1"></i>Monroe Township, NJ 08831</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="candidate-list-favourite-time">
                                    <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                    <span class="candidate-list-time order-1"><i class="far fa-clock pr-1"></i>3D ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="candidate-list candidate-grid">
                            <div class="candidate-list-image">
                                <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="">
                            </div>
                            <div class="candidate-list-details">
                                <div class="candidate-list-info">
                                    <div class="candidate-list-title">
                                        <h5><a href="candidate-detail.html">Nichole Haynes</a></h5>
                                    </div>
                                    <div class="candidate-list-option">
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-filter pr-1"></i>IT Contractor</li>
                                            <li><i class="fas fa-map-marker-alt pr-1"></i>Botchergate, Carlisle</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="candidate-list-favourite-time">
                                    <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                    <span class="candidate-list-time order-1"><i class="far fa-clock pr-1"></i>6D ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="candidate-list candidate-grid">
                            <div class="candidate-list-image">
                                <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="">
                            </div>
                            <div class="candidate-list-details">
                                <div class="candidate-list-info">
                                    <div class="candidate-list-title">
                                        <h5><a href="candidate-detail.html">Vickie Meyer</a></h5>
                                    </div>
                                    <div class="candidate-list-option">
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-filter pr-1"></i>Human Resources</li>
                                            <li><i class="fas fa-map-marker-alt pr-1"></i>Minneapolis, MN 55406</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="candidate-list-favourite-time">
                                    <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                    <span class="candidate-list-time order-1"><i class="far fa-clock pr-1"></i>2D ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="candidate-list candidate-grid">
                            <div class="candidate-list-image">
                                <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="">
                            </div>
                            <div class="candidate-list-details">
                                <div class="candidate-list-info">
                                    <div class="candidate-list-title">
                                        <h5><a href="candidate-detail.html">Brooke Kelly</a></h5>
                                    </div>
                                    <div class="candidate-list-option">
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-filter pr-1"></i>Information Technology</li>
                                            <li><i class="fas fa-map-marker-alt pr-1"></i>Rolling Meadows, IL 60008</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="candidate-list-favourite-time">
                                    <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                    <span class="candidate-list-time order-1"><i class="far fa-clock pr-1"></i>3W ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="candidate-list candidate-grid">
                            <div class="candidate-list-image">
                                <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                            </div>
                            <div class="candidate-list-details">
                                <div class="candidate-list-info">
                                    <div class="candidate-list-title">
                                        <h5><a href="candidate-detail.html">Reyna Chung</a></h5>
                                    </div>
                                    <div class="candidate-list-option">
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-filter pr-1"></i>Transport &amp; Logistics</li>
                                            <li><i class="fas fa-map-marker-alt pr-1"></i>Glen Cove, NY 11542</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="candidate-list-favourite-time">
                                    <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                    <span class="candidate-list-time order-1"><i class="far fa-clock pr-1"></i>1H ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="candidate-list candidate-grid">
                            <div class="candidate-list-image">
                                <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="">
                            </div>
                            <div class="candidate-list-details">
                                <div class="candidate-list-info">
                                    <div class="candidate-list-title">
                                        <h5><a href="candidate-detail.html">Rafael Briggs</a></h5>
                                    </div>
                                    <div class="candidate-list-option">
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-filter pr-1"></i>Architecture</li>
                                            <li><i class="fas fa-map-marker-alt pr-1"></i>Botchergate, Carlisle</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="candidate-list-favourite-time">
                                    <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                    <span class="candidate-list-time order-1"><i class="far fa-clock pr-1"></i>3M ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4 mb-md-0">
                        <div class="candidate-list candidate-grid">
                            <div class="candidate-list-image">
                                <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                            </div>
                            <div class="candidate-list-details">
                                <div class="candidate-list-info">
                                    <div class="candidate-list-title">
                                        <h5><a href="candidate-detail.html">Michael Bean</a></h5>
                                    </div>
                                    <div class="candidate-list-option">
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-filter pr-1"></i>Estate Agency</li>
                                            <li><i class="fas fa-map-marker-alt pr-1"></i>Richmond Hill, NY 11418</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="candidate-list-favourite-time">
                                    <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
                                    <span class="candidate-list-time order-1"><i class="far fa-clock pr-1"></i>6D ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
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

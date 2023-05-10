<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Website</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<?php include 'components/navbar.php'; ?>

<main>
    <section class="hero">
        <div class="hero-content">
            <h1>Secure Chat Application</h1>
            <p>Send and receive messages with full end-to-end encryption</p>
            <a href="#" class="btn btn-get-started">Get started</a>
        </div>
    </section>

    <div class="container main-section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h2>Connect with your friends</h2>
                        <p>Stay in touch with your friends and family with our easy-to-use chat application.</p>
                        <a href="/chatroom" class="btn btn-primary">Join Chat</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 bg-image1">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 bg-image2">
            </div>
            <div class="col-lg-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h2>End-to-end Encryption</h2>
                        <p>Our chat application uses the latest encryption technology to keep your conversations secure.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php include 'components/footer.php'; ?>
</body>
</html>

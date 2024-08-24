<!DOCTYPE html>
<html lang="en">
<head>
          <!-- Basic -->
    <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Cars For Sale </title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
    <style>
        .blog-post img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        .blog-post h2 {
            font-size: 2rem;
            color: #343a40;
        }
        .blog-post p {
            font-size: 1.1rem;
            color: #6c757d;
        }
        .blog-post iframe {
            width: 100%;
            height: 400px;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>

    <!-- Navbar -->
    @include('home.header')

    <!-- Blog Header -->
    <!-- <header class="container mt-4">
        <div class="jumbotron text-center">
            <h1 class="display-4">Welcome to the Racing Cars Blog</h1>
            <p class="lead">Your ultimate source for the latest news, reviews, and videos on racing cars.</p>
        </div>
    </header> -->

    <!-- Blog Posts -->
    <section class="container my-5">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-post">
                    <h2>Latest Racing Car News</h2>
                    <p>Stay updated with the latest news in the world of racing cars. We bring you the latest updates, events, and innovations in the racing car industry.</p>
                    <img src="images/car2.jpg" alt="">
                    <p>Read more about the thrilling world of racing cars...</p>
                </div>
                <div class="blog-post mt-5">
                    <h2>Top 10 Racing Cars of 2024</h2>
                    <p>Discover the top racing cars of 2024, including detailed reviews and performance statistics. See what makes these cars the best in the business.</p>
                    <img src="images/car.jpg" alt="">
                    <p>Check out the full list and in-depth reviews...</p>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">Popular Posts</a>
                    <a href="#" class="list-group-item list-group-item-action">The Evolution of Racing Cars</a>
                    <a href="#" class="list-group-item list-group-item-action">How to Get Started in Car Racing</a>
                    <a href="#" class="list-group-item list-group-item-action">Racing Car Maintenance Tips</a>
                    <a href="#" class="list-group-item list-group-item-action">Best Racing Tracks Around the World</a>
                </div>
                <div class="mt-4">
                    <h4>Featured Video</h4>
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('home.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

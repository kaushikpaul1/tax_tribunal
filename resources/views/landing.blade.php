<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/landing-css.css') }}">
</head>

<body>

    <!-- header -->
    <div>
        <!-- WB image -->
        <div class="d-flex">
            <div>
                <img src="{{ asset('images/WB.svg') }}" alt="" class="img-fluid navbar-logo">
                <!-- Update this path to your actual image file -->
            </div>
            <div class="paragraph">
                <p class="mt-4 pt-2 display-6">WEST BENGAL TAX TRIBUNAL GOVERNMENT OF WEST BENGAL</p>

            </div>
        </div>
    </div>
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">
                            <b>Home</b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <b>About</b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <b>eFILING & CASE MAINTENANCE</b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <b>ORDERS AND OPINIONS</b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">
                            <b>Login</b>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </div>







    <!-- Main container -->
    <div class="main-container d-flex color">
        <!-- Container one -->
        <div class="container one">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/d.png') }}" class="d-block w-100" alt="...">
                        <!-- Update this path to your actual image file -->
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/f.png') }}" class="d-block w-100" alt="...">
                        <!-- Update this path to your actual image file -->
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/a.png') }}" class="d-block w-100" alt="...">
                        <!-- Update this path to your actual image file -->
                    </div>
                </div>
                <!-- Previous and Next buttons -->
                <div class="container-fluid d-flex justify-content-between">
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Container two -->
        <div class="container two">

            <!-- News Section -->
            <!-- News Section -->
            <div class="news-section">
                <h2>Latest News</h2>



            </div>




        </div>
    </div>





    <!-- importent -->


    <div>
        <p class="display-4 text-center mt-3">Important links!</p>

        <div class="container-fluid d-flex justify-content-evenly pp">
            <!-- First box -->
            <div>
                <div class="card-wrapper">
                    <div class="card">
                        <img src="{{ asset('images/balance.png') }}" class="card-img-top balance" alt="...">
                        <!-- Update this path to your actual image file -->
                        <div class="card-body">
                            <h5 class="card-title">Cause List</h5>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up
                                the bulk of the card's content.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second box -->
            <div>
                <div class="card-wrapper">
                    <div class="card">
                        <img src="{{ asset('images/check.png') }}" class="card-img-top check" alt="...">
                        <!-- Update this path to your actual image file -->
                        <div class="card-body">
                            <h5 class="card-title">Case Status</h5>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up
                                the bulk of the card's content.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Third box -->
            <div>
                <div class="card-wrapper">
                    <div class="card">
                        <img src="{{ asset('images/law.png') }}" class="card-img-top balance" alt="...">
                        <!-- Update this path to your actual image file -->
                        <div class="card-body">
                            <h5 class="card-title">Judgement</h5>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up
                                the bulk of the card's content.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fourth box -->
            <div>
                <div class="card-wrapper">
                    <div class="card">
                        <img src="{{ asset('images/file.png') }}" class="card-img-top balance" alt="...">
                        <!-- Update this path to your actual image file -->
                        <div class="card-body">
                            <h5 class="card-title">Pending Case</h5>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up
                                the bulk of the card's content.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fifth box -->
            <div>
                <div class="card-wrapper">
                    <div class="card">
                        <img src="{{ asset('images/group.png') }}" class="card-img-top balance" alt="...">
                        <!-- Update this path to your actual image file -->
                        <div class="card-body">
                            <h5 class="card-title">Bench</h5>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up
                                the bulk of the card's content.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- notice -->

    <div class="toggler-container">
        <div class="button-container d-flex justify-content-center">
            <button onclick="showNotice()" id="noticeButton" class="active">Notice</button>
            <button onclick="showCircular()" id="circularButton">Circular</button>
        </div>
        <div class="content-container">
            <div id="noticeSection" class="notice-section active-section">
                <h2>Notice Section</h2>
                <div class="notice-section">
                    <h2>Notices</h2>


                </div>
                <div id="circularSection" class="circular-section">
                    <h2>Circular Section</h2>
                    <p>This is a circular. You can add your circular content here.</p>
                </div>
            </div>
        </div>

        <script>
            function showNotice() {
                document.getElementById('noticeSection').style.display = 'block';
                document.getElementById('circularSection').style.display = 'none';
                document.getElementById('noticeButton').classList.add('active');
                document.getElementById('circularButton').classList.remove('active');
            }

            function showCircular() {
                document.getElementById('noticeSection').style.display = 'none';
                document.getElementById('circularSection').style.display = 'block';
                document.getElementById('noticeButton').classList.remove('active');
                document.getElementById('circularButton').classList.add('active');
            }

            document.addEventListener('DOMContentLoaded', function() {
                showNotice(); // Show notice section by default on page load
            });
        </script>







        <div class="my-5">
            <!-- Footer -->
            <footer class="text-center text-lg-start text-dark" style="background-color: #ECEFF1;">
                <!-- Section: Social media -->
                <section class="d-flex justify-content-between p-4 text-white" style="background-color: #21D192;">

                </section>
                <!-- Section: Social media -->

                <!-- Section: Links  -->
                <section>
                    <div class="container text-center text-md-start mt-5">
                        <!-- Grid row -->
                        <div class="row mt-3">

                            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold">Activities</h6>
                                <hr class="mb-2 mt-0 d-inline-block"
                                    style="width: 60px; background-color: #7c4dff; height: 2px;" />
                                <p><a href="https://www.mygov.in/home/poll/" class="text-dark"
                                        style="text-decoration: none;">Poll & Survey</a></p>
                                <p><a href="https://www.mygov.in/campaigns/" class="text-dark"
                                        style="text-decoration: none;">Campaigns</a></p>
                                <p><a href="https://www.mygov.in/mygov-podcast/" class="text-dark"
                                        style="text-decoration: none;">Podcast</a></p>
                                <p><a href="https://www.mygov.in/wall-of-fame/" class="text-dark"
                                        style="text-decoration: none;">Wall Of Fame</a></p>
                                <p><a href="https://www.mygov.in/home/blog/" class="text-dark"
                                        style="text-decoration: none;">Blog</a></p>
                                <p><a href="https://www.mygov.in/home.talk" class="text-dark"
                                        style="text-decoration: none;">Talk</a></p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold">Useful links</h6>
                                <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                    style="width: 60px; background-color: #7c4dff; height: 2px;" />
                                <p><a href="https://www.sci.gov.in/faqs/" class="text-dark"
                                        style="text-decoration: none;">FAQ</a></p>
                                <p><a href="https://itat.gov.in/page/content/RTI-Orders-Circulars" class="text-dark"
                                        style="text-decoration: none;">RTI Orders & Circulars</a></p>
                                <p><a href="https://itat.gov.in/page/content/Holidays" class="text-dark"
                                        style="text-decoration: none;">Holiday Lists</a></p>
                                <p><a href="https://itat.gov.in/page/content/Tenders-Auctions" class="text-dark"
                                        style="text-decoration: none;">Tenders and Auctions</a></p>
                                <p><a href="https://itat.gov.in/page/content/Speeches" class="text-dark"
                                        style="text-decoration: none;">Articles, Speeches and Lectures</a></p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold">Contact</h6>
                                <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                    style="width: 60px; background-color: #7c4dff; height: 2px;" />
                                <p><i class="fas fa-home mr-3"></i> The Registrar Supreme Court of India, Tilak Marg,
                                    New Delhi-110001</p>
                                <p><i class="fas fa-envelope mr-3"></i> supremecourt@nic.in</p>
                                <p><i class="fas fa-phone mr-3"></i>011-23116400, 23116401, 23116402</p>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                    </div>
                </section>
                <!-- Section: Links  -->

                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2024 Copyright:
                    <a class="text-dark" href="https://www.sci.gov.in/">Supreme Court of India</a>
                </div>
                <!-- Copyright -->
            </footer>
            <!-- Footer -->
        </div>
        <!-- End of .container -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
        </script>
        
</body>

</html>

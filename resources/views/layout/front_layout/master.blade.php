<?php
use App\FrontLogo;
$frontlogo = FrontLogo::frontlogo();
// echo"<pre>";print_r($frontlogo);die;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E Pharma</title>
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <section class="header">

        <section class="first-part container-fluid ">
            <div class="row ">
                @foreach($frontlogo as $front)
                <div class="col-md-2">
                    <img style="width: 100%;" class="header-logo mt-2" src="{{asset('images/backend_images/frontLogos/'.$front->logo)}}" alt="">

                </div>
                @endforeach

                <div class="col-md-8">
                    <div class="input-group mb-3 mt-2">
                        <span style="background-color: white; color: #10847E; " class="input-group-text"
                            id="basic-addon3"> <b>Search Product</b> </span>
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                    </div>

                </div>

                <div class="col-md-2">
                    <div class="dropdown mt-2 ">
                        <a style="background-color: #0D6C67;" class="btn btn-default dropdown-toggle text-white"
                            href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Prescription
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>

                </div>

            </div>

        </section>


        <section class="second-part">
            <nav class="navbar navbar-expand-lg navbar-light  ">
                <div class="container-fluid ">
                    <a class="navbar-brand text-white " href="#"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-auto">
                            <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
                            <a class="nav-link text-white" href="#">Features</a>
                            <a class="nav-link text-white" href="#">Pricing</a>
                            <a class="nav-link disabled text-white" href="#" tabindex="-1"
                                aria-disabled="true">Disabled</a>
                        </div>
                    </div>
                </div>
            </nav>


        </section>

    </section>


  @yield('content')
    
    
    
    
    <section class="footer-section">

        <footer class="footer-distributed">

            <div class="footer-left">
    
                <h3>E<span> Pharma</span></h3>
    
                <p class="footer-links">
                    <a href="#">Home</a>
                    ·
                    <a href="#">Blog</a>
                    ·
                    <a href="#">Pricing</a>
                    ·
                    <a href="#">About</a>
                    ·
                    <a href="#">Faq</a>
                    ·
                    <a href="#">Contact</a>
                </p>
    
                <p class="footer-company-name">Essential Info-tech © 2021</p>
    
                <div class="footer-icons">
    
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-github"></i></a>
    
                </div>
    
            </div>
    
            <div class="footer-right">
    
                <p>Contact Us</p>
    
                <form action="#" method="post">
    
                    <input type="text" name="email" placeholder="Email">
                    <textarea name="message" placeholder="Message"></textarea>
                    <button >Send</button>
    
                </form>
    
            </div>
    
        </footer>

    </section>













    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script src="{{asset('assets/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('assets/frontend/js/owl.carousel.js')}}"></script>

    <script>
        $('#first-slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 8000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })


        $('#second-slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 8000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 5
                }
            }
        })




        $('#third-slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 8000,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 8
                }
            }
        })


        $('#fourth-slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 8000,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 5
                }
            }
        })

        $('#fifth-slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 8000,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 5
                }
            }
        })

        $('#sixth-slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 8000,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
</body>

</html>
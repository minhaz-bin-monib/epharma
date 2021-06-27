
@extends('layout.front_layout.master')

@section('content')
<section class="main-slider-section ">

<div style="width: 100%;" id="first-slider" class="owl-carousel owl-theme ">
@foreach($banners as $banner)
    <div class="item">
        <img src="{{asset('images/backend_images/banners/'.$banner->image)}}"
            alt="">
    </div>
    @endforeach
  

</div>

</section>


<section class="flat-section">
<section class="container">
    <div class="row">
        @foreach($mainCategories as $category)
        <div class="col-sm-4">
            <div style="background-color: whitesmoke; " class="card dekhi">
                <div class="card-body" style="background-image: url({{asset('images/backend_images/categories/'.$category->category_image)}});">
                    <h5 class="card-title text-white">Special title treatment</h5>
                    <p class="card-text text-white">With supporting text below as a natural lead-in to
                        additional content.</p>
                    <a href="#" class="btn btn-primary">Checkout</a>

                </div>
            </div>
        </div>
@endforeach
        
    </div>
</section>

</section>


<section class="discount-section">
<div class="container-fluid">
@foreach($middlebanners as $middlebanner)
    <div class="row">
      
        <div class="col-md-12  mt-5 ">
            <a href="#"><img src="{{asset('images/backend_images/middleBanners/'.$middlebanner->image)}}" class="w-100" alt=""></a>
        </div>
       
    </div>
    @endforeach
</div>

</section>


<section class="step-section mt-5">

<section class="container">
    <div style="width: 100%;" id="second-slider" class="owl-carousel owl-theme ">
    @foreach($brands as $brand)
        <div class="item">
            <img style="height: 200px; " src="{{asset('images/backend_images/brands/'.$brand->image)}}" alt="">
        </div>
      @endforeach

    </div>
</section>


</section>



<section class="offer-section">
<section class="container-fluid mb-2">
    <div style="display: flex;">
        <div>
            <img src="https://assets.pharmeasy.in/web-assets/dist/67890676.svg" alt="">
        </div>

        <div>
            <h4 class="mt-2"><b>Offers Just For You</b></h4>
        </div>
    </div>
</section>
<section class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="https://cms-contents.pharmeasy.in/offer/ce099a4603c-02.jpg?dim=60x0&dpr=1&q=100"
                            class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Flat Rs.150 instant discount on HDFC Bank Debit and Credit
                                cards</h5>

                            <p class="card-text"><small class="text-muted">Code: <b>HFC30</b></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="images/lensCart.png" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Flat Rs.150 instant discount on HDFC Bank Debit and Credit
                                cards</h5>

                            <p class="card-text"><small class="text-muted">Code: <b>HFC30</b></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="images/myntra.png" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Flat Rs.150 instant discount on HDFC Bank Debit and Credit
                                cards</h5>

                            <p class="card-text"><small class="text-muted">Code: <b>HFC30</b></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="images/PayTm.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Flat Rs.150 instant discount on HDFC Bank Debit and Credit
                                cards</h5>

                            <p class="card-text"><small class="text-muted">Code: <b>HFC30</b></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>

</section>


<!-- <section class="recomended-lab-test mt-5">

<div class="container-fluid">
    <h4><b>Recommended lab Test For You</b></h4>
</div>

<div class="recomended-lab-test-pic container-fluid">
    <div class="row">
        <div class="item col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <img src="https://assets.pharmeasy.in/web-assets/dist/909edb3f.svg" alt="">
                    <h5 class="card-title">Covid Antibody Test</h5>
                    <p class="card-text">Available at 1 certified lab.</p>
                    <h6 class="card-subtitle mb-2 text-muted"><b>$549 Onwards</b></h6>
                    <button type="button" class="btn btn-outline-success">Book Now</button>
                </div>
            </div>
        </div>

        <div class="item col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <img src="https://assets.pharmeasy.in/web-assets/dist/51ffd21a.svg" alt="">
                    <h5 class="card-title">Covid Antibody Test</h5>
                    <p class="card-text">Available at 1 certified lab.</p>
                    <h6 class="card-subtitle mb-2 text-muted"><b>$549 Onwards</b></h6>
                    <button type="button" class="btn btn-outline-success">Book Now</button>
                </div>
            </div>
        </div>

        <div class="item col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <img src="https://assets.pharmeasy.in/web-assets/dist/909edb3f.svg" alt="">
                    <h5 class="card-title">Covid Antibody Test</h5>
                    <p class="card-text">Available at 1 certified lab.</p>
                    <h6 class="card-subtitle mb-2 text-muted"><b>$549 Onwards</b></h6>
                    <button type="button" class="btn btn-outline-success">Book Now</button>
                </div>
            </div>
        </div>

        <div class="item col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <img src="https://assets.pharmeasy.in/web-assets/dist/51ffd21a.svg" alt="">
                    <h5 class="card-title">Covid Antibody Test</h5>
                    <p class="card-text">Available at 1 certified lab.</p>
                    <h6 class="card-subtitle mb-2 text-muted"><b>$549 Onwards</b></h6>
                    <button type="button" class="btn btn-outline-success">Book Now</button>
                </div>
            </div>
        </div>


    </div>
</div>


</section> -->


<section class="featured-brand mt-5">

<div class="container-fluid">
    <h4><b>Featured Brands</b></h4>
</div>


<div class="products-pic container-fluid">
    <div id="third-slider" class="owl-carousel owl-theme ">
    @foreach($brands as $brand)
    <a href="{{asset('brands/'.$brand->slug)}}">
    <div class="item featured-product-pic-style">
            <img src="{{asset('images/backend_images/brands/'.$brand->image)}}"
                alt="">
        </div>
    </a>
        
   @endforeach

    </div>
</div>

</section>


<section class="top-selling-products container-fluid">
<div>
    <h4><b>Top Selling Products</b></h4>
</div>

<div id="fourth-slider" class="owl-carousel owl-theme ">
    @foreach($products as $product)
    <div class="item">
        <div class="card" style="width: 18rem; border: none;">
            <img style=" border: 1px solid lightgray; border-radius: 5px;"
                src="{{asset('images/backend_images/products/'.$product->main_image)}}"
                class="card-img-top" alt="...">
            <div class="card-body">
                <h5>{{$product->product_name}}</h5>
                <p>{{$product->meta_title}} <br><b>{{$product->product_price}}</b>&#2547;</p>

            </div>
        </div>
    </div>

@endforeach


</div>

</section>



<section class="deals-of-the-day container-fluid mt-5">
<div class="d-flex justify-content-start">
    <div class="mb-2">
        <img src="https://assets.pharmeasy.in/web-assets/dist/cc9b301d.svg" alt="">
    </div>
    <div class="mt-2 me-5">
        <h4 style="margin-left: 20px;">Deals of The Day</h4>
    </div>
</div>

<div id="fifth-slider" class="owl-carousel owl-theme ">
    @foreach($fetured_products as $fetured)
    <div class="item">
        <div class="card" style="width: 18rem; border: none;">
            <img style=" border: 1px solid lightgray; border-radius: 5px;"
                src="{{asset('images/backend_images/products/'.$fetured->main_image)}}"
                class="card-img-top" alt="...">
            <div class="card-body">
                <h5>{{$fetured->product_name}}</h5>
                <p>{{$fetured->meta_title}} <br><b>{{$fetured->product_price}} &#2547;</b></p>

            </div>
        </div>
    </div>

@endforeach

</div>

</section>


<section class="success mt-5">
<div class="container-fluid ">
    <div class="row d-flex justify-content-around">
        <div class="col-md-3 ">
            <img class="w-100" src="https://assets.pharmeasy.in/web-assets/dist/4d2f7c48.svg" alt="">
            <h1 class="ms-5">50 Lakh+</h1>
            <p class="ms-5"><b>Family Saved</b></p>
        </div>

        <div class="col-md-3">
            <img class="w-100" src="https://assets.pharmeasy.in/web-assets/dist/92c372bb.svg" alt="">
            <h1 class="ms-5">1.5 Core+</h1>
            <p class="ms-5"><b>Orders Delivered</b></p>
        </div>

        <div class="col-md-3">
            <img class="w-100" src="https://assets.pharmeasy.in/web-assets/dist/f2d557d3.svg" alt="">
            <h1 class="ms-5">22000 +</h1>
            <p class="ms-5"><b>Pincodes Served</b></p>
        </div>

        <div class="col-md-3">
            <img class="w-100" src="https://assets.pharmeasy.in/web-assets/dist/773ae9c5.svg" alt="">
            <h1 class="ms-5">1 Lakh+</h1>
            <p class="ms-5"><b>Medicines Available</b></p>
        </div>

    </div>

</div>


</section>


<section class="feedback container-fluid mt-5">
<div class="feedback-text">
    <h4><b>What Our Customer have to say</b></h4>


</div>

<div class="review">
    <div id="sixth-slider" class="owl-carousel owl-theme ">

        <div class="item">
            <div style="background-color: #F2FFF8;" class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Rohini sarkar</h5>
                    <h6 class="card-subtitle mb-2 text-muted">April 21, 2021</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p>

                </div>
            </div>
        </div>

        
        <div class="item">
            <div style="background-color: #F2FFF8;" class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">kohini sarkar</h5>
                    <h6 class="card-subtitle mb-2 text-muted">April 21, 2021</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p>

                </div>
            </div>
        </div>

        
        <div class="item">
            <div style="background-color: #F2FFF8;" class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">lohini sarkar</h5>
                    <h6 class="card-subtitle mb-2 text-muted">April 21, 2021</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p>

                </div>
            </div>
        </div>

        
        <div class="item">
            <div style="background-color: #F2FFF8;" class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">johini sarkar</h5>
                    <h6 class="card-subtitle mb-2 text-muted">April 21, 2021</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p>

                </div>
            </div>
        </div>

        <div class="item">
            <div style="background-color: #F2FFF8;" class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Rohini sarkar</h5>
                    <h6 class="card-subtitle mb-2 text-muted">April 21, 2021</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p>

                </div>
            </div>
        </div>

        
        <div class="item">
            <div style="background-color: #F2FFF8;" class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">kohini sarkar</h5>
                    <h6 class="card-subtitle mb-2 text-muted">April 21, 2021</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p>

                </div>
            </div>
        </div>

        
        <div class="item">
            <div style="background-color: #F2FFF8;" class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">lohini sarkar</h5>
                    <h6 class="card-subtitle mb-2 text-muted">April 21, 2021</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p>

                </div>
            </div>
        </div>

        
        <div class="item">
            <div style="background-color: #F2FFF8;" class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">johini sarkar</h5>
                    <h6 class="card-subtitle mb-2 text-muted">April 21, 2021</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p>

                </div>
            </div>
        </div>



    </div>

</div>

</section>



<section class="plain-text-area container-fluid mt-5" >
<h5>Your One-Stop Online Pharmacy - PharmEasy</h5>
<h6>We've got India Covered!</h6>
<p>We now deliver in 1000+ cities and towns across 22000+ pin codes. We thereby cover every nook and corner of the country! The major cities in which we deliver include Mumbai, Kolkata, Delhi, Bengaluru, Ahmedabad, Hyderabad, Chennai, Thane, Howrah, Pune, Gurgaon, Navi Mumbai, Jaipur, Noida, Lucknow, Ghaziabad & Vadodara.</p>
<br>

<h6>Say Goodbye to All Your Healthcare Worries With PharmEasy!</h6>
<p>PharmEasy is here to help you take it easy! We are amongst one of India's top online pharmacy and medical care platforms. It enables you to order pharmaceutical and healthcare products online by connecting you to registered retail pharmacies and get them delivered to your home. We are an online medical store, making your purchase easy, simple, and affordable!</p>
<br>
<h6>How Are We Making Lives Simpler With Our Online Medical Store?</h6>
<p>Our doorstep delivery service is available in PAN-India across top cities like Bangalore, Delhi, Mumbai, Kolkata, Hyderabad, Gurgaon, Noida, Pune, etc. Our online medical store also allows you to choose from 1 lakh+ products incl. OTC products and medical equipment. PharmEasy is a one-stop online medical platform where you can also book diagnostic tests including blood tests, full-body checkups, and other preventive health check-ups at an affordable cost, right from the comfort of your home. We have partnered with trusted & certified labs that arrange for a sample pick-up from the convenience of your home. They also provide you with timely reports.</p>
<br>
<h6>Why Are We The Most Preferred Online Pharmacy?</h6>
<p>Lucrative offers on our platform allow you to make payment online and via various payment wallets at a discounted price. Alternatively, you can also choose to pay cash on delivery as we deliver the products at your doorstep. We cater to all your pharmaceutical needs and also make ordering medicines online a hassle-free experience for you. We connect you only with registered retail pharmacies & certified diagnostic labs. We ensure that healthcare is affordable to all and make the process of ordering online simple.</p>
<br>
<h6>Sit Back & Relax While You Get Your Essentials Delivered Every Month!</h6>
<p>It’s tough to remember to refill every month, especially in the case of chronic diseases. PharmEasy’s subscription service not only ensures that you are reminded of your refills but also makes sure that you are never out on your medical essentials. You will get a reminder every month and your order will be delivered at your convenience!</p>
<br>
<h6>We Believe in ‘Simplifying Healthcare, Impacting Lives!’</h6>

</section>
@endsection
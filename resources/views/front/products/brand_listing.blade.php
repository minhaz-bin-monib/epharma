
@extends('layout.front_layout.master')

@section('content')


<section class="all-categories container">
        <div>
            <p>All Categories > Horlicks</p>
        </div>

        <div>
            <div class="row row-1 ">
                @foreach($brand_products as $brand_product)
                <div class="col-md-4">
                    <div class="card " style="width: 18rem;">
                        <img src="https://cdn01.pharmeasy.in/dam/products_otc/I41111/horlicks-protein-plus-chocolate-nutrition-drink-refill-of-200-g-1-1601564233.jpg?dim=200x0&dpr=1&q=100"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$brand_product->product_name}}</h5>
                            <p class="card-text">MRP <b>{{$brand_product->product_price}} Tk</b></p>
    
                        </div>
                    </div>
                </div>
         @endforeach
              

          
        </div>

    </section>
@endsection
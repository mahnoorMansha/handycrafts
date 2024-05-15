@include('frontend.layouts.header')
    <!-- ***** Header Area End ***** -->
    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Single Product Page</h2>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <div class="left-images">
                    <img src="{{URL::asset('uploads/products/'.$product->image)}}" style="height:500px;"alt="">
                    <!-- <img src="{{URL::asset('uploads/products/'.$product->image)}}" alt=""> -->
                </div>
            </div>
            <div class="col-lg-4">
            @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif

                <div class="right-content">
                    <h4>{{$product->name}}</h4>
                    <span class="price">${{$product->price}}</span>
                    <ul class="stars">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul>
                    <span>{{$product->description}}.</span>
                    <div class="quote">
                        <i class="fa fa-quote-left"></i><p>The best of both worlds. Store and web.</p>
                    </div>
                   
                   <div class="quantity-content">
                        <div class="left-content">
                            <h6>No. of Orders</h6>
                        </div>
                        <form action="{{URL::to('addtocart')}}" method="post">
                            @csrf
                        <div class="right-content">
                            <div class="quantity buttons_added">
                                <input type="number" value="1" min="1" max="{{$product->quantity}}" name="quantity" >
                                <input type="hidden" name="id" value="{{$product->id}}"/>
                        </div>
                    </div>
                    <div class="total"><br>
                        <!-- <h4>Total: $210.00</h4> -->
                        <button type="submit" name="addtocart" class="main-border-button">Add To Cart</button>
                    </div>
                </div>
                   </form>
            </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->


    <!-- ***** Footer Start ***** -->
    @include('frontend.layouts.footer')
 
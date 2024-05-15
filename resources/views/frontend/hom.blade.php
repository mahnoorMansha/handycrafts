@include('frontend.layouts.header')

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4 style="color:black;">Dream Catcher</h4>
                                <span style="color:black;">Catch your dreams &amp; give them a life</span>
                                <!-- <div class="main-border-button">
                                    <a href="#" style="color:black;"></a>
                                </div> -->
                            </div>
                            <img src="https://ideogram.ai/api/images/direct/yYEGVdn-Thenn-aLtZEOWQ.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4 style="color:black;">Decor</h4>
                                            <span style="color:black;">Best decor items</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Decor</h4>
                                                <p>Hand crafted best decor pieces </p>
                                                <!-- <div class="main-border-button">
                                                    <a href="#"></a>
                                                </div> -->
                                            </div>
                                        </div>
                                        <img  style="height:275px;" src="assets/images/decor.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Gifts</h4>
                                            <span>For your loved one's</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Gifts</h4>
                                                <p>Cherish the Moments with our Thoughtful Gifts.</p>
                                                <!-- <div class="main-border-button">
                                                    <a href="#"></a>
                                                </div> -->
                                            </div>
                                        </div>
                                        <img src="assets/images/gifts.jpg" style="height:275px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4 >Art</h4>
                                            <span >Hand paintings</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Art</h4>
                                                <p>The most exquisite thing is your smile. So, Just admire the craft</p>
                                                <!-- <div class="main-border-button">
                                                    <a href="#"></a>
                                                </div> -->
                                            </div>
                                        </div>
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTphiHLFqb0Sbu9uL_DfI7_BRDkErF7i7Uqhw&s" style="height:275px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4 style="color:black;">Accessories</h4>
                                            <span style="color:black;">Best Aesthetic Accessories</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Accessories</h4>
                                                <p>Where Elegance Meets Thoughtfulness.</p>
                                                <!-- <div class="main-border-button">
                                                    <a href="#"></a>
                                                </div> -->
                                            </div>
                                        </div>
                                        <img src="assets/images/accessories.jpg" style="height:275px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** gift Area Starts ***** -->
    <section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Gift's </h2>
                        <span>valuable gifts for your loved ones.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                        @foreach($allProducts as $item)
                            @if($item->category === 'Gift')
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="{{URL::to('singleproduct/'.$item->id)}}"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                            <li><a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="{{URL::asset('uploads/products/'.$item->image)}}" style="height:400px;" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{$item->name}}</h4>
                                    <span>${{$item->price}}</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            @endif
                          @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** gift Area Ends ***** -->

    <!-- ***** decor  Area Starts ***** -->
    <section class="section" id="women">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Decor's Latest</h2>
                        <span>.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="women-item-carousel">
                        <div class="owl-women-item owl-carousel">
                            @foreach($allProducts as $item)
                            @if($item->category === 'Decor')
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="{{URL::to('singleproduct/'.$item->id)}}"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                            <li><a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="{{URL::asset('uploads/products/'.$item->image)}}" style="height:400px;" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{$item->name}}</h4>
                                    <span>${{$item->price}}</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            @endif
                          @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Women Area Ends ***** -->

    <!-- ***** Kids Area Starts ***** -->
    <section class="section" id="kids">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Arts's Latest</h2>
                        <span>most unique art piece fr you.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
            @foreach($allProducts as $item)
                            @if($item->category === 'Art')
                <div class="col-lg-12">
                    <div class="kid-item-carousel">
                        <div class="owl-kid-item owl-carousel">
                       
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="{{URL::to('singleproduct/'.$item->id)}}"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                            <li><a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="{{URL::asset('uploads/products/'.$item->image)}}" style="height:400px;" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{$item->name}}</h4>
                                    <span>${{$item->price}}</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            @endif
                          @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Kids Area Ends ***** -->

    <!-- ***** Explore Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h2>Mahnoor Mansha</h2>
                        <span>I am a developer of this online store. This website is about to sell the hand crafted traditional products which is forgotten in this modern society with the fusion of creativity,tradation and modern needs.</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i><p>Allow your self to be a beginner. No one starts being excellent.</p>
                        </div>
                        <p>So this website is developed by using HTML,CSS,Bootstrap,PHP,Laravel,Mysql. And debugging a lot of errors</p>
                        <p>So you can get onto my portfolio    Thank you.</p>
                        <div class="main-border-button">
                            <a href="{{URL::to('resume/')}}">portfolio</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="leather">
                                    <h4>Full-Stack Developer</h4>
                                    <span></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="first-image">
                                    <img src="assets/images/profile.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="second-image">
                                    <img src="assets/images/cover.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="types">
                                    <h4>Laravel Developer</h4>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Explore Area Ends ***** -->

    <!-- ***** Subscribe Area Starts ***** -->
    <

@include('frontend.layouts.footer')
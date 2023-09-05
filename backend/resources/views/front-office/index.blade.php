@extends('layouts.base')

@section('content')
    <body>        
        
            <!-- product section -->
            <div class="product-section mt-150 mb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 text-center">
                            <div class="section-title">	
                                <h3><span class="orange-text">Our</span> Products</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="single-product.html"><img src="/assets/img/products/product-img-1.jpg" alt=""></a>
                                </div>
                                <h3>Strawberry</h3>
                                <p class="product-price"><span>Per Kg</span> 85$ </p>
                                <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="single-product.html"><img src="/assets/img/products/product-img-2.jpg" alt=""></a>
                                </div>
                                <h3>Berry</h3>
                                <p class="product-price"><span>Per Kg</span> 70$ </p>
                                <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="single-product.html"><img src="/assets/img/products/product-img-3.jpg" alt=""></a>
                                </div>
                                <h3>Lemon</h3>
                                <p class="product-price"><span>Per Kg</span> 35$ </p>
                                <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end product section -->

            <!-- cart banner section -->
            <section class="cart-banner pt-100 pb-100">
                <div class="container">
                    <div class="row clearfix">
                        <!--Image Column-->
                        <div class="image-column col-lg-6">
                            <div class="image">
                                <div class="price-box">
                                    <div class="inner-price">
                                        <span class="price">
                                            <strong>30%</strong> <br> off per kg
                                        </span>
                                    </div>
                                </div>
                                <img src="/assets/img/a.jpg" alt="">
                            </div>
                        </div>
                        <!--Content Column-->
                        <div class="content-column col-lg-6">
                            <h3><span class="orange-text">Deal</span> of the month</h3>
                            <h4>Hikan Strwaberry</h4>
                            <div class="text">Quisquam minus maiores repudiandae nobis, minima saepe id, fugit ullam similique! Beatae, minima quisquam molestias facere ea. Perspiciatis unde omnis iste natus error sit voluptatem accusant</div>
                            <!--Countdown Timer-->
                            <div class="time-counter"><div class="time-countdown clearfix" data-countdown="2020/2/01"><div class="counter-column"><div class="inner"><span class="count">00</span>Days</div></div> <div class="counter-column"><div class="inner"><span class="count">00</span>Hours</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Mins</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Secs</div></div></div></div>
                            <a href="cart.html" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end cart banner section -->

            
            <!-- advertisement section -->
            <div class="abt-section mb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="abt-bg">
                                <a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="abt-text">
                                <p class="top-sub">Since Year 1999</p>
                                <h2>We are <span class="orange-text">Fruitkha</span></h2>
                                <p>Etiam vulputate ut augue vel sodales. In sollicitudin neque et massa porttitor vestibulum ac vel nisi. Vestibulum placerat eget dolor sit amet posuere. In ut dolor aliquet, aliquet sapien sed, interdum velit. Nam eu molestie lorem.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente facilis illo repellat veritatis minus, et labore minima mollitia qui ducimus.</p>
                                <a href="#" class="boxed-btn mt-4">know more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end advertisement section -->
            
            <!-- shop banner -->
            <section class="shop-banner">
                <div class="container">
                    <h3>December sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
                    <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
                    <a href="#" class="cart-btn btn-lg">Shop Now</a>
                </div>
            </section>
            <!-- end shop banner -->

            <!-- latest news -->
            <div class="latest-news pt-150 pb-150">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 text-center">
                            <div class="section-title">	
                                <h3><span class="orange-text">Our</span> News</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($lieux as $key => $lieu)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-latest-news">
                                    <a href="#"><div class="latest-news-bg news-bg-1"></div></a>
                                    <div class="news-text-box">                                                                        
                                            <h3><a>{{ $lieu->adresse }}</a></h3>
                                            <a class="read-more-btn"disabled>Heure de collecte :</a>
                                            <p class="excerpt"><i class="fas fa-clock"></i>  {{ $lieu->horaires_collecte }}</p>
                                            @foreach ($lieu->trashTypes as $trashType)
                                                <span class="badge rounded-pill bg-dark text-white" style="font-size: 1rem;">{{ $trashType->name }}</span>
                                            @endforeach
                                    </div>                            
                                </div>
                            </div>
                        @endforeach    
                    </div>
                    <!-- <div class="row">
                        <div class="col-lg-12 text-center">
                            <a href="news.html" class="boxed-btn">More News</a>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- end latest news -->
            
            <!-- jquery -->
            <script src="/assets/js/jquery-1.11.3.min.js"></script>
            <!-- bootstrap -->
            <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
            <!-- count down -->
            <script src="/assets/js/jquery.countdown.js"></script>
            <!-- isotope -->
            <script src="/assets/js/jquery.isotope-3.0.6.min.js"></script>
            <!-- waypoints -->
            <script src="/assets/js/waypoints.js"></script>
            <!-- owl carousel -->
            <script src="/assets/js/owl.carousel.min.js"></script>
            <!-- magnific popup -->
            <script src="/assets/js/jquery.magnific-popup.min.js"></script>
            <!-- mean menu -->
            <script src="/assets/js/jquery.meanmenu.min.js"></script>
            <!-- sticker js -->
            <script src="/assets/js/sticker.js"></script>
            <!-- main js -->
            <script src="/assets/js/main.js"></script>
    </body>
@endsection


	
	
	
	
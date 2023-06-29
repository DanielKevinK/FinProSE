<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AgroBiz.com</title>

    <link rel="stylesheet" href="{{asset('main')}}/css/homeStyle.css">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>
    @section('categories')
    @foreach ($categories as $category)
    <li><a class="dropdown-item" href="/shop/{{$category->link}}">{{ $category->name }}</a></li>
    @endforeach
    @endsection
    @include('component.navbar')

    {{-- Hero Section Start --}}
    <section id="hero" class="section-hero section-p1">
        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active c-item">
                    <img src="{{asset('main')}}/image-content/banner/Food2.jpg" class="d-block w-100 c-img" alt="Slide 1">
                    <div class="carousel-caption top-0 mt-4">
                        <p class="mt-5 fs-3 text-uppercase">Healthy products in our store</p>
                        <h1 class="display-1 fw-bolder text-capitalize">AgroStore.com</h1>
                        <a class="btn btn-primary px-4 py-2 fs-5 mt-5" href="/sign-in">Register Now</a>
                    </div>
                </div>
                <div class="carousel-item c-item">
                    <img src="{{asset('main')}}/image-content/banner/Store2.jpg" class="d-block w-100 c-img" alt="Slide 2">
                    <div class="carousel-caption top-0 mt-4">
                        <p class="text-uppercase fs-3 mt-5">Have products to sell ?</p>
                        <p class="display-1 fw-bolder text-capitalize">Join our store</p>
                        <button class="btn btn-primary px-4 py-2 fs-5 mt-5" data-bs-toggle="modal" data-bs-target="#booking-modal" href="/sign-in">Join Now</button>
                    </div>
                </div>
                <div class="carousel-item c-item">
                    <img src="{{asset('main')}}/image-content/banner/Money.jpg" class="d-block w-100 c-img" alt="Slide 3">
                    <div class="carousel-caption top-0 mt-4">
                        <p class="text-uppercase fs-3 mt-5">Be our partner</p>
                        <p class="display-1 fw-bolder text-capitalize">Split The Profit</p>
                        <a class="btn btn-primary px-4 py-2 fs-5 mt-5" href="/investor-register">Invest Now</a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev " type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    {{-- End Hero Section --}}

    {{-- Featured Categories Start --}}
    <section id="featured" class="section-p1">
        <h3>Featured Categories</h3>
        <div class="fe">
            @foreach ($categories as $category)
            <div class="fe-box">
                <a href="/shop/{{$category->link}}" class="text-decoration-none">
                    <img src="/storage/{{ $category->image }}" alt="">
                    <h6 class="d-inline-block text-truncate">{{ $category->name }}</h6>
                </a>
            </div>
            @endforeach
        </div>
    </section>
    {{-- End Featured Categories --}}

    {{-- Small Banner Start --}}
    <section id="sm-banner" class="section-p2">
        <div class="banner-box">
            <h2>Fruits & Vegetables</h2>
            <span>Get Up to 30% off</span>
            <button class="white">Shop Now</button>
        </div>
        <div class="banner-box banner-box2">
            <h2>Freshly Baked Buns</h2>
            <span>Get Up to 25% off</span>
            <button class="white">Shop Now</button>
        </div>
    </section>
    {{-- Small Banner End --}}

    {{-- Product Categories Start --}}
    <section id="product1" class="section-p1">
        <h3>Popular Products</h3>
        <div class="text-align-center">
            <div class="pro-container">
                @foreach ($products as $product)
                <div class="pro" onclick="openNewWindow('{{ $product->category }}', '{{ $product->slug }}')">
                    <img src="/storage/{{ $product->image }}" alt="image-product">
                    <!-- @if($product->category == 'beans')
                    <img src="{{asset('main')}}/image-content/Icons/products-new/beans/resized/almond.jpg" alt="">
                    @elseif($product->category == 'bread')
                    <img src="{{asset('main')}}/image-content/Icons/products-new/bread-eggs/resized/bread-1.jpg" alt="">
                    @elseif($product->category == 'fruit')
                    <img src="{{asset('main')}}/image-content/Icons/products-new/fruits/resized/apple.jpg" alt="">
                    @elseif($product->category == 'rice')
                    <img src="{{asset('main')}}/image-content/Icons/products-new/rice/resized/brown-rice.jpeg" alt="">
                    @elseif($product->category == 'tea')
                    <img src="{{asset('main')}}/image-content/Icons/products-new/tea-coffee/resized/black-tea.jpg" alt="">
                    @else
                    <img src="{{asset('main')}}/image-content/Icons/products-new/vegetables/resized/cabbage.jpg" alt="">
                    @endif -->
                    <div class="des text-start">
                        <span style="text-transform: capitalize;">{{ $product->category }}</span>
                        <h5>{{ $product->name }}</h5>

                        <h4>Rp. {{ $product->price }}</h4>
                    </div>
                    <a href="#"><i class="cart-info bi bi-cart"></i></a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Product Categories End --}}

    {{-- Banner Start --}}
    <section id="banner" class="section-m1 d-flex flex-column justify-content-center align-items-center text-center">
        <h4>Free Shipping on Orders over $100</h4>
        <h2 class="display-4 fw-medium">Free Shipping to <span> First-Time Customers Only</span>. After Promotions and Discounts are applied</h2>
        <button class="normal">Shop Now</button>
    </section>
    {{-- Banner End --}}

    {{-- Product Categories Start --}}
    <section id="product1" class="section-p1">
        <h3>New Arrival</h3>
        <div class="text-align-center">
            <div class="pro-container">
                @foreach ($newProducts as $product)
                <div class="pro" onclick="openNewWindow('{{ $product->category }}', '{{ $product->slug }}')">
                    <img src="/storage/{{ $product->image }}" alt="image-product">
                    <!-- @if($product->category == 'beans')
                    <img src="{{asset('main')}}/image-content/Icons/products-new/beans/resized/almond.jpg" alt="">
                    @elseif($product->category == 'bread')
                    <img src="{{asset('main')}}/image-content/Icons/products-new/bread-eggs/resized/bread-1.jpg" alt="">
                    @elseif($product->category == 'fruit')
                    <img src="{{asset('main')}}/image-content/Icons/products-new/fruits/resized/apple.jpg" alt="">
                    @elseif($product->category == 'rice')
                    <img src="{{asset('main')}}/image-content/Icons/products-new/rice/resized/brown-rice.jpeg" alt="">
                    @elseif($product->category == 'tea')
                    <img src="{{asset('main')}}/image-content/Icons/products-new/tea-coffee/resized/black-tea.jpg" alt="">
                    @else
                    <img src="{{asset('main')}}/image-content/Icons/products-new/vegetables/resized/cabbage.jpg" alt="">
                    @endif -->
                    <div class="des text-start">
                        <span style="text-transform: capitalize;">{{ $product->category }}</span>
                        <h5>{{ $product->name }}</h5>

                        <h4>Rp. {{ $product->price }}</h4>
                    </div>
                    <a href="#"><i class="cart-info bi bi-cart"></i></a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Product Categories End --}}

    {{-- Featured Categories Start --}}
    <section id="information" class="section-p3">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-3 col-lg-3">
                    <div class="mb-3">
                        <div class="mb-3">
                            <img src="{{asset('main')}}/image-content/Icons/information/clock.svg" alt="">
                        </div>
                        <h3 class="h5 mb-3">10 minute grocery now</h3>
                        <p>Get your order delivered to your doorstep at the earliest from FreshCart pickup stores near you.</p>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3">
                    <div class="mb-3">
                        <div class="mb-3">
                            <img src="{{asset('main')}}/image-content/Icons/information/gift.svg" alt="">
                        </div>
                        <h3 class="h5 mb-3">Best Prices & Offers</h3>
                        <p>Cheaper prices than your local supermarket, great cashback offers to top it off. Get best pricess & offers.</p>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3">
                    <div class="mb-3">
                        <div class="mb-3">
                            <img src="{{asset('main')}}/image-content/Icons/information/package.svg" alt="">
                        </div>
                        <h3 class="h5 mb-3">Wide Assortment</h3>
                        <p>Choose from 5000+ products across food, personal care, household, bakery, veg and non-veg & other categories.</p>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3">
                    <div class="mb-3">
                        <div class="mb-3">
                            <img src="{{asset('main')}}/image-content/Icons/information/refresh-cw.svg" alt="">
                        </div>
                        <h3 class="h5 mb-3">Easy Returns</h3>
                        <p>Not satisfied with a product? Return it at the doorstep & get a refund within hours. No questions asked policy.</p>
                    </div>
                </div>


            </div>
        </div>
    </section>
    {{-- End Featured Categories --}}

    @include('component.footer')

    {{-- Script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
@php
$token = session('token');
@endphp
<script>
    // Store the access token in JavaScript variable
    var accessToken = "{{ $token }}";
    if (accessToken) {
        sessionStorage.setItem('accessToken', accessToken);
    }

    var token = sessionStorage.getItem('accessToken');
    if (!token) {
        window.location.href = "/sign-in";
    }

    function openNewWindow(category, slug) {
        var url = "{{ route('shop-category', ['category' => ':category', 'slug' => ':slug']) }}"
            .replace(':category', category)
            .replace(':slug', slug);
        window.location.href = url;
    }
</script>

</html>
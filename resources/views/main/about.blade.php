<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AgroBiz.com</title>

    <link rel="stylesheet" href="{{asset('main')}}/css/about.css">
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

    {{-- Page Header Start --}}
    <section id="page-header" class="about-header">
        <h2>Get to know us more</h2>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
    </section>
    {{-- Page Header End --}}

    {{-- About-head Start --}}
    <section id="about-head" class="section-p1">
        <img src="{{asset('main')}}/image-content/about/farmer.jpg" alt="">
        <div>
            <h2>Who Are We?</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam neque officia recusandae beatae soluta quidem! Magnam consectetur labore unde placeat maiores impedit, incidunt odio ex eos, repellendus voluptatum quidem facilis!</p>

            <abbr title="">Create stunning images with as much or as little control as you like thanks to a choice of basic and creative modes</abbr>
            <br><br>

            <marquee bgcolor="#ccc" loop="-1" scrollamount="5" width="100%">Create stunning images with as much or as little control as you like thanks to a choice of basic and creative modes</marquee>
        </div>
    </section>
    {{-- About-head End --}}

    {{-- Featured Categories Start --}}
    {{-- <section id="information" class="section-p3">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-3 col-lg-3">
                    <div class="mb-3">
                        <div class="mb-3">
                            <img src="{{asset('image')}}/Icons/information/clock.svg" alt="">
    </div>
    <h3 class="h5 mb-3">10 minute grocery now</h3>
    <p>Get your order delivered to your doorstep at the earliest from FreshCart pickup stores near you.</p>
    </div>
    </div>
    <div class="col-md-3 col-lg-3">
        <div class="mb-3">
            <div class="mb-3">
                <img src="{{asset('image')}}/Icons/information/gift.svg" alt="">
            </div>
            <h3 class="h5 mb-3">Best Prices & Offers</h3>
            <p>Cheaper prices than your local supermarket, great cashback offers to top it off. Get best pricess & offers.</p>
        </div>
    </div>
    <div class="col-md-3 col-lg-3">
        <div class="mb-3">
            <div class="mb-3">
                <img src="{{asset('image')}}/Icons/information/package.svg" alt="">
            </div>
            <h3 class="h5 mb-3">Wide Assortment</h3>
            <p>Choose from 5000+ products across food, personal care, household, bakery, veg and non-veg & other categories.</p>
        </div>
    </div>
    <div class="col-md-3 col-lg-3">
        <div class="mb-3">
            <div class="mb-3">
                <img src="{{asset('image')}}/Icons/information/refresh-cw.svg" alt="">
            </div>
            <h3 class="h5 mb-3">Easy Returns</h3>
            <p>Not satisfied with a product? Return it at the doorstep & get a refund within hours. No questions asked policy.</p>
        </div>
    </div>


    </div>
    </div>
    </section> --}}
    {{-- End Featured Categories --}}

    @include('component.footer')

    {{-- Script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
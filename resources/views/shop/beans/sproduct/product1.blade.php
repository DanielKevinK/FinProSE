<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AgroBiz.com</title>

    <link rel="stylesheet" href="{{asset('main')}}/css/product.css">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>
    @include('component.navbar')

    {{-- prodetails Start --}}
    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="{{asset('main')}}/image-content/Icons/products-new/beans/original/Almond/Almond-beans.jpg" width="80%" id="MainImg" alt="">

            {{-- <div class="small-img-group">
                <div class="small-img-col">
                    <img src="{{asset('image')}}/Icons/products-new/beans/original/Almond/Almond-beans.jpg" width="100%" class="small-img" alt="">
        </div>
        <div class="small-img-col">
            <img src="{{asset('image')}}/Icons/products-new/beans/original/Almond/Almond1.jpg" width="100%" class="small-img" alt="">
        </div>
        <div class="small-img-col">
            <img src="{{asset('image')}}/Icons/products-new/beans/original/Almond-beans.jpg" width="100%" class="small-img" alt="">
        </div>
        <div class="small-img-col">
            <img src="{{asset('image')}}/Icons/products-new/beans/original/Almond-beans.jpg" width="100%" class="small-img" alt="">
        </div>
        </div> --}}
        </div>

        <div class="single-pro-details">
            <h6>Home / Beans</h6>
            <h4>Almond-Beans</h4>
            <h2>Rp. 100.000</h2>
            <input type="number" value="1">
            <button class="normal">Add to Cart</button>
            <h4 class="product-details">Product details</h4>
            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil sapiente libero eligendi maxime quae ratione, explicabo iste aut dolorem, pariatur obcaecati veritatis ad officia laudantium incidunt ducimus laborum nesciunt autem.</span>
        </div>
    </section>
    {{-- prodetails End --}}

    {{-- Footer Section Start --}}
    <footer class="section-p1 d-flex">
        <div class="cols">
            <p class="fs-3 logo">Agro<b>Store</b></p>
            <h4>Contact</h4>
            <p><strong>Address: </strong> Jl. Araya Mansion No.8 - 22, Genitri, Tirtomoyo, Kec. Pakis, Kabupaten Malang, Jawa Timur</p>
            <p><strong>Phone: </strong> 08123412521</p>
            <p><strong>Hours: </strong> 08.00 - 21.00, Mon-Sunday</p>
            <div class="follow">
                <h4>Follow us</h4>
                <div class="icon">
                    <i class="bi bi-facebook"></i>
                    <i class="bi bi-twitter"></i>
                    <i class="bi bi-instagram"></i>
                    <i class="bi bi-telegram"></i>
                </div>
            </div>
        </div>
        <div class="cols">
            <h4>About</h4>
            <a href="#">About us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact us</a>
        </div>
        <div class="cols">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Help</a>
        </div>
        <div class="cols install">
            <h4>Install App</h4>
            <p>From App Store or Google Play</p>
            <div class="rows ">
                <img src="{{asset('main')}}/image-content/Icons/footer/app.jpg" alt="">
                <img src="{{asset('main')}}/image-content/Icons/footer/play.jpg" alt="">
            </div>
            <p>Secured Payment Gateaways</p>
            <img src="{{asset('main')}}/image-content/Icons/footer/pay.png" alt="">
        </div>

        <div class="copyright">
            <p class="fs-6">©Copyright 2023, Bina Nusantara University - AgroStore.Com</p>
        </div>
    </footer>
    {{-- Footer Section End --}}



    {{-- Script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
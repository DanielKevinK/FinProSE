<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AgroBiz.com</title>

    <link rel="stylesheet" href="{{asset('main')}}/css/shop.css">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>
    @include('component.navbar')

    {{-- Page Header Start --}}
    <section id="page-header">
        <h2>Fresh Product Everyday</h2>

        <p>Browse your product Now!!</p>
    </section>
    {{-- Page Header End --}}

    {{-- Product Categories Start --}}
    <section id="product1" class="section-p1">
        <div class="text-align-center">
            <div class="pro-container">
                <div class="pro" onclick="window.location.href='/shop/beans/product1'">
                    <img src="{{asset('main')}}/image-content/Icons/products-new/beans/resized/almond.jpg" alt="">
                    <div class="des text-start">
                        <span>Beans</span>
                        <h5>Almond-Beans</h5>
                        
                        <h4>$60</h4>
                    </div>
                    <a href="#"><i class="cart-info bi bi-cart"></i></a>
                </div>
                <div class="pro">
                    <img src="{{asset('main')}}/image-content/Icons/products-new/beans/resized/chesnut.jpg" alt="">
                    <div class="des text-start">
                        <span>Beans</span>
                        <h5>Chestnut-Beans</h5>
                        
                        <h4>$30</h4>
                    </div>
                    <a href="#"><i class="cart-info bi bi-cart"></i></a>
                </div>
                <div class="pro">
                    <img src="{{asset('main')}}/image-content/Icons/products-new/bread & eggs/resized/bread-1.jpg" alt="">
                    <div class="des text-start">
                        <span>Bread & Eggs</span>
                        <h5>Bread</h5>
                        
                        <h4>$16</h4>
                    </div>
                    <a href="#"><i class="cart-info bi bi-cart"></i></a>
                </div>
                <div class="pro">
                    <img src="{{asset('main')}}/image-content/Icons/products-new/bread & eggs/resized/milk-bread.jpg" alt="">
                    <div class="des text-start">
                        <span>Bread & Eggs</span>
                        <h5>Milk-Bread</h5>
                        
                        <h4>$10</h4>
                    </div>
                    <a href="#"><i class="cart-info bi bi-cart"></i></a>
                </div>
                <div class="pro">
                    <img src="{{asset('main')}}/image-content/Icons/products-new/bread & eggs/resized/white-egg.jpg" alt="">
                    <div class="des text-start">
                        <span>Bread & Eggs</span>
                        <h5>white-egg</h5>
                        
                        <h4>$5</h4>
                    </div>
                    <a href="#"><i class="cart-info bi bi-cart"></i></a>
                </div>
                <div class="pro">
                    <img src="{{asset('main')}}/image-content/Icons/products-new/fruits/resized/apple.jpg" alt="">
                    <div class="des text-start">
                        <span>Fruits</span>
                        <h5>Apple</h5>
                        
                        <h4>$4</h4>
                    </div>
                    <a href="#"><i class="cart-info bi bi-cart"></i></a>
                </div>
                <div class="pro">
                    <img src="{{asset('main')}}/image-content/Icons/products-new/fruits/resized/grape.jpg" alt="">
                    <div class="des text-start">
                        <span>Fruits</span>
                        <h5>Grape</h5>
                        
                        <h4>$8</h4>
                    </div>
                    <a href="#"><i class="cart-info bi bi-cart"></i></a>
                </div>
                <div class="pro">
                    <img src="{{asset('main')}}/image-content//Icons/products-new/tea & coffee/resized/earl-grey-rea.jpg" alt="">
                    <div class="des text-start">
                        <span>Tea & Coffee</span>
                        <h5>Earl Grey Tea</h5>
                        
                        <h4>$18</h4>
                    </div>
                    <a href="#"><i class="cart-info bi bi-cart"></i></a>
                </div>
                <div class="pro">
                    <img src="{{asset('main')}}/image-content//Icons/products-new/tea & coffee/resized/Quatemala.jpg" alt="">
                    <div class="des text-start">
                        <span>Tea & Coffee</span>
                        <h5>Quatemala Coffee</h5>
                        
                        <h4>$22</h4>
                    </div>
                    <a href="#"><i class="cart-info bi bi-cart"></i></a>
                </div>
                <div class="pro">
                    <img src="{{asset('main')}}/image-content/Icons/products-new/vegetables/resized/red-onion.jpg" alt="">
                    <div class="des text-start">
                        <span>Vegetables</span>
                        <h5>Red Onion</h5>
                        
                        <h4>$8</h4>
                    </div>
                    <a href="#"><i class="bi bi-cart cart-info"></i></a>
                </div>

                <div class="pro">
                    <img src="{{asset('main')}}/image-content/Icons/products-new/beans/resized/navy-beans.jpg" alt="">
                    <div class="des text-start">
                        <span>Beans</span>
                        <h5>Navy-Beans</h5>
                        
                        <h4>$20</h4>
                    </div>
                    <a href="#"><i class="cart-info bi bi-cart"></i></a>
                </div>
                <div class="pro">
                    <img src="{{asset('main')}}/image-content/Icons/products-new/beans/resized/vanilla-beans.jpg" alt="">
                    <div class="des text-start">
                        <span>Beans</span>
                        <h5>Vanilla-Beans</h5>
                        
                        <h4>$15</h4>
                    </div>
                    <a href="#"><i class="cart-info bi bi-cart"></i></a>
                </div>
                <div class="pro">
                    <img src="{{asset('main')}}/image-content/Icons/products-new/bread & eggs/resized/bread.jpg" alt="">
                    <div class="des text-start">
                        <span>Bread & Eggs</span>
                        <h5>Bread with Crust</h5>
                        
                        <h4>$5</h4>
                    </div>
                    <a href="#"><i class="cart-info bi bi-cart"></i></a>
                </div>
                <div class="pro">
                    <img src="{{asset('main')}}/image-content/Icons/products-new/fruits/resized/Cherry.jpg" alt="">
                    <div class="des text-start">
                        <span>Fruits</span>
                        <h5>Cherry</h5>
                        
                        <h4>$11</h4>
                    </div>
                    <a href="#"><i class="cart-info bi bi-cart"></i></a>
                </div>
                <div class="pro">
                    <img src="{{asset('main')}}/image-content/Icons/products-new/fruits/resized/pineapple.jpg" alt="">
                    <div class="des text-start">
                        <span>Fruits</span>
                        <h5>Pineapple</h5>
                        
                        <h4>$8</h4>
                    </div>
                    <a href="#"><i class="cart-info bi bi-cart"></i></a>
                </div>
                <div class="pro">
                    <img src="{{asset('main')}}/image-content/Icons/products-new/rice/resized/white-rice.jpg" alt="">
                    <div class="des text-start">
                        <span>Rice</span>
                        <h5>White-Rice</h5>
                        
                        <h4>$10</h4>
                    </div>
                    <a href="#"><i class="cart-info bi bi-cart"></i></a>
                </div>
                <div class="pro">
                    <img src="{{asset('main')}}/image-content/Icons/products-new/rice/resized/brown-rice.jpeg" alt="">
                    <div class="des text-start">
                        <span>Rice</span>
                        <h5>Brown-Rice</h5>
                        
                        <h4>$12</h4>
                    </div>
                    <a href="#"><i class="cart-info bi bi-cart"></i></a>
                </div>
                <div class="pro">
                    <img src="{{asset('main')}}/image-content/Icons/products-new/tea & coffee/resized/black-tea.jpg" alt="">
                    <div class="des text-start">
                        <span>Tea & Coffee</span>
                        <h5>Black Tea</h5>
                        
                        <h4>$18</h4>
                    </div>
                    <a href="#"><i class="cart-info bi bi-cart"></i></a>
                </div>
                <div class="pro">
                    <img src="{{asset('main')}}/image-content/Icons/products-new/tea & coffee/resized/Matcha.jpg" alt="">
                    <div class="des text-start">
                        <span>Tea & Coffee</span>
                        <h5>Mactha Tea Powder</h5>
                        
                        <h4>$16</h4>
                    </div>
                    <a href="#"><i class="cart-info bi bi-cart"></i></a>
                </div>
                <div class="pro">
                    <img src="{{asset('main')}}/image-content/Icons/products-new/tea & coffee/resized/Veranda.jpg" alt="">
                    <div class="des text-start">
                        <span>Tea & Coffee</span>
                        <h5>Veranda Coffee Powder</h5>
                        
                        <h4>$18</h4>
                    </div>
                    <a href="#"><i class="bi bi-cart cart-info"></i></a>
                </div>
            </div>
        </div>
    </section>
    {{-- Product Categories End --}}

    {{-- Pagination Start --}}
    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        {{-- <a href="#"><i class="bi bi-arrow-right"></i></a> --}}
    </section>
    {{-- Pagination End --}}

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
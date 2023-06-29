<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AgroBiz.com</title>

    <link rel="stylesheet" href="{{asset('main')}}/css/cart.css">
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

    {{-- Cart Start --}}
    <section id="cart" class="section-p1">
        @if(session('success'))
        <div style="margin-top: 20px;" class="alert alert-danger">
            {{ session('success') }}
        </div>
        @endif
        <table width="100%">
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Images</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $cart)
                <tr>
                    <!-- @auth
                    <form action="{{ route('cart-remove', $cart['id']) }}" method="POST">
                        @csrf
                    </form>
                    @endauth -->
                    <td><button type="submit" class="btn" data-bs-toggle="modal" data-bs-target="#actionModal"><i class="bi bi-x-circle"></i></button></td>
                    <!-- <td><img src="{{asset('main')}}/image-content/Icons/products-new/beans/resized/almond.jpg" alt=""></td> -->
                    <td><img src="/storage/{{ $cart['product_image'] }}" alt="image-product"></td>
                    <td>{{$cart['product_name']}}</td>
                    <td>Rp. {{$cart['price']}}</td>
                    <!-- <td><input type="number" value="{{$cart['quantity']}}"></td> -->
                    <td>{{$cart['quantity']}}</td>
                    <td>Rp. {{$cart['subtotal']}}</td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="actionModal" tabindex="-1" aria-labelledby="actionModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm">
                        <div class="modal-content">
                            <div class="modal-body">
                                <!-- Apakah Anda Ingin Menghapus Product Berikut dari Keranjang Anda? -->
                                Are You Want to Remove Product From Cart?
                            </div>
                            <div class="modal-footer">
                                @auth
                                <form action="{{ route('cart-remove', $cart['id']) }}" method="POST">
                                    @csrf
                                    <!-- <td><i class="bi bi-x-circle"></i><a href="#"></a></td> -->
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                    <button type="submit" class="btn btn-success">Yes</button>
                                </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </section>
    {{-- Cart End --}}
    {{-- Cart Add Start --}}
    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <!-- <h3>Apply Coupon</h3>
            <div>
                <input type="text" placeholder="Enter your Coupon">
                <button class="normal">Apply</button>
            </div> -->
        </div>

        <div id="subtotal">
            <h3>Cart Totals</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td>Rp. {{$totalCart}}</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>Rp. {{$totalCart}}</strong></td>
                </tr>
            </table>
            <button class="normal" data-bs-toggle="modal" data-bs-target="#actionCheckoutModal">Proceed to checkout</button>
        </div>
    </section>
    {{-- Cart Add End --}}

    <!-- Checkout Modal -->
    <div class="modal fade" id="actionCheckoutModal" tabindex="-1" aria-labelledby="actionCheckoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Apakah Anda Ingin Menghapus Product Berikut dari Keranjang Anda? -->
                    Are You Sure Want To Checkout?
                </div>
                <div class="modal-footer">
                    @auth
                    <form action="{{ route('cart-checkout') }}" method="POST">
                        @csrf
                        <!-- <td><i class="bi bi-x-circle"></i><a href="#"></a></td> -->
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-success">Yes</button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Checkout Success -->
    <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content bg-success">
                <div class="modal-body text-center text-white">
                    <i class="bi bi-check-circle-fill"></i>
                    <span class="fw-bold">Success Checkout</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Checkout Success -->

    <!-- Modal Checkout Failed -->
    <div class="modal fade" id="failedCheckoutModal" tabindex="-1" aria-labelledby="failedCheckoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content bg-danger">
                <div class="modal-body text-center text-white">
                    <i class="bi bi-check-circle-fill"></i>
                    <span class="fw-bold">{{ session('failedCheckout') }}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Checkout Failed -->

    @include('component.footer')

    {{-- Script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
@if(session('checkout'))
<script>
    $(document).ready(function() {
        $('#checkoutModal').modal('show');
    });
</script>
@elseif(session('failedCheckout'))
<script>
    $(document).ready(function() {
        $('#failedCheckoutModal').modal('show');
    });
</script>
@endif
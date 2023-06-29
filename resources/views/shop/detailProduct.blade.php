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

    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>

<body>
    @section('categories')
    @foreach ($categories as $category)
    <li><a class="dropdown-item" href="/shop/{{$category->link}}">{{ $category->name }}</a></li>
    @endforeach
    @endsection
    @include('component.navbar')

    {{-- prodetails Start --}}
    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="/storage/{{ $products->image }}" width="80%" id="MainImg" alt="">

            {{-- <div class="small-img-group">
                <div class="small-img-col">
                    <img src="/storage/{{ $products->image }}" width="100%" class="small-img" alt="">
        </div>
        <div class="small-img-col">
            <img src="/storage/{{ $products->image }}" width="100%" class="small-img" alt="">
        </div>
        <div class="small-img-col">
            <img src="/storage/{{ $products->image }}" width="100%" class="small-img" alt="">
        </div>
        <div class="small-img-col">
            <img src="/storage/{{ $products->image }}" width="100%" class="small-img" alt="">
        </div>
        </div> --}}
        </div>

        <div class="single-pro-details">
            @if($products->category == 'beans')
            <h6>Home / Beans</h6>
            @elseif($products->category == 'bread')
            <h6>Home / Bread & Eggs</h6>
            @elseif($products->category == 'fruit')
            <h6>Home / Fruits</h6>
            @elseif($products->category == 'rice')
            <h6>Home / Rice</h6>
            @elseif($products->category == 'tea')
            <h6>Home / Tea & Coffe</h6>
            @else
            <h6>Home / Vegetables</h6>
            @endif
            <h4>{{ $products->name }}</h4>
            <h2>Rp. {{ $products->price }}</h2>
            <h2 style="margin-bottom: 30px;">Stock: {{ $products->stock }}</h2>
            @auth
            <form action="{{ route('cart-add', $products->id) }}" method="POST">
                @csrf
                <input type="number" name="valueCart" id="valueCart" value="1">
                <button type="submit" class="normal">Add to Cart</button>
            </form>
            @endauth
            @if(session('success'))
            <div style="margin-top: 20px;" class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <h4 class="product-details">Product Details</h4>
            <span>{{ $products->description }}</span>
        </div>
    </section>
    {{-- prodetails End --}}

    @include('component.footer')

    {{-- Script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
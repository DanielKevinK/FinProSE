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
    @section('categories')
    @foreach ($categories as $category)
    <li><a class="dropdown-item" href="/shop/{{$category->link}}">{{ $category->name }}</a></li>
    @endforeach
    @endsection
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
                @foreach ($products as $product)
                <div class="pro" onclick="openNewWindow('{{ $product->category }}', '{{ $product->slug }}')">
                    <img src="/storage/{{ $product->image }}" alt="image-product">
                    <!-- @if($product->category == 'beans')
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

    {{-- Pagination Start --}}
    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <!-- <a href="#">2</a> -->
        {{-- <a href="#"><i class="bi bi-arrow-right"></i></a> --}}
    </section>
    {{-- Pagination End --}}

    @include('component.footer')

    {{-- Script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
<script>
    function openNewWindow(category, slug) {
        var url = "{{ route('shop-category', ['category' => ':category', 'slug' => ':slug']) }}"
            .replace(':category', category)
            .replace(':slug', slug);
        window.location.href = url;
    }
</script>
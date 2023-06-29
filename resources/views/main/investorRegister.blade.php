<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AgroBiz.com</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('main')}}/css/login.css">
    <style>
        .wrapper {
            min-height: 440px;
            max-height: 750px;
            height: 100%;
        }
    </style>
</head>

<body>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
        <button class="btn btn-success me-md-4 btnLogin-popup" type="button">Register</button>
    </div>

    <section id="login" class="d-flex justify-content-center" style="min-height: 80vh">

        <div class="wrapper d-flex justify-content-center align-items-center active-popup">
            <span class="icon-close">
                <i class="bi bi-x-circle"></i>
            </span>
            <div class="form-box login" style="margin-top: 25px; margin-bottom: 25px;">
                <h2>Registration</h2>
                <form method="post" action="{{ route('register-investor') }}">
                    @csrf
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        <input type="form-control" required name="name" id="name">
                        <label>Name</label>
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        <input type="form-control" required name="username" id="username">
                        <label>Username</label>
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-envelope-fill"></i>
                        </span>
                        <input type="form-control" type="email" required name="email" id="email">
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-key-fill"></i>
                        </span>
                        <input type="password" required name="password" id="password">
                        <label>Password</label>
                    </div>
                    <hr>
                    <div class="mb-4">
                        <label class="form-label" for="product_id">Product</label>
                        <select class="form-select" name="product_id" id="product_id" aria-label="Category">
                            <option selected>Open this select menu</option>
                            @foreach ($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-box">
                        <input type="number" required name="invest_quantity" id="invest_quantity">
                        <label>Investment Quantity</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox" required>
                            agree to the terms & conditions</label>
                    </div>
                    <button type="submit" class="button">Register</button>
                </form>
            </div>
        </div>
    </section>

    <script src="{{asset('main')}}/javascript/script.js"></script>
</body>

</html>
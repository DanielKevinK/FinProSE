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
</head>

<body>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
        <button class="btn btn-success me-md-4 btnLogin-popup" type="button">Sign In</button>
    </div>

    <section id="login" class="d-flex justify-content-center" style="min-height: 80vh">

        <div class="wrapper d-flex justify-content-center align-items-center">
            <span class="icon-close">
                <i class="bi bi-x-circle"></i>
            </span>
            <div class="form-box login">
                <h2>Login</h2>
                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-envelope-fill"></i>
                        </span>
                        <input type="email" name="email" id="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-key-fill"></i>
                        </span>
                        <input type="password" name="password" id="password" required>
                        <label>Password</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox">
                            Remember Me</label>
                        <a href="#">Forgot Password</a>
                    </div>
                    <button type="submit" class="button">Login</button>
                    <div class="login-register">
                        <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                    </div>
                </form>
            </div>


            <div class="form-box register">
                <h2>Registration</h2>
                <form method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        <input type="form-control" name="name" id="name">
                        <label>Name</label>
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        <input type="form-control" name="username" id="username">
                        <label>Username</label>
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-envelope-fill"></i>
                        </span>
                        <input type="form-control" type="email" name="email" id="email">
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon">
                            <i class="bi bi-key-fill"></i>
                        </span>
                        <input type="password" required name="password" id="password">
                        <label>Password</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox" required>
                            agree to the terms & conditions</label>
                    </div>
                    <button type="submit" class="button">Register</button>
                    <div class="login-register">
                        <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="{{asset('main')}}/javascript/script.js"></script>
</body>

</html>
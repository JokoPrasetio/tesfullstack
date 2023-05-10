<!doctype html>
<html lang="en">

<head>
    <title>Login Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login</h2>
                </div>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success col-lg-8 mt-5 mx-auto text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('loginError'))
                <div class="alert alert-danger col-lg-8 mt-5 mx-auto text-center" role="alert">
                    {{ session('loginError') }}
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Masuk</h3>
                        <form action="/" method="post" class="login-form">
                            @csrf
                            <div class="form-group">
                                <input type="username" class="form-control rounded-left" name="username"
                                    placeholder="masukan username" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" class="form-control rounded-left" name="password"
                                    placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                    class="form-control btn btn-primary rounded submit px-3">Login</button>
                            </div>
                        </form>
                        <div class="text-center">
                            <span class="text-dark">Belum memiliki akun?</span>
                            <a href="/registrasi" data-bs-toggle="modal" data-bs-target="#registerModal"
                                class="text-primary">Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>

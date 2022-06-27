<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>iLyou | Đăng nhập</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL('imagesWebsite/icon-logo.png') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
</head>

<section class="vh-100" style="background-color: #eee;">

    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-7 col-xl-7 d-flex align-items-center order-1 order-lg-1">
                                <div class="text-center">
                                    <img src="{{ URL('imagesWebsite/login.png') }}" class="img-fluid"
                                        alt="Sample image">
                                </div>

                            </div>

                            <div class="col-md-10 col-lg-5 col-xl-5 order-2 order-lg-2">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng nhập</p>

                                <form class="mx-1 mx-md-4" method="POST" action="{{ route('checkLogin') }}">
                                    @csrf
                                    @if (Session::get('thatbai'))
                                        <p class="text-danger">{{ Session::get('thatbai') }}</p>
                                    @endif
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <input class="form-control" id="auth" type="text"
                                                name="email" value="{{ old('email') }}" required
                                                autofocus />
                                            <label class="form-label" for="auth">Email hoặc Số điện thoại</label>
                                        </div>
                                    </div>
                                    

                                    <div class="d-flex flex-row align-items-center mb-2">
                                        <div class="form-outline flex-fill mb-0">
                                            <input class="form-control" id="password" type="password" name="password"
                                                required autocomplete="current-password" />
                                            <label class="form-label" for="password">Mật khẩu</label>
                                        </div>
                                    </div>
                                    <p class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </p>

                                    <div class="col d-flex">
                                        <div class="form-check d-flex justify-content-center mb-4">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="remember_me" />
                                            <label class="form-check-label" for="remember_me">
                                                Ghi nhớ tài khoản
                                            </label>
                                        </div>
                                    </div>

                                    <div class="text-center pt-1 mb-3 pb-1">
                                        <button class="btn btn-primary btn-lg  btn-block fa-lg gradient-custom-2 mb-3"
                                            type="submit">Đăng nhập</button>
                                        <a class="text-muted" href="">Quên mật khẩu?</a>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="mb-0 me-2">Bạn chưa có tài khoản?</p>
                                        <a href="{{ route('register') }}" type="button"
                                            class="btn btn-outline-success">Đăng ký</a>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>

</html>

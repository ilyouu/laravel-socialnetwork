<!-- Header -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>iLyou</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL('imagesWebsite/ic_logo.png') }}">

    <!-- Link -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />

    <!-- Link -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <script src="{{ URL('js/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <!-- Custom CSS -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0"
        nonce="gCULMMol"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <!-- Custom CSS -->

    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>

    <style>
        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 99;
            border: none;
            outline: none;
            cursor: pointer;
            border-radius: 100%;
            background-color: #FBFBFB;
            padding: 5px
        }

        #myBtn:hover {
            background-color: #16B5EA;
        }
        
    </style>


</head>

<body style="padding-left: 10px; padding-right: 10px; margin: 0;">
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-1"
        style="padding-left: 10px; padding-right: 10px">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            {{-- <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button> --}}

            {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}
            <div>
                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                    <img src="{{ URL('imagesWebsite/logo.png') }}" height="30" alt="iLyou Logo" loading="lazy" />
                </a>
            </div>

            {{-- <div class="input-group">
                    <div class="form-outline">
                        <input id="search-focus" type="search" id="form1" class="form-control"
                            style="width: 170px" />
                        <label class="form-label" for="form1">Tìm kiếm trên iLyou</label>
                    </div>
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div> --}}

            {{-- </div> --}}

            <!-- Center elements -->
            <ul class="navbar-nav flex-row d-none d-md-flex">
                <li class="nav-item me-3 me-lg-1 active">
                    <a class="nav-link text-primary" href="#">
                        <span><i class="fas fa-home fa-lg"></i></span>
                        &emsp;
                    </a>
                </li>


                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="#">
                        <span><i class="fab fa-facebook-messenger fa-lg"></i></span>
                        <span class="badge rounded-pill badge-notification bg-danger">1</span>
                        &emsp;
                    </a>
                </li>

                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="#">
                        <span><i class="fas fa-users fa-lg"></i></span>
                        <span class="badge rounded-pill badge-notification bg-danger">2</span>
                    </a>
                </li>
            </ul>
            <!-- Center elements -->
            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <!-- Icon -->
                {{-- <a class="text-reset me-3 btn btn-outline-primary btn-floating" href="#">
                    <i class="fas fa-plus text-primary"></i>
                </a> --}}

                <!-- Notifications -->
                <div class="dropdown">
                    <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                        role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell text-primary "></i>
                        <span class="badge rounded-pill badge-notification bg-danger">1</span>&nbsp; 
                    </a>
                </div>
                <!-- Avatar -->
                <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                        id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <img src="{{ URL('imagesUser/myUser.jpg') }}" class="rounded-circle" height="30"
                            alt="Black and White Portrait of a Man" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item" href="#">Trang cá nhân</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Cài đặt</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

    <div class="container-fluid">
        <br><br><br>
        <div class="row">
            <div class="col-md-3">trái</div>
            <div class="col-md-6" style="padding-left: 40px; padding-right: 40px">
                @yield('content')
            </div>
            <div class="col-md-3">phải</div>
        </div>
        <br>
    </div>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <script src="{{ URL('js/bootstrap.bundle.min.js') }}"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#ckediter' ) )
            .catch( error => {
                console.error( error );
            } );
        </script>
</body>

</html>

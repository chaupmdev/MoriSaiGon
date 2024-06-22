<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mori Sai Gon</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body class="d-flex flex-column justify-content-between">
    <nav class="navbar navbar-light bg-light header-custom">
        <div class="container d-flex justify-content-between align-items-center">
          <a class="navbar-brand" href="#">
            <img
              src="{{ asset('image/system/logo.png') }}"
              height="40"
              alt="Mori Sài Gòn Logo"
              loading="lazy"
            />
          </a>
          <a href="{{ URL::to('/login') }}"><div class="rounded-pill d-flex align-items-center nav-group-login p-1 pl-3 pr-3" style="gap: 10px">
            <i class="fa fa-regular fa-user"></i>
            <p>Đăng nhập</p>
          </div></a>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-body-tertiary text-center text-lg-start footer-custom">
        <div class="text-center p-3 text-white" style="background-color: #232F3E; font-size: 13px;">
          © {{ date('Y') }} Copyright:
          <a class="text-white" href="https://www.facebook.com/phamchau7410" target="_blank">Phạm Minh Châu</a>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    @yield('script')
</body>
</html>

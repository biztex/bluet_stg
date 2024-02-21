<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title')</title>
</head>
<body class="bg-light">
<div class="container p-3">
    <div>
        <img src="{{asset('img/logo.png')}}" alt="BlueTourismHokkaido" width="200">
    </div>
    <hr>

    @yield('content')
    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
            <div class="col-12 offset-sm-4 col-sm-8">Copyright © BlueTourismHokkaido All rights reserved</div>
        </div>
    </footer>

</div>
<script src=" {{ mix('js/app.js') }} "></script>
<script src=" {{ asset('js/menu.js') }} "></script>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
  
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home</a>
        </li>
        @auth
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/admin/posts') }}">Control Panel</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">Register</a>
        </li>
        @endauth
      </ul>
      <!-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
      </form>
    </div>
  </nav>
  <div class="container">
    <div class="row d-flex">
      @foreach($data as $post)
      <div class="col-12 col-md-4 my-4">
        <div class="card" style="height: 33rem">
          <img class="card-img-top" style="width: 100%; height: 18rem; object-fit: cover;" src="{{ $post['image'] }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $post['title']}}</h5>
            <p class="card-text">{{ substr($post['content'], 0, 100) }}...</p>
            <a href="#" class="btn btn-primary">Read more</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="row mt-3">
      <div class="col-12 d-flex justify-content-center">
        {{ $data->onEachSide(0)->links() }}
      </div>
    </div>
  </div>
</body>

</html>
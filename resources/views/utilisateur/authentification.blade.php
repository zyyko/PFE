<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('login-register/styles/login.css') }}">
  <style>
    nav > h1 {
      background-color:black;
      height: 70px;
      color: WHITE;
      padding
    }

  </style>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body> 
{{--   <nav>
    <h1>Bookify</h1>
  </nav> --}}
  <div class="container">
  {{ session('success') }} 
    <h2>login</h2>
    <form action=" {{route('login')}} " method="POST">
      @csrf
      <input type="text" class="email" placeholder="email" name="email">
      @error('email')
          <div class=" text-danger" style="font-size:14px; margin-left:45px;color:red;">{{$message}}</div>
      @enderror
      <br/>
      <input type="password" class="pwd" placeholder="password" name="password">
      @error('password')
          <div class=" text-danger" style="font-size:14px; margin-left:45px;color:red;">{{$message}}</div>
      @enderror
      <a href="#" class="link">
        forgot your password ?
      </a>
      <br/>
      <a href="{{ route('register') }}">
        <button type="button" class="register" style="background-color:#673ab7;">
          <span>register</span>
        </button>
      </a>
      <a href="">
        <button type="submit" class="signin" style="background-color:#ff5722;">
          <span>sign in</span>
        </button>
      </a>
    </form>
  </div>
</body>
</html>
<script>
  @if(Session::has('warning'))
    toastr.options = 
    {
      "progressBar" : true,
      "closeButton" : false,
      "timeOut" : 10000
    }
    toastr.warning("{{ session('warning')}}")
  @endif
</script>
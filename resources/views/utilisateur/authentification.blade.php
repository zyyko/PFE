<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('/ressources/login.css') }}">
</head>
<body> 
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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('login-register/styles/signup.css') }}">
</head>
<body> 
  <div class="container">
    <h2>Sign up </h2>
    <form method="post" action=" {{ route('store') }} ">
      @csrf
      <input type="text" class="email" placeholder="Nom complet" name="name" value="{{ old('name')}}">
      @error('name')
            <div class=" text-danger" style="font-size:14px; margin-left:45px;color:red;">{{$message}}</div>
      @enderror
      <input type="text" class="email" placeholder="email" name="email" value="{{ old('email')}}">
      @error('email')
            <div class=" text-danger" style="font-size:14px; margin-left:45px;color:red;">{{$message}}</div>
      @enderror
      <input type="password" class="pwd" placeholder="password" name="password" value="{{ old('password')}}">
      @error('password')
            <div class=" text-danger" style="font-size:14px; margin-left:45px;color:red;">{{$message}}</div>
      @enderror
      <input type="password" class="pwd" placeholder="password_confirm" name="password_confirmation">
      @error('password_confirmation')
            <div class=" text-danger" style="font-size:14px; margin-left:45px;color:red;">{{$message}}</div>
      @enderror

      <a href="{{ route('login.show') }}" class="link">Already have an account ?</a>
      <br/>
      <a href="{{ route('register') }}">
        <button type="submit" class="register" style="background-color:#673ab7;">
          <span>register</span>
        </button>
      </a>
    </form>
  </div>
</body>
</html>

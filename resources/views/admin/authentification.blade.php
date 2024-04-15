<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .login-form {
      width: 360px;
      margin: 50px auto;
      padding: 30px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-6 col-sm-8 col-xs-12 mx-auto">
      <form class="login-form" method="POST" action="{{ route('login.admin') }}">
        @csrf
        <h2 class="text-center mb-4">Login</h2>
        @error('login')
          {{$message}}
        @enderror
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" value="{{ old('email') }}" class="form-control" id="email" name="email" placeholder="Enter email" required>
        </div>
        <div class="form-group">
          <label >Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </form>
    </div>
  </div>
</div>

</body>
</html>

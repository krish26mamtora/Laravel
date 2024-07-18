@include('Display.Navbar')

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Verify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style_login.css">
</head>

<body>

    <div class="container" id="maindiv">
        <div class="container" id="left">
            <img src="" alt="">
            <h3>Be Verified</h3>
            <p>Lorem ipsum dolor sit amet consectetur.</p>
        </div>
        <div class="container" id="right">
          
            <form class="my-4" action="{{$action}}" method="POST">
                @csrf
                <div class="mb-2" id="wlcmmsg">
                    <h3>Hello,Again</h3>
                    <p>We are happy to have you back</p>

                </div>
                <div class="mb-3">
                    <label for="InputEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}" id="InputEmail" aria-describedby="emailHelp" >
                    @error('email')
                    <span class="text-danger">{{$message}}</span>

                    @enderror
                </div>
                <div class="mb-3">
                    <label for="InputPassword" class="form-label">Password</label>
                    <input type="password" name="password" value="{{old('password')}}" class="form-control" id="InputPassword" >
                    @error('password')
                    <span class="text-danger">{{$message}}</span>

                    @enderror
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    <a href="ForgotPassword.php" id="forgotpass" name="forgotpass" class="alert-link" style="color: slateblue;">Forgot password?</a>
               </div>      
                <div class="d-flex justify-content-center">
                    <button type="submit" id="loginbtn" name="login" style="background-color:slateblue" class="btn">Login</button>
                </div>
                <br>
                <div class="mb-4">
                    <label for="signup" class="form-label">Don't have account?</label>
                    <a href="{{url('/RegisterForm')}}" id="signup" name="signup" class="alert-link" style="color: slateblue;">Sign up</a>
                </div>
            </form>
        </div>

    </div>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>


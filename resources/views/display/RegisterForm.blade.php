@include('display.Navbar')

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style_register.css">
    
</head>

<body>
    <div class="container" id="maindiv">
        <div class="container" id="left">
            <form class="my-1" id="signupform" action="/register/store" method="POST">
                @csrf
                <div class="mb-3">
                    <h3 style="text-align:center;">Create Account</h3>
                </div>
                <div class="mb-3">
                    <label for="InputEmail" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="InputEmail" aria-describedby="emailHelp"  value="{{old('email')}}">
                    @if($errors->has('email'))
                    <span class="text-danger">{{$errors->first('email')}}</span>
                @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" value="{{old('password')}}">
                    @if($errors->has('password'))
                    <span class="text-danger">{{$errors->first('password')}}</span>
                @endif
                </div>
                <div class="mb-3">
                    <label for="confirmpassword" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" value="{{old('confirm_password')}}" id="confirmpassword" >
                    <div id="emailHelp" class="form-text">Make sure you enter the same password</div>
                    @if($errors->has('confirm_password'))
                    <span class="text-danger">{{$errors->first('confirm_password')}}</span>
                @endif
                </div>
             
                <div class="d-flex justify-content-center">
                    <button type="submit" name="register" class="btn" id="regbtn">Register</button>
                </div>
            </form>
        </div>
        <div class="container" id="right">
            <h1>Welcome!</h1>
            <p>Sign up to join our community.</p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    
 

</html>


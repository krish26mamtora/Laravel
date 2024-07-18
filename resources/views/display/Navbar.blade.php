<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chatting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style_navbar.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg" style="background-color:slateblue;">
        <div class="container-fluid" id="nav">
            <a class="navbar-brand" style=" color: white;">ChattingApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" id="navul">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="navul">

                    <li class="nav-item">
                        <a id="navitem" class="nav-link active" aria-current="page"
                            href="{{ url('/') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a id="navitem"class="nav-link" href="{{ url('/LoginForm') }}">Login</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>


{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
      *{
     
        font-family:Arial, Helvetica, sans-serif;
        margin: 0px;
        padding: 0px;
      }
      .navbar{
        display: flex;
      }
      .logo img{
        width: 20%;
        border:2px solid white;
        border-radius:50px;
        
      }
      .nav-list{
        width: 100%;
        background-color:#6a5acd;
        display: flex;
        justify-content:left;
        align-items: center;
      }
      .nav-list li{
        list-style: none;
        padding: 20px;
      }
      .nav-list li a{
        text-decoration: none;
        color: white;
      }
      .nav-list li a:hover{
        /* text-decoration: none; */
        color: rgb(229, 235, 252);
      }
      #navhead{
          font-size: 23px;
      }

    </style>
</head>

<body>
    <nav class="navbar">
        <ul class="nav-list">
          <p id="navhead"style="color: white;">Chatting</p>
          <div class="logo"><img src="" alt="logo"></div>
            <li> <a id="navitem" href="{{ url('/') }}">Home</a>
            </li>
            <li><a id="navitem" href="{{ url('/LoginForm') }}">Login</a>
            </li>
        </ul>
    </nav>
</body>

</html> --}}

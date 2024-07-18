{{-- @include('display.Navbar') --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ChattingApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
         #main{
            height: 100vh;
            display: flex;
            flex-direction: row; 

        } 
     .container-fluid{
        background-color: #f0f0f0;
        
     }
     #loadpages{
        position: fixed; 
            height: 100%;
            top: 0;
            left:15%;
        }
        @media only screen and (max-width: 375) {
            #loadpages {
            left:50%;
            }
        }
    </style>
</head>

<body>
    <div id="main">
        <div id="sidebar" class="sidebar">
            @include('display.Sidebar')
        </div>
        <div id="loadpages" class="container-fluid">
           @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

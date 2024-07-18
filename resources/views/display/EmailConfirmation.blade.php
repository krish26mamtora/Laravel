@include('display.Navbar');

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Verify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
  <body>
<div class="container" style="margin-top: 100px;  width:550px;" >
  <form class="my-5" id="loginform" action="EmailVarification.php" method="POST">
  <div class="mb-3">
    <h3 style="text-align:center;" >Varification</h3>
    <br>
  </div>
  <div class="mb-3">
   <h6>Please confirm varification of your Email , varification mail has been sent to: </h6>
  {{$to}}
  </div>
   

</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

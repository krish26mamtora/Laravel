<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Include Pusher and Laravel Echo -->
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.0/echo.iife.js"></script>
</head>
<body>
    <h2>Welcome to Chat</h2>
    <button onclick="fireEvent()">Fire Event</button>

    @vite('resources/js/app.js')
    <script>
      
        function fireEvent() {
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
                url: '{{ url("/broadcast") }}',
                type: 'POST',
                success: function(data) {
                    console.log(data);
                }
            });
        }

       setTimeout(() => {
            Echo.channel('testing').listen('testWebsocket', (data) => {
                console.log(data);
            });
        }, 100);
    </script>
</body>
</html>

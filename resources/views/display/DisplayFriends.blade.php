@extends('display.Home')

@section('content')


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <style>
        
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    padding: 20px;

}

    table {
    width: 100%;
    max-width: 1150px;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #ffffff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
table th, table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #dddddd;
}
table th {
    background-color: #6a5acd;
    color: white;
}

table tr:hover {
    background-color: #f1f1f1;
}
button {
    padding: 5px 10px;
    background-color: #6a5acd;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

    </style>
</head>

<body>
    <h1>Your Friends</h1>
    
    <table >
        <thead>
            <tr>
                <th>UID</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @if (!empty($notification))
                    @foreach ($notification as $item)
                        @if ($item)
                            <td>{{ $item->UID }}</td>

                            <td>{{ $item->email }}</td>

                            <td>
                                <form action="{{ url('/removefriend/' . $current . '/' . $item->UID) }}">

                                    <button>Remove Friend</button>
                                </form>
                            </td>

            </tr>
            @endif
            @endforeach
        @else
            <p>No notifications found.</p>
            @endif
        </tbody>
    </table>

@endsection

</body>

</html>

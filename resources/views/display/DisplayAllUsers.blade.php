
@extends('display.Home')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
table tr:nth-child(even) {
    background-color: #f9f9f9;
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
button:disabled {
    background-color: #a6a1e0;
}
    
   </style>
</head>
<body>
    <h3>Add to your friends</h3>
    <div id="maindiv">
        <table >
            <thead>
                <tr>
                    <th>UID</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)     
                <tr>
                    <td>{{$user->UID}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <form action="{{url('/sendrequest/'.$current.'/'.$user->UID)}}">
                        
                        <button type="submit">Add</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
 
</body>
</html>
@endsection
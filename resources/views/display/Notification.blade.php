
@extends('display.Home')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notification Emails</title>
    <style>
        body{
            padding: 5%;
        }
        
       </style>
</head>

<body>
    <h3>Notifications</h3>
    {{-- <h3>Current User ID: {{ $current }}</h3> --}}
    <table>
       
           <tr>
                <th>UID</th>
                <th>Email</th>
                <th>Accept</th>
                <th>Reject</th>
            </tr>
     
            <tr>
                @if (!empty($notification))
                    @foreach ($notification as $item)
                        @if ($item)
                        <td>
                            <h4>{{ $item->UID }}</h4>
                        </td>
                            <td>
                                <h4>{{ $item->email }}</h4>
                            </td>

                            <td>
                                <form action="{{url('/accept/'.$current.'/'.$item->UID)}}">
                                <button>Accept</button>
                                </form>
                            </td>

                            <td>
                                <form action="{{url('/rejectrequest/'.$current.'/'.$item->UID)}}">
                                <button>Reject</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                    @endforeach
               
                @else
                    <p>No notifications found.</p>
                @endif
    </table>

</body>

</html>

@endsection
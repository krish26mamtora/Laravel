@extends('display.Home')
@section('content')

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Document</title>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        <style>
            body {
                background-color: #282828;
            }

            #main {
                font-family: 'Poppins', sans-serif;
                margin-top: -10px;
                margin-left: -12px;
                height: 100%;
                width: 100%;
                background-color: antiquewhite;
                display: flex;
                align-items: center;
                border-radius: 20px;

            }

            #left {
                height: 650px;
                width: 20%;
                background-color: #dbe2ef;
                border-radius: 20px 0 0 20px;
                padding: 15px;
            }

            .takemsg {
                height: 40px;
                width: 600px;
                background-color: rgb(82, 237, 240);
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .message-container {
                height: 20px;
                width: 180px;
                background-color: chocolate;
            }

            .friends-container {
                display: flex;
                align-items: center;
                flex-direction: row;
            }

            .friends-container form {
                display: flex;
                align-items: center;
            }

            #right {
                height: 650px;
                width: 100%;
                background-color: #cfcbee;
                border-radius: 0px 20px 20px 0px;
            }

            #btndisfrd {
                height: 50px;
                width: 260px;
                border-radius: 5px;
                border: 2px solid #cfcbee;
                margin-bottom: 5px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                transition: box-shadow 0.3s ease, transform 0.3s ease;
                font-size: 17px;
                font-weight: bold;
                background-color: white;
                color: #333;
                text-align: center;
            }

            #btndisfrd:hover {
                background-color: #f7f7ff;
                transform: scale(1.00001);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            }

            #searchfrnd {
                border-radius: 7px;
                height: 35px;
                border: 1px solid white;
            }
            #main {
            font-family: 'Poppins', sans-serif;
            height: 650px;
            width: 100%;
            /* background-color: #6a5acd; */
            position: relative;

        }

        #top {
            display: flex;
            align-items: center;
            /* justify-content: center; */
            padding: 10px;

            height: 70px;
            width: 100%;
            background-color: white;

            border-radius: 0px 20px 0px 0px;
        }

        #bottom {
            padding: 10px;
            background: linear-gradient(rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.6)), url('background.jpg');

            position: relative;
            height: 560px;
            width: 100%;
            background-color: white;
            border-radius: 0px 0px 20px 0px;

            overflow: scroll;

        }

        #receivedmessages {
            color: white;
            word-wrap: break-word;
            background-color: #fc5894;

            border-radius: 20px 20px 20px 0;
            display: inline-block;
            position: absolute;
            max-width: 50%;
            left: 10px;
            padding: 10px;
        }

        #sentmessaged {
            background-color: #007bff;
            color: white;
            max-width: 50%;
            margin-left: 60%;
            text-align: end;
            border-radius: 20px 20px 0 20px;
            word-wrap: break-word;

            display: inline-block;
            position: absolute;
            right: 10px;
            padding: 10px;

        }

        #addbottom {
            margin-bottom: 50px;

        }

        #takemsg {
            background-color: white;
            bottom: 25px;
            width: 63.5%;
            display: flex;
            justify-content: center;
            position: fixed;
            margin-left: -13px;
            border: 1px solid #dbe2ef;
            border-radius: 0 0 20px 0;

        }
        #msg {
            width: 600px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;

        }
        #btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        #btn:hover {
            background-color: #0056b3;
        }

        #displayfriendprofile {
            height: 60px;
            width: 60px;
            border: 1px solid white;
            border-radius: 40px;
        }
        #focus {
            position: fixed;
            bottom: 80px;
            height: 1px;
            width: 100%;
            background-color: red;

        }
        </style>
    </head>

    <body>
        <div id="main">
            <div id="left">
                <h2>Your Friends</h2>
                <hr>
                <table>
                    <tr>
                    @if (!empty($current))
                        @if (!empty($notification))

                            @foreach ($notification as $item)
                                @if ($item)
                                    <div id="displayfriends" class="friends-container">
                                        <button type="button" id="startchat" name="startchat">
                                            <a href="{{ url('/chat/' . $current . '/' . $item->UID) }}">{{ $item->UID }}</a>
                                        </button>                                   
                                    </div>

                                @endif
                            @endforeach
                        @else
                            <p>No notifications found.</p>
                        @endif
                        @endif
                    </tr>
                </table>
            </div>
            <div id="right">
                
                @if(!empty($with))
                <div id="top">

                    <img id="displayfriendprofile" src="" alt="profile image">
                    <h2 id="viewprofilefromname"></h2>
        
                </div>
        
                <div id="bottom">
                    <div id="profile">
        
                    </div>
                    <div id="allmsg">
                        <table>
        
                            <tbody>
                                <div id="addbottom">
                                    @if (!empty($with))
                                        <div>
                                            <h3>{{ $with }}</h3>
                                        </div>
                                    @else
                                        <p>No notifications found.</p>
                                    @endif
        
                                </div>
        
                            </tbody>
                        </table>
        
                    </div>
        
                    <div id="takemsg">
                        <form id="messageForm">
        
                            <input type="text" id="msg" name="msg" autocomplete="off"
                                placeholder="Enter Your message..." required>
                            <input type="button" id="btn" value="Send">
                        </form>
                    </div>
                </div>                
                @endif
            </div>
        </div>
    </body>

    </html>

@endsection

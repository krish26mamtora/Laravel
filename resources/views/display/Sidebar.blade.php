<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    <style>
        .sidebar {
            position: fixed; 
            height: 100%;
            width: 15%;
            top: 0;
            left: 0;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: #007bff;
        }
     

    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-auto sidebar d-flex flex-column flex-shrink-0 p-3 text-bg-dark" >
                <a href="#"
                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    
                    <span class="fs-5">ChattingApp</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="{{ url('/Home/' . $current) }}" class="nav-link text-white">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/friends/' . $current) }}" class="nav-link text-white">
                            Add Friends
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/userfriends/' . $current) }}" class="nav-link text-white">
                            Your Friends
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/chat/' . $current.'/0')}}" class="nav-link text-white">
                            Chat
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/Notification/' . $current) }}" class="nav-link text-white">
                            Notifications
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="" alt="" width="32" height="32" class="rounded-circle me-2">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="ProfileDetails.php">Profile</a></li>
                        <li><a class="dropdown-item" href="logout.php">log out</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form id="delete-account-form" action="Sidebar.php" method="post">
                                <input type="hidden" name="Delete_Account" value="true">
                                <button type="submit" class="dropdown-item"
                                    style="border: none; background: none; cursor: pointer; ">Delete Account</button>
                            </form>

                        </li>

                    </ul>
                </div>
            </div>


        </div>
    </div>
</body>

</html>

<?php

namespace App\Http\Controllers;

use App\Events\testWebsocket;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\UserConnections;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ChatController\sendmail;
use PhpParser\Node\Stmt\Foreach_;
use App\Events\chat;
use function PHPSTORM_META\type;

class ChatController extends Controller
{
   

    public function index()
    {
        return view('display.Main');
    }
    public function login()
    {
        $action = "/login/check";
        return view('display.LoginForm')->with(['action' => $action]);
    }
    public function register()
    {
        return view('display.RegisterForm');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $user = new UserDetails;
        $user->email = $request->email;
        $user->password = $request->password;
        $random = rand(1000, 9999);
        $user->identifier = $random;
        $user->save();
        $conn = new UserConnections();
        $conn->save();
        $link = 'http://127.0.0.1:8000/login/' . $random;
        session(['random' => $random]);

        Mail::to($user->email)->send(new TestMail());
        $data = [
            'to' => $user->email,
            'link' => $link
        ];
        session()->forget('link');
        session()->flush();

        return view('display.EmailConfirmation')->with($data);
    }

    public function checkforlogin($token)
    {

        $action = "/login/" . $token;
        return view('display.LoginForm')->with(['action' => $action]);
    }

    public function firstloginwithtoken($token, Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (!is_null($token)) {

            $user = UserDetails::where('identifier', $token)->first();

            if ($user) {
                if (($user->varified == 0)) {
                    if (($request->email == $user->email)) {
                        if ($request->password == $user->password) {
                            $currUID = UserDetails::where('email', $request->email)->first();

                            $user->varified = 1;
                            $user->save();

                            return redirect('/Home/' . $currUID->UID);
                        } else {
                            echo "please enter valid password!!";
                        }
                    } else {
                        echo "enter valid email";
                    }
                } else {
                    echo "Account is already varified";
                }
            }
        }
    }
    public function confirmlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = UserDetails::where('email', $request->email)->first();
        if ($user) {
            if (($user->password == $request->password) && ($user->varified == 1)) {
                $currUID = UserDetails::where('email', $request->email)->first();

                return redirect('/Home/' . $currUID->UID);
            } else {
                return "please enter valid password";
            }
        } else {
            return "no result found";
        }
    }

    public function home($current)
    {
        return view('display.Home')->with(['current' => $current]);
    }

    public function displayfriends($current)
    {
        $users  = UserDetails::whereNot('UID', $current)->get();
        return view('display.DisplayAllUsers', ['users' => $users, 'current' => $current]);
    }

    public function sendrequest($sender, $receiver)
    {
        $AddtoReceived = UserConnections::where('UID', $receiver)->first();
        $oldReceived = $AddtoReceived->received;
        if (strpos($oldReceived, $sender) == false) {
            $newReceived = $oldReceived . ' ' . $sender;
            $AddtoReceived->received = $newReceived;
        } else {
            $AddtoReceived->received = $oldReceived;
        }
        $AddtoReceived->save();

        $AddtoSent = UserConnections::where('UID', $sender)->first();
        $oldSent = $AddtoSent->sent;
        if (strpos($oldReceived, $receiver) == false) {
            $newSent = $oldSent . ' ' . $receiver;
            $AddtoSent->sent = $newSent;
        } else {
            $AddtoSent->sent = $oldSent;
        }
        $AddtoSent->save();
        return redirect('/Home/' . $sender);
    }

    public function notification($current)
    {
        $DisplayreceivedUID = UserConnections::where('UID', $current)->get()->first();
        $allreceived = $DisplayreceivedUID->received;

        $numbersArray = explode(" ", $allreceived);
        $userDetails = [];
        $count = 0;
        foreach ($numbersArray as  $num) {
            $num = trim($num);
            $DisplayreceivedD = UserDetails::where('UID', $num)->get()->first();
            $userDetails[$count] = $DisplayreceivedD;
            $count++;
        }
        return view('display.Notification', ['current' => $current, 'notification' => $userDetails]);
    }

    public function addtofriends($current, $receivedfrom)
    {
        $user = UserConnections::where('UID', $current)->get()->first();
        $oldReceived = $user->received;
        $newReceived = str_replace($receivedfrom, "", $oldReceived);
        $user->received = $newReceived;
        $oldFriends =  $user->friends;
        $newFriends =  $oldFriends . ' ' . $receivedfrom;
        $user->friends = $newFriends;
        $sender = UserConnections::where('UID', $receivedfrom)->get()->first();
        $oldSent = $sender->sent;
        $newSent = str_replace($current, "", $oldSent);
        $sender->sent = $newSent;
        $OldFriends =  $sender->friends;
        $NewFriends =  $OldFriends . ' ' . $current;
        $sender->friends = $NewFriends;
        $user->save();
        $sender->save();
    }
    public function rejectrequest($current, $receivedfrom)
    {
        $sender = UserConnections::where('UID', $receivedfrom)->get()->first();
        $oldSent = $sender->sent;
        $newSent = str_replace($current, "", $oldSent);
        $sender->sent = $newSent;
        $user = UserConnections::where('UID', $current)->get()->first();
        $oldReceived = $user->received;
        $newReceived = str_replace($receivedfrom, "", $oldReceived);
        $user->received = $newReceived;
        $user->save();
        $sender->save();
    }

    public function displaycurrentfriends($current)
    {
        $DisplayfriendsUID = UserConnections::where('UID', $current)->get()->first();
        $allfriends = $DisplayfriendsUID->friends;

        $numbersArray = explode(" ", $allfriends);
        $userDetails = [];
        $count = 0;
        foreach ($numbersArray as  $num) {
            $num = trim($num);
            $DisplayfriendsD = UserDetails::where('UID', $num)->get()->first();
            $userDetails[$count] = $DisplayfriendsD;
            $count++;
        }
        return view('display.DisplayFriends', ['current' => $current, 'notification' => $userDetails]);
    }

    public function removefriends($current, $receivedfrom)
    {
        $friend = UserConnections::where('UID', $current)->get()->first();
        $oldFriends =  $friend->friends;
        $newFriends = str_replace($receivedfrom, "", $oldFriends);
        $friend->friends = $newFriends;
        $friend->save();
        $anotherfriend = UserConnections::where('UID', $receivedfrom)->get()->first();
        $OldFriends =  $anotherfriend->friends;
        $NewFriends = str_replace($current, "", $OldFriends);
        $anotherfriend->friends = $NewFriends;
        $anotherfriend->save();
    }
    public function startchat($current, $with)
    {

        // if($with==0){
        $DisplayfriendsUID = UserConnections::where('UID', $current)->get()->first();
        $allfriends = $DisplayfriendsUID->friends;

        $numbersArray = explode(" ", $allfriends);
        $userDetails = [];
        $count = 0;
        foreach ($numbersArray as  $num) {
            $num = trim($num);
            $DisplayfriendsD = UserDetails::where('UID', $num)->get()->first();
            $userDetails[$count] = $DisplayfriendsD;
            $count++;
        }
        return view('display.Chat', ['current' => $current, 'notification' => $userDetails, 'with' => $with]);
    }


    public function message($current, $with)
    {
        return $current." ".$with;

        return view('display.Twopersonchat', ['current'=>$current,'with' => $with]);
    }

    public function test()
    {

        return view('display.socket');
    }

    public function ytchat(Request $request){
        $request->validate([
            'username'=>'require,'
        ]);
        $username=$request->username;
        
        return view('display.ytchat',['username'=> $username]);
    }
    public function broadcast()
    {
        event(new testWebsocket("this is laptop", "ok"));
        return response()->json(['msg' => 'event has been fired1']);
    }
}

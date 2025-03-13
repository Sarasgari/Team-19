<?php
namespace App\Http\Controllers;
// Developers: Mohammed Rahman, Minwoo Noh
// Student Numbers: 220083681, 230409589
// Description: Controller files that hosts the signup, login and logout processes


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function login(){
        return view('login');
    }

    function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            if ($user->is_admin) {
                return redirect()->intended(route('admin'));
            }
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error","Invalid email or password");
    }

    public function signup(){
        return view('signup');
    }

    function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        if(!$user){
            return redirect(route('registration'))->with("error","Error registering user");
        }
        return redirect(route('login'))->with("success","Account successfully created");
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}

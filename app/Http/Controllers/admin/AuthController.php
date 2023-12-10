<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('utenze', 'Nome'),
            ],
            'password' => ['required', 'string', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {

        return User::create([
            'Nome' => $data['username'],
            'Password' => Hash::make($data['password']),
            'Gruppo' => 'User',
            'mail' => $data['email'],
            'active' => true
        ]);
    }

    public function index()
    {

        $user = Auth::user();

        if ($user->Gruppo == 'Admin') {
            $information = Information::paginate(10);
            return view('admin.dashboard', compact('user', 'information'));
        } elseif ($user->Gruppo == 'User') {
            $information = Information::where('Agente_ID', $user->ID)->paginate(10);
            return view('agent.dashboard', compact('user', 'information'));
        }

    }
    //
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function loginSubmit(Request $request)
    {

        $username = $request->input('username');
        $password = $request->input('password');
        $rememberMe = $request->has('rememberme_check');

        // Find the user by the 'Nome' (username) field
        $user = User::where('Nome', $username)->first();

        if ($user && Hash::check($password, $user->Password)) {
            // Authentication passed
            // You can manually log in the user here if needed
            auth()->login($user, $rememberMe);

            return redirect()->intended('/');
        }

        // Authentication failed
        return redirect()->route('login')->with('error', 'Invalid login credentials');


    }
    public function registerSubmit(Request $request)
    {
        if ($request->password != $request->password_confirmation) {
            return redirect()->back()->with('error', 'Le passwords non corrispondono.');
        }

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $this->create($request->all())->save();

        return redirect()->route('login')->with('success', 'Utente creato con successo, effettua il login!');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function Usercreate(){
        return view('admin.UserCreate');
    }

    public function UserCreateSubmit(Request $request){
        if ($request->password != $request->password_confirmation) {
            return redirect()->back()->with('error', 'Le passwords non corrispondono.');
        }

        $user = new User();
        $user -> Nome = $request -> username;
        $user -> Password = Hash::make($request -> password);
        $user -> Gruppo = 'User';
        $user -> mail = $request -> email;
        $user->Gruppo = $request->Gruppo;
        $user -> active = true;

        $user->save();

        return redirect()->route('index')->with('success', 'Utente creato con successo!');
    }

}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\Password_Reset;
use App\Models\User;
use App\Traits\CommonResultTrait;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    use CommonResultTrait;

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

    public function index(Request $request)
    {
        $perpage = $this->pageSelector($request);
        $user = Auth::user();

        if ($user->Gruppo == 'Admin' || $user->Gruppo == 'Power') {
            $information = Information::query();

            $information = $this->sortResults($information, $request)->paginate($perpage);

            session([
                'dataCreaz' => '',
                'date_creation_sort' => ''
            ]);

            session([
                'richiedente' => '',
                'richiedente_sort' => ''
            ]);

            session([
                'Agente' => '',
                'Agente_sort' => ''
            ]);
            return view('admin.dashboard', compact('user', 'information'));
        } elseif ($user->Gruppo == 'User') {

            if (isset($_REQUEST['sort'])) {

                if ($_REQUEST['sort'] == 'data_modifica_asc') {
                    $information = Information::where('Agente_ID', $user->ID)->orderBy('datamodif', 'asc')->paginate(100);
                } elseif ($_REQUEST['sort'] == 'data_modifica_desc') {
                    $information = Information::where('Agente_ID', $user->ID)->orderBy('datamodif', 'desc')->paginate(100);
                } elseif ($_REQUEST['sort'] == 'creazione_asc') {
                    $information = Information::where('Agente_ID', $user->ID)->orderBy('Data_Creaz', 'asc')->paginate(100);
                } elseif ($_REQUEST['sort'] == 'creazione_desc') {
                    $information = Information::where('Agente_ID', $user->ID)->orderBy('Data_Creaz', 'desc')->paginate(100);
                } else {
                    $information = Information::where('Agente_ID', $user->ID)->paginate(100);
                }
            } else {
                $information = Information::where('Agente_ID', $user->ID)->paginate(100);
            }
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
        return redirect()->route('login')->with('error', 'Username e/o password non corretti');
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

    public function Usercreate()
    {
        return view('admin.UserCreate');
    }

    public function UserCreateSubmit(Request $request)
    {
        if ($request->password != $request->password_confirmation) {
            return redirect()->back()->with('error', 'Le passwords non corrispondono.');
        }

        $user = new User();
        $user->Nome = $request->username;
        $user->Password = Hash::make($request->password);
        $user->Gruppo = 'User';
        $user->mail = $request->email;
        $user->Gruppo = $request->Gruppo;
        $user->active = true;

        $user->save();

        return redirect()->route('index')->with('success', 'Utente creato con successo!');
    }

    public function ForgotPassword()
    {
        return view('ForgotPassword');
    }

    public function passwordForgotChange($uid)
    {
        return view('passwordForgotChange', compact('uid'));
    }

    public function ForgotPasswordSubmit(Request $request)
    {

        //         $response = Http::get('http://crm-dsr.mondoweb.it/formtomail/api_send_email.php');
        // dd(json_decode($response->getBody()->getContents()) );
        //         $response = Http::post('http://crm-dsr.mondoweb.it/formtomail/api_send_email.php', [
        //             'title' => 'foo',
        //             'body' => 'bar',
        //             'userId' => 1
        //         ]);

        //   dd($request->all());
        $user = User::where('Nome', $request->username)->orWhere('mail', $request->username)->first();

        // generate random 6 digit code
        $code = rand(100000, 999999);

        $password_reset = Password_Reset::create([
            'token' => $code,
            'created_at' => now(),

        ]);
        // $name = "ANWAR HOSSAIN";
        // $email = "anwar.hossain.suman@gmail.com";
        // $title = "Email Using Mondoweb Server";
        // $content ="Hi Anwar, is everything okay???";




        if ($user) {

            // Mail::raw('Codice da utilizzare per il recupero della password: ' . $code, function (Message $message) use($user) {
            //     $message->to($user->mail)->from('prova@mondoweb.it', 'CRM-DSR')->subject('Codice per reimpostare la password');
            // });
            // $send = Mail::mailer('smtp')->send([], [], function ($message) use ($code, $user) {
            //     $message
            //         ->to($user->mail)
            //         ->from('prova@mondoweb.it', 'Server crm-dsr')
            //         ->subject('Codice per reimpostare la password')
            //         ->setBody('Codice da utilizzare per il recupero della password: ' . $code, 'text/html');
            // });

            try {
                $uri = "http://crm-dsr.mondoweb.it/formtomail/api_send_email.php";
                $params['headers'] = [];
                $params['form_params'] = [
                    'to' => $user->mail,
                    'type' => 'reset_password',
                    'code' => $code
                ];
                $client = new Client();

                $response = $client->request('POST', $uri, $params);
                $data = json_decode($response->getBody()->getContents(), true);
                if ($data['status'] == 1) {
                    return redirect()->route('password.forgot.change', $user->ID)->with('success', 'Controlla la tua email. Contiene il codice per reimpostare la password');
                } else {
                    return redirect()->back()->with('error', 'Contatta il tuo team di supporto IT');
                }
            } catch (\Throwable $th) {

                return redirect()->back()->with('error', 'Contatta il tuo team di supporto IT');
            }
        } else {
            return redirect()->back()->with('error', 'Utente non esistente, prova a reinserire le credenziali di accesso');
        }
    }

    public function check_email_unique(Request $req)
    {

        $count = User::where('mail', $req->email)->count();
        return response()->json(['status' => $count == 0 ? true : false]);
    }
}

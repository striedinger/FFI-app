<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\State;
use Validator;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'phone' => 'required|max:255',
            'city' => 'required|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'state_id' => $data['state'],
            'city' => $data['city'],
            'phone' => $data['phone'],
        ]);
    }

    public function showRegistrationForm(){
        $states = State::lists('name', 'id');
        return view('auth.register', ['states' => $states]);
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        
        $throttles = $this->isUsingThrottlesLoginsTrait();
        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        $credentials = $this->getCredentials($request);
        if (Auth::guard($this->getGuard())->attempt($credentials, $request->has('remember'))) {
            //Custom check for active user
            if(!Auth::user()->active){
                Auth::logout();
                return redirect('/login')->withErrors(['email' =>  'Por favor espere a que su cuenta sea verificada por un administrador.']);
            }
            return $this->handleUserWasAuthenticated($request, $throttles);
        }
        
        if ($throttles && ! $lockedOut) {
            $this->incrementLoginAttempts($request);
        }
        return $this->sendFailedLoginResponse($request);
    }

    public function register(Request $request){
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $user = $this->create($request->all());
        if($emails = file_get_contents(storage_path('ffiemails.txt'))){
            $emails = strtolower($emails);
            $emails = explode(",", $emails);
            if(in_array(strtolower($request->email), $emails)){
                $user->active = true;
                $user->save();
            }
        }
        if($user->active){
            $request->session()->flash('status', 'Su cuenta ha sido creada, puede iniciar sesión con el email ' . $user->email);
        }else{
            $request->session()->flash('status', 'Su cuenta ha sido creada, pero su email ' . $user->email . ' no se encuentra en la lista de inscritos en la convocatoria. Un administrador revisara pronto si debe ser activada');
        }
        return redirect('/login');
    }
}

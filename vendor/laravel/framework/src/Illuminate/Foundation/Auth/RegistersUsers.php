<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return $this->showRegistrationForm();
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        if (property_exists($this, 'registerView')) {
            return view($this->registerView);
        }

        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        return $this->register($request);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());

        if($emails = file_get_contents(storage_path('ffiemails.txt'))){
            $emails = strtolower($emails);
            $emails = explode(", ", $emails);
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

        //Auth::guard($this->getGuard())->login($this->create($request->all()));

        //return redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return string|null
     */
    protected function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }
    
}

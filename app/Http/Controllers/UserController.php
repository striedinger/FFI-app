<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\UserRepository;

use App\Repositories\StateRepository;

class UserController extends Controller
{

	protected $users;

    protected $states;

	public function __construct(UserRepository $users, StateRepository $states){

		$this->middleware('auth');

		$this->users = $users; 

		$this->states = $states;
	}

    public function index(Request $request){
    	$this->authorize('index', $request->user());
		$users = $this->users->all();
        return view('users.index', [
            'users' => $users,
        ]);
	}

    public function view(Request $request, $id){
        if($user = $this->users->forId($id)){
            $this->authorize($user);
            return view('users.view', [
                'user' => $user
            ]);
        }else{
            abort(404);
        }
    }

	public function update(Request $request, $id){
        if($user = $this->users->forId($id)){
            $this->authorize('update', $user);
            if($request->isMethod('post')){
                $validator = $this->validate($request, [
                    'name' => 'required|max:255',
                    'phone' => 'required|max:255',
                    'city' => 'required|max:255',
                ]);
                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->city = $request->city;
                $user->state_id = $request->state;
                $user->save();
                $request->session()->flash('status', 'El usuario ha sido actualizado');
                return redirect('/users/view/'.$user->id);
            }
            $states = $this->states->all();
            return view('users.update', [
                'user' => $user,
                'states' => $states,
            ]);
        }else{
            abort(404);
        }
    }
}

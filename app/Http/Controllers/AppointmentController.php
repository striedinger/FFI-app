<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\AppointmentRepository;

use App\Appointment;

use DateTime;

class AppointmentController extends Controller
{

    protected $appointments;

	public function __construct(AppointmentRepository $appointments){
		$this->middleware('auth');

        $this->appointments = $appointments;

	}

    public function index(Request $request){
        if($request->user()->isSuperAdmin()){
            $appointments = $this->appointments->allAdmin();
        }else{
            if($request->user()->isAdmin()){
                $appointments = $this->appointments->allMine($request->user());
            }else{
                $appointments = $this->appointments->all($request->user());
            }
        }
        return view('appointments.index', ['appointments' => $appointments]);
    }

    public function view(Request $request, $id){
        if($appointment = $this->appointments->forId($id)){
            $this->authorize('view', $appointment);
            return view('appointments.view', ['appointment' => $appointment]);
        }else{
            abort(404);
        }
    }

    public function create(Request $request){
        
    }

    public function update(Request $request, $id){
        if($appointment = $this->appointments->forId($id)){
            $this->authorize('update', $appointment);
            if($request->isMethod('post')){
                $appointment->assistant_comment = $request->assistant_comment;
                $appointment->status = $request->status;
                $appointment->active = $request->active;
                if($request->has('active') && $request->user()->isAdmin()){
                    $appointment->active = $request->active;
                }
                $appointment->save();
                $request->session()->flash('status', 'Su cita ha sido actualizada');
                return redirect('/appointments/view/' . $appointment->id);
            }
            return view('appointments.update', [
                'appointment' => $appointment,
            ]);
        }else{
            abort(404);
        }
    }
}

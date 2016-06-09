<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Consultation;

use App\Repositories\UserRepository;

use App\Repositories\StateRepository;

use App\Repositories\ConsultationRepository;

use App\Repositories\AppointmentRepository;

use App\Repositories\CompanyRepository;

use App\ConsultationTime;

use App\Appointment;

use DateTime;

class ConsultationController extends Controller
{

	protected $users;

    protected $states;

    protected $consultations;

    protected $appointments;

    protected $companies;

	public function __construct(ConsultationRepository $consultations, UserRepository $users, StateRepository $states, AppointmentRepository $appointments, CompanyRepository $companies){
		$this->middleware('auth');

        $this->consultations = $consultations;

        $this->states = $states;

        $this->appointments = $appointments;

        $this->companies = $companies;

		$this->users = $users;
	}

    public function index(Request $request){
        if($request->user()->isAdmin()){
            $consultations = $this->consultations->allAdmin();
        }else{
            $consultations = $this->consultations->all($request->user()->state);
        }
        return view('consultations.index', ['consultations' => $consultations]);
    }

    public function view(Request $request, $id){
        if($consultation = $this->consultations->forId($id)){
            $appointments = $this->appointments->forConsultation($consultation);
            $companies = $this->companies->priorityListForUser($request->user());
            return view('consultations.view', ['consultation' => $consultation, 'appointments' => $appointments, 'companies' => $companies]);
        }else{
            abort(404);
        }
    }

    public function appointment(Request $request){
        if($request->user()->hasRole('5')){
            if(($consultation_time = ConsultationTime::find($request->time)) && ($company = $this->companies->forPriorityId($request->company))){
                if($consultation_time->available){
                    $consultation_time->available = false;
                    $consultation_time->save();
                    $request->user()->appointments()->create([
                        'date' => $consultation_time->time,
                        'assistant_id' => $consultation_time->consultation->user->id,
                        'consultation_time_id' => $consultation_time->id,
                        'status' => 'Aprobada',
                        'active' => true,
                        'company_id' => $company->id
                    ]);
                    $request->session()->flash('status', 'Su cita ha sido programada');
                    return redirect('/appointments');
                }else{
                    $request->session()->flash('status', 'La hora que escogio no se encuentra disponible');
                    return redirect('/consultations/view/' . $consultation_time->consultation_id);
                }
            }else{
                abort(404);
            }
        }else{
            abort(403, "Usuario no autorizado");
        }
    }

    public function create(Request $request){
        if($request->user()->hasRole('2') || $request->user()->isSuperAdmin()){
            if($request->isMethod('post')){
                $this->validate($request, [
                    'location' => 'required',
                    'start_date' => 'required|date|before:end_date',
                    'end_date' => 'required|date|after:start_date'
                ]);
                $consultation = Consultation::create([
                    'user_id' => $request->user_id,
                    'state_id' => $request->state_id,
                    'duration' => $request->duration,
                    'location' => $request->location,
                    'description' => $request->description,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date
                ]);
                $startDate = new \DateTime($request->start_date);
                $intervalDate = new \DateTime($request->start_date);
                $endDate = new \DateTime($request->end_date);
                while($intervalDate < $endDate){
                    $consultation->times()->create([
                        'time' => $intervalDate
                    ]);
                    $intervalDate->add(new \DateInterval('PT'.$request->duration.'M'));
                    $intervalDate->add(new \DateInterval('PT'.$request->interval.'M'));
                }

                $request->session()->flash('status', 'Su sesion de citas ha sido registrada');
                return redirect('/consultations');
            }else{
                $assistants = $this->users->assistants();
                $states = $this->states->all();
                return view('consultations.create', ['assistants' => $assistants, 'states' => $states]);
            }
        }else{
            abort(403, 'Usuario no autorizado');
        }
    }

    public function update(Request $request, $id){
        if($consultation = $this->consultations->forId($id)){
            $this->authorize('update', $consultation);
            if($request->isMethod('post')){
                $this->validate($request, [
                    'location' => 'required'
                ]);
                $consultation->user_id = $request->user_id;
                $consultation->state_id = $request->state_id;
                $consultation->location = $request->location;
                $consultation->description = $request->description;
                if($request->has('active') && $request->user()->isAdmin()){
                    $consultation->active = $request->active;
                }
                $consultation->save();
                $appointments = $this->appointments->forConsultation($consultation);
                foreach($appointments as $appointment){
                    $appointment->assistant_id = $request->user_id;
                    $appointment->save();
                }
                $request->session()->flash('status', 'Su sesion de citas ha sido actualizada');
                return redirect('/consultations/update/' . $consultation->id);
            }
            $states = $this->states->all();
            $assistants = $this->users->assistants();
            return view('consultations.update', [
                'consultation' => $consultation,
                'states' => $states,
                'assistants' => $assistants,
            ]);
        }else{
            abort(404);
        }
    }
}

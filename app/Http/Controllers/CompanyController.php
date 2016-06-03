<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\CompanyRepository;

use App\Repositories\StateRepository;

class CompanyController extends Controller
{
    protected $companies;

    protected $states;

	public function __construct(CompanyRepository $companies, StateRepository $states){

		$this->middleware('auth');

		$this->companies = $companies; 

		$this->states = $states;
	}

	public function index(Request $request){
		if($request->user()->isAdmin()){
			$companies = $this->companies->all();
		}else{
			$companies = $this->companies->forUser($request->user());
		}
        return view('companies.index', [
            'companies' => $companies,
        ]);
	}

    public function view(Request $request, $id){
        if($company = $this->companies->forId($id)){
            $this->authorize('view', $company);
            return view('companies.view', [
                'company' => $company
            ]);
        }else{
            abort(404);
        }
    }

    public function search(Request $request){
        $this->authorize('search', $request->user());
        if($query = $request->get('q')){
            $companies = $this->companies->searchByQuery($query);
            return view('companies.search', [
                'companies' => $companies,
                'query' => $query
            ]);
        }else{
            return redirect('/companies');
        }
    }

	public function create(Request $request){
    	if($request->isMethod('post')){
    		$this->validate($request, [
    			'nit' => 'required|max:255',
                'name' => 'required|max:255',
                'description' => 'required',
                'city' => 'required|max:255',
                'address' => 'required'
    		]);
    		$request->user()->companies()->create([
                'nit' => $request->nit,
                'name' => $request->name,
                'description' => $request->description,
                'state_id' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'active' => true
            ]);
    		$request->session()->flash('status', 'Su empresa ha sido registrada');
    		return redirect('/companies');
    	}else{
    		$states = $this->states->all();
    		return view('companies.create', ['states' => $states]);
    	}
    }

    public function update(Request $request, $id){
        if($company = $this->companies->forId($id)){
            $this->authorize('update', $company);
            if($request->isMethod('post')){
                $validator = $this->validate($request, [
                    'nit' => 'required|max:255',
                    'name' => 'required|max:255',
                    'description' => 'required',
                    'city' => 'required|max:255',
                    'address' => 'required'
                ]);
                $company->nit = $request->nit;
                $company->name = $request->name;
                $company->description = $request->description;
                $company->city = $request->city;
                $company->state_id = $request->state;
                $company->address = $request->address;
                if($request->has('priority') && $request->user()->isAdmin()){
                    $company->priority = $request->priority;
                }
                $company->save();
                $request->session()->flash('status', 'Su empresa ha sido actualizada');
                return redirect('/companies/view/' . $company->id);
            }
            $states = $this->states->all();
            return view('companies.update', [
                'company' => $company,
                'states' => $states,
            ]);
        }else{
            abort(404);
        }
    }
}

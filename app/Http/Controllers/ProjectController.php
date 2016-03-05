<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\ProjectRepository;

use App\Repositories\CompanyRepository;

use App\Repositories\TermRepository;

class ProjectController extends Controller
{

	protected $projects;
	protected $terms;
	protected $companies;

	public function __construct(ProjectRepository $projects, TermRepository $terms, CompanyRepository $companies){

		$this->middleware('auth');

		$this->projects = $projects; 
		$this->terms = $terms; 
		$this->companies = $companies; 
	}

	public function index(Request $request){
		if($request->user()->isAdmin()){
            $project = $this->projects->all();
        }else{
            $project = $this->projects->forUser($request->user());
        }
		return view('projects.index', [
			'projects' => $project,
		]);
	}

    public function view(Request $request, $id){
        if($project = $this->projects->forId($id)){
            $this->authorize('view', $project);
            return view('projects.view', [
                'project' => $project
            ]);
        }else{
            abort(404);
        }
    }

	public function create(Request $request){
    	if($request->isMethod('post')){
    		$this->validate($request, [
    			'name' => 'required|max:255',
                'description' => 'required',
                'term' => 'required',
                'company' => 'required'
    		]);
    		$request->user()->projects()->create([
                'name' => $request->name,
                'description' => $request->description,
                'term_id' => $request->term,
                'company_id' => $request->company,
                'active' => true
            ]);
    		$request->session()->flash('status', 'Su proyecto ha sido creado');
    		return redirect('/projects');
    	}else{
    		$terms = $this->terms->all();
    		$companies = $this->companies->listForUser($request->user());
    		return view('projects.create', ['companies' => $companies, 'terms' => $terms]);
    	}
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\ProjectRepository;

use App\Repositories\CompanyRepository;

use App\Repositories\TermRepository;

use App\Repositories\ProductRepository;

use App\Repositories\ActivityRepository;

use App\Repositories\EntityRepository;

use App\Repositories\CostCategoryRepository;

use App\Repositories\CostRepository;

class ProjectController extends Controller
{

	protected $projects;
	protected $terms;
	protected $companies;
    protected $products;

	public function __construct(ProjectRepository $projects, TermRepository $terms, CompanyRepository $companies, ProductRepository $products, ActivityRepository $activities, EntityRepository $entities, CostCategoryRepository $costCategories, CostRepository $costs){

		$this->middleware('auth');

		$this->projects = $projects; 
		$this->terms = $terms; 
		$this->companies = $companies; 
        $this->products = $products;
        $this->activities = $activities;
        $this->entities = $entities;
        $this->costCategories = $costCategories;
        $this->costs = $costs;
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
            $products = $this->products->forProject($project);
            $entities = $this->entities->allForCompany($project->company);
            $costCategories = $this->costCategories->all();
            $costs = $this->costs->forProject($project);
            return view('projects.view', [
                'project' => $project,
                'products' => $products,
                'entities' => $entities,
                'costCategories' => $costCategories,
                'costs' => $costs
            ]);
        }else{
            abort(404);
        }
    }

    public function search(Request $request){
        $this->authorize('search', $request->user());
        if($query = $request->get('q')){
            $projects = $this->projects->searchByQuery($query);
            return view('projects.search', [
                'projects' => $projects,
                'query' => $query
            ]);
        }else{
            return redirect('/projects');
        }
    }

	public function create(Request $request){
    	if($request->isMethod('post')){
    		$this->validate($request, [
    			'name' => 'required|max:255',
                'description' => 'required',
                'amount' => 'required|numeric',
                'term' => 'required',
                'company' => 'required'
    		]);
    		$request->user()->projects()->create([
                'name' => $request->name,
                'description' => $request->description,
                'amount' => $request->amount,
                'term_id' => $request->term,
                'company_id' => $request->company,
                'active' => true
            ]);
    		$request->session()->flash('status', 'Su proyecto ha sido registrado');
    		return redirect('/projects');
    	}else{
    		$terms = $this->terms->all();
    		$companies = $this->companies->listForUser($request->user());
    		return view('projects.create', ['companies' => $companies, 'terms' => $terms]);
    	}
    }

    public function update(Request $request, $id){
        if($project = $this->projects->forId($id)){
            $this->authorize('update', $project);
            if($request->isMethod('post')){
                $validator = $this->validate($request, [
                    'name' => 'required|max:255',
                    'description' => 'required',
                    'amount' => 'required|numeric'
                ]);
                $project->name = $request->name;
                $project->description = $request->description;
                $project->amount = $request->amount;
                $project->save();
                $request->session()->flash('status', 'Su proyecto ha sido actualizado');
                return redirect('/projects/view/' . $project->id);
            }
            return view('projects.update', [
                'project' => $project
            ]);
        }else{
            abort(404);
        }
    }

}

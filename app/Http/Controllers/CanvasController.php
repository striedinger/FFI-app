<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\CanvasRepository;
use App\Repositories\CompanyRepository;

class CanvasController extends Controller
{
    protected $canvas;
    protected $company;

    public function __construct(CanvasRepository $canvas, CompanyRepository $company){

		$this->middleware('auth');

		$this->canvas = $canvas; 

		$this->company = $company;
	}

	public function create(Request $request, $id){
		if($company = $this->company->forId($id)){
			if($request->user()->id == $company->user_id){
				if($request->isMethod('post')){
    				$this->validate($request, [
    					'key_partners' => 'required',
                		'key_activities' => 'required',
                		'key_resources' => 'required',
                		'value_propositions' => 'required',
                		'customer_relationships' => 'required',
                		'channels' => 'required',
                		'customer_segments' => 'required',
                		'cost_structure' => 'required',
                		'revenue_streams' => 'required'
    				]); 
    				$company->canvas()->create([
                		'key_partners' => $request->key_partners,
                		'key_activities' => $request->key_activities,
                		'key_resources' => $request->key_resources,
                		'value_propositions' => $request->value_propositions,
                		'customer_relationships' => $request->customer_relationships,
                		'channels' => $request->channels,
                		'customer_segments' => $request->customer_segments,
                		'cost_structure' => $request->cost_structure,
                		'revenue_streams' => $request->revenue_streams
            		]);
    				$request->session()->flash('status', 'Su canvas ha sido creado');
    				return redirect('/companies/view/' . $company->id);
    			}else{
    				return view('canvases.create', ['company' => $company]);
    			}
			}else{
				abort(403, 'Usuario no autorizado');
			}
		}else{
			abort(404);
		}
    }

    public function view(Request $request, $id){
        if($canvas = $this->canvas->forId($id)){
            $this->authorize($canvas);
            return view('canvases.view', [
                'canvas' => $canvas
            ]);
        }else{
            abort(404);
        }
    }

    public function update(Request $request, $id){
        if($canvas = $this->canvas->forId($id)){
            $this->authorize($canvas);
            if($request->isMethod('post')){
                $validator = $this->validate($request, [
                    'key_partners' => 'required',
                	'key_activities' => 'required',
                	'key_resources' => 'required',
                	'value_propositions' => 'required',
                	'customer_relationships' => 'required',
                	'channels' => 'required',
                	'customer_segments' => 'required',
                	'cost_structure' => 'required',
                	'revenue_streams' => 'required'
                ]);
                $canvas->key_partners = $request->key_partners;
                $canvas->key_activities = $request->key_activities;
                $canvas->key_resources = $request->key_resources;
                $canvas->value_propositions = $request->value_propositions;
                $canvas->customer_relationships = $request->customer_relationships;
                $canvas->channels = $request->channels;
                $canvas->customer_segments = $request->customer_segments;
                $canvas->cost_structure = $request->cost_structure;
                $canvas->revenue_streams = $request->revenue_streams;
                $canvas->save();
                $request->session()->flash('status', 'Su canvas ha sido actualizado');
                return redirect('/canvas/view/' . $canvas->id);
            }
            return view('canvases.update', [
                'canvas' => $canvas
            ]);
        }else{
            abort(404);
        }
    }
}

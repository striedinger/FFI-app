<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\ProjectRepository;
use App\Repositories\CostRepository;
use App\Repositories\EntityRepository;
use App\Repositories\CostCategoryRepository;

class CostController extends Controller
{
    public function __construct(ProjectRepository $project, CostRepository $costs, EntityRepository $entities, CostCategoryRepository $costCategories){
    	$this->project = $project;
        $this->costs = $costs;
        $this->entities = $entities;
        $this->costCategories = $costCategories;
    	$this->middleware('auth');
    }

    public function create(Request $request, $id){
    	if($project = $this->project->forId($id)){
    		if($request->user()->id == $project->company->user_id){
    			$this->validate($request, [
    				'entity_id' => 'required',
                    'cost_category_id' => 'required',
                    'financer_cash' => 'required|numeric',
                    'financer_pik' => 'required|numeric',
                    'company_cash' => 'required|numeric',
                    'company_pik' => 'required|numeric'
    			]);
                if($this->costs->existsForEntityAndCategory($project, $request->cost_category_id, $request->entity_id)){
                    $request->session()->flash('status', 'El gasto ya había sido ingresado para la entidad y rubro indicados');
                }else{
                    $product = $project->costs()->create([
                        'entity_id' => $request->entity_id,
                        'cost_category_id' => $request->cost_category_id,
                        'financer_cash' => $request->financer_cash,
                        'financer_pik' => $request->financer_pik,
                        'company_cash' => $request->company_cash,
                        'company_pik' => $request->company_pik
                    ]);
                    $request->session()->flash('status', 'Su gasto ha sido guardado');
                }
    			return redirect('/projects/view/' . $project->id . '#costs');
    		}else{
    			abort(403, "Usuario no autorizado");
    		}
    	}else{
    		abort(404);
    	}
    }

    public function update(Request $request, $id){
        if($cost = $this->costs->forId($id)){
            $this->authorize('update', $cost);
            if($request->isMethod('post')){
                $validator = $this->validate($request, [
                    'entity_id' => 'required',
                    'cost_category_id' => 'required',
                    'financer_cash' => 'required|numeric',
                    'financer_pik' => 'required|numeric',
                    'company_cash' => 'required|numeric',
                    'company_pik' => 'required|numeric'
                ]);
                $cost->entity_id = $request->entity_id;
                $cost->cost_category_id = $request->cost_category_id;
                $cost->financer_cash = $request->financer_cash;
                $cost->financer_pik = $request->financer_pik;
                $cost->company_cash = $request->company_cash;
                $cost->company_pik = $request->company_pik;
                $cost->save();
                $request->session()->flash('status', 'Su gasto ha sido actualizado');
                return redirect('/costs/update/' . $cost->id);
            }
            $entities = $this->entities->allForCompany($cost->project->company);
            $costCategories = $this->costCategories->all();
            return view('costs.update', [
                'cost' => $cost,
                'entities' => $entities,
                'costCategories' => $costCategories
            ]);
        }else{
            abort(404);
        }
    }

    public function destroy(Request $request, $id){
        if($cost = $this->costs->forId($id)){
            $this->authorize('destroy', $cost);
            $cost->delete();
            $request->session()->flash('status', 'Su gasto ha sido eliminado');
            return redirect('/projects/view/' . $cost->project_id . '#costs');
        }else{
            abort(404);
        }
    }
}

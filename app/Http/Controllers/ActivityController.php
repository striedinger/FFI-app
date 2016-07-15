<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\ProjectRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ActivityRepository;

class ActivityController extends Controller
{
    public function __construct(ActivityRepository $activities, ProjectRepository $project, ProductRepository $products){
    	$this->project = $project;
    	$this->products = $products;
    	$this->activities = $activities;
    	$this->middleware('auth');
    }

    public function create(Request $request){
        if($product = $this->products->forId($request->product_id)){
            if($request->user()->id == $product->project->company->user_id){
                $this->validate($request, [
                    'name' => 'required'
                ]);
                $activity = $product->activities()->create([
                    'name' => $request->name,
                    'product_id' => $request->product_id,
                ]);
                $request->session()->flash('status', 'Su actividad ha sido guardada');
                return redirect('/projects/view/' . $product->project->id . '#activities');
            }else{
                abort(403, "Usuario no autorizado");
            }
        }else{
            abort(404);
        }
    }

    public function update(Request $request, $id){
        if($activity = $this->activities->forId($id)){
            $this->authorize('update', $activity);
            if($request->isMethod('post')){
                $validator = $this->validate($request, [
                    'name' => 'required|max:255',
                    'start_date' => 'required|date|before:end_date',
                    'end_date' => 'required|date|after:start_date'
                ]);
                $activity->name = $request->name;
                $activity->description = $request->description;
                $activity->start_date = $request->start_date;
                $activity->end_date = $request->end_date;
                if($request->activity_id == 0){
                    $activity->activity_id = null;
                }else{
                    $activity->activity_id = $request->activity_id;
                }
                $activity->save();
                $request->session()->flash('status', 'Su actividad ha sido actualizada');
                return redirect('/activities/update/' . $activity->id);
            }
            $activities = $this->activities->forProduct($activity->product);
            return view('activities.update', [
                'activity' => $activity,
                'activities' => $activities
            ]);
        }else{
            abort(404);
        }
    }

    public function destroy(Request $request, $id){
        if($activity = $this->activities->forId($id)){
            $this->authorize('destroy', $activity);
            $activity->delete();
            $request->session()->flash('status', 'Su actividad ha sido eliminado');
            return redirect('/projects/view/' . $activity->product->project_id . '#activities');
        }else{
            abort(404);
        }
    }
}

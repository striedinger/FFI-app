<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\ProjectRepository;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    public function __construct(ProjectRepository $project, ProductRepository $products){
    	$this->project = $project;
    	$this->products = $products;
    	$this->middleware('auth');
    }

    public function create(Request $request, $id){
    	if($project = $this->project->forId($id)){
    		if($request->user()->id == $project->company->user_id){
    			$this->validate($request, [
    				'name' => 'required'
    			]);
    			$product = $project->products()->create([
    				'name' => $request->name,
    			]);
                foreach($request->activities as $activity){
                    $product->activities()->create([
                        'name' => $activity
                    ]);
                }
    			$request->session()->flash('status', 'Su producto ha sido guardado');
    			return redirect('/projects/view/' . $project->id . '#products');
    		}else{
    			abort(403, "Usuario no autorizado");
    		}
    	}else{
    		abort(404);
    	}
    }

    public function update(Request $request, $id){
        if($product = $this->products->forId($id)){
            $this->authorize('update', $product);
            if($request->isMethod('post')){
                $validator = $this->validate($request, [
                    'name' => 'required|max:255',
                    'state' => 'required'
                ]);
                $product->name = $request->name;
                $product->description = $request->description;
                $product->state = $request->state;
                $product->save();
                $request->session()->flash('status', 'Su producto ha sido actualizado');
                return redirect('/products/update/' . $product->id);
            }
            return view('products.update', [
                'product' => $product
            ]);
        }else{
            abort(404);
        }
    }

    public function destroy(Request $request, $id){
        if($product = $this->products->forId($id)){
            $this->authorize('destroy', $product);
            $product->delete();
            $request->session()->flash('status', 'Su producto ha sido eliminado');
            return redirect('/projects/view/' . $product->project_id . '#products');
        }else{
            abort(404);
        }
    }
}

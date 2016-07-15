<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\CompanyRepository;

use App\Repositories\EntityRepository;

class EntityController extends Controller
{

	public function __construct(EntityRepository $entity, CompanyRepository $company){
    	$this->company = $company;
    	$this->entity = $entity;
    	$this->middleware('auth');
    }

    public function create(Request $request, $id){
    	if($company = $this->company->forId($id)){
    		if($request->user()->id == $company->user_id){
    			if($request->isMethod('post')){
    				$this->validate($request, [
    					'name' => 'required',
    					'nit' => 'required',
    					'contact_name' => 'required',
    					'contact_phone' => 'required',
    					'contact_email' => 'required|email'
    				]);
    				$company->entities()->create([
    					'name' => $request->name,
    					'nit' => $request->nit,
    					'contact_name' => $request->contact_name,
    					'contact_phone' => $request->contact_phone,
    					'contact_email' => $request->contact_email
    				]);
    				$request->session()->flash('status', 'Su entidad ha sido registrada');
    				return redirect('/companies/view/' . $company->id);
    			}else{
    				return view('entities.create', ['company' => $company]);
    			}
    		}else{
    			abort(403, "Usuario no autorizado");
    		}
    	}else{
    		abort(404);
    	}
    }

    public function update(Request $request, $id){
        if($entity = $this->entity->forId($id)){
            $this->authorize('update', $entity);
            if($request->isMethod('post')){
                $validator = $this->validate($request, [
                    'name' => 'required',
                    'nit' => 'required',
                    'contact_name' => 'required',
                    'contact_phone' => 'required',
                    'contact_email' => 'required|email'
                ]);
                $entity->name = $request->name;
                $entity->nit = $request->nit;
                $entity->contact_name = $request->contact_name;
                $entity->contact_phone = $request->contact_phone;
                $entity->contact_email = $request->contact_email;
                $entity->save();
                $request->session()->flash('status', 'Su entidad ha sido actualizada');
                return redirect('/companies/view/' . $entity->company_id);
            }
            return view('entities.update', [
                'entity' => $entity
            ]);
        }else{
            abort(404);
        }
    }

    public function destroy(Request $request, $id){
        if($entity = $this->entity->forId($id)){
            $this->authorize('destroy', $entity);
            $entity->delete();
            $request->session()->flash('status', 'Su entidad ha sido eliminada');
            return redirect('/companies/view/' . $entity->company_id);
        }else{
            abort(404);
        }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ProjectRepository;
use App\ProjectComment;

class ProjectCommentController extends Controller
{

	public function __construct(ProjectRepository $project){
		$this->project = $project;

		$this->middleware('auth');
	}

    public function create(Request $request, $id){
    	if($project = $this->project->forId($id)){
    		if($request->user()->id == $project->company->user_id || $request->user()->isAdmin()){
    			$this->validate($request, [
    				'comment' => 'required'
    			]);
    			$request->user()->projectComments()->create([
    				'project_id' => $project->id,
    				'comment' => $request->comment
    			]);
    			$request->session()->flash('status', 'Su comentario ha sido guardado');
    			return redirect('/projects/view/' . $project->id . '#comments');
    		}else{
    			abort(403, "Usuario no autorizado");
    		}
    	}else{
    		abort(404);
    	}
    }

    public function destroy(Request $request, $id){
        if($comment = ProjectComment::find($id)){
            $this->authorize('destroy', $comment);
            $comment->delete();
            $request->session()->flash('status', 'Su comentario ha sido eliminado');
            return redirect('/projects/view/' . $comment->project_id . '#comments');
        }else{
            abort(404);
        }
    }
}
